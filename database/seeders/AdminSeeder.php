<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
class AdminSeeder extends Seeder
{ 

    public function run(): void
    {
        $admins = [
            [
                'role_id' => 1,
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('password123'),
                'address' => 'kathmandu nepal',
                'mobile' => '1234543234',
                'gender' => 'male',
                'image' => '',
                'info' => '',
                'status' => 1,
            ],
            [
                'role_id' => 2,
                'name' => 'System Admin',
                'email' => 'employee@gmail.com',
                'password' => bcrypt('password123'),
                'address' => 'Test Address',
                'mobile' => '1234567890',
                'gender' => 'male',
                'image' => '',
                'info' => '',
                'status' => 1,
            ],
            [
                'role_id' => 3,
                'name' => 'Sales Manager',
                'email' => 'customer@gmail.com',
                'password' => bcrypt('password123'),
                'address' => 'Test Address',
                'mobile' => '',
                'gender' => 'male',
                'image' => '',
                'info' => '',
                'status' => 1,
            ]
        ];

        foreach ($admins as $adminData) {
            User::create($adminData);
        }
    }
}
