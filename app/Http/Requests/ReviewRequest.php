<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'email'       => 'nullable',
            'address'     => 'nullable|string|max:255',
            'rating'      => 'required|integer|min:1|max:5',
            'review'      => 'required',
            'content'      => 'required',
            'image'       => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'display_on'  => 'required',
            'order_level' => 'required|integer|min:0',
            'status' => 'nullable|integer|in:0,1',
        ];
    }
}
