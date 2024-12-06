<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'display_on' => 'required',
            'name' => 'required',
            'slug' => 'nullable|unique:pages,slug,' . ($this->route('page') ? $this->route('page')->id : 'NULL'),
            'excerpt' => 'required',
            'description' => 'nullable|string',
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order_level' => 'required|integer',
            'template' => 'required',
            'page_list' => 'nullable',
            'meta_keywords' => 'nullable',
            'meta_description' => 'nullable',
            'status' => 'nullable|integer|between:0,1',
        ];
    }
}
