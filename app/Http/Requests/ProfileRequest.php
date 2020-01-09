<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'display_name'         => 'required',
            'introduce'            => 'required',
            'province_id'          => 'required',
            'sex_id'               => 'required',
            'birth_date'           => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'display_name.required' => 'ชื่อ ห้ามเป็นค่าว่าง',
            'introduce.required'    => 'แนะนำตัว ห้ามเป็นค่าว่าง',
            'province_id.required'  => 'จังหวัด ห้ามเป็นค่าว่าง',
            'sex_id.required'       => 'เพศ ห้ามเป็นค่าว่าง',
            'birth_date.required'   => 'วันเกิด ห้ามเป็นค่าว่าง',
        ];
    }

    public function validationData()
    {
        return $this->all();
    }
}
