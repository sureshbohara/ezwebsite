<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'Super Admin'],
            ['name' => 'Employee'],
            ['name' => 'Customer'],
            ['name' => 'Content Manager'],
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
