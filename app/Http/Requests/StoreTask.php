<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;


use Illuminate\Foundation\Http\FormRequest;

class StoreTask extends FormRequest
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
            'name' => 'required | string | max:255',
            'email' => 'required| string | email | max:255',
            'surname' => 'required | string | max:255',
            'town' => 'required | string | max:255',
            'address' => 'required | string',
            'area' => 'required | string | max:255',
            'county' => 'required | string | max:255',
            'description' =>'required | string  | max:255',
            'phone' => 'required | string',
            'user_id' => 'required | string'


        ];
    }
}
