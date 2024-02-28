<?php

namespace App\Http\Requests\GOL\Administradoras;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdministradoraRequest extends FormRequest
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
            'administradora'    =>  'required|string|min:3',
            'assembleia'        =>  'required|integer',
        ];
    }
}
