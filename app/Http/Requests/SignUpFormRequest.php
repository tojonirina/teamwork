<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => ['bail', 'required', 'string', 'min:3', 'max:50', 'unique:accounts,fullname'],
            'email' => ['bail', 'required', 'email','min:8', 'max:60', 'unique:accounts,email'],
            'password' => ['bail', 'required', 'min:6', 'max:15', 'alpha_num'],
            'confirm_password' => ['bail', 'required', 'same:password'],
            'agree_for_policy' => ['required']
        ];
    }
}
