<aside
    class="w-64 bg-white border-r border-zinc-200 hidden md:flex flex-col h-full shrink-0 transition-all duration-300 relative z-20">
    <!-- Logo -->
    <div class="h-16 flex items-center gap-2 px-6 border-b border-zinc-200">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
            <img src="{{ asset('image/itats-biru.png') }}" alt="Logo ITATS"
                class="h-8 w-auto object-contain grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition-all">
            <span class="font-bold text-lg text-zinc-900 tracking-tight">Lab<span
                    class="text-zinc-400">Panel</span></span>
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
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
            <i class="fas fa-home w-4 text-center"></i>
            <span>Dashboard</span>
        </a>

        <div class="pt-6 pb-2 px-3">
            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wider">Sistem Utama</p>
        </div>

        <a href="{{ route('admin.role.index') }}"
            class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.role.*') ? 'bg-zinc-100 text-zinc-900 shadow-sm' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
            <i class="fas fa-user-shield w-4 text-center"></i>
            <span>Manajemen Peran</span>
        </a>

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
