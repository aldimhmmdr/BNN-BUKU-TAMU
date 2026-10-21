<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>SITADIG</title>
    <link rel="icon" type="image/png" href="{{ asset('image/bnn-logo.png') }}">

    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f5f9;
            color: #172033;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .site-header {
            width: 100%;
            height: 76px;

            background: rgba(255, 255, 255, 0.97);

            border-bottom: 1px solid #e5e7eb;

            display: flex;
            align-items: center;
        }


        .header-inner {
            width: 1180px;
            margin: 0 auto;
            padding: 0 24px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }


        .brand {
            display: flex;
            align-items: center;
            gap: 12px;

            text-decoration: none;
            color: #172033;
        }


        .brand-logo {
            width: 42px;
            height: 42px;

            object-fit: contain;

            border-radius: 50%;

            background: #ffffff;

            box-shadow:
                0 2px 8px rgba(15, 23, 42, 0.12);
        }


        .brand-name {
            font-size: 20px;
            font-weight: 700;

            letter-spacing: -0.3px;
        }


        .header-login {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-width: 86px;
            height: 42px;

            padding: 0 20px;

            border-radius: 999px;

            background: #2563eb;
            color: #ffffff;

            text-decoration: none;

            font-size: 14px;
            font-weight: 700;

            box-shadow:
                0 5px 14px rgba(37, 99, 235, 0.22);
        }


        .header-login:hover {
            background: #1d4ed8;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .otp-main {
            position: relative;

            width: 100%;
            min-height: calc(100vh - 76px);

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 56px 20px 70px;

            background-image:
                linear-gradient(
                    rgba(8, 20, 38, 0.58),
                    rgba(8, 20, 38, 0.64)
                ),
                url('{{ asset('image/kantor-bnn.jpg') }}');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }


        /* =====================================================
           OTP CARD
        ===================================================== */

        .otp-card {
            width: 480px;

            padding: 42px 40px 34px;

            background: rgba(255, 255, 255, 0.97);

            border-radius: 28px;

            box-shadow:
                0 25px 70px rgba(0, 0, 0, 0.28),
                0 5px 20px rgba(0, 0, 0, 0.08);

            text-align: center;
        }


        /* =====================================================
           LOGO
        ===================================================== */

        .otp-logo-wrapper {
            width: 76px;
            height: 76px;

            margin: 0 auto 18px;

            padding: 8px;

            background: #ffffff;

            border-radius: 18px;

            box-shadow:
                0 4px 14px rgba(15, 23, 42, 0.12);

            display: flex;
            align-items: center;
            justify-content: center;
        }


        .otp-logo {
            width: 100%;
            height: 100%;

            object-fit: contain;
        }


        /* =====================================================
           TITLE
        ===================================================== */

        .otp-label {
            display: inline-block;

            margin-bottom: 8px;

            color: #2563eb;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 0.8px;

            text-transform: uppercase;
        }


        .otp-title {
            margin: 0;

            color: #172033;

            font-size: 28px;
            line-height: 1.2;

            font-weight: 800;

            letter-spacing: -0.7px;
        }


        .otp-description {
            margin: 12px auto 24px;

            width: 360px;

            color: #64748b;

            font-size: 14px;
            line-height: 1.6;
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert {
            width: 100%;

            display: flex;
            align-items: flex-start;

            gap: 10px;

            padding: 12px 14px;

            margin-bottom: 22px;

            border-radius: 14px;

            text-align: left;

            font-size: 13px;
            line-height: 1.5;
        }


        .alert-success {
            color: #047857;

            background: #ecfdf5;

            border: 1px solid #a7f3d0;
        }


        .alert-error {
            color: #be123c;

            background: #fff1f2;

            border: 1px solid #fecdd3;
        }


        .alert-icon {
            flex: 0 0 auto;

            width: 20px;
            height: 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            font-size: 11px;
            font-weight: 800;
        }


        .alert-success .alert-icon {
            background: #d1fae5;
        }


        .alert-error .alert-icon {
            background: #ffe4e6;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-group {
            width: 100%;

            margin-bottom: 18px;

            text-align: left;
        }


        .form-label-row {
            display: flex;

            align-items: center;
            justify-content: space-between;

            margin-bottom: 9px;
        }


        .form-label {
            color: #334155;

            font-size: 12px;
            font-weight: 700;
        }


        .digit-label {
            color: #94a3b8;

            font-size: 10px;
            font-weight: 600;
        }


        .otp-input {
            width: 100%;
            height: 54px;

            padding: 0 16px;

            border: 1px solid #dbe3ed;

            border-radius: 14px;

            background: #f8fafc;

            color: #172033;

            text-align: center;

            font-size: 23px;
            font-weight: 700;

            letter-spacing: 11px;

            outline: none;
        }


        .otp-input::placeholder {
            color: #cbd5e1;
            opacity: 1;
        }


        .otp-input:focus {
            background: #ffffff;

            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.12);
        }


        /* =====================================================
           COUNTDOWN
        ===================================================== */

        .countdown-wrapper {
            display: flex;

            align-items: center;
            justify-content: center;

            margin: 8px 0 22px;
        }


        .countdown {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 7px 13px;

            border-radius: 999px;

            background: #f8fafc;

            color: #64748b;

            font-size: 12px;
            font-weight: 500;
        }


        .countdown-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #2563eb;
        }


        #countdown {
            color: #2563eb;

            font-weight: 800;

            font-variant-numeric: tabular-nums;
        }


        #countdown.expired {
            color: #dc2626;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .btn {
            width: 100%;
            height: 48px;

            border: 0;

            border-radius: 13px;

            font-size: 13px;
            font-weight: 700;

            cursor: pointer;
        }


        .btn-primary {
            background: #2563eb;

            color: #ffffff;

            box-shadow:
                0 7px 18px rgba(37, 99, 235, 0.22);
        }


        .btn-primary:hover:not(:disabled) {
            background: #1d4ed8;
        }


        .btn:disabled {
            cursor: not-allowed;

            opacity: 0.52;

            box-shadow: none;
        }


        /* =====================================================
           RESEND
        ===================================================== */

        .resend-info {
            margin: 22px 0 10px;

            color: #94a3b8;

            font-size: 11px;

            line-height: 1.5;
        }


        .btn-resend {
            width: auto;

            min-width: 150px;
            height: 40px;

            padding: 0 18px;

            background: #e2e8f0;

            color: #94a3b8;

            box-shadow: none;
        }


        .btn-resend:not(:disabled) {
            background: #2563eb;

            color: #ffffff;

            box-shadow:
                0 5px 14px rgba(37, 99, 235, 0.18);
        }


        .btn-resend:hover:not(:disabled) {
            background: #1d4ed8;
        }


        /* =====================================================
           BACK LOGIN
        ===================================================== */

        .back-login {
            display: inline-flex;

            align-items: center;

            margin-top: 18px;

            color: #64748b;

            text-decoration: none;

            font-size: 12px;
            font-weight: 600;
        }


        .back-login:hover {
            color: #2563eb;
        }


        /* =====================================================
           SECURITY NOTE
        ===================================================== */

        .security-note {
            margin-top: 26px;

            padding: 11px 14px;

            border-radius: 12px;

            background: #f8fafc;

            color: #94a3b8;

            font-size: 10px;

            line-height: 1.5;
        }

    </style>

