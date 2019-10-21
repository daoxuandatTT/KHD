<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePost extends FormRequest
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
            'material' => 'required',
            'recipe' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return $message = [
            'name.required' => 'Name may not be blank',
            'name.min:3' => 'Name must be at least 3 characters',
            'material.required' => 'May not be blank',
            'recipe.required' => 'May not be blank',
            'description.required' => 'May not be blank',
        ];
    }


}
