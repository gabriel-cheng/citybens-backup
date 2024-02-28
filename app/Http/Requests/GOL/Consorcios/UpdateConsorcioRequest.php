<?php

namespace App\Http\Requests\GOL\Consorcios;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConsorcioRequest extends FormRequest
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
            'cliente'           =>  'required',
            'consultor'         =>  'required|exists:users,id',
            'cota'              =>  'required',
            'credito'           =>  'required',
        ];
    }
}
