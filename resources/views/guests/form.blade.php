@extends('layout')

@section('title', 'Form Tamu')

@section('content')
<div class="relative min-h-[85vh] overflow-hidden rounded-3xl">

<img src="{{ asset('image/kantor-bnn.jpg') }}" alt="Gedung BNN" class="absolute inset-0 w-full h-full object-cover object-center">

<div class="absolute inset-0 bg-slate-900/45"></div>

<div class="relative z-10 max-w-7xl mx-auto px-6 py-12 min-h-[85vh] flex items-center">
<div class="grid lg:grid-cols-2 gap-12 items-center w-full">

<div class="text-white">

<span class="inline-flex rounded-full bg-blue-600 px-5 py-2 text-sm font-semibold"> ZONA INTEGRITAS </span> <h1 class="mt-6 font-display text-5xl lg:text-6xl leading-tight"> BNN <br> Provinsi Jawa Barat </h1> <p class="mt-6 max-w-xl text-lg text-slate-200 leading-relaxed"> Selamat datang, Anda Memasuki Kawasan Zona Integritas Menuju Wilayah Birokrasi Bebas Melayani dan Wilayah Bebas Korupsi.</p>
</div>

<div class="rounded-3xl bg-white/95 backdrop-blur-md p-8 shadow-2xl max-w-lg ml-auto">
            <h3 class="text-2xl font-semibold text-slate-900">Formulir Tamu</h3>
            <p class="mt-2 text-sm text-slate-600">Silakan isi data di bawah ini untuk mendaftar sebagai tamu.</p>

        @if ($errors->any())
            <div class="mt-6 rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3">
                <ul class="list-disc list-inside text-rose-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('guests.store') }}" class="mt-6 space-y-5"
            x-data="{ purposeType: '{{ old('purpose', '') }}', purposeLainnya: '{{ old('purpose_lainnya', '') }}' }"
            x-on:reset.prevent="
                Array.from($el.querySelectorAll('input, textarea, select')).forEach((el) => {
                    if (el.type === 'hidden') return;
                    if (el.type === 'checkbox' || el.type === 'radio') { el.checked = false; return; }
                    el.value = '';
                });
                purposeType = '';
                purposeLainnya = '';
            "
        >
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-2">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-slate-900 placeholder-slate-400 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                    placeholder="Masukkan nama lengkap" required>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-slate-900 placeholder-slate-400 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                    placeholder="Masukkan email Anda" required>
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">
                    Nomor Telepon <span class="text-red-500">*</span>
                </label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" inputmode="numeric" pattern="[0-9]*"
                    class="w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-slate-900 placeholder-slate-400 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                    placeholder="Masukkan nomor telepon (angka saja)" required
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-slate-700 mb-2">
                    Alamat <span class="text-red-500">*</span>
                </label>
                <textarea id="address" name="address" rows="3"
                    class="w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-slate-900 placeholder-slate-400 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                    placeholder="Masukkan alamat lengkap" required>{{ old('address') }}</textarea>
            </div>

            <div x-effect="if (purposeType !== 'lainnya') { purposeLainnya = '' }">
                <label for="purpose" class="block text-sm font-medium text-slate-700 mb-2">
                    Keperluan <span class="text-red-500">*</span>
                </label>
                <select id="purpose" name="purpose" x-model="purposeType"
                    class="w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-slate-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                    required>
                    <option value="">Pilih Keperluan</option>
                    <option value="rehabilitas">Rehabilitas</option>
                    <option value="skhpn">SKHPN</option>
                    <option value="bagian umum">Bagian Umum</option>
                    <option value="pemberantasan">Pemberantasan</option>
                    <option value="lainnya">Lainnya</option>
                </select>
                
                <!-- Conditional field for "lainnya" -->
                <div x-show="purposeType === 'lainnya'" x-cloak class="mt-4">
                    <label for="purpose_lainnya" class="block text-sm font-medium text-slate-700 mb-2">
                        Keperluan Lainnya <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="purpose_lainnya" name="purpose_lainnya" x-model="purposeLainnya"
                        class="w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-slate-900 placeholder-slate-400 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                        placeholder="Masukkan keperluan lainnya"
                        x-bind:required="purposeType === 'lainnya'">
                </div>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="flex-1 rounded-2xl bg-blue-600 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-600/25 transition hover:bg-blue-500">
                    Simpan
                </button>
                <button type="reset" class="flex-1 rounded-2xl border border-slate-200 bg-white/80 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:border-slate-300 hover:text-slate-900">
                    Ulang
                </button>
            </div>
        </form>

        @auth
            <div class="mt-4 text-center">
                <a href="{{ route('dashboard') }}" class="text-sm font-semibold text-slate-700 hover:text-slate-900">
                    ← Kembali ke Beranda
                </a>
            </div>
        @endauth
    </div>
</div>
</div>
@endsection
