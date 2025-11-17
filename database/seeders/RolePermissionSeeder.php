<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Create Permissions
        $permissions = [
            ['name' => 'manage_roles', 'display_name' => 'Kelola Roles', 'description' => 'Mengelola roles dan permissions'],
            ['name' => 'manage_permissions', 'display_name' => 'Kelola Permissions', 'description' => 'Mengelola permissions'],
            ['name' => 'view_dashboard', 'display_name' => 'Lihat Dashboard', 'description' => 'Melihat halaman dashboard'],
            ['name' => 'manage_users', 'display_name' => 'Kelola Users', 'description' => 'Mengelola pengguna'],
            ['name' => 'manage_site_settings', 'display_name' => 'Kelola Site Settings', 'description' => 'Mengelola pengaturan situs'],
            ['name' => 'manage_contact_info', 'display_name' => 'Kelola Contact Info', 'description' => 'Mengelola informasi kontak'],
            ['name' => 'manage_sliders', 'display_name' => 'Kelola Sliders', 'description' => 'Mengelola image sliders'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        // Create Roles
        $adminRole = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'Role dengan akses penuh ke sistem'
        ]);

        $librarianRole = Role::create([
            'name' => 'librarian',
            'display_name' => 'Pustakawan',
            'description' => 'Role untuk mengelola perpustakaan'
        ]);

        $userRole = Role::create([
            'name' => 'user',
            'display_name' => 'Pengguna',
            'description' => 'Role untuk pengguna umum'
        ]);

        // Assign permissions to roles
        $adminRole->permissions()->attach(Permission::all()); // Admin gets all permissions
        
        $librarianRole->permissions()->attach(
            Permission::whereIn('name', [
                'view_dashboard',
                'manage_users'
            ])->get()
        );
        
        $userRole->permissions()->attach(
            Permission::whereIn('name', [
                'view_dashboard'
            ])->get()
        );
    }
}