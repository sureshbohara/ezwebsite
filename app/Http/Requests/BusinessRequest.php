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
            'business_type' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'owner_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            
            'website' => 'nullable',
            'domain_request' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
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
