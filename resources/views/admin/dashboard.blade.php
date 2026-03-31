@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 space-y-4 sm:space-y-0">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-zinc-900">Dashboard</h1>
            <p class="mt-1 text-sm text-zinc-500">Ringkasan aktivitas dan metrik utama sistem informasi laboratorium.</p>
        </div>
        <!-- Breadcrumb or Actions could go here -->
    </div>

    <!-- Statistics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @php
            $currentUser = Auth::guard('admin')->check() ? Auth::guard('admin')->user() : Auth::guard('users')->user();
        @endphp

        <!-- Total Peran -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-zinc-500">Total Peran</p>
                    <h4 class="text-2xl font-bold text-zinc-900 mt-1">{{ $totalPeran ?? 0 }}</h4>
                </div>
                <div class="h-10 w-10 rounded-full bg-zinc-100 flex items-center justify-center text-zinc-600">
                    <i class="fas fa-user-tag"></i>
                </div>
            </div>
        </div>

        <!-- Total Pengguna -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-zinc-500">Total Pengguna</p>
                    <h4 class="text-2xl font-bold text-zinc-900 mt-1">{{ $totalPengguna ?? 0 }}</h4>
                </div>
                <div class="h-10 w-10 rounded-full bg-zinc-100 flex items-center justify-center text-zinc-600">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>

        <!-- Placeholder for Practical Management Stats -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-zinc-500">Total Praktikum</p>
                    <h4 class="text-2xl font-bold text-zinc-900 mt-1">0</h4>
                </div>
                <div class="h-10 w-10 rounded-full bg-zinc-100 flex items-center justify-center text-zinc-600">
                    <i class="fas fa-flask"></i>
                </div>
            </div>
        </div>

    </div>
@endsection
