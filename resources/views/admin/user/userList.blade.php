@extends('layouts.admin')

@section('title', 'Manajemen Pengguna')

@section('content')
    <!-- Page Header -->
    <style>
        /* Custom DataTables Pagination Styling */
        .dataTables_wrapper .dataTables_paginate {
            display: flex;
            justify-content: flex-end;
            gap: 0.25rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 500;
            color: #52525b;
            /* zinc-600 */
            background-color: #ffffff;
            border: 1px solid #e4e4e7;
            /* zinc-200 */
            border-radius: 0.375rem;
            cursor: pointer;
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 200ms;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #18181b;
            /* zinc-900 */
            background-color: #f4f4f5;
            /* zinc-50 */
            border-color: #d4d4d8;
            /* zinc-300 */
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #ffffff !important;
            background-color: #18181b !important;
            /* zinc-900 */
            border-color: #18181b !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            opacity: 0.5;
            cursor: not-allowed;
            color: #a1a1aa;
            /* zinc-400 */
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            box-shadow: none;
        }

        /* Remove default DataTables styling if any */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #f4f4f5;
            /* zinc-50 */
            color: #18181b;
            /* zinc-900 */
            border: 1px solid #d4d4d8;
            /* zinc-300 */
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: #18181b;
            /* zinc-900 */
            color: #ffffff;
            border: 1px solid #18181b;
        }

        .dataTables_wrapper .dataTables_info {
            color: #71717a;
            /* zinc-500 */
            font-size: 0.875rem;
        }
    </style>
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 space-y-4 sm:space-y-0">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-zinc-900">Manajemen Pengguna</h1>
            <p class="mt-1 text-sm text-zinc-500">Kelola data pengguna, hak akses, dan informasi akun.</p>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('admin.user.create') }}"
                class="inline-flex items-center justify-center rounded-md bg-zinc-900 px-4 py-2 text-sm font-medium text-white shadow hover:bg-zinc-900/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-zinc-950 transition-colors">
                <i class="fas fa-plus mr-2"></i> Tambah Pengguna
            </a>
        </div>
    </div>

    <!-- Actions Toolbar -->
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-start gap-4">
        <!-- Filter Controls -->
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <div class="relative w-full sm:w-56">
                <select id="roleFilter"
                    class="w-full pl-10 pr-8 py-2 bg-white border border-zinc-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-zinc-900 focus:border-zinc-900 appearance-none transition-shadow text-zinc-700">
                    <option value="">Semua Peran</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->role_name }}">{{ $role->role_name }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-zinc-400">
                    <i class="fas fa-user-tag text-xs"></i>
                </div>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-zinc-400">
                    <i class="fas fa-chevron-down text-xs"></i>
                </div>
            </div>

            <button id="resetFilter" title="Reset Filter"
                class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-white border border-zinc-200 rounded-lg text-sm font-medium text-zinc-700 hover:bg-zinc-50 hover:text-zinc-900 focus:outline-none focus:ring-2 focus:ring-zinc-900 transition-colors shadow-sm">
                <i class="fas fa-sync-alt sm:mr-0 md:mr-2"></i> <span class="md:hidden lg:inline">Reset</span>
            </button>
        </div>
    </div>

    <div class="rounded-xl border border-zinc-200 bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table id="userTable" class="w-full text-left text-sm">
                <thead class="text-xs text-zinc-500 uppercase bg-zinc-50 border-b border-zinc-100">
                        <tr>
                            <th class="px-6 py-3 font-medium w-16 text-center">No</th>
                            <th class="px-6 py-3 font-medium">Nama Pengguna</th>
                            <th class="px-6 py-3 font-medium">Email</th>
                            <th class="px-6 py-3 font-medium">Peran</th>
                            <th class="px-6 py-3 font-medium text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100 bg-white">
                        @forelse($users as $index => $user)
                            <tr id="user-row-{{ $user->id }}" class="hover:bg-zinc-50/50 transition-colors">
                                <td class="px-6 py-4 text-center font-medium text-zinc-900">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="h-8 w-8 rounded-full bg-zinc-100 border border-zinc-200 flex items-center justify-center overflow-hidden">
                                            @if ($user->profile_picture)
                                                <img src="{{ asset('uploads/profile/' . $user->profile_picture) }}"
                                                    alt="{{ $user->name }}" class="h-full w-full object-cover">
                                            @else
                                                <span
                                                    class="text-xs font-semibold text-zinc-500">{{ substr($user->name, 0, 2) }}</span>
                                            @endif
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="font-medium text-zinc-900">{{ $user->name }}</span>
                                            <span class="text-xs text-zinc-400">{{ $user->username }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-zinc-500">{{ $user->email ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center rounded-full border border-zinc-200 bg-zinc-50 px-2.5 py-0.5 text-xs font-medium text-zinc-700">
                                        {{ $user->role->role_name ?? 'N/A' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.user.show', $user->id) }}"
                                            class="p-2 text-zinc-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all"
                                            title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.user.edit', $user->id) }}"
                                            class="p-2 text-zinc-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all"
                                            title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button onclick="openDeleteModal('{{ $user->id }}', this)" 
                                            class="p-2 text-zinc-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all"
                                            title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-zinc-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-users-slash text-4xl text-zinc-300 mb-3"></i>
                                        <p>Belum ada data pengguna.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#userTable').DataTable({
                "stateSave": true,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "search": "",
                    "searchPlaceholder": "Cari pengguna...",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                    "infoFiltered": "(disaring dari _MAX_ total data)",
                    "emptyTable": '<div class="py-10 flex flex-col items-center justify-center text-zinc-500"><i class="fas fa-users-slash text-4xl mb-3 text-zinc-300"></i><p>Belum ada data pengguna.</p></div>',
                    "zeroRecords": '<div class="py-10 flex flex-col items-center justify-center text-zinc-500"><i class="fas fa-search text-4xl mb-3 text-zinc-300"></i><p>Tidak ada data yang cocok</p></div>',
                    "paginate": {
                        "first": '<i class="fas fa-angle-double-left"></i>',
                        "last": '<i class="fas fa-angle-double-right"></i>',
                        "next": '<i class="fas fa-angle-right"></i>',
                        "previous": '<i class="fas fa-angle-left"></i>'
                    }
                },
                "dom": '<"flex flex-col md:flex-row justify-between items-center p-4 gap-4"lf>rt<"flex flex-col md:flex-row justify-between items-center p-4 gap-4"ip>',
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }],
                // Disable initial sort to respect backend order (Oldest -> Newest)
                "order": []
            });

            // Index column handling - robust re-indexing on every draw
            table.on('draw.dt', function() {
                table.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

            // Custom styling for inputs
            $('.dataTables_filter input').addClass(
                'w-full md:w-64 rounded-md border border-zinc-300 px-3 py-1.5 focus:outline-none focus:ring-1 focus:ring-zinc-900 focus:border-zinc-900 text-sm'
            );
            $('.dataTables_length select').addClass(
                'rounded-md border border-zinc-300 px-3 py-1.5 focus:outline-none focus:ring-1 focus:ring-zinc-900 text-sm'
            );

            // Custom Role Filter
            $('#roleFilter').on('change', function() {
                var selectedRole = $(this).val();
                if (selectedRole) {
                    // Match the text anywhere in the cell to avoid whitespace/newline issues
                    table.column(3).search(selectedRole).draw();
                } else {
                    table.column(3).search('').draw();
                }
            });

            // Restore Custom Role Filter visual state
            var state = table.state.loaded();
            if (state && state.columns[3].search.search) {
                $('#roleFilter').val(state.columns[3].search.search);
            }

            // Reset Filter
            $('#resetFilter').on('click', function() {
                // Reset role filter
                $('#roleFilter').val('').trigger('change');
                // Reset global search
                table.search('').draw();
            });

            @if (session('new_entry'))
                table.page('last').draw('page');
            @endif

            // Status Notifications
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: "{{ session('error') }}",
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            @endif
        });

        function openDeleteModal(id) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
                width: '25em'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('admin/user') }}/" + id,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE'
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: response.message,
                                    icon: "success",
                                    width: '25em'
                                });

                                // Remove row using DataTable API by ID
                                const table = $('#userTable').DataTable();
                                table.row('#user-row-' + id).remove().draw(false);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: response.message,
                                    width: '25em'
                                });
                            }
                        },
                        error: function(xhr) {
                            const errMsg = xhr.responseJSON?.message || 'Terjadi kesalahan sistem.';
                            Swal.fire({
                                icon: 'error',
                                title: 'Kesalahan!',
                                text: errMsg,
                                width: '25em'
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection
