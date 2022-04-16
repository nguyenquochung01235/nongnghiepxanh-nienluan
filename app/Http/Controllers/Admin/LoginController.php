<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index(){
        return view('administrator.user.login',[
            'title'=>'Đăng Nhập Hệ Thống Quản Trị'
        ]);
    }

    public function store(LoginFormRequest $request ){
        if (Auth::attempt([
            'admin_email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $request->input('remember'))){
            
            if(Auth::user()->admin_active){
                
                return redirect()->route('dashboard');
                // return dd($this->adminService->infor($request));
            }
            Session::flash('error', 'Tài khoản đã bị khóa, vui lòng liên hệ quản trị viên');
            return redirect()->back();
        }
        Session::flash('error', 'Sai tài khoản hoặc mật khẩu');
        return redirect()->back();
    }


    public function logout(){
            Auth::logout();
        return redirect()->route('login');
    }

}
