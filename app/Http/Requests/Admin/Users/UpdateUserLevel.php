<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserLevel extends FormRequest
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
            'level'             =>  'required',
            'coordinator_id'    =>  'nullable|required_if:level,seller',
        ];
    }

    public function attributes()
    {
        return [
            'level'             =>  'Nível',
            'coordinator_id'    =>  'Coordenador',
        ];
    }
}
