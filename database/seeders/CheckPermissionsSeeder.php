<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class CheckPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = Permission::all();
        
        echo "Permissions in the database:\n";
        foreach ($permissions as $permission) {
            echo "- ID: {$permission->id}, Name: {$permission->name}, Display Name: {$permission->display_name}\n";
        }
    }
}