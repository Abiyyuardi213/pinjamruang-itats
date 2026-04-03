<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // SISTEM
            ['name' => 'Dashboard Konten', 'slug' => 'dashboard'],
            ['name' => 'Manajemen Peran', 'slug' => 'role-management'],
            ['name' => 'Manajemen Pengguna', 'slug' => 'user-management'],
            
            // AKADEMIK
            ['name' => 'Manajemen Prodi', 'slug' => 'prodi-management'],
            ['name' => 'Data Kaprodi', 'slug' => 'kaprodi-data'],
            ['name' => 'Periode Cuti', 'slug' => 'periode-cuti'],
            
            // SARANA & PRASARANA
            ['name' => 'Manajemen Gedung', 'slug' => 'gedung-management'],
            ['name' => 'Manajemen Kelas/Ruangan', 'slug' => 'kelas-management'],
            ['name' => 'Manajemen Laboratorium', 'slug' => 'laboratorium-management'],
            ['name' => 'Fasilitas Support/Lainnya', 'slug' => 'fasilitas-support'],
            
            // LAYANAN & MONITORING
            ['name' => 'Pengajuan Cuti Mahasiswa', 'slug' => 'mahasiswa-cuti'],
            ['name' => 'Legalisir Dokumen', 'slug' => 'legalisir-ijazah'],
            ['name' => 'Monitoring Ruangan', 'slug' => 'monitoring-ruangan'],
            ['name' => 'Persetujuan Peminjaman', 'slug' => 'persetujuan-peminjaman'],
            
            // INFORMASI
            ['name' => 'Manajemen Pengumuman', 'slug' => 'pengumuman-management'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['slug' => $permission['slug']], $permission);
        }
    }
}
