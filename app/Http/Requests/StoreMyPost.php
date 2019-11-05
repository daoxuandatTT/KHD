<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMyPost extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'mode' => 'required',
            'image' => 'required',
            'link' => 'required',
            'material' => 'required',
            'recipe' => 'required',
        ];
    }
    public function messages()
    {
        $message = [
            'title.required' => 'Tiêu đề không được để được trống',
            'description.required' => 'Miêu tả không được để trống',
            'mode.required' => 'Chế độ không được để trống',
            'image.required' => 'Ảnh không được để trống',
            'link.required' => 'Video không được để trống',
            'material.required' => 'Nguyên liệu không được để trống',
            'recipe.required' => 'Công thức không được để trống'
        ];
        return $message;
    }
}
