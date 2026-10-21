<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\OtpVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function showLoginForm()
    {
        // Jika user sudah benar-benar login,
        // langsung arahkan ke dashboard.
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    /**
     * Login tahap pertama:
     * Email + Password
     *
     * User BELUM dianggap login.
     * Login baru dilakukan setelah OTP benar.
     */
    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ],
            [
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email tidak valid',
                'password.required' => 'Password harus diisi',
                'password.min' => 'Password minimal 6 karakter',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        /*
         * Hanya memeriksa email + password.
         *
         * User BELUM login sampai OTP berhasil.
         */
        if (!Auth::validate($credentials)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Email atau password salah');
        }

        // Ambil data user.
        $user = User::where(
            'email',
            $request->input('email')
        )->first();

        if (!$user) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Akun tidak ditemukan');
        }

        /*
         * Hapus OTP lama yang belum diverifikasi.
         */
        $user->otpVerifications()
            ->whereNull('verified_at')
            ->delete();

        /*
         * Generate OTP 6 digit.
         */
        $otpCode = (string) random_int(100000, 999999);

        /*
         * Simpan OTP dalam bentuk HASH.
         *
         * Berlaku selama 5 menit.
         */
        $user->otpVerifications()->create([
            'otp' => Hash::make($otpCode),
            'expires_at' => now()->addMinutes(5),
            'attempts' => 0,
        ]);

        /*
         * Simpan informasi sementara di session.
         *
         * User BELUM login.
         */
        $request->session()->put([
            'otp_user_id' => $user->id,
            'otp_remember' => $request->boolean('remember'),
        ]);

        /*
         * Development:
         * Mailer masih menggunakan "log".
         *
         * OTP dapat dilihat di:
         * storage/logs/laravel.log
         */
        Mail::raw(
            "Kode OTP Anda adalah: {$otpCode}\n\n"
            . "Kode ini berlaku selama 5 menit.\n"
            . "Jangan berikan kode ini kepada orang lain.",
            function ($message) use ($user) {
                $message
                    ->to($user->email)
                    ->subject(
                        'Kode Verifikasi Login - Buku Kunjungan'
                    );
            }
        );

        return redirect()
            ->route('otp.verify')
            ->with(
                'success',
                'Kode OTP telah dibuat. Silakan cek kode verifikasi.'
            );
    }

    /**
     * Menampilkan halaman verifikasi OTP.
     */
    public function showOtpForm(Request $request)
    {
        $userId = $request->session()->get('otp_user_id');

        /*
         * Jika tidak ada session OTP,
         * berarti proses login tidak valid.
         */
        if (!$userId) {
            return redirect()
                ->route('login')
                ->with(
                    'error',
                    'Silakan login terlebih dahulu.'
                );
        }

        /*
         * Ambil OTP aktif terbaru.
         */
        $otpVerification = OtpVerification::where(
                'user_id',
                $userId
            )
            ->whereNull('verified_at')
            ->latest()
            ->first();

        /*
         * Jika OTP tidak ditemukan.
         */
        if (!$otpVerification) {
            return redirect()
                ->route('login')
                ->with(
                    'error',
                    'Kode OTP tidak ditemukan. Silakan login kembali.'
                );
        }

        /*
         * Kirim waktu expired ke Blade.
         *
         * Digunakan oleh JavaScript countdown.
         */
        return view('auth.verify-otp', [
            'otpExpiresAt' => $otpVerification->expires_at,
        ]);
    }

    /**
     * Verifikasi OTP.
     */
    public function verifyOtp(Request $request)
    {
        /*
         * Validasi OTP.
         */
        $request->validate(
            [
                'otp' => [
                    'required',
                    'digits:6',
                ],
            ],
            [
                'otp.required' => 'Kode OTP harus diisi.',
                'otp.digits' => 'Kode OTP harus terdiri dari 6 digit.',
            ]
        );

        /*
         * Ambil user ID dari session OTP.
         */
        $userId = $request->session()->get('otp_user_id');

        if (!$userId) {
            return redirect()
                ->route('login')
                ->with(
                    'error',
                    'Sesi verifikasi telah berakhir. Silakan login kembali.'
                );
        }

        /*
         * Ambil OTP aktif terbaru.
         */
        $otpVerification = OtpVerification::where(
                'user_id',
                $userId
            )
            ->whereNull('verified_at')
            ->latest()
            ->first();

        if (!$otpVerification) {
            return back()
                ->with(
                    'error',
                    'Kode OTP tidak ditemukan. Silakan login kembali.'
                );
        }

        /*
         * ============================
         * CEK EXPIRED
         * ============================
         */
        if ($otpVerification->expires_at->isPast()) {

            // Hapus OTP yang sudah expired.
            $otpVerification->delete();

            // Hapus session OTP.
            $request->session()->forget([
                'otp_user_id',
                'otp_remember',
            ]);

            return redirect()
                ->route('login')
                ->with(
                    'error',
                    'Kode OTP sudah kedaluwarsa. Silakan login kembali.'
                );
        }

        /*
         * ============================
         * CEK OTP
         * ============================
         *
         * Karena OTP disimpan menggunakan Hash::make(),
         * pengecekan menggunakan Hash::check().
         */
        if (!Hash::check(
            $request->input('otp'),
            $otpVerification->otp
        )) {

            /*
             * Tambahkan jumlah percobaan.
             */
            $otpVerification->increment('attempts');

            /*
             * Ambil nilai terbaru.
             */
            $otpVerification->refresh();

            /*
             * ============================
             * MAKSIMAL 5 PERCOBAAN
             * ============================
             */
            if ($otpVerification->attempts >= 5) {

                /*
                 * Hapus OTP setelah percobaan ke-5.
                 */
                $otpVerification->delete();

                /*
                 * Hapus session OTP.
                 */
                $request->session()->forget([
                    'otp_user_id',
                    'otp_remember',
                ]);

                return redirect()
                    ->route('login')
                    ->with(
                        'error',
                        'Terlalu banyak percobaan OTP. '
                        . 'Silakan login kembali untuk mendapatkan '
                        . 'kode baru.'
                    );
            }

            /*
             * OTP masih boleh dicoba.
             */
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Kode OTP salah. Percobaan '
                    . $otpVerification->attempts
                    . ' dari 5.'
                );
        }

        /*
         * ============================
         * OTP BENAR
         * ============================
         */

        /*
         * Tandai OTP sudah digunakan.
         */
        $otpVerification->update([
            'verified_at' => now(),
        ]);

        /*
         * Ambil user.
         */
        $user = User::find($userId);

        if (!$user) {

            $request->session()->forget([
                'otp_user_id',
                'otp_remember',
            ]);

            return redirect()
                ->route('login')
                ->with(
                    'error',
                    'Akun tidak ditemukan.'
                );
        }

        /*
         * Ambil pilihan "Ingat saya"
         * sebelum session dibersihkan.
         */
        $remember = $request->session()->pull(
            'otp_remember',
            false
        );

        /*
         * Hapus session OTP.
         */
        $request->session()->forget('otp_user_id');

        /*
         * ============================
         * LOGIN SEBENARNYA
         * ============================
         *
         * User baru dianggap login
         * setelah OTP benar.
         */
        Auth::login($user, $remember);

        /*
         * Regenerasi session untuk keamanan.
         */
        $request->session()->regenerate();

        /*
         * Masuk dashboard.
         */
        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Login dan verifikasi OTP berhasil!'
            );
    }

    /**
     * Mengirim ulang OTP.
     *
     * Digunakan setelah OTP sebelumnya
     * sudah kedaluwarsa.
     */
    public function resendOtp(Request $request)
    {
        /*
         * Ambil user ID dari session OTP.
         */
        $userId = $request->session()->get('otp_user_id');

        if (!$userId) {
            return redirect()
                ->route('login')
                ->with(
                    'error',
                    'Sesi verifikasi telah berakhir. Silakan login kembali.'
                );
        }

        /*
         * Ambil user.
         */
        $user = User::find($userId);

        if (!$user) {
            $request->session()->forget([
                'otp_user_id',
                'otp_remember',
            ]);

            return redirect()
                ->route('login')
                ->with(
                    'error',
                    'Akun tidak ditemukan.'
                );
        }

        /*
         * Ambil OTP aktif sebelumnya.
         */
        $oldOtp = OtpVerification::where(
                'user_id',
                $userId
            )
            ->whereNull('verified_at')
            ->latest()
            ->first();

        /*
         * Jika OTP lama masih ada dan
         * belum expired, jangan membuat OTP baru.
         */
        if (
            $oldOtp &&
            !$oldOtp->expires_at->isPast()
        ) {
            return back()
                ->with(
                    'error',
                    'Kode OTP sebelumnya masih berlaku.'
                );
        }

        /*
         * Hapus OTP lama.
         */
        OtpVerification::where(
            'user_id',
            $userId
        )
            ->whereNull('verified_at')
            ->delete();

        /*
         * Generate OTP baru.
         */
        $otpCode = (string) random_int(
            100000,
            999999
        );

        /*
         * Simpan OTP baru.
         */
        $user->otpVerifications()->create([
            'otp' => Hash::make($otpCode),
            'expires_at' => now()->addMinutes(5),
            'attempts' => 0,
        ]);

        /*
         * Kirim OTP menggunakan mailer log
         * untuk development lokal.
         */
        Mail::raw(
            "Kode OTP Anda adalah: {$otpCode}\n\n"
            . "Kode ini berlaku selama 5 menit.\n"
            . "Jangan berikan kode ini kepada orang lain.",
            function ($message) use ($user) {
                $message
                    ->to($user->email)
                    ->subject(
                        'Kode Verifikasi Login - Buku Kunjungan'
                    );
            }
        );

        return redirect()
            ->route('otp.verify')
            ->with(
                'success',
                'Kode OTP baru telah dibuat. '
                . 'Silakan cek kode verifikasi.'
            );
    }

    /**
     * Handle logout.
     */
    public function logout(Request $request)
    {
        /*
         * Logout user.
         */
        Auth::logout();

        /*
         * Hancurkan session.
         */
        $request->session()->invalidate();

        /*
         * Buat CSRF token baru.
         */
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Berhasil keluar!'
            );
    }
}