<?php

namespace App\Repositories;

use App\Models\Banner;
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Http\Requests\BannerRequest;

class BannerRepository
{
    protected $imageHelper;

    public function __construct(ImageHelper $imageHelper)
    {
        $this->imageHelper = $imageHelper;
    }

    // Create a new banner with an optional image
    public function createData(BannerRequest $request)
    {
        try {
            $data = $request->validated();
            $this->handleImageUpload($request, $data);
            $banner = Banner::create($data); 
            return $banner;
        } catch (Exception $e) {
            Log::error("Error creating banner: " . $e->getMessage());
            throw new Exception("Failed to create banner.");
        }
    }

    // Update an existing banner and its image if provided
    public function updateData(Banner $banner, BannerRequest $request){
        try {
            $data = $request->validated();
            $this->handleImageUpdate($request, $data, $banner);
            $banner->update($data);
            return $banner;
        } catch (Exception $e) {
            Log::error("Error updating banner: " . $e->getMessage());
            throw new Exception("Failed to update banner.");
        }
    }

    // Delete a banner and its associated image
    public function delete(Banner $banner)
    {
        try {
            $this->imageHelper->handleDeletedImage($banner, 'image', 'images/');
            $banner->delete();
        } catch (Exception $e) {
            Log::error("Failed to delete banner: " . $e->getMessage());
            throw new Exception("Failed to delete banner.");
        }
    }

    // Find a banner by ID or throw an exception
    public function find(int $id)
    {
        try {
            return Banner::findOrFail($id);
        } catch (Exception $e) {
            Log::error("Failed to find banner: " . $e->getMessage());
            throw new Exception("Banner not found.");
        }
    }

    // Handle image upload for creating a banner
    private function handleImageUpload(BannerRequest $request, array &$data)
    {
        if ($request->hasFile('image')) {
            $data['image'] = $this->imageHelper->handleUploadedImage($request->file('image'), 'images');
        }
    }

    // Handle image update for an existing banner
    private function handleImageUpdate(BannerRequest $request, array &$data, Banner $banner)
    {
        if ($request->hasFile('image')) {
            $this->imageHelper->handleDeletedImage($banner, 'image', 'images/');
            $data['image'] = $this->imageHelper->handleUploadedImage($request->file('image'), 'images');
        }
    }
}