<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'display_on' => 'required|string|max:255',
            'alt' => 'nullable|string|max:255',
            'order_level' => 'required|integer',
            'status' => 'nullable|boolean',
        ];

        // Additional rules for POST (create) request
        if ($this->isMethod('post')) {
            $rules['image'] = 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        // Additional rules for PUT/PATCH (update) request
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['image'] = 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        return $rules;
    }
}
