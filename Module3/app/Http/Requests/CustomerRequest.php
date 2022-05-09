<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           'employeecode' =>'required|',
           'staffgroup'=>'required|',
           'fullname'=>'required',
           'Dateofbirth'=>'required',
           'phone'=>'required|',
           'CMND'=>'required|',
           'email'=>'required|',
           'address'=>'required|',
        ];
    }
    public function messages(){
        $messages = [
            'employeecode.required'=>'Trường này là bắt buộc',
            'staffgroup.required'=>'Trường này là bắt buộc',
            'fullname.required'=>'Trường này là bắt buộc',
            'Dateofbirth.required'=>'Trường này là bắt buộc',
            'phone.required'=>'Trường này là bắt buộc',
            'CMND.required'=>'Trường này là bắt buộc',
            'email.required'=>'Trường này là bắt buộc',
            'address.required'=>'Trường này là bắt buộc',
        ];
        return $messages;
    }
}
