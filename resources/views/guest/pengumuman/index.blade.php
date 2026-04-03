@extends('layouts.app')

@section('content')
    <div class="bg-white min-h-screen">
        {{-- Hero Section --}}
        <section class="max-w-screen-2xl mx-auto px-6 md:px-10 pt-10 md:pt-16 pb-12 overflow-hidden">
            <div class="text-center max-w-4xl mx-auto flex flex-col items-center gap-6 relative z-10">
                <div
                    class="inline-flex w-fit items-center gap-2 rounded-full border border-slate-200 px-3 py-1 text-xs font-medium text-slate-500 mb-2">
                    <span class="h-2 w-2 rounded-full bg-orange-500 shadow-[0_0_8px_rgba(249,115,22,0.4)]"></span>
                    Update Terkini • ITATS
                </div>
                <h1 class="text-balance text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight text-black">
                    Pusat Informasi <br>
                    <span class="text-[#1a4fa0]">& Pengumuman</span>
                </h1>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed">
                    Dapatkan kabar terbaru seputar kebijakan peminjaman ruangan, status fasilitas, dan jadwal kegiatan penting di lingkungan kampus ITATS.
                </p>
                <div class="w-16 h-1 bg-[#1a4fa0] mt-4 rounded-full"></div>
            </div>
        </section>

        {{-- Announcements Grid --}}
        <section class="py-12 pb-24 max-w-7xl mx-auto px-6">
            @if ($pengumumans->isEmpty())
                <div class="text-center py-20 bg-slate-50 rounded-[2.5rem] border border-slate-100">
                    <div class="w-20 h-20 bg-white shadow-sm border border-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-bullhorn text-3xl text-slate-300"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">Belum Ada Pengumuman</h3>
                    <p class="text-slate-500 mt-2">Silakan periksa kembali nanti untuk informasi terbaru.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($pengumumans as $item)
                        <article class="group bg-white rounded-3xl border border-slate-100 p-8 hover:shadow-2xl hover:border-blue-100 transition-all duration-500 flex flex-col h-full relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-blue-50/50 rounded-full -mr-12 -mt-12 transition-transform group-hover:scale-150 duration-700"></div>
                            
                            <div class="relative z-10 flex flex-col h-full">
                                <div class="flex items-center gap-3 mb-6">
                                    <span class="px-3 py-1 bg-blue-50 text-[#1a4fa0] text-[10px] font-bold uppercase tracking-widest rounded-lg">
                                        Informasi
                                    </span>
                                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                        {{ \Carbon\Carbon::parse($item->tanggal_dibuat)->locale('id')->diffForHumans() }}
                                    </span>
                                </div>

                                <h3 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-[#1a4fa0] transition-colors line-clamp-2 leading-tight">
                                    <a href="{{ route('pengumuman.show', $item->id) }}">
                                        {{ $item->judul }}
                                    </a>
                                </h3>

                                <div class="text-sm text-slate-500 leading-relaxed line-clamp-3 mb-8">
                                    {{ Str::limit(strip_tags($item->isi), 120) }}
                                </div>

                                <div class="mt-auto pt-6 border-t border-slate-50 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-[10px] font-black text-slate-500 uppercase">
                                            {{ substr($item->author->name ?? 'A', 0, 1) }}
                                        </div>
                                        <div class="text-left">
                                            <p class="text-[10px] font-bold text-slate-900 leading-none mb-1">{{ $item->author->name ?? 'Admin' }}</p>
                                            <p class="text-[9px] font-medium text-slate-400 uppercase tracking-tighter">Official Author</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('pengumuman.show', $item->id) }}" class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 flex items-center justify-center group-hover:bg-[#1a4fa0] group-hover:text-white transition-all duration-300">
                                        <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
@endsection
