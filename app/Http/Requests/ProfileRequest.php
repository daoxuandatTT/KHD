<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileRequest extends FormRequest
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
//            'image' => 'required',
            'name' => 'required|min:3',
            'job' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'address' => 'required',
            'phone' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return $message = [
//            'image.required' => 'Không được để trống',
            'name.required' => 'Tên người dùng không được để trống',
            'name.min:3' => 'Tên người dùng không được ít hơn 3 kí tự',
            'job.required' => 'Không được để trống',
            'gender.required' => 'Không được để trống',
            'dob.required' => 'Không được để trống',
            'dob.date'=>'Không đúng định dạng ngày tháng yyyy-mm-dd',
            'address.required' => 'Không được để trống',
            'phone.required' => 'Không được để trống',
            'phone.numeric'=>'Nhập đúng định dạng số',
        ];
    }
}

