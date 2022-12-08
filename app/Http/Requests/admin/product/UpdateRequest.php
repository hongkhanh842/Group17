<?php

namespace App\Http\Requests\admin\product;

use Illuminate\Foundation\Http\FormRequest;

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
                'unique:App\Models\Product,name',
            ],
            'image' =>[
                'image',
            ],
            'quantity' =>[
                'required',
                'integer',
                'min:0',
            ],
            'price' =>[
                'required',
                'min:0',
            ],
            'ram' =>[
                'required',
            ],
            'ssd' =>[
                'required',
            ],
            'cpu' =>[
                'required',
            ],
            'use' =>[
                'required',
            ],
        ];
    }
}
