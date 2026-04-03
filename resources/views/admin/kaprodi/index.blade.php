@extends('layouts.admin')

@section('title', 'Manajemen Kaprodi')

@section('content')
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
            background-color: #ffffff;
            border: 1px solid #e4e4e7;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #18181b;
            background-color: #f4f4f5;
            border-color: #d4d4d8;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #ffffff !important;
            background-color: #18181b !important;
            border-color: #18181b !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            opacity: 0.5;
            cursor: not-allowed;
            color: #a1a1aa;
        }

        .dataTables_wrapper .dataTables_info {
            color: #71717a;
            font-size: 0.875rem;
        }
    </style>

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 space-y-4 sm:space-y-0">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-zinc-900">Daftar Kaprodi</h1>
            <p class="mt-1 text-sm text-zinc-500">Kelola data Kepala Program Studi di sistem ini.</p>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('admin.kaprodi.create') }}"
                class="inline-flex items-center justify-center rounded-md bg-zinc-900 px-4 py-2 text-sm font-medium text-white shadow hover:bg-zinc-900/90 focus-visible:outline-none focus:ring-zinc-950 transition-colors">
                <i class="fas fa-plus mr-2"></i> Tambah Kaprodi
            </a>
        </div>
    </div>

    <div class="rounded-xl border border-zinc-200 bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table id="kaprodiTable" class="w-full text-sm text-left">
                <thead class="text-xs text-zinc-500 uppercase bg-zinc-50 border-b border-zinc-100">
                    <tr>
                        <th class="px-6 py-3 font-medium w-16 text-center">No</th>
                        <th class="px-6 py-3 font-medium">Nama Kaprodi</th>
                        <th class="px-6 py-3 font-medium">Prodi</th>
                        <th class="px-6 py-3 font-medium">Kontak</th>
                        <th class="px-6 py-3 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100">
                    @foreach ($users as $index => $user)
                        <tr id="kaprodi-row-{{ $user->id }}" class="hover:bg-zinc-50/50 transition-colors">
                            <td class="px-6 py-4 text-center font-medium text-zinc-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-10 w-10 flex-shrink-0 rounded-full bg-zinc-100 border border-zinc-200 overflow-hidden shadow-inner flex items-center justify-center">
                                        @if ($user->profile_picture && file_exists(public_path('uploads/profile/' . $user->profile_picture)))
                                            <img src="{{ asset('uploads/profile/' . $user->profile_picture) }}" alt="{{ $user->name }}" class="h-full w-full object-cover">
                                        @else
                                            <i class="fas fa-user-tie text-zinc-400"></i>
                                        @endif
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex items-center gap-1.5">
                                            <span class="font-medium text-zinc-900">{{ $user->name }}</span>
                                            <button onclick="copyToClipboard('{{ $user->id }}')" 
                                                class="text-zinc-300 hover:text-zinc-500 transition-colors" title="Salin ID">
                                                <i class="fas fa-copy text-[10px]"></i>
                                            </button>
                                        </div>
                                        <span class="text-xs text-zinc-500">NIP: {{ $user->nip ?? '-' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if ($user->prodi)
                                    <span class="inline-flex items-center rounded-full bg-blue-50 px-2.5 py-0.5 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                        {{ $user->prodi->nama_prodi }}
                                    </span>
                                @else
                                    <span class="text-zinc-400 italic">Tidak ada prodi</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-zinc-600">
                                <div class="flex flex-col gap-1">
                                    <span class="flex items-center gap-2 text-xs">
                                        <i class="fas fa-envelope text-zinc-400 w-3.5"></i> {{ $user->email }}
                                    </span>
                                    @if ($user->no_telepon)
                                        <span class="flex items-center gap-2 text-xs">
                                            <i class="fas fa-phone text-zinc-400 w-3.5"></i> {{ $user->no_telepon }}
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.kaprodi.show', $user->id) }}"
                                        class="p-2 text-zinc-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all"
                                        title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.kaprodi.edit', $user->id) }}"
                                        class="p-2 text-zinc-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all"
                                        title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button onclick="confirmDelete('{{ $user->id }}')"
                                        class="p-2 text-zinc-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all"
                                        title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            var table = $('#kaprodiTable').DataTable({
                "paging": true,
                "stateSave": false,
                "lengthChange": true,
                "pageLength": 10,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "search": "",
                    "searchPlaceholder": "Cari Kaprodi...",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                    "infoFiltered": "(disaring dari _MAX_ total data)",
                    "zeroRecords": "Tidak ada data yang cocok",
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

            table.on('draw.dt', function() {
                table.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

            $('.dataTables_filter input').addClass(
                'w-full md:w-64 rounded-md border border-zinc-300 px-3 py-1.5 focus:outline-none focus:ring-1 focus:ring-zinc-900 focus:border-zinc-900 text-sm'
            );
            $('.dataTables_length select').addClass(
                'rounded-md border border-zinc-300 px-3 py-1.5 focus:outline-none focus:ring-1 focus:ring-zinc-900 text-sm'
            );

        });

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Disalin!',
                    text: 'ID Kaprodi berhasil disalin.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        }

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
                        url: "{{ url('admin/kaprodi') }}/" + id,
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
                                $('#kaprodiTable').DataTable().row(`#kaprodi-row-${id}`).remove().draw(false);
                            }
                        },
                        error: function(xhr) {
                            const errMsg = xhr.responseJSON?.message || 'Gagal menghapus data.';
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
