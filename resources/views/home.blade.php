@extends('layouts.app')

@section('content')
    {{-- Hero Bento --}}
    <section class="max-w-screen-2xl mx-auto px-6 md:px-10 pt-10 md:pt-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            {{-- Left: Headline + CTA --}}
            <div class="flex flex-col justify-center gap-6">
                <div
                    class="inline-flex w-fit items-center gap-2 rounded-full border border-slate-200 px-3 py-1 text-xs font-medium text-slate-500 mb-4">
                    <span class="h-2 w-2 rounded-full bg-orange-500 shadow-[0_0_8px_rgba(249,115,22,0.4)]"></span>
                    Pinjam Ruang • Terintegrasi • Efisien
                </div>
                <h1 class="text-balance text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight">
                    <span class="text-black">Sistem Peminjaman</span> <br>
                    <span class="text-[#1a4fa0]">Ruangan ITATS</span>
                </h1>
                <p class="text-lg text-slate-600 max-w-prose leading-relaxed">
                    Platform terintegrasi untuk pengajuan, jadwal, dan pengelolaan fasilitas ruangan di lingkungan
                    Teknik Informatika ITATS dengan proses yang transparan dan efisien.
                </p>
                <div class="flex flex-wrap items-center gap-4 mt-2">
                    <a href="{{ route('login.guest') }}"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-xl text-sm font-bold ring-offset-background transition-all hover:scale-105 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-[#1a4fa0] text-white hover:bg-[#1a4fa0]/90 h-12 px-8 py-2 shadow-lg shadow-[#1a4fa0]/25">
                        <i class="fas fa-sign-in-alt mr-2"></i> Masuk Portal
                    </a>
                    <a href="#layanan"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-xl text-sm font-semibold ring-offset-background transition-all hover:scale-105 hover:bg-slate-100 h-12 px-8 py-2 border-2 border-slate-200 text-slate-700 bg-white">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>

            {{-- Right: Bento Grid Stats & Highlights --}}
            <div class="grid grid-cols-2 gap-4">
                {{-- Stats Card --}}
                <div
                    class="col-span-2 rounded-2xl border border-slate-200 p-6 bg-gradient-to-br from-white to-slate-50 shadow-sm relative overflow-hidden group">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-blue-600/5 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-110">
                    </div>
                    <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-6">Statistik Peminjaman</h3>
                    <div class="grid grid-cols-3 gap-4 relative z-10">
                        <div class="text-center">
                            <div class="text-3xl font-black text-slate-900">50+</div>
                            <div class="text-[10px] font-bold text-slate-500 uppercase mt-1">Ruangan</div>
                        </div>
                        <div class="text-center border-x border-slate-200">
                            <div class="text-3xl font-black text-slate-900">10+</div>
                            <div class="text-[10px] font-bold text-slate-500 uppercase mt-1">Gedung</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-black text-slate-900">1.2k+</div>
                            <div class="text-[10px] font-bold text-slate-500 uppercase mt-1">Transaksi</div>
                        </div>
                    </div>
                </div>

                {{-- Activity Card --}}
                <div
                    class="rounded-2xl border border-slate-200 p-6 bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-10 h-10 rounded-lg bg-amber-100 flex items-center justify-center mb-4">
                        <i class="fas fa-calendar-alt text-amber-600"></i>
                    </div>
                    <h3 class="font-bold text-slate-900">Jadwal Sesi</h3>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed italic">
                        "Pantau ketersediaan ruangan secara real-time di portal."
                    </p>
                </div>

                {{-- Info Card --}}
                <div
                    class="rounded-2xl border border-slate-200 p-6 bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center mb-4">
                        <i class="fas fa-info-circle text-blue-600"></i>
                    </div>
                    <h3 class="font-bold text-slate-900">Info Terbaru</h3>
                    <p class="text-xs text-slate-600 mt-2 italic">
                        Periksa pengumuman untuk info ketersediaan dan pemeliharaan fasilitas.
                    </p>
                </div>
            </div>
        </div>

        {{-- Hero Visual Image --}}
        <div class="mt-12 rounded-3xl overflow-hidden border-8 border-white shadow-2xl relative group">
            <div
                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent z-10 opacity-60 group-hover:opacity-40 transition-opacity">
            </div>
            <img src="{{ asset('image/d1.jpg') }}" alt="Visual Kampus ITATS"
                class="w-full h-[300px] md:h-[450px] object-cover transition-transform duration-700 group-hover:scale-105">
            <div class="absolute bottom-10 left-10 z-20">
                <h4 class="text-white text-2xl font-bold">Kampus ITATS</h4>
                <p class="text-white/80 text-sm">Fasilitas Modern untuk Menunjang Akademik Mahasiswa.</p>
            </div>
        </div>
    </section>

    {{-- Services/Quick Access --}}
    <section id="layanan" class="max-w-screen-2xl mx-auto px-6 md:px-10 mt-20 mb-20">
        <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4 text-center md:text-left">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900">Akses Cepat</h2>
                <p class="text-slate-500 mt-2">Layanan utama Sistem Peminjaman Ruangan.</p>
            </div>
            <a href="{{ route('login.guest') }}" class="text-blue-600 font-bold hover:underline flex items-center gap-2">
                Masuk ke Dashboard <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $services = [
                    [
                        'icon' => 'fa-door-open',
                        'color' => 'bg-indigo-500',
                        'title' => 'Daftar Ruangan',
                        'desc' => 'Daftar detail seluruh ruangan yang tersedia untuk dipinjam.',
                        'link' => route('fasilitas'),
                    ],
                    [
                        'icon' => 'fa-file-signature',
                        'color' => 'bg-emerald-500',
                        'title' => 'Form Peminjaman',
                        'desc' => 'Ajukan permohonan peminjaman ruangan dengan mudah.',
                        'link' => route('login.guest'),
                    ],
                    [
                        'icon' => 'fa-info-circle',
                        'color' => 'bg-amber-500',
                        'title' => 'Tentang Kami',
                        'desc' => 'Pelajari lebih lanjut tentang sistem dan pengelola.',
                        'link' => route('about'),
                    ],
                    [
                        'icon' => 'fa-bullhorn',
                        'color' => 'bg-rose-500',
                        'title' => 'Pengumuman',
                        'desc' => 'Informasi rilis jadwal dan ketersediaan ruangan.',
                        'link' => route('pengumuman.index'),
                    ],
                ];
            @endphp

            @foreach ($services as $s)
                <a href="{{ $s['link'] }}"
                    class="group relative rounded-2xl border border-slate-100 p-8 bg-white shadow-sm hover:shadow-xl hover:border-blue-500/20 transition-all duration-300">
                    <div
                        class="w-12 h-12 rounded-xl {{ $s['color'] }} text-white flex items-center justify-center mb-6 shadow-lg shadow-inherit/20 group-hover:scale-110 transition-transform">
                        <i class="fas {{ $s['icon'] }} text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">{{ $s['title'] }}</h3>
                    <p class="text-sm text-slate-500 mt-3 leading-relaxed">{{ $s['desc'] }}</p>
                    <div class="w-12 h-1 bg-slate-100 mt-6 group-hover:w-full group-hover:bg-blue-600 transition-all"></div>
                </a>
            @endforeach
        </div>
    </section>

    {{-- About Section --}}
    <section id="tentang" class="bg-slate-50 py-20 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="order-2 lg:order-1">
                <div class="grid grid-cols-2 gap-4">
                    {{-- Left Column --}}
                    <div class="space-y-4 pt-10">
                        <div class="aspect-square rounded-2xl overflow-hidden shadow-md border border-slate-200">
                            <img src="{{ asset('image/d1.jpg') }}" class="w-full h-full object-cover">
                        </div>
                        <div class="aspect-[3/4] rounded-2xl overflow-hidden shadow-md border border-slate-200">
                            <img src="{{ asset('image/d1interior.jpg') }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                    {{-- Right Column --}}
                    <div class="space-y-4">
                        <div class="aspect-[3/4] rounded-2xl overflow-hidden shadow-md border border-slate-200">
                            <img src="{{ asset('image/graha-itats.jpeg') }}" class="w-full h-full object-cover">
                        </div>
                        <div class="aspect-square rounded-2xl overflow-hidden shadow-md border border-slate-200">
                            <img src="{{ asset('image/gedungA.jpg') }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <h4 class="text-blue-600 font-bold tracking-widest uppercase text-sm mb-4">Tentang Sistem</h4>
                <h2 class="text-4xl font-extrabold text-slate-900 mb-6 leading-tight">Mendukung Mobilitas <br> Akademik ITATS</h2>
                <div class="space-y-4 text-slate-600 leading-relaxed">
                    <p>Sistem Peminjaman Ruangan ITATS didedikasikan untuk mempermudah civitas akademika dalam mengelola dan memesan ruang publik kampus secara digital.</p>
                    <p>Kami memfokuskan pada transparansi jadwal dan efisiensi birokrasi perijinan demi membangun lingkungan belajar yang lebih dinamis.</p>
                </div>
                <div class="mt-10 grid grid-cols-2 gap-8 border-t border-slate-200 pt-10">
                    <div>
                        <div class="text-blue-600 font-bold text-xl">Visi</div>
                        <p class="text-sm text-slate-500 mt-2">Menjadi sistem manajemen fasilitas kampus yang terdepan melalui integrasi teknologi informasi.</p>
                    </div>
                    <div>
                        <div class="text-blue-600 font-bold text-xl">Misi</div>
                        <p class="text-sm text-slate-500 mt-2">Memberikan kemudahan akses dan akurasi data dalam setiap proses peminjaman fasilitas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
