<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'gender' => 'required',
            'address' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return $message = [
            'name.required' => 'Name may not be blank',
            'name.min:3' => 'Name must be at least 3 characters',
            'email.required' => 'Email may not be blank',
            'email.email' => 'Email@gmail.com',
            'email.unique' => 'Email already exists',
            'password.required' => 'May not be blank',
            'password.min:8' => 'Pass must be at least 3 characters',
            'gender' => 'May not be blank',
            'address.required' => 'May not be blank',
            'address.min:5' => 'Address must be at least 3 characters'
        ];
    }
}
