<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'display_on' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'menu_icon' => 'nullable',
            'url' => 'required',
            'is_cms_page' => 'nullable',
            'parent_id' => 'nullable|string',
            'order_level' => 'required',
            'status' => 'nullable|integer|in:0,1',
        ];
    }
}
