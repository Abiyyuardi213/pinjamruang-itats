@extends('layouts.admin')

@section('title', 'Kelola Hak Akses - ' . $role->role_name)

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 space-y-4 sm:space-y-0">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-zinc-900">Kelola Hak Akses</h1>
            <p class="mt-1 text-sm text-zinc-500">Tentukan fitur mana saja yang dapat diakses oleh peran: <span class="font-semibold text-zinc-900">{{ $role->role_name }}</span></p>
        </div>
        <nav class="flex text-sm font-medium text-zinc-500 items-center">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-zinc-900 transition-colors">Home</a>
            <span class="mx-2 text-zinc-300">/</span>
            <a href="{{ route('admin.role.index') }}" class="hover:text-zinc-900 transition-colors">Peran</a>
            <span class="mx-2 text-zinc-300">/</span>
            <span class="text-zinc-900">Hak Akses</span>
        </nav>
    </div>

    <form action="{{ route('admin.role.permissions.update', $role->id) }}" method="POST">
        @csrf
        <div class="space-y-6">
            @foreach($groups as $groupName => $slugPrefixes)
                <div class="rounded-xl border border-zinc-200 bg-white shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-zinc-100 bg-zinc-50/50">
                        <h3 class="text-sm font-bold text-zinc-900 uppercase tracking-wider">{{ $groupName }}</h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($permissions->whereIn('slug', $slugPrefixes) as $permission)
                                <label class="relative flex items-start p-4 rounded-lg border border-zinc-100 hover:bg-zinc-50 transition-colors cursor-pointer group">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                                            {{ $role->hasPermission($permission->slug) ? 'checked' : '' }}
                                            class="h-4 w-4 rounded border-zinc-300 text-zinc-900 focus:ring-zinc-900 cursor-pointer">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <span class="font-semibold text-zinc-900 group-hover:text-zinc-950">{{ $permission->name }}</span>
                                        <p class="text-zinc-500 text-xs mt-0.5">Dapat mengakses fitur {{ strtolower($permission->name) }}</p>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="flex justify-end items-center gap-4 pt-4">
                <a href="{{ route('admin.role.index') }}" class="text-sm font-medium text-zinc-600 hover:text-zinc-900 transition-colors">Batal</a>
                <button type="submit" class="inline-flex items-center justify-center rounded-md bg-zinc-900 px-8 py-2.5 text-sm font-bold text-white shadow-lg hover:bg-zinc-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-zinc-900 transition-all active:scale-95">
                    <i class="fas fa-save mr-2"></i> Simpan Hak Akses
                </button>
            </div>
        </div>
    </form>
@endsection
