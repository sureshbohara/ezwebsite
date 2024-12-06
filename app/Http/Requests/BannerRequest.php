<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'banner_title' => 'required|string|max:255',
            'banner_sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'banner_link' => 'nullable',
            'order_level' => 'required|integer',
            'status' => 'nullable|integer|in:0,1',
        ];

        if ($this->isMethod('post')) {
            $rules['image'] = 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048';
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['image'] = 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        return $rules;
    }
}
