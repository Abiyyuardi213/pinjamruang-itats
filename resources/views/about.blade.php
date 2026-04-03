@extends('layouts.app')

@section('content')
    <div class="bg-white min-h-screen">
        {{-- Hero Section --}}
        <section class="max-w-screen-2xl mx-auto px-6 md:px-10 pt-10 md:pt-16 pb-12 overflow-hidden">
            <div class="text-center max-w-4xl mx-auto flex flex-col items-center gap-6 relative z-10">
                <div
                    class="inline-flex w-fit items-center gap-2 rounded-full border border-slate-200 px-3 py-1 text-xs font-medium text-slate-500 mb-2">
                    <span class="h-2 w-2 rounded-full bg-orange-500 shadow-[0_0_8px_rgba(249,115,22,0.4)]"></span>
                    Profil Sistem • ITATS
                </div>
                <h1
                    class="text-balance text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight">
                    <span class="text-black">Mengenal</span> <br>
                    <span class="text-[#1a4fa0]">Sistem Peminjaman Ruangan</span>
                </h1>
                <p class="text-[1.1rem] text-slate-600 max-w-prose leading-relaxed">
                    Sistem Peminjaman Ruangan Akademik ITATS adalah inovasi digital yang dirancang untuk efisiensi pengelolaan fasilitas kampus. Kami berkomitmen untuk meningkatkan transparansi dan kemudahan akses bagi seluruh civitas akademika.
                </p>
                <div class="flex flex-wrap items-center justify-center gap-4 mt-2">
                    <a href="#visi-misi"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-xl text-sm font-bold ring-offset-background transition-all hover:scale-105 bg-[#1a4fa0] text-white hover:bg-[#1a4fa0]/90 h-12 px-8 py-2 shadow-lg shadow-[#1a4fa0]/25">
                        Visi & Misi
                    </a>
                    <a href="{{ route('login.guest') }}"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-xl text-sm font-semibold ring-offset-background transition-all hover:scale-105 hover:bg-slate-100 h-12 px-8 py-2 border-2 border-slate-200 text-slate-700 bg-white">
                        Masuk Portal
                    </a>
                </div>
                <div class="w-16 h-1 bg-[#1a4fa0] mt-4 rounded-full"></div>
            </div>
        </section>

        {{-- Overview Section --}}
        <section class="py-20 bg-slate-50 border-y border-slate-100">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div class="grid grid-cols-2 gap-4 text-center">
                        <div class="space-y-4 pt-10">
                            <img src="{{ asset('image/d12.jpg') }}" class="rounded-2xl shadow-lg w-full aspect-square object-cover">
                        </div>
                        <div class="space-y-4">
                             <img src="{{ asset('image/d1interior.jpg') }}" class="rounded-2xl shadow-lg w-full aspect-[3/4] object-cover">
                        </div>
                    </div>
                    <div class="space-y-6">
                        <h4 class="text-[#1a4fa0] font-bold tracking-widest uppercase text-sm">Sistem Terintegrasi</h4>
                        <h2 class="text-4xl font-extrabold text-slate-900 leading-tight tracking-tight">Efisiensi Pengelolaan <br> Fasilitas Kampus</h2>
                        <p class="text-slate-600 leading-relaxed text-lg">
                            Sistem ini dirancang untuk mempermudah proses peminjaman ruangan di lingkungan kampus ITATS. Pengguna dapat mengajukan permohonan peminjaman, memantau status secara real-time, serta menerima notifikasi persetujuan dengan transparan.
                        </p>
                        <p class="text-slate-600 leading-relaxed text-lg">
                            Dengan sistem ini, kami berkomitmen untuk meminimalisir konflik jadwal penggunaan ruangan di lingkungan akademik demi kelancaran kegiatan belajar mengajar.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Visi & Misi --}}
        <section id="visi-misi" class="py-24 max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h4 class="text-[#1a4fa0] font-bold tracking-widest uppercase text-sm mb-4">Aspirasi & Tujuan</h4>
                <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Visi & Misi Kami</h2>
                <div class="w-16 h-1 bg-[#1a4fa0] mx-auto mt-6"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                {{-- Visi --}}
                <div
                    class="relative group p-10 rounded-3xl border border-slate-200 bg-white hover:border-[#1a4fa0]/20 hover:shadow-2xl transition-all duration-500">
                    <div
                        class="w-14 h-14 rounded-2xl bg-blue-50 text-[#1a4fa0] flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                        <i class="fas fa-eye text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Visi</h3>
                    <p class="text-slate-600 leading-relaxed text-lg italic">
                        "Menjadi sistem informasi yang efektif, efisien, dan transparan dalam mendukung pengelolaan ruangan kampus yang unggul."
                    </p>
                </div>

                {{-- Misi --}}
                <div
                    class="relative group p-10 rounded-3xl border border-slate-200 bg-white hover:border-[#1a4fa0]/20 hover:shadow-2xl transition-all duration-500">
                    <div
                        class="w-14 h-14 rounded-2xl bg-indigo-50 text-[#1a4fa0] flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                        <i class="fas fa-bullseye text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Misi</h3>
                    <ul class="space-y-4 text-slate-600">
                        <li class="flex gap-4">
                            <span class="w-6 h-6 rounded-full bg-indigo-100 text-[#1a4fa0] text-xs flex-shrink-0 flex items-center justify-center font-bold mt-1">1</span>
                            <p class="text-lg">Menyediakan layanan digital yang memudahkan mahasiswa, dosen, dan staf dalam proses peminjaman ruangan.</p>
                        </li>
                        <li class="flex gap-4">
                            <span class="w-6 h-6 rounded-full bg-indigo-100 text-[#1a4fa0] text-xs flex-shrink-0 flex items-center justify-center font-bold mt-1">2</span>
                            <p class="text-lg">Mengoptimalkan penggunaan fasilitas kampus ITATS melalui sistem penjadwalan yang akurat dan terpadu.</p>
                        </li>
                        <li class="flex gap-4">
                            <span class="w-6 h-6 rounded-full bg-indigo-100 text-[#1a4fa0] text-xs flex-shrink-0 flex items-center justify-center font-bold mt-1">3</span>
                            <p class="text-lg">Meningkatkan akuntabilitas dan transparansi dalam setiap tahap birokrasi peminjaman ruangan.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        {{-- Tim Pengembang --}}
        <section class="bg-white py-24 border-t border-slate-100">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h4 class="text-[#1a4fa0] font-bold tracking-widest uppercase text-sm mb-4">Dibalik Layar</h4>
                    <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Tim Pengembang</h2>
                    <div class="w-16 h-1 bg-[#1a4fa0] mx-auto mt-6"></div>
                </div>

                <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto text-center">
                    {{-- Dev 1 --}}
                    <div class="p-8 rounded-3xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:shadow-xl transition-all duration-300">
                        <img src="{{ asset('image/default.png') }}" class="w-20 h-20 rounded-full mx-auto mb-6 bg-white border border-slate-200 object-cover p-1">
                        <h5 class="text-lg font-bold text-slate-900 mb-1">R. Abiyyu Ardi Lian P</h5>
                        <p class="text-sm font-medium text-[#1a4fa0] mb-3 uppercase tracking-wider">Backend & Frontend</p>
                        <p class="text-xs text-slate-400">Teknik Informatika ITATS 2023</p>
                    </div>
                    {{-- Dev 2 --}}
                    <div class="p-8 rounded-3xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:shadow-xl transition-all duration-300">
                        <img src="{{ asset('image/default.png') }}" class="w-20 h-20 rounded-full mx-auto mb-6 bg-white border border-slate-200 object-cover p-1">
                        <h5 class="text-lg font-bold text-slate-900 mb-1">Developer 2</h5>
                        <p class="text-sm font-medium text-[#1a4fa0] mb-3 uppercase tracking-wider">Frontend Scholar</p>
                        <p class="text-xs text-slate-400">Teknik Informatika ITATS</p>
                    </div>
                    {{-- Dev 3 --}}
                    <div class="p-8 rounded-3xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:shadow-xl transition-all duration-300">
                        <img src="{{ asset('image/default.png') }}" class="w-20 h-20 rounded-full mx-auto mb-6 bg-white border border-slate-200 object-cover p-1">
                        <h5 class="text-lg font-bold text-slate-900 mb-1">Developer 3</h5>
                        <p class="text-sm font-medium text-[#1a4fa0] mb-3 uppercase tracking-wider">UI/UX Designer</p>
                        <p class="text-xs text-slate-400">Teknik Informatika ITATS</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Contact CTA --}}
        <section class="py-20 bg-slate-900 text-white overflow-hidden relative">
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#1a4fa0]/20 blur-[100px] rounded-full -mr-48 -mt-48"></div>
            <div class="max-w-4xl mx-auto px-6 text-center space-y-8 relative z-10">
                <div class="w-20 h-20 bg-[#1a4fa0]/20 text-[#00c6ff] rounded-full flex items-center justify-center mx-auto mb-4 animate-bounce">
                    <i class="fas fa-comment-dots text-3xl"></i>
                </div>
                <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight">Ingin Tahu Lebih Banyak?</h2>
                <p class="text-slate-400 max-w-xl mx-auto text-lg leading-relaxed">
                    Kami selalu terbuka untuk pertanyaan, saran, atau kolaborasi terkait pengembangan fasilitas kampus.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-6 pt-4">
                    <a href="https://instagram.com/itats.official" target="_blank"
                        class="group px-8 py-4 rounded-xl bg-white text-slate-900 font-black hover:bg-slate-100 transition-all shadow-xl hover:-translate-y-1 flex items-center gap-3">
                        <i class="fab fa-instagram text-xl text-pink-500"></i>
                        Instagram ITATS
                    </a>
                    <a href="mailto:informatics@itats.ac.id"
                        class="px-8 py-4 rounded-xl bg-slate-800 text-white border-2 border-slate-700 font-black hover:bg-slate-700 transition-all shadow-sm hover:-translate-y-1 flex items-center gap-3">
                        <i class="fas fa-envelope text-xl text-blue-400"></i>
                        Email Support
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
