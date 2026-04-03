<aside
    class="w-64 bg-white border-r border-zinc-200 hidden md:flex flex-col h-full shrink-0 transition-all duration-300 relative z-20">
    <!-- Logo -->
    <div class="h-16 flex items-center gap-2 px-6 border-b border-zinc-200">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
            <img src="{{ asset('image/itats-biru.png') }}" alt="Logo ITATS"
                class="h-7 w-auto object-contain grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition-all">
            <span class="font-bold text-lg text-zinc-900 tracking-tight">Pinjam<span
                    class="text-zinc-400">Ruang</span></span>
        </a>
    </div>

    <!-- User Info -->
    <div class="p-4 border-b border-zinc-100 bg-zinc-50/50">
        <div class="flex items-center gap-3">
            @php
                $currentUser = Auth::guard('admin')->check()
                    ? Auth::guard('admin')->user()
                    : Auth::guard('users')->user();
            @endphp
            <div class="relative">
                <img src="{{ asset('uploads/profile/' . ($currentUser->profile_picture ?? 'default.png')) }}"
                    class="w-9 h-9 rounded-full object-cover border border-zinc-200 shadow-sm" alt="User Image">
            </div>
            <div class="overflow-hidden">
                <h6 class="text-sm font-semibold text-zinc-900 truncate">{{ $currentUser->username }}</h6>
                <p class="text-xs text-zinc-500 font-medium truncate">
                    {{ $currentUser->role->role_name ?? 'Administrator' }}</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1 custom-scrollbar">
        <!-- Dashboard -->
        @if ($currentUser->role->hasPermission('dashboard'))
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                <i class="fas fa-home w-4 text-center"></i>
                <span>Dashboard</span>
            </a>
        @endif

        <!-- SISTEM UTAMA -->
        @if ($currentUser->role->hasPermission('role-management') || $currentUser->role->hasPermission('user-management'))
            <div class="pt-6 pb-2 px-3">
                <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wider">Sistem Utama</p>
            </div>

            @if ($currentUser->role->hasPermission('role-management'))
                <a href="{{ route('admin.role.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.role.*') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                    <i class="fas fa-user-shield w-4 text-center"></i>
                    <span>Manajemen Peran</span>
                </a>
            @endif

            @if ($currentUser->role->hasPermission('user-management'))
                <a href="{{ route('admin.user.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.user.*') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                    <i class="fas fa-users w-4 text-center"></i>
                    <span>Manajemen Pengguna</span>
                </a>
            @endif
        @endif

        <!-- DATA AKADEMIK -->
        @if (
            $currentUser->role->hasPermission('prodi-management') ||
                $currentUser->role->hasPermission('kaprodi-data') ||
                $currentUser->role->hasPermission('periode-cuti'))
            <div class="pt-6 pb-2 px-3">
                <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wider">Data Akademik</p>
            </div>

            @if ($currentUser->role->hasPermission('prodi-management'))
                <a href="{{ route('admin.prodi.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.prodi.*') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                    <i class="fas fa-university w-4 text-center"></i>
                    <span>Manajemen Prodi</span>
                </a>
            @endif

            @if ($currentUser->role->hasPermission('kaprodi-data'))
                <a href="{{ route('admin.kaprodi.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.kaprodi.*') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                    <i class="fas fa-user-tie w-4 text-center"></i>
                    <span>Data Kaprodi</span>
                </a>
            @endif

            @if ($currentUser->role->hasPermission('periode-cuti'))
                <a href="{{ route('admin.periode.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.periode.*') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                    <i class="fas fa-calendar-alt w-4 text-center"></i>
                    <span>Periode Cuti</span>
                </a>
            @endif
        @endif

        <!-- SARANA & PRASARANA -->
        @if (
            $currentUser->role->hasPermission('gedung-management') ||
                $currentUser->role->hasPermission('kelas-management') ||
                $currentUser->role->hasPermission('laboratorium-management') ||
                $currentUser->role->hasPermission('fasilitas-support'))
            <div class="pt-6 pb-2 px-3">
                <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wider">Sarana & Prasarana</p>
            </div>

            @if ($currentUser->role->hasPermission('gedung-management'))
                <a href="{{ route('admin.gedung.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.gedung.*') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                    <i class="fas fa-building w-4 text-center"></i>
                    <span>Gedung</span>
                </a>
            @endif

            @if ($currentUser->role->hasPermission('kelas-management'))
                <a href="{{ route('admin.kelas.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.kelas.*') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                    <i class="fas fa-door-open w-4 text-center"></i>
                    <span>Kelas / Ruangan</span>
                </a>
            @endif

            @if ($currentUser->role->hasPermission('laboratorium-management'))
                <a href="{{ route('admin.laboratorium.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.laboratorium.*') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                    <i class="fas fa-flask w-4 text-center"></i>
                    <span>Laboratorium</span>
                </a>
            @endif

            @if ($currentUser->role->hasPermission('fasilitas-support'))
                <a href="{{ route('admin.support.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.support.*') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                    <i class="fas fa-tools w-4 text-center"></i>
                    <span>Fasilitas Lainnya</span>
                </a>
            @endif
        @endif

        <!-- LAYANAN & MONITORING -->
        @if (
            $currentUser->role->hasPermission('mahasiswa-cuti') ||
                $currentUser->role->hasPermission('legalisir-ijazah') ||
                $currentUser->role->hasPermission('monitoring-ruangan') ||
                $currentUser->role->hasPermission('persetujuan-peminjaman'))
            <div class="pt-6 pb-2 px-3">
                <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wider">Layanan & Monitoring</p>
            </div>

            @if ($currentUser->role->hasPermission('mahasiswa-cuti'))
                <a href="{{ route('admin.mahasiswa-cuti.dashboard') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.mahasiswa-cuti.dashboard') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                    <i class="fas fa-chart-pie w-4 text-center"></i>
                    <span>Dashboard Cuti</span>
                </a>

                <a href="{{ route('admin.mahasiswa-cuti.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.mahasiswa-cuti.index') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                    <i class="fas fa-user-graduate w-4 text-center"></i>
                    <span>Daftar Mahasiswa Cuti</span>
                </a>
            @endif

            @if ($currentUser->role->hasPermission('legalisir-ijazah'))
                <a href="{{ route('admin.legalisir.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.legalisir.*') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                    <i class="fas fa-stamp w-4 text-center"></i>
                    <span>Legalisir Ijazah</span>
                </a>
            @endif

            @if ($currentUser->role->hasPermission('monitoring-ruangan'))
                <a href="{{ route('admin.peminjaman-ruangan.monitoring') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.peminjaman-ruangan.monitoring') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                    <i class="fas fa-desktop w-4 text-center"></i>
                    <span>Monitoring Ruangan</span>
                </a>
            @endif

            @if ($currentUser->role->hasPermission('persetujuan-peminjaman'))
                <a href="{{ route('admin.pengajuan-ruangan.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.pengajuan-ruangan.*') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                    <i class="fas fa-check-circle w-4 text-center"></i>
                    <span>Persetujuan Pinjam</span>
                </a>
            @endif
        @endif

        <!-- INFORMASI -->
        @if ($currentUser->role->hasPermission('pengumuman-management'))
            <div class="pt-6 pb-2 px-3">
                <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wider">Informasi</p>
            </div>

            <a href="{{ route('admin.pengumuman.index') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.pengumuman.*') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                <i class="fas fa-bullhorn w-4 text-center"></i>
                <span>Pengumuman</span>
            </a>
        @endif

        <div class="h-10"></div> <!-- Spacer -->
    </nav>
</aside>

<script>
    function toggleMenu(submenuId, arrowId) {
        const submenu = document.getElementById(submenuId);
        const arrow = document.getElementById(arrowId);

        if (submenu.classList.contains('hidden')) {
            submenu.classList.remove('hidden');
            arrow.classList.add('rotate-180');
        } else {
            submenu.classList.add('hidden');
            arrow.classList.remove('rotate-180');
        }
    }
</script>
