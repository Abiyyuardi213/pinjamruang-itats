<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('created_at', 'asc')->get(); // Urutkan dari yang paling lama ke terbaru
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|max:255',
            'role_description' => 'nullable|string',
            'role_status' => 'required|boolean',
        ]);

        Role::createRole($request->all());

        return redirect()->route('admin.role.index')->with('success', 'Role berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role_name' => 'required|string|max:255',
            'role_description' => 'nullable|string',
            'role_status' => 'required|boolean',
        ]);

        $role = Role::findOrFail($id);
        $role->updateRole($request->all());

        return redirect()->route('admin.role.index')->with('success', 'Role berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        
        // Cek apakah role masih digunakan oleh user
        if ($role->users()->count() > 0) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Role tidak dapat dihapus karena masih digunakan oleh user.'
                ], 422);
            }
            return redirect()->route('admin.role.index')->with('error', 'Role tidak dapat dihapus karena masih digunakan oleh user.');
        }

        $role->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Peran berhasil dihapus.'
            ]);
        }

        return redirect()->route('admin.role.index')->with('success', 'Peran berhasil dihapus.');
    }

    public function toggleStatus($id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->toggleStatus();

            return response()->json([
                'success' => true,
                'role_status' => $role->role_status,
                'message' => 'Status role berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui status.'
            ], 500);
        }
    }

    public function managePermissions($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::all();
        
        // Define groups for cleaner UI
        $groups = [
            'Sistem' => ['dashboard', 'role-management', 'user-management'],
            'Akademik' => ['prodi-management', 'kaprodi-data', 'periode-cuti'],
            'Sarana & Prasarana' => ['gedung-management', 'kelas-management', 'laboratorium-management', 'fasilitas-support'],
            'Layanan & Monitoring' => ['mahasiswa-cuti', 'legalisir-ijazah', 'monitoring-ruangan', 'persetujuan-peminjaman'],
            'Informasi' => ['pengumuman-management'],
        ];

        return view('admin.role.permissions', compact('role', 'permissions', 'groups'));
    }

    public function updatePermissions(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.role.index')->with('success', 'Hak akses berhasil diperbarui.');
    }
}
