<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
use Carbon\Carbon;
class PermissionSeeder extends Seeder
{
    public function run()
    {
        $role_id = 1;
        $permissions = [
            'user' => ['add' => '1', 'edit' => '1', 'view' => '1', 'delete' => '1'],
            'role' => ['add' => '1', 'edit' => '1', 'view' => '1', 'delete' => '1'],
            'permission' => ['add' => '1', 'edit' => '1', 'view' => '1', 'delete' => '1'],
            'setting' => ['add' => '1', 'edit' => '1', 'view' => '1', 'delete' => '1'],
            'banner' => ['add' => '1', 'edit' => '1', 'view' => '1', 'delete' => '1'],
            'service' => ['add' => '1', 'edit' => '1', 'view' => '1', 'delete' => '1'],
            'review' => ['add' => '1', 'edit' => '1', 'view' => '1', 'delete' => '1'],
            'faqs' => ['add' => '1', 'edit' => '1', 'view' => '1', 'delete' => '1'],
            'gallery' => ['add' => '1', 'edit' => '1', 'view' => '1', 'delete' => '1'],
            'package' => ['add' => '1', 'edit' => '1', 'view' => '1', 'delete' => '1'],
        ];
        $permissionData = [
            'role_id' => $role_id,
            'permission' => json_encode($permissions),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        
        DB::table('permissions')->insert($permissionData);
    }
}
