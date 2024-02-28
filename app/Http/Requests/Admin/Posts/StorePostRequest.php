<?php

namespace App\Http\Requests\Admin\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'cover'             => ['required', 'file', 'mimes:jpeg,png,jpg,webp', 'max:10240'],
            'title'             => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string'],
            'description'       => ['required', 'string'],
        ];
    }
}
