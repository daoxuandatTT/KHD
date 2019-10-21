<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComment extends FormRequest
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
            'content' => 'required|max:255|min:3',
        ];
    }

    public function messages()
    {
        return $message = [
            'content.required' => 'May not be blank',
            'comment.min:3' => 'Must be at least 3 characters',
            'content.max:255' => 'Must be no more than 255 characters',
        ];
    }
}
