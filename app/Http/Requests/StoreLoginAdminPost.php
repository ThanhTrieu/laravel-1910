<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginAdminPost extends FormRequest
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
            'username' => 'required|max:60',
            'password' => 'required|max:60'
        ];
    }

    public function messages()
    {
        // thong bao loi ra ngoai view
        return [
            'username.required' => 'Username khong duoc de trong',
            'username.max' => 'Username toi da khong qua :max ky tu',
            'password.required' => 'Password khong duoc de trong',
            'password.max' => 'Password toi da khong qua :max ky tu'
        ];
    }
}
