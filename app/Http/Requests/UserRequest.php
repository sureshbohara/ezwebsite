<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all users for now, customize as needed
    }

    public function rules()
    {
        $rules = [
            'role_id' => 'required|integer|exists:roles,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'gender' => 'nullable|string|in:male,female,other',
            'info' => 'nullable|string|max:500',
            'status' => 'nullable|in:0,1',
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        if ($this->isMethod('post')) { 
            $rules['email'] = 'required|email|unique:admins,email';
            $rules['password'] = 'required|min:8'; 
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) { 
            $rules['email'] = 'required' . $this->route('admin');
            $rules['password'] = 'nullable|min:8';
        }

        return $rules;
    }
}
