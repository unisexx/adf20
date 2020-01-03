<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'url'        => 'required',
            'start_date' => 'required',
            'end_date'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'url.required'        => 'url ห้ามเป็นค่าว่าง',
            'start_date.required' => 'วันที่เริ่ม ห้ามเป็นค่าว่าง',
            'end_date.required'   => 'วันที่สิ้นสุด ห้ามเป็นค่าว่าง',
        ];
    }

    public function validationData()
    {
        return $this->all();
    }
}
