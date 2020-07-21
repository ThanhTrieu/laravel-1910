<?php

namespace App\Http\Controllers\BackendAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use voku\helper\AntiXSS;
use App\Http\Requests\StoreLoginAdminPost as LoginPost;
use Illuminate\Support\Facades\DB;

class LoginAdminController extends Controller
{
    public function index(Request $request)
    {
        $msgErr = $request->session()->get('errAdminLogin');
        // $msgErr = $_SESSION['errAdminLogin'] ?? '';
        return view('admin.login.index', compact('msgErr'));
    }

    public function login(LoginPost $request, AntiXSS $antiXSS)
    {
        $username = $request->username;
        $username = $antiXSS->xss_clean($username);

        $password = $request->password;
        $password = $antiXSS->xss_clean($password);

        $infoAdmin = DB::table('admins')
                        ->where('username', $username)
                        ->where('password', $password)
                        ->where('status', 1)
                        ->first();
        if($infoAdmin){
            // login thanh cong
            // luu thong tin cua admin vao session de tien cho cac cong viec sau nay
            $request->session()->put('usernameAdmin', $infoAdmin->username);
            // $_SESSION['username'] = $infoAdmin->username;
            $request->session()->put('emailAdmin', $infoAdmin->email);
            $request->session()->put('idAdmin', $infoAdmin->id);
            $request->session()->put('roleAdmin', $infoAdmin->role);
            $request->session()->put('phoneAdmin', $infoAdmin->phone);
            // cho vao trang dashboard
            return redirect()->route('admin.dashboard');
        } else {
            // tao ra session thong bao loi - khi refresh lai trang se mat thong bao loi
            $request->session()->flash('errAdminLogin', 'Username or password invalid');
            // quay lai dung form login
            return redirect()->route('admin.login');
        }
    }

    public function logout(Request $request)
    {
        // xoa het cac session
        $request->session()->forget('usernameAdmin');
        $request->session()->forget('emailAdmin');
        $request->session()->forget('idAdmin');
        $request->session()->forget('roleAdmin');
        $request->session()->forget('phoneAdmin');
        // quay lai form login
        return redirect()->route('admin.login');
    }
}