</head>


<body>


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <header class="site-header">

        <div class="header-inner">

            <a
                href="{{ route('login') }}"
                class="brand"
            >

                <img
                    src="{{ asset('image/bnn-logo.png') }}"
                    alt="Logo BNN"
                    class="brand-logo"
                >

                <span class="brand-name">
                    SITADIGI
                </span>

            </a>


            <a
                href="{{ route('login') }}"
                class="header-login"
            >
                Masuk
            </a>

        </div>

    </header>


    {{-- =====================================================
         MAIN
    ====================================================== --}}

    <main class="otp-main">


        <section class="otp-card">


            {{-- LOGO BNN --}}

            <div class="otp-logo-wrapper">

                <img
                    src="{{ asset('image/bnn-logo.png') }}"
                    alt="Logo BNN"
                    class="otp-logo"
                >

            </div>


            {{-- TITLE --}}

            <span class="otp-label">
                Autentikasi Petugas
            </span>


            <h1 class="otp-title">
                Verifikasi Keamanan
            </h1>


            <p class="otp-description">
                Masukkan kode OTP 6 digit untuk menyelesaikan
                proses autentikasi petugas.
            </p>


            {{-- SUCCESS --}}

            @if (session('success'))

                <div class="alert alert-success">

                    <span class="alert-icon">
                        ✓
                    </span>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            {{-- ERROR --}}

            @if (session('error'))

                <div class="alert alert-error">

                    <span class="alert-icon">
                        !
                    </span>

                    <span>
                        {{ session('error') }}
                    </span>

                </div>

            @endif


            {{-- VALIDATION ERROR --}}

            @if ($errors->any())

                <div class="alert alert-error">

                    <span class="alert-icon">
                        !
                    </span>

                    <span>
                        {{ $errors->first() }}
                    </span>

                </div>

            @endif


            {{-- =================================================
                 OTP FORM
            ================================================== --}}

            <form
                method="POST"
                action="{{ route('otp.verify.submit') }}"
                id="otpForm"
            >

                @csrf


                <div class="form-group">


                    <div class="form-label-row">

                        <label
                            for="otp"
                            class="form-label"
                        >
                            Kode OTP
                        </label>


                        <span class="digit-label">
                            6 digit
                        </span>

                    </div>


                    <input
                        type="text"
                        id="otp"
                        name="otp"
                        value="{{ old('otp') }}"
                        class="otp-input"
                        placeholder="0 0 0 0 0 0"
                        inputmode="numeric"
                        autocomplete="one-time-code"
                        maxlength="6"
                        pattern="[0-9]{6}"
                        required
                        autofocus
                    >

                </div>


                {{-- COUNTDOWN --}}

                <div class="countdown-wrapper">

                    <div class="countdown">

                        <span class="countdown-dot"></span>

                        <span>
                            Kode berlaku selama
                        </span>

                        <strong id="countdown">
                            05:00
                        </strong>

                    </div>

                </div>


                {{-- VERIFY BUTTON --}}

                <button
                    type="submit"
                    id="verifyButton"
                    class="btn btn-primary"
                >
                    Verifikasi &amp; Masuk
                </button>

            </form>


            {{-- =================================================
                 RESEND OTP
            ================================================== --}}

            <p
                class="resend-info"
                id="resendInfo"
            >
                Kirim ulang kode tersedia setelah OTP kedaluwarsa.
            </p>


            <form
                method="POST"
                action="{{ route('otp.resend') }}"
                id="resendForm"
            >

                @csrf

                <button
                    type="submit"
                    id="resendButton"
                    class="btn btn-resend"
                    disabled
                >
                    Kirim Ulang Kode
                </button>

            </form>


            {{-- BACK LOGIN --}}

            <a
                href="{{ route('login') }}"
                class="back-login"
            >
                ←&nbsp; Kembali ke Login
            </a>


            {{-- SECURITY NOTE --}}

            <div class="security-note">

                Demi keamanan, jangan bagikan kode OTP kepada siapa pun.

            </div>


        </section>


    </main>


    {{-- =====================================================
         JAVASCRIPT COUNTDOWN
    ====================================================== --}}

    <script>

        document.addEventListener(
            'DOMContentLoaded',
            function () {


                const countdownElement =
                    document.getElementById('countdown');


                const verifyButton =
                    document.getElementById('verifyButton');


                const resendButton =
                    document.getElementById('resendButton');


                const resendInfo =
                    document.getElementById('resendInfo');


                const otpInput =
                    document.getElementById('otp');


                const otpForm =
                    document.getElementById('otpForm');


                const resendForm =
                    document.getElementById('resendForm');


                /*
                 * Waktu expired berasal dari AuthController.
                 */

                const expiresAtString =
                    @json($otpExpiresAt->toIso8601String());


                const expiresAt =
                    new Date(expiresAtString).getTime();


                /*
                 * Pastikan timestamp valid.
                 */

                if (isNaN(expiresAt)) {

                    countdownElement.textContent =
                        'ERROR';

                    return;

                }


                /*
                 * Format MM:SS
                 */

                function formatTime(totalSeconds) {

                    const minutes =
                        Math.floor(totalSeconds / 60);


                    const seconds =
                        totalSeconds % 60;


                    return (
                        String(minutes).padStart(2, '0')
                        +
                        ':'
                        +
                        String(seconds).padStart(2, '0')
                    );

                }


                /*
                 * Kondisi expired.
                 */

                function setExpiredState() {


                    countdownElement.textContent =
                        '00:00';


                    countdownElement.classList.add(
                        'expired'
                    );


                    verifyButton.disabled =
                        true;


                    resendButton.disabled =
                        false;


                    resendInfo.textContent =
                        'Kode OTP telah kedaluwarsa. Silakan kirim ulang kode.';

                }


                /*
                 * Update countdown.
                 */

                function updateCountdown() {


                    const remaining =
                        Math.max(
                            0,
                            Math.floor(
                                (
                                    expiresAt -
                                    Date.now()
                                ) / 1000
                            )
                        );


                    countdownElement.textContent =
                        formatTime(remaining);


                    if (remaining <= 0) {

                        setExpiredState();

                        clearInterval(
                            countdownInterval
                        );

                    }

                }


                /*
                 * Jalankan langsung.
                 */

                updateCountdown();


                /*
                 * Update setiap 1 detik.
                 */

                const countdownInterval =
                    setInterval(
                        updateCountdown,
                        1000
                    );


                /*
                 * Hanya menerima angka.
                 */

                otpInput.addEventListener(
                    'input',
                    function () {

                        this.value =
                            this.value
                                .replace(/\D/g, '')
                                .slice(0, 6);

                    }
                );


                /*
                 * Cegah submit setelah expired.
                 */

                otpForm.addEventListener(
                    'submit',
                    function (event) {


                        if (
                            Date.now() >=
                            expiresAt
                        ) {

                            event.preventDefault();

                            setExpiredState();

                            alert(
                                'Kode OTP sudah kedaluwarsa. Silakan kirim ulang kode.'
                            );

                        }

                    }
                );


                /*
                 * Cegah double click
                 * pada tombol resend.
                 */

                resendForm.addEventListener(
                    'submit',
                    function () {

                        resendButton.disabled =
                            true;

                        resendButton.textContent =
                            'Mengirim...';

                    }
                );


            }
        );

    </script>


</body>

</html>