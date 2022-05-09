<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'title' => 'required|max:5',
            'body' => 'required|max:5',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Bắt buộc nhập',
            'title.unique' => 'tiêu đề đã bị trùng',
            'title.max' => 'vượt quá giới hạn kí tự',
            'body.required' => 'Bắt buộc nhập',
            'body.max' => 'vượt quá giới hạn kí tự',
        ];
    }
}