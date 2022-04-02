<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\NongNghiepService\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {   
        $this->userService = $userService;
    }

    public function index(){
        return view('nongnghiepxanh.user.signin',[
            'title' => 'Đăng Nhập Nông Nghiệp Xanh'
        ]);
    }

    public function store(Request $request){
   
        if (Auth::guard('user')->attempt([
            'user_email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $request->input('remember'))) {

            dd('đăng nhập thành công');
           
        } else {

            dd('tài khoản và mật khẩu chưa chính xác');
            
        }
    }
}
