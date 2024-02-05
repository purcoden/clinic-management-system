<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStaffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'no_izin' => 'required',
            'email' => 'required|email:filter|unique:users,email',
            'contact' => 'nullable|unique:users,contact',
            'password' => 'required|same:password_confirmation|min:6',
            'profile_image' => 'nullable|mimes:jpeg,jpg,png|max:2000',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'profile_image.max' => 'Profile size should be less than 2 MB',
        ];
    }
}
