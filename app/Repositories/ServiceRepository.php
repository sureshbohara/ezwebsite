<?php

namespace App\Repositories;
use App\Models\Service;
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Http\Requests\ServiceRequest;
class ServiceRepository
{
    protected $imageHelper;

    public function __construct(ImageHelper $imageHelper){
        $this->imageHelper = $imageHelper;
    }

    // Create new service
    public function createData(ServiceRequest $request){
        try {
            $data = $request->validated();
            $this->handleImage($request, $data);
            $this->setDefaultMetaFields($data);
            $this->handleList($data);
            return Service::create($data);
        } catch (Exception $e) {
            Log::error("Error creating service data: " . $e->getMessage());
            throw new Exception("Failed to create service.");
        }
    }

    // Update existing service
    public function updateData(Service $service, ServiceRequest $request){
        try {
            $data = $request->validated();
            $this->handleImage($request, $data, $service);
            $this->setDefaultMetaFields($data);
            $this->handleList($data);
            $service->update($data);
            return $service;
        } catch (Exception $e) {
            Log::error("Error updating service data: " . $e->getMessage());
            throw new Exception("Failed to update service.");
        }
    }

    // Delete service
    public function delete(Service $service){
        try {
            $this->imageHelper->handleDeletedImage($service, 'image', 'images/');
            $service->delete();
        } catch (Exception $e) {
            Log::error("Error deleting service data: " . $e->getMessage());
            throw new Exception("Failed to delete service.");
        }
    }

    // Find a service by ID
    public function find(int $id){
        try {
            return Service::findOrFail($id);
        } catch (Exception $e) {
            Log::error("Error finding service: " . $e->getMessage());
            throw new Exception("Service not found.");
        }
    }

    // Set default meta fields if not provided
    private function setDefaultMetaFields(array &$data){
        $data['order_level'] = $data['order_level'] ?? 0;
        $data['meta_keywords'] = $data['meta_keywords'] ?? $data['service_title'];
        $data['meta_description'] = $data['meta_description'] ?? $data['excerpt'];
    }

    // Handle service feature list


     private function handleList(array &$data){
        if (isset($data['service_feature'])) {
            $serviceList = array_map('trim', $data['service_feature']);
            $data['service_feature'] = $serviceList;
        }
    }

    // Handle image upload logic
    private function handleImage(ServiceRequest $request, array &$data, Service $service = null){

        if ($request->hasFile('image')) {
            if ($service) {
                $this->imageHelper->handleDeletedImage($service, 'image', 'images/');
            }
            $data['image'] = $this->imageHelper->handleUploadedImage($request->file('image'), 'images');
        }

        if ($request->hasFile('feature_image')) {
            if ($service) {
                $this->imageHelper->handleDeletedImage($service, 'feature_image', 'images/');
            }
            $data['feature_image'] = $this->imageHelper->handleUploadedImage($request->file('feature_image'), 'images');
        }

    }


}
