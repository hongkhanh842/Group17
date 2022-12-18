<?php

namespace App\Http\Requests\home\Auth;

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
            'name' =>[
                'required',
                'string',
                'min:1',
                'max:100',
            ],
            'email' =>[
                'unique:App\Models\User,email',
                'required',
                'email',
            ],
            'password' =>[
                'required',
                'string',
                'min:6',
                'max:255'
            ],

        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email đã được sử dụng',
        ];
    }
}

