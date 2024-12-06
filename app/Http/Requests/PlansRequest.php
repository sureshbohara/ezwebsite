<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlansRequest extends FormRequest
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
            'price' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'package_feature' => 'nullable',
            'bg_color' => 'nullable|string|max:7',
            'order_level' => 'nullable|integer',
            'status' => 'nullable|in:0,1',
        ];
    }

  
}
