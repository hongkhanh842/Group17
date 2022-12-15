<?php

namespace App\Http\Requests\admin\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            ],
            'email' =>[
                'required',
                'email:rfc,dns',
            ],
            'phone' =>[
                'required',
                'regex:((09|03|07|08|05)+([0-9]{8})\b)',
                Rule::unique('users','phone')->ignore($this->id),
            ],
            'address' =>[
                'string',
            ],
            'avatar' =>[
                'image',
            ],
        ];
    }
}
