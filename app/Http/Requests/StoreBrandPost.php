<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandPost extends FormRequest
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
            'nameBrand' => 'required|max:100',
            'logoBrand' => 'required|mimes:jpeg,bmp,png,jpg'
        ];
    }

    public function messages()
    {
        return [
            'nameBrand.required' => 'Ten thuong hieu khong duoc trong',
            'nameBrand.max' => 'Ten thuong hieu khong vuot qua :max ky tu',
            'logoBrand.required' => 'Nhap logo thuong hieu',
            'logoBrand.mimes' => 'Dinh dang logo la anh: jpeg,bmp,png,jpg'
        ];
    }
}
