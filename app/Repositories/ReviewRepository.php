<?php

namespace App\Repositories;

use App\Models\Review;
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Http\Requests\ReviewRequest;

class ReviewRepository
{
    protected ImageHelper $imageHelper;

    public function __construct(ImageHelper $imageHelper)
    {
        $this->imageHelper = $imageHelper;
    }

    // Create a new review with an optional image
    public function createData(ReviewRequest $request)
    {
        try {
            $data = $request->validated();
            $this->handleImageUpload($request, $data);
            return Review::create($data);
        } catch (Exception $e) {
            Log::error("Error creating review: " . $e->getMessage());
            throw new Exception("Failed to create review: " . $e->getMessage());
        }
    }

    public function updateData(Review $review, ReviewRequest $request)
    {
        try {
            $data = $request->validated();
            $this->handleImageUpdate($request, $data, $review);
            $review->update($data);
            return $review;
        } catch (Exception $e) {
            Log::error("Error updating review: " . $e->getMessage());
            throw new Exception("Failed to update review: " . $e->getMessage());
        }
    }

    public function delete(Review $review)
    {
        try {
            $this->imageHelper->handleDeletedImage($review, 'image', 'images/');
            $review->delete();
        } catch (Exception $e) {
            Log::error("Failed to delete review: " . $e->getMessage());
            throw new Exception("Failed to delete review: " . $e->getMessage());
        }
    }

    public function find(int $id)
    {
        try {
            return Review::findOrFail($id);
        } catch (Exception $e) {
            Log::error("Failed to find review: " . $e->getMessage());
            throw new Exception("Review not found: " . $e->getMessage());
        }
    }

    // Handle image upload for a new review
    private function handleImageUpload(ReviewRequest $request, array &$data)
    {
        if ($request->hasFile('image')) {
            $data['image'] = $this->imageHelper->handleUploadedImage($request->file('image'), 'images');
        }
    }

    // Handle image update for an existing review
    private function handleImageUpdate(ReviewRequest $request, array &$data, Review $review)
    {
        if ($request->hasFile('image')) {
            $this->imageHelper->handleDeletedImage($review, 'image', 'images/');
            $data['image'] = $this->imageHelper->handleUploadedImage($request->file('image'), 'images');
        }
    }
}