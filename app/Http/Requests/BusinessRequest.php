<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
{
    
    public function authorize(): bool
    {
       
        return auth()->check();
    }

   
    public function rules(): array
    {
        return [
            'user_id'  => 'nullable',
            'business_name' => 'required|string|max:255',
            'website' => 'required',
            'domain_request' => 'nullable|string',
            'owner_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            's_date' => 'nullable|date',
            'e_date' => 'nullable|date',
            'designing_cost' => 'nullable|numeric',
            'hosting_cost' => 'nullable|numeric',
            'details' => 'nullable|string',
            'card_name' => 'nullable|string',
            'card_number' => 'nullable|string',
            'expiration_date' => 'nullable|string',
            'security_code' => 'nullable|string',
            'billing_address' => 'nullable|string',
            'business_status' => 'nullable|string',
        ];
    }
}
