<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>['required','string','max:255'],
            'email'=>['required','email','unique:admins'],
            'password'=>['required','min:8','confirmed'],
            'password_confirmation'=>['required'],
            'phone'=>['required','regex:/01[0125][0-9]{8}$/','unique:admins'],
            'gender'=>['required','in:m,f'],
            'device_name'=>['required'],
            'device_os'=>['required','in:1,0']
        ];
    }
}
