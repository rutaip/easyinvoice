<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CustomerRequest extends Request
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
            'name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'phone' => 'required|numeric|min:3',
            'mobile' => 'numeric|min:3',
            'fax' => 'numeric|min:3',
            'zip' => 'numeric',
            'email' => 'email',

        ];
    }
}
