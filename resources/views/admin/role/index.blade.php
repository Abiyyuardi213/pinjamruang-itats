@extends('layouts.admin')

@section('title', 'Manajemen Peran')

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
            <h1 class="text-2xl font-bold tracking-tight text-zinc-900">Manajemen Peran</h1>
            <p class="mt-1 text-sm text-zinc-500">Kelola data peran (role) pengguna dan hak akses sistem.</p>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('admin.role.create') }}"
                class="inline-flex items-center justify-center rounded-md bg-zinc-900 px-4 py-2 text-sm font-medium text-white shadow hover:bg-zinc-900/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-zinc-950 transition-colors">
                <i class="fas fa-plus mr-2"></i> Tambah Peran
            </a>
        </div>
    </div>

    <div class="rounded-xl border border-zinc-200 bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table id="roleTable" class="w-full text-left text-sm">
                <thead class="text-xs text-zinc-500 uppercase bg-zinc-50 border-b border-zinc-100">
                        <tr>
                            <th class="px-6 py-3 font-medium w-16 text-center">No</th>
                            <th class="px-6 py-3 font-medium">Nama Peran</th>
                            <th class="px-6 py-3 font-medium">Deskripsi</th>
                            <th class="px-6 py-3 font-medium text-center">Status</th>
                            <th class="px-6 py-3 font-medium text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100 bg-white">
                        @forelse($roles as $index => $role)
                            <tr class="hover:bg-zinc-50/50 transition-colors">
                                <td class="px-6 py-4 text-center font-medium text-zinc-900">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 font-medium text-zinc-900">
                                    <div class="flex items-center gap-2">
                                        {{ $role->role_name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-zinc-500">{{ Str::limit($role->role_description, 60) }}</td>
                                <td class="px-6 py-4 text-center">
                                    <label class="inline-flex relative items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer toggle-status"
                                            data-role-id="{{ $role->id }}"
                                            {{ $role->role_status ? 'checked' : '' }}>
                                        <div
                                            class="w-11 h-6 bg-zinc-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
                                        </div>
                                        <span
                                            class="ml-3 text-xs font-medium text-zinc-600 peer-checked:text-green-600">{{ $role->role_status ? 'Aktif' : 'Nonaktif' }}</span>
                                    </label>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.role.permissions', $role->id) }}"
                                            class="p-2 text-zinc-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all"
                                            title="Hak Akses">
                                            <i class="fas fa-key"></i>
                                        </a>
                                        <a href="{{ route('admin.role.edit', $role->id) }}"
                                            class="p-2 text-zinc-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all"
                                            title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button onclick="confirmDelete('{{ $role->id }}')"
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
                                        <i class="fas fa-user-shield text-4xl text-zinc-300 mb-3"></i>
                                        <p>Belum ada data peran.</p>
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
    <!-- jQuery is already loaded in layouts.admin, needed for DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            // Tailwind-styled DataTables
            var table = $('#roleTable').DataTable({
                "paging": true,
                "stateSave": false,
                "pageLength": 10,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "search": "",
                    "searchPlaceholder": "Cari peran...",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                    "infoFiltered": "(disaring dari _MAX_ total data)",
                    "zeroRecords": "<div class='flex flex-col items-center justify-center text-zinc-500 py-8'><i class='fas fa-search-minus text-4xl mb-3 text-zinc-300'></i><p>Tidak ada data yang cocok.</p></div>",
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

            // Toggle Status
            $(document).off('change', '.toggle-status').on('change', '.toggle-status', function() {
                let roleId = $(this).data("role-id");
                let status = $(this).prop("checked") ? 1 : 0;
                const $label = $(this).closest('label').find('span');
                const checkbox = $(this);

                $.post("{{ url('admin/role') }}/" + roleId + "/toggle-status", {
                    _token: '{{ csrf_token() }}',
                    role_status: status
                }, function(res) {
                    if (res.success) {
                        $label.text(status ? 'Aktif' : 'Nonaktif');
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Status peran berhasil diperbarui menjadi ' + (status ? 'Aktif' :
                                'Nonaktif'),
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Gagal memperbarui status peran.',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        checkbox.prop('checked', !status);
                    }
                }).fail(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan!',
                        text: 'Terjadi kesalahan pada sistem.',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    checkbox.prop('checked', !status);
                });
            });
        });

        function confirmDelete(id) {
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
                        url: "{{ url('admin/role') }}/" + id,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE'
                        },
                        success: function(res) {
                            if (res.success) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: res.message,
                                    icon: "success",
                                    width: '25em'
                                });
                                table.row(`#role-row-${id}`).remove().draw(false);
                            }
                        },
                        error: function(xhr) {
                            const errMsg = xhr.responseJSON?.message || 'Terjadi kesalahan sistem.';
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
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
