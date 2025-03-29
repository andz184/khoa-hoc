<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run(): void
    {
        // Tạo vai trò
        $adminRole = Role::create([
            'name' => 'admin',
            'description' => 'Quản trị viên hệ thống'
        ]);

        $clientRole = Role::create([
            'name' => 'client',
            'description' => 'Người dùng thông thường'
        ]);

        // Tạo người dùng mẫu và gán vai trò (tùy chọn)
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('123'), // Mật khẩu mã hóa
            'role_id' => $adminRole->id,
        ]);

        $clientUser = User::create([
            'name' => 'Client User',
            'email' => 'client@example.com',
            'password' => Hash::make('123'),
            'role_id' => $clientRole->id,
        ]);
    }
}
