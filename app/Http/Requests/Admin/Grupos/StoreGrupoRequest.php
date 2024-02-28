<?php

namespace App\Http\Requests\Admin\Grupos;

use Illuminate\Foundation\Http\FormRequest;

class StoreGrupoRequest extends FormRequest
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
            'administradora_id' =>  'required|exists:administradoras,id',
            'grupo'             =>  'required',
            'bem'               =>  'required',
            'credito'           =>  'required',
        ];
    }

    public function attributes() {
        return [
            'administradora_id' =>  'Administradora',
            'grupo'             =>  'Grupo',
            'bem'               =>  'Bem',
            'credito'           =>  'Crédito'
        ];
    }
}
