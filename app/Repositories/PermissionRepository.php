<?php
namespace App\Repositories;
use App\Models\Permission;
use Illuminate\Support\Facades\Log;
use Exception;
class PermissionRepository
{
    

    public function store(array $data){
        try {
            return Permission::create($data);
        } catch (Exception $e) {
            Log::error("Failed to create Permission: " . $e->getMessage());
            throw new Exception("Error storing Permission.");
        }
    }

    public function update(Permission $permission, array $data){
        try {
            $permission->update($data);
            return $permission;
        } catch (Exception $e) {
            Log::error("Failed to update Permission: " . $e->getMessage());
            throw new Exception("Error updating Permission.");
        }
    }

    public function delete(Permission $permission){
        try {
            $permission->delete();
        } catch (Exception $e) {
            Log::error("Failed to delete Permission: " . $e->getMessage());
            throw new Exception("Error deleting Permission.");
        }
    }

    public function find($id){
        try {
            return Permission::findOrFail($id);
        } catch (Exception $e) {
            Log::error("Failed to find Permission: " . $e->getMessage());
            throw new Exception("Permission not found.");
        }
    }
}
