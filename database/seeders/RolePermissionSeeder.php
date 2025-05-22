<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create admin user (or update if already exists)
        $admin = User::Create(
            [
                'name' => 'Admin',
                'phone' => '0123456789',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => User::ADMIN, // for your manual column

            ]
        );

        $admin->assignRole('admin');
        


    }
}
