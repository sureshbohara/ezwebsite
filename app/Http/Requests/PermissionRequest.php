<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class PermissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'permission' => 'required|array',  
            'role_id' => 'required|exists:roles,id', 
        ];
    }

    public function messages(): array
    {
        return [
            'permission.required' => 'The permission field is required.',
            'role_id.required' => 'The role field is required.',
            'role_id.exists' => 'The selected role is invalid.',
        ];
    }
}
