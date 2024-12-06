<?php

namespace App\Repositories;
use App\Models\Menu;
use Illuminate\Support\Facades\Log;
use Exception;
class MenuRepository
{
    
    public function create(array $data): Menu
    {
        try {
            $menu = new Menu($data);
            $menu->save();
            return $menu;
        } catch (Exception $e) {
            Log::error("Error creating data: " . $e->getMessage());
            throw new Exception("Failed to create data.");
        }
    }


    public function update(Menu $menu, array $data): Menu
    {
        try {
            $menu->update($data);
            return $menu;
        } catch (Exception $e) {
            Log::error("Error updating data with ID {$menu->id}: " . $e->getMessage());
            throw new Exception("Failed to update data.");
        }
    }

 
    public function delete(Menu $menu): void
    {
        try {
            $menu->delete();
        } catch (Exception $e) {
            Log::error("Failed to delete data with ID {$menu->id}: " . $e->getMessage());
            throw new Exception("Failed to delete data.");
        }
    }


    public function find(int $id): Menu
    {
        try {
            return Menu::findOrFail($id);
        } catch (Exception $e) {
            Log::error("Failed to find data with ID {$id}: " . $e->getMessage());
            throw new Exception("data not found.");
        }
    }
    
}
