<?php

namespace App\Http\Controllers\BackendAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLoginAdminPost as LoginPost;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function login(LoginPost $request)
    {
        dd($request->all());
    }
}
