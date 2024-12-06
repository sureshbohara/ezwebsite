<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ServiceRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'whyChoose_ids' => 'nullable',
            'service_title'      => 'required|string|max:255',
            'slug'               => 'nullable',
            'service_sub_title'  => 'nullable|string|max:255',
            'excerpt'            => 'required',
            'display_on'        => 'required|string',
            'description'        => 'nullable|string',
            'service_feature' => 'nullable',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'feature_image'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order_level'        => 'required|integer|min:0',
            'status'             => 'nullable|boolean', 
            'meta_keywords'      => 'nullable|string|max:255',
            'meta_description'   => 'nullable',
        ];
    }



}
