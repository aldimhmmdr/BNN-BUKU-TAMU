<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITADIGI</title>
    <link rel="icon" type="image/png" href="{{ asset('image/bnn-logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        :root {
            --font-sans: "Space Grotesk", "Segoe UI", Arial, sans-serif;
            --font-display: "Fraunces", "Space Grotesk", "Times New Roman", serif;
        }
        body { font-family: var(--font-sans); }
        .font-display { font-family: var(--font-display); }
    </style>
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">

    <div class="flex min-h-screen flex-col">
        <nav class="sticky top-0 z-20 border-b border-white/60 bg-white/70 backdrop-blur">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="flex items-center gap-3">
                    <img src="{{ asset('image/bnn-logo.png') }}" alt="Logo" class="w-10 h-10 rounded-2xl bg-white p-1 shadow-md">
                    <div>
                        <h1 class="text-lg font-semibold text-slate-900">SITADIGI</h1>
                    </div>
                </a>
                <div class="flex items-center gap-3">
                    @guest
                        <a href="{{ route('login') }}" class="rounded-full bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-blue-600/25 transition hover:bg-blue-500">
                            Masuk
                        </a>
                    @endguest
                    @auth
                        <a href="{{ route('dashboard') }}" class="rounded-full border border-slate-200 bg-white/80 px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm transition hover:border-slate-300 hover:text-slate-900">
                            Beranda
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

        </nav>

        <div class="max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-10">
        @if ($message = Session::get('error'))
            <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-rose-700">
                {{ $message }}
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div id="success-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/40">
                <div class="w-full max-w-sm rounded-2xl bg-white p-6 shadow-xl">
                    <p class="text-sm font-semibold text-slate-900">Terima Kasih</p>
                    <p class="mt-2 text-sm text-slate-700">{{ $message }}</p>
                    <div class="mt-6 flex justify-end">
                        <button type="button" data-action="close" class="rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-500">Tutup</button>
                    </div>
                </div>
            </div>
            <script>
                window.addEventListener('load', () => {
                    const modal = document.getElementById('success-modal');
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

            @yield('content')
        </div>

    </div>
</body>
</html>
