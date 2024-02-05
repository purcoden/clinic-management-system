<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClinicRequest extends FormRequest
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
            'name' => 'required',
            'no_izin' => 'required',
            'address' => 'required',
            'link_map' => 'required',
            'email' => 'required|email:filter|unique:users,email',
            'phone' => 'nullable|unique:users,contact',
            'no_wa' => 'nullable|unique:users,contact',
            'password' => 'required|same:password_confirmation|min:6',
            'role' => 'required',
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
