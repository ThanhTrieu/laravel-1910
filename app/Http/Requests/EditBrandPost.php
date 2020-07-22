<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EditBrandPost extends FormRequest
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
     * @param Request $request
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        return [
            'nameBrand' => 'required|unique:brands,name,'.$id,
            'statusBrand' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'nameBrand.required' => 'Ten thuong hieu khong duoc trong',
            'nameBrand.unique' => 'Ten thuong hieu da ton tai, vui long chon ten khac',
            'statusBrand.required' => 'Vui long chon trang thai thuong hieu',
            'statusBrand.numeric' => 'Gia tri luu tru phai la so cho trang thai thuong hieu'
        ];
    }
}
