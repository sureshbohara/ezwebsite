<?php

namespace App\Repositories;
use App\Models\Gallery;
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Http\Requests\GalleryRequest;

class GalleryRepository
{
    protected ImageHelper $imageHelper;

    public function __construct(ImageHelper $imageHelper){
        $this->imageHelper = $imageHelper;
    }


    public function createGallery(GalleryRequest $request){
        try {
            $data = $request->validated();
            $this->setDefaultMetaFields($request, $data);
            $this->handleImageUpload($request, $data);
            return Gallery::create($data);
        } catch (Exception $e) {
            Log::error("Error creating gallery: " . $e->getMessage());
            throw new Exception("Failed to create gallery: " . $e->getMessage());
        }
    }

    public function updateGallery(Gallery $gallery, GalleryRequest $request){
        try {
            $data = $request->validated();
            $this->setDefaultMetaFields($request, $data, $gallery);
            $this->handleImageUpdate($request, $data, $gallery);
            $gallery->update($data);
            return $gallery;
        } catch (Exception $e) {
            Log::error("Error updating gallery: " . $e->getMessage());
            throw new Exception("Failed to update gallery: " . $e->getMessage());
        }
    }

    public function deleteGallery(Gallery $gallery){
        try {
            $this->imageHelper->handleDeletedImage($gallery, 'image', 'images/');
            $gallery->delete();
        } catch (Exception $e) {
            Log::error("Failed to delete gallery: " . $e->getMessage());
            throw new Exception("Failed to delete gallery: " . $e->getMessage());
        }
    }

    public function findGallery(int $id){
        try {
            return Gallery::findOrFail($id);
        } catch (Exception $e) {
            Log::error("Failed to find gallery: " . $e->getMessage());
            throw new Exception("Gallery not found: " . $e->getMessage());
        }
    }


    private function handleImageUpload(GalleryRequest $request, array &$data){
        if ($request->hasFile('image')) {
            $data['image'] = $this->imageHelper->handleUploadedImage($request->file('image'), 'images');
        }
    }


    private function handleImageUpdate(GalleryRequest $request, array &$data, Gallery $gallery){
        if ($request->hasFile('image')) {
            $this->imageHelper->handleDeletedImage($gallery, 'image', 'images/');
            $data['image'] = $this->imageHelper->handleUploadedImage($request->file('image'), 'images');
        }
    }

    private function setDefaultMetaFields(GalleryRequest $request, array &$data){
        $data['alt'] = $data['alt'] ?? $data['name'];
    }

}