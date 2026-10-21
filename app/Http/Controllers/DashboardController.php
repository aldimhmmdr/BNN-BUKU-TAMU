<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\VisitNotification;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Display dashboard with metrics and notifications.
     */
    public function index(Request $request)
    {
        $startDateInput = $request->input('start_date');
        $endDateInput = $request->input('end_date');
        $periode = $request->input('periode', 'hari_ini');


        /*
        |--------------------------------------------------------------------------
        | Menentukan rentang tanggal
        |--------------------------------------------------------------------------
        */

        if ($request->filled('start_date') || $request->filled('end_date')) {

            if ($startDateInput && $endDateInput) {

                $startDate = Carbon::parse($startDateInput)->startOfDay();
                $endDate = Carbon::parse($endDateInput)->endOfDay();

            } elseif ($startDateInput) {

                $startDate = Carbon::parse($startDateInput)->startOfDay();
                $endDate = Carbon::parse($startDateInput)->endOfDay();

            } else {

                $startDate = Carbon::parse($endDateInput)->startOfDay();
                $endDate = Carbon::parse($endDateInput)->endOfDay();
            }

        } else {

            [$startDate, $endDate] =
                $this->resolvePeriodRange($periode);
        }


        /*
        |--------------------------------------------------------------------------
        | Query data tamu
        |--------------------------------------------------------------------------
        */

        $baseQuery = Guest::whereBetween(
            'created_at',
            [$startDate, $endDate]
        );


        /*
        |--------------------------------------------------------------------------
        | Statistik dashboard
        |--------------------------------------------------------------------------
        */

        $statistics = [

            'total' => (clone $baseQuery)->count(),

            'menunggu' => (clone $baseQuery)
                ->where('status', 'menunggu')
                ->count(),

            'dilayani' => (clone $baseQuery)
                ->where('status', 'dilayani')
                ->count(),

            'selesai' => (clone $baseQuery)
                ->where('status', 'selesai')
                ->count(),

        ];


        /*
        |--------------------------------------------------------------------------
        | Statistik berdasarkan keperluan tamu
        |--------------------------------------------------------------------------
        */

        $purposeCounts = [];

        $purposeRows = (clone $baseQuery)
            ->select(
                'purpose',
                'purpose_lainnya'
            )
            ->get();


        foreach ($purposeRows as $row) {

            $label = $row->purpose;


            if ($label === 'lainnya') {

                $label = trim(
                    (string) $row->purpose_lainnya
                );


                if ($label === '') {
                    $label = 'Lainnya';
                }
            }


            $label = Str::title($label);


            $purposeCounts[$label] =
                ($purposeCounts[$label] ?? 0) + 1;
        }


        arsort($purposeCounts);


        $purposeLabels =
            array_keys($purposeCounts);

        $purposeValues =
            array_values($purposeCounts);


        /*
        |--------------------------------------------------------------------------
        | Persentase keperluan
        |--------------------------------------------------------------------------
        */

        $purposePercentages = [];

        $purposeTotal =
            max($statistics['total'], 1);


        foreach ($purposeValues as $count) {

            $purposePercentages[] =
                round(
                    ($count / $purposeTotal) * 100,
                    1
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Tanggal filter
        |--------------------------------------------------------------------------
        */

        $filterDates = [

            'start_date' =>
                $startDate->toDateString(),

            'end_date' =>
                $endDate->toDateString(),

        ];


        /*
        |--------------------------------------------------------------------------
        | RIWAYAT NOTIFIKASI
        |--------------------------------------------------------------------------
        |
        | Berbeda dengan versi sebelumnya:
        |
        | Semua notifikasi tetap ditampilkan,
        | baik sudah dibaca maupun belum dibaca.
        |
        | is_read hanya digunakan untuk menentukan
        | badge / status "BARU".
        |
        */

        $notifications =
            VisitNotification::latest()
                ->take(20)
                ->get();


        /*
        |--------------------------------------------------------------------------
        | JUMLAH NOTIFIKASI BELUM DIBACA
        |--------------------------------------------------------------------------
        */

        $unreadNotificationCount =
            VisitNotification::where(
                'is_read',
                0
            )->count();


        /*
        |--------------------------------------------------------------------------
        | Tampilkan dashboard
        |--------------------------------------------------------------------------
        */

        return view(
            'dashboard.dashboard',
            compact(
                'statistics',
                'filterDates',
                'purposeLabels',
                'purposeValues',
                'purposePercentages',
                'purposeTotal',
                'notifications',
                'unreadNotificationCount'
            )
        );
    }


    /**
     * Membuka satu notifikasi.
     *
     * Notifikasi yang dipilih akan ditandai
     * sebagai sudah dibaca kemudian petugas
     * diarahkan ke halaman Data Kunjungan.
     */
    public function openNotification(
        VisitNotification $notification
    ) {

        /*
        |--------------------------------------------------------------------------
        | Tandai notifikasi yang dipilih sebagai sudah dibaca
        |--------------------------------------------------------------------------
        */

        if ((int) $notification->is_read === 0) {

            $notification->update([
                'is_read' => 1,
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Ambil guest_id dari notifikasi
        |--------------------------------------------------------------------------
        */

        $guestId =
            $notification->guest_id;


        /*
        |--------------------------------------------------------------------------
        | Arahkan ke Data Kunjungan
        |--------------------------------------------------------------------------
        |
        | guest_id dikirim sebagai query parameter
        | sehingga identitas tamu tetap tersedia
        | untuk pengembangan penyorotan data berikutnya.
        |
        */

        return redirect()->route(
            'guests.index',
            $guestId
                ? ['guest_id' => $guestId]
                : []
        );
    }


    /**
     * Resolve period filter into start/end range.
     */
    private function resolvePeriodRange(
        string $periode
    ) {

        $now = Carbon::now();


        switch ($periode) {

            case 'seminggu':

                return [

                    $now
                        ->copy()
                        ->subDays(6)
                        ->startOfDay(),

                    $now
                        ->copy()
                        ->endOfDay()

                ];


            case 'sebulan':

                return [

                    $now
                        ->copy()
                        ->subDays(29)
                        ->startOfDay(),

                    $now
                        ->copy()
                        ->endOfDay()

                ];


            case 'setahun':

                return [

                    $now
                        ->copy()
                        ->subDays(364)
                        ->startOfDay(),

                    $now
                        ->copy()
                        ->endOfDay()

                ];


            case 'hari_ini':

            default:

                return [

                    $now
                        ->copy()
                        ->startOfDay(),

                    $now
                        ->copy()
                        ->endOfDay()

                ];
        }
    }
}