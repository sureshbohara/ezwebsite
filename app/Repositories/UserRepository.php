<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Helpers\ImageHelper;
use Exception;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
class UserRepository
{
    protected $imageHelper;

    public function __construct(ImageHelper $imageHelper){
        $this->imageHelper = $imageHelper;
    }

    public function store(UserRequest $request){
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            $this->handleImageUpload($request, $data);
            return User::create($data);
        } catch (Exception $e) {
            Log::error("Failed to create data: " . $e->getMessage());
            throw new Exception("Error storing data.");
        }
    }

    public function update(User $user, UserRequest $request){
        try {
            $data = $request->validated();
            $this->handleImageUpdate($request, $data, $user);
            $user->update($data);
            return $user;
        } catch (Exception $e) {
            Log::error("Failed to update data: " . $e->getMessage());
            throw new Exception("Error updating data.");
        }
    }

    public function delete(User $user){
        try {
            $this->imageHelper->handleDeletedImage($user, 'image', 'images/');
            $user->delete();
        } catch (Exception $e) {
            Log::error("Failed to delete data: " . $e->getMessage());
            throw new Exception("Error deleting data.");
        }
    }

    public function find($id){
        try {
            return User::findOrFail($id);
        } catch (Exception $e) {
            Log::error("Failed to find data: " . $e->getMessage());
            throw new Exception("Data not found.");
        }
    }

    private function handleImageUpload(UserRequest $request, array &$data){
        if ($request->hasFile('image')) {
            $data['image'] = $this->imageHelper->handleUploadedImage($request->file('image'), 'images');
        }
    }

    private function handleImageUpdate(UserRequest $request, array &$data, User $user){
        if ($request->hasFile('image')) {
            $this->imageHelper->handleDeletedImage($user, 'image', 'images/');
            $data['image'] = $this->imageHelper->handleUploadedImage($request->file('image'), 'images');
        }
    }
}
