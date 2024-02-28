<?php

namespace App\Http\Requests\GOL\Lances;

use Illuminate\Foundation\Http\FormRequest;

class StoreLanceRequest extends FormRequest
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
            'grupo'             =>  'required',
            'cota'              =>  'required',
            'credito'           =>  'required',
            'lance-embutido'    =>  'nullable',
            'lance-proprio'     =>  'nullable',
            'lance-total'       =>  'nullable',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'lance-embutido'    => 'Lance Embutido',
            'lance-proprio'     => 'Lance Próprio',
            'lance-total'       => 'Lance Total',
        ];
    }
}
