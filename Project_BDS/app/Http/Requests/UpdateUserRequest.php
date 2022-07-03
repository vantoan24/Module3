<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required',
            'gender' => 'required',
            // 'day_of_birth' => 'required',
            'address' => 'required',
            'phone' => 'required',
            // 'avatar' => 'required',
            // 'password' => 'required',
            // 'start_day' => 'required',
            'user_group_id' => 'required',
            'branch_id' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            // 'note' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên nhân viên',
            'gender.required' => 'Vui lòng nhập giới tính',
            // 'day_of_birth.required' => 'Vui lòng nhập ngày sinh',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            // 'avatar.required' => 'Vui lòng chọn ảnh',
            'password.required' => 'Vui lòng nhập mật khẩu',
            // 'start_day.required' => 'Vui lòng nhập ngày làm việc',
            'user_group_id.required' => 'Vui lòng nhập nhóm nhân viên',
            'branch_id.required' => 'Vui lòng nhập chi nhánh',
            'province_id.required' => 'Vui lòng nhập Tỉnh/Thành phố',
            'district_id.required' => 'Vui lòng nhập Quận/Huyện',
            'ward_id.required' => 'Vui lòng nhập Xã/Phường',
            // 'note.required' => 'Vui lòng nhập ghi chú'
        ];
    }
}