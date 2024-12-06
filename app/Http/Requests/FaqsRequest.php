<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqsRequest extends FormRequest
{
    // Check if the user is authorized to make this request
    public function authorize(): bool
    {
        return true;
    }

    // Validation rules for storing/updating FAQ
    public function rules(): array
    {
        return [
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'display_on' => 'required|string',
            'order_level' => 'nullable|numeric',
            'status' => 'nullable|integer|in:0,1',
        ];
    }
}
