@extends('layouts.app')

@section('content')
    <div class="bg-white min-h-screen">
        {{-- Hero Section --}}
        <section class="max-w-screen-2xl mx-auto px-6 md:px-10 pt-10 md:pt-16 pb-12 overflow-hidden">
            <div class="text-center max-w-4xl mx-auto flex flex-col items-center gap-6 relative z-10">
                <div
                    class="inline-flex w-fit items-center gap-2 rounded-full border border-slate-200 px-3 py-1 text-xs font-medium text-slate-500 mb-2">
                    <span class="h-2 w-2 rounded-full bg-orange-500 shadow-[0_0_8px_rgba(249,115,22,0.4)]"></span>
                    Fasilitas Kampus • ITATS
                </div>
                <h1 class="text-balance text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight text-black">
                    Lingkungan Belajar <br>
                    <span class="text-[#1a4fa0]">Modern & Terintegrasi</span>
                </h1>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed">
                    Kami menyediakan berbagai infrastruktur pendukung mulai dari ruang kelas digital hingga laboratorium dengan spesifikasi tinggi untuk menunjang kreativitas dan prestasi akademik.
                </p>
                <div class="w-16 h-1 bg-[#1a4fa0] mt-4 rounded-full"></div>
            </div>
        </section>

        {{-- Fasilitas Grid --}}
        <section class="py-12 pb-24 max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $facilities = [
                        [
                            'title' => 'Ruang Kelas',
                            'category' => 'Akademik',
                            'icon' => 'fa-chalkboard-teacher',
                            'image' => 'kelas1.jpg',
                            'desc' => 'Dilengkapi dengan proyektor, AC, kursi ergonomis, dan papan tulis whiteboard.',
                            'features' => ['Full AC', 'LCD Projector', 'WiFi Access']
                        ],
                        [
                            'title' => 'Ruang Rapat',
                            'category' => 'Administrasi',
                            'icon' => 'fa-users',
                            'image' => 'd1interior2.jpg',
                            'desc' => 'Cocok untuk diskusi, seminar, atau pertemuan organisasi mahasiswa.',
                            'features' => ['Kapasitas 10-20 orang', 'Sound System', 'Meja Konferensi']
                        ],
                        [
                            'title' => 'Laboratorium Komputer',
                            'category' => 'Praktikum',
                            'icon' => 'fa-desktop',
                            'image' => 'labkomputer.jpg',
                            'desc' => 'Fasilitas komputer modern dengan spesifikasi tinggi dan akses internet cepat.',
                            'features' => ['High-End PC', 'Gigabit Network', 'Developer Tools']
                        ],
                        [
                            'title' => 'Perpustakaan',
                            'category' => 'Umum',
                            'icon' => 'fa-book-reader',
                            'image' => 'perpustakaan-1.jpg',
                            'desc' => 'Koleksi buku, jurnal, dan referensi digital yang lengkap dan nyaman.',
                            'features' => ['E-Library Access', 'Silent Zone', 'Reading Area']
                        ],
                        [
                            'title' => 'Aula Serbaguna',
                            'category' => 'Umum',
                            'icon' => 'fa-university',
                            'image' => 'joglo.jpg',
                            'desc' => 'Ruang luas untuk seminar, workshop, pameran, dan kegiatan skala besar.',
                            'features' => ['Spacious Area', 'Event Stage', 'Audio Visual']
                        ],
                        [
                            'title' => 'Kantin Kampus',
                            'category' => 'Fasilitas',
                            'icon' => 'fa-utensils',
                            'image' => 'fasilitas/kantin.jpg',
                            'desc' => 'Tempat istirahat dengan berbagai pilihan menu sehat dan harga terjangkau.',
                            'features' => ['Hygienic Food', 'Outdoor Seating', 'Student Friendly']
                        ],
                    ];
                @endphp

                @foreach($facilities as $f)
                <div class="group bg-white rounded-3xl border border-slate-100 overflow-hidden hover:shadow-2xl hover:border-blue-100 transition-all duration-500 flex flex-col">
                    <div class="aspect-video relative overflow-hidden">
                        <img src="{{ asset('image/' . $f['image']) }}" 
                             alt="{{ $f['title'] }}"
                             class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-slate-900 uppercase tracking-widest border border-white/20">
                                {{ $f['category'] }}
                            </span>
                        </div>
                    </div>
                    <div class="p-8 flex flex-col flex-1">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1a4fa0] flex items-center justify-center mb-6">
                            <i class="fas {{ $f['icon'] }} text-lg"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $f['title'] }}</h3>
                        <p class="text-sm text-slate-500 leading-relaxed mb-6">{{ $f['desc'] }}</p>
                        
                        <div class="mt-auto pt-6 border-t border-slate-50">
                            <ul class="flex flex-wrap gap-2">
                                @foreach($f['features'] as $feature)
                                <li class="text-[10px] font-bold text-slate-400 bg-slate-50 px-2 py-1 rounded-md">
                                    {{ $feature }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        {{-- CTA Section --}}
        <section class="py-20 bg-slate-50 text-center px-6 border-t border-slate-100">
            <h2 class="text-3xl font-extrabold text-slate-900 mb-6 tracking-tight">Butuh Ruangan untuk Kegiatan Anda?</h2>
            <p class="text-slate-500 max-w-xl mx-auto mb-10 leading-relaxed">
                Ajukan peminjaman ruangan sekarang melalui portal kami dengan proses yang cepat dan transparan.
            </p>
            <a href="{{ route('login.guest') }}" 
               class="inline-flex items-center gap-3 bg-[#1a4fa0] text-white px-10 py-4 rounded-2xl font-bold shadow-xl shadow-blue-900/20 hover:bg-blue-800 transition-all hover:-translate-y-1">
                <i class="fas fa-file-signature"></i>
                Ajukan Peminjaman
            </a>
        </section>
    </div>
@endsection
