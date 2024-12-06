<?php

namespace App\Repositories;

use App\Models\Setting;
use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SettingRepository
{
    public function updateData(int $id, array $data)
    {
        $setting = Setting::find($id);
        
        if (!$setting) {
            throw new ModelNotFoundException("Setting not found");
        }

        // Image fields to handle
        $image_fields = [
            'logo', 'favicon', 'loader', 'bg_image', 'footer_gateway_img', 
            'breadcrumb', 'image1', 'image2', 'image3', 'image4', 'image5', 'image6'
        ];

        // Process each image field if provided
        foreach ($image_fields as $image_field) {
            if (isset($data[$image_field])) {
                $file = $data[$image_field];
                // Handle the uploaded image (including deleting old ones)
                $data[$image_field] = ImageHelper::handleUploadedImage($file, 'images', $setting, $image_field);
            }
        }

        // Update the setting with the new data
        $setting->update($data);

        return $setting;
    }
}
