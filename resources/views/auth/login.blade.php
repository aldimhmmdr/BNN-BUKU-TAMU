@extends('layout')

@section('content')

<div class="relative min-h-[85vh] overflow-hidden rounded-3xl">

    <!-- Background Gedung -->
    <img
        src="{{ asset('image/kantor-bnn.jpg') }}"
        alt="Gedung BNN"
        class="absolute inset-0 w-full h-full object-cover object-center"
    >

    <!-- Overlay -->
    <div class="absolute inset-0 bg-slate-900/55"></div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 py-12 min-h-[85vh] flex items-center">

        <div class="grid lg:grid-cols-2 gap-12 items-center w-full">

            <!-- HERO KIRI -->
            <div class="text-white">

                <div class="flex items-center gap-4 mb-8"></div>

                <span class="inline-flex rounded-full bg-blue-600 px-5 py-2 text-sm font-semibold">
                    LOGIN PETUGAS
                </span>

                <h1 class="mt-6 font-display text-5xl lg:text-6xl leading-tight">
                    BNN Provinsi
                    <br>
                    Jawa Barat
                </h1>

                <p class="mt-6 max-w-xl text-lg text-slate-200 leading-relaxed">
                    Akses sistem administrasi tamu digital untuk memantau
                    kunjungan, memperbarui status tamu, dan menghasilkan
                    laporan secara real-time.
                </p>

                <div class="mt-10 space-y-4 max-w-lg">

                    <div class="rounded-2xl bg-white/10 backdrop-blur-md px-5 py-4 border border-white/10">
                        ✓ Monitoring kunjungan real-time
                    </div>

                    <div class="rounded-2xl bg-white/10 backdrop-blur-md px-5 py-4 border border-white/10">
                        ✓ Status tamu terintegrasi
                    </div>

                    <div class="rounded-2xl bg-white/10 backdrop-blur-md px-5 py-4 border border-white/10">
                        ✓ Laporan otomatis PDF
                    </div>

                </div>

            </div>

            <!-- LOGIN CARD -->
            <div class="rounded-3xl bg-white/95 backdrop-blur-md p-10 shadow-2xl border border-white/40">

                <h3 class="text-3xl font-bold text-slate-900">
                    Masuk ke Akun Petugas
                </h3>

                <p class="mt-2 text-sm text-slate-600">
                    Gunakan email resmi dan kata sandi yang terdaftar.
                </p>

                @if ($errors->any())
                    <div class="mt-6 rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3">
                        <ul class="list-disc list-inside text-rose-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" class="mt-8 space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 placeholder-slate-400 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                            placeholder="Masukkan email"
                            required
                        >
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700 mb-2">
                            Password <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 placeholder-slate-400 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                            placeholder="Masukkan password"
                            required
                        >
                    </div>

                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="remember"
                            name="remember"
                            class="rounded border-slate-300 text-blue-600"
                        >

                        <label for="remember" class="ml-2 text-sm text-slate-600">
                            Ingat saya
                        </label>
                    </div>

                    <button
                        type="submit"
                        class="w-full rounded-2xl bg-blue-600 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-600/25 transition hover:bg-blue-500"
                    >
                        Masuk
                    </button>

                </form>

                <div class="mt-6 text-center">
                    <a
                        href="{{ route('guests.form') }}"
                        class="text-sm font-semibold text-slate-600 hover:text-slate-900"
                    >
                        ← Kembali sebagai Tamu
                    </a>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection
