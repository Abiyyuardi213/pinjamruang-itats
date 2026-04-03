@extends('layouts.app')

@section('content')
    <div class="bg-white min-h-screen">
        <section class="max-w-4xl mx-auto px-6 pt-10 md:pt-16 pb-24">
            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-2 text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-12">
                <a href="{{ url('home') }}" class="hover:text-[#1a4fa0] transition-colors">Beranda</a>
                <i class="fas fa-chevron-right text-[8px] opacity-20"></i>
                <a href="{{ route('pengumuman.index') }}" class="hover:text-[#1a4fa0] transition-colors">Pengumuman</a>
                <i class="fas fa-chevron-right text-[8px] opacity-20"></i>
                <span class="text-slate-900 truncate max-w-[150px] md:max-w-xs">{{ $pengumuman->judul }}</span>
            </nav>

            <article class="relative">
                {{-- Article Header --}}
                <header class="mb-12">
                    <div class="inline-flex items-center gap-2 rounded-full border border-slate-200 px-3 py-1 text-xs font-semibold text-blue-600 mb-6">
                        <span class="h-2 w-2 rounded-full bg-blue-500"></span>
                        Informasi Resmi
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight leading-[1.1] mb-8">
                        {{ $pengumuman->judul }}
                    </h1>
                    
                    <div class="flex flex-wrap items-center gap-6 py-6 border-y border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center text-white text-xs font-black">
                                {{ substr($pengumuman->author->name ?? 'A', 0, 1) }}
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-900 leading-none mb-1">{{ $pengumuman->author->name ?? 'Admin' }}</p>
                                <p class="text-[10px] font-medium text-slate-500">Administrator Sistem</p>
                            </div>
                        </div>
                        <div class="hidden sm:block w-px h-8 bg-slate-100"></div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400">
                                <i class="far fa-calendar-alt text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-900 leading-none mb-1">{{ \Carbon\Carbon::parse($pengumuman->tanggal_dibuat)->locale('id')->isoFormat('D MMMM Y') }}</p>
                                <p class="text-[10px] font-medium text-slate-500">Tanggal Publikasi</p>
                            </div>
                        </div>
                    </div>
                </header>

                {{-- Image Visual if any (Placeholder as we don't have images for announcements yet) --}}
                <div class="rounded-3xl overflow-hidden bg-slate-50 border border-slate-100 mb-12 flex items-center justify-center py-20 grayscale opacity-50">
                     <i class="fas fa-bullhorn text-6xl text-slate-200"></i>
                </div>

                {{-- Article Content --}}
                <div class="prose prose-slate max-w-none prose-h2:text-2xl prose-h2:font-extrabold prose-h3:text-xl prose-h2:tracking-tight prose-a:text-[#1a4fa0] prose-a:no-underline hover:prose-a:underline trix-content text-slate-700 leading-[1.8] text-lg">
                    {!! $pengumuman->isi !!}
                </div>

                {{-- Article Footer --}}
                <footer class="mt-20 pt-10 border-t border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-6">
                    <a href="{{ route('pengumuman.index') }}" class="group flex items-center gap-3 text-sm font-bold text-slate-500 hover:text-slate-900 transition-all">
                        <span class="w-8 h-8 rounded-full border border-slate-200 flex items-center justify-center group-hover:bg-slate-100 transition-all">
                            <i class="fas fa-arrow-left text-[10px]"></i>
                        </span>
                        Kembali ke Daftar
                    </a>
                    <div class="flex items-center gap-4">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Bagikan:</span>
                        <div class="flex gap-2">
                             <button class="w-8 h-8 rounded-lg bg-slate-50 text-slate-400 hover:bg-[#1a4fa0] hover:text-white transition-all"><i class="fab fa-whatsapp text-xs"></i></button>
                             <button class="w-8 h-8 rounded-lg bg-slate-50 text-slate-400 hover:bg-[#1a4fa0] hover:text-white transition-all"><i class="fab fa-facebook-f text-xs"></i></button>
                        </div>
                    </div>
                </footer>
            </article>
        </section>
    </div>

    <style>
        .trix-content h2 { margin-top: 2rem !important; margin-bottom: 1rem !important; }
        .trix-content p { margin-bottom: 1.5rem !important; }
        .trix-content ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1.5rem; }
        .trix-content blockquote { border-left: 4px solid #1a4fa0; padding: 1.5rem; background: #f8fafc; border-radius: 0 1rem 1rem 0; font-style: italic; color: #475569; }
    </style>
@endsection
