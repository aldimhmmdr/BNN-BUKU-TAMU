<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') SITADIGI</title>
    <link rel="icon" type="image/png" href="{{ asset('image/bnn-logo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        :root {
            --font-sans: "Space Grotesk", "Segoe UI", Arial, sans-serif;
            --font-display: "Fraunces", "Space Grotesk", "Times New Roman", serif;
        }

        body {
            font-family: var(--font-sans);
        }

        .font-display {
            font-family: var(--font-display);
        }
    </style>
</head>

<body class="min-h-screen bg-slate-100 text-slate-900">

    <div class="relative flex min-h-screen">

        <!-- =========================================================
             SIDEBAR NAVIGATION
             ========================================================= -->
        <aside class="fixed inset-y-0 left-0 z-20 flex w-72 flex-col bg-gradient-to-b from-blue-700 via-blue-800 to-blue-900 text-white shadow-2xl">

            <div class="border-b border-white/10 p-8">
                <div class="flex items-center gap-4">
                    <img
                        src="{{ asset('image/bnn-logo.png') }}"
                        alt="Logo"
                        class="h-14 w-14 rounded-2xl bg-white p-2 shadow-lg"
                    >

                    <div>
                        <h1 class="text-2xl font-bold text-white">
                            SITADIGI
                        </h1>
                    </div>
                </div>
            </div>

            <nav class="px-6">
                <ul class="space-y-2 px-4">

                    <!-- Dashboard -->
                    <li>
                        <a
                            href="{{ route('dashboard') }}"
                            class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('dashboard') ? 'bg-white/15 text-white backdrop-blur shadow-lg' : 'text-blue-100 hover:bg-white/10 hover:text-white' }}"
                        >
                            <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/15 text-base">
                                <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M3 3v18h18" />
                                    <path d="M7 15v-6" />
                                    <path d="M12 15V9" />
                                    <path d="M17 15V6" />
                                </svg>
                            </span>
                            Beranda
                        </a>
                    </li>

                    <!-- Data Kunjungan -->
                    <li>
                        <a
                            href="{{ route('guests.index') }}"
                            class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('guests.index') ? 'bg-white/15 text-white backdrop-blur shadow-lg' : 'text-blue-100 hover:bg-white/10 hover:text-white' }}"
                        >
                            <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/15 text-base">
                                <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M9 6h6" />
                                    <path d="M9 10h6" />
                                    <path d="M9 14h6" />
                                    <path d="M7 4h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" />
                                </svg>
                            </span>
                            Data Kunjungan
                        </a>
                    </li>

                    <!-- Laporan Kunjungan -->
                    <li>
                        <a
                            href="{{ route('reports.index') }}"
                            class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('reports.index') ? 'bg-white/15 text-white backdrop-blur shadow-lg' : 'text-blue-100 hover:bg-white/10 hover:text-white' }}"
                        >
                            <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/15 text-base">
                                <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z" />
                                    <path d="M14 3v5h5" />
                                    <path d="M12 12v6" />
                                    <path d="M9 15l3 3 3-3" />
                                </svg>
                            </span>
                            Laporan Kunjungan
                        </a>
                    </li>

                </ul>
            </nav>

            <!-- User Info & Logout -->
            <div class="mt-auto border-t border-white/10 p-6">

                <div class="mb-4 flex items-center justify-between rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
                    <div>
                        <div class="text-sm font-semibold text-white">
                            {{ Auth::user()->name }}
                        </div>

                        <div class="text-xs text-blue-200">
                            Administrator
                        </div>
                    </div>

                    <svg class="h-5 w-5 text-blue-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 1118.88 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="flex w-full items-center justify-center gap-3 rounded-2xl bg-red-500 py-3 text-sm font-semibold text-white shadow-lg shadow-red-500/20 transition duration-200 hover:bg-red-600"
                    >
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H9"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 20H6a2 2 0 01-2-2V6a2 2 0 012-2h7"/>
                        </svg>
                        Keluar
                    </button>
                </form>

            </div>
        </aside>

        <!-- =========================================================
             MAIN CONTENT
             ========================================================= -->
        <main class="flex min-h-screen flex-1 flex-col overflow-y-auto pl-72">

            <!-- =====================================================
                 TOP HEADER
                 Notifikasi hanya ditampilkan di Dashboard.
                 ===================================================== -->
            <header class="sticky top-0 z-40 border-b border-white/60 bg-white/80 px-8 py-5 backdrop-blur">

                <div class="flex items-center justify-between gap-6">

                    <!-- Page Title -->
                    <h2 class="font-display text-2xl text-slate-900">
                        @yield('page_title')
                    </h2>

                    @if(request()->routeIs('dashboard'))

                        <!-- =================================================
                             NOTIFICATION
                             ================================================= -->
                        <div
                            id="notification-panel"
                            class="relative shrink-0"
                        >

                            <button
                                type="button"
                                id="notification-button"
                                class="relative flex items-center gap-3 rounded-2xl border border-slate-200 bg-white px-4 py-3 shadow-sm transition hover:border-blue-300 hover:bg-blue-50"
                                aria-expanded="false"
                                aria-controls="notification-dropdown"
                            >

                                <span class="relative flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-600">

                                    <svg
                                        class="h-6 w-6"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        aria-hidden="true"
                                    >
                                        <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9" />
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                                    </svg>

                                    @if(($unreadNotificationCount ?? 0) > 0)
                                        <span
                                            id="notification-badge"
                                            class="absolute -right-1 -top-1 flex min-h-[20px] min-w-[20px] items-center justify-center rounded-full bg-red-500 px-1.5 text-[11px] font-bold text-white shadow-sm"
                                        >
                                            {{ $unreadNotificationCount }}
                                        </span>
                                    @else
                                        <span
                                            id="notification-badge"
                                            class="absolute -right-1 -top-1 hidden min-h-[20px] min-w-[20px] items-center justify-center rounded-full bg-red-500 px-1.5 text-[11px] font-bold text-white shadow-sm"
                                        >
                                            0
                                        </span>
                                    @endif

                                </span>

                                <span class="hidden text-left sm:block">
                                    <span class="block text-sm font-semibold text-slate-900">
                                        Notifikasi
                                    </span>

                                    <span id="notification-summary" class="block text-xs text-slate-500">
                                        @if(($unreadNotificationCount ?? 0) > 0)
                                            {{ $unreadNotificationCount }} notifikasi belum dibaca
                                        @else
                                            Tidak ada notifikasi baru
                                        @endif
                                    </span>
                                </span>

                            </button>

                            <!-- Notification Dropdown -->
                            <div
                                id="notification-dropdown"
                                class="absolute right-0 top-full z-50 mt-3 hidden w-[min(420px,calc(100vw-2rem))] overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl shadow-slate-900/15"
                            >

                                <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">
                                    <div>
                                        <h3 class="text-sm font-semibold text-slate-900">
                                            Notifikasi Tamu
                                        </h3>

                                        <p class="mt-1 text-xs text-slate-500">
                                            Informasi registrasi kunjungan terbaru
                                        </p>
                                    </div>

                                    <span
                                        id="notification-count-label"
                                        class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700"
                                    >
                                        {{ $unreadNotificationCount ?? 0 }} baru
                                    </span>
                                </div>

                                <div
                                    id="notification-list"
                                    class="max-h-[380px] overflow-y-auto"
                                >

                                    @forelse($notifications ?? [] as $notification)

                                        <a
                                            href="{{ route('notifications.open', $notification) }}"
                                            class="notification-item block border-b border-slate-100 px-5 py-4 transition hover:bg-slate-50"
                                        >
                                            <div class="flex gap-3">

                                                <div
                                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl {{ (int) $notification->is_read === 0 ? 'bg-blue-50 text-blue-600' : 'bg-slate-100 text-slate-400' }}"
                                                >
                                                    <svg
                                                        class="h-5 w-5"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="1.8"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        aria-hidden="true"
                                                    >
                                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                                        <circle cx="9" cy="7" r="4" />
                                                        <path d="M19 8v6" />
                                                        <path d="M22 11h-6" />
                                                    </svg>
                                                </div>

                                                <div class="min-w-0 flex-1">

                                                    <div class="flex items-start justify-between gap-3">

                                                        <p class="text-sm font-semibold {{ (int) $notification->is_read === 0 ? 'text-slate-900' : 'text-slate-600' }}">
                                                            {{ $notification->title }}
                                                        </p>

                                                        @if((int) $notification->is_read === 0)
                                                            <span class="shrink-0 rounded-full bg-blue-50 px-2 py-1 text-[10px] font-semibold text-blue-700">
                                                                BARU
                                                            </span>
                                                        @else
                                                            <span class="shrink-0 rounded-full bg-slate-100 px-2 py-1 text-[10px] font-semibold text-slate-500">
                                                                DIBACA
                                                            </span>
                                                        @endif

                                                    </div>

                                                    <p class="mt-1 text-sm leading-relaxed text-slate-600">
                                                        {{ $notification->message }}
                                                    </p>

                                                    <p class="mt-2 text-xs text-slate-400">
                                                        {{ $notification->created_at?->diffForHumans() }}
                                                    </p>

                                                </div>
                                            </div>
                                        </a>

                                    @empty

                                        <div id="notification-empty" class="px-6 py-10 text-center">

                                            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                                <svg
                                                    class="h-6 w-6"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="1.7"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    aria-hidden="true"
                                                >
                                                    <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9" />
                                                    <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                                                </svg>
                                            </div>

                                            <p class="mt-3 text-sm font-medium text-slate-700">
                                                Belum ada riwayat notifikasi
                                            </p>

                                            <p class="mt-1 text-xs text-slate-400">
                                                Notifikasi registrasi tamu akan muncul di sini.
                                            </p>

                                        </div>

                                    @endforelse

                                </div>
                            </div>

                        </div>

                    @endif

                </div>
            </header>

            <!-- =====================================================
                 CONTENT AREA
                 ===================================================== -->
            <div class="flex-1 space-y-6 p-8">

                <!-- Flash Messages -->
                @if ($message = Session::get('status_popup'))

                    <div
                        id="status-popup-modal"
                        class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/40"
                    >
                        <div class="w-full max-w-sm rounded-2xl bg-white p-6 shadow-xl">

                            <p class="text-sm font-semibold text-slate-900">
                                Status Berhasil
                            </p>

                            <p class="mt-2 text-sm text-slate-700">
                                {{ $message }}
                            </p>

                            <div class="mt-6 flex justify-end">
                                <button
                                    type="button"
                                    data-action="close"
                                    class="rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-500"
                                >
                                    Tutup
                                </button>
                            </div>

                        </div>
                    </div>

                    <script>
                        window.addEventListener('load', () => {
                            const modal = document.getElementById('status-popup-modal');
                            const closeButton = modal.querySelector('[data-action="close"]');

                            modal.classList.remove('hidden');
                            modal.classList.add('flex');

                            const closeModal = () => {
                                modal.classList.add('hidden');
                                modal.classList.remove('flex');
                            };

                            closeButton.addEventListener('click', closeModal);

                            modal.addEventListener('click', (event) => {
                                if (event.target === modal) {
                                    closeModal();
                                }
                            });
                        });
                    </script>

                @endif

                @if ($message = Session::get('error'))

                    <div class="flex items-center justify-between rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-rose-700">
                        <span>❌ {{ $message }}</span>

                        <button
                            onclick="this.parentElement.style.display='none'"
                            class="text-rose-600 hover:text-rose-800"
                        >
                            ×
                        </button>
                    </div>

                @endif

                <!-- Validation Errors -->
                @if ($errors->any())

                    <div class="rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3">
                        <ul class="list-inside list-disc text-rose-600">

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>
                    </div>

                @endif

                @yield('content')

            </div>
        </main>
    </div>

</body>
</html>