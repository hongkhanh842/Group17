<?php

namespace App\Http\Requests\home\order;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
                'required',
                'email',
            ],
            'phone' =>[
                'required',
                'regex:((09|03|07|08|05)+([0-9]{8})\b)',
            ],
            'address' =>[
                'required',
                'string',
            ],
        ];
    }
}
