<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CarRequest extends Request
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
            'make' => 'required|min:3',
            'model' => 'required|min:3',
            'year' => 'required|numeric|min:4',
            'customer_id' => 'required|numeric',
        ];
    }
}
