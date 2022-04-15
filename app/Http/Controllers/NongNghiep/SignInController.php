<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\NongNghiepService\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SignInController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {   
        $this->userService = $userService;
    }

    public function index(){
        session(['link_user' => url()->previous()]);
        return view('nongnghiepxanh.user.signin',[
            'title' => 'Đăng Nhập Nông Nghiệp Xanh'
        ]);
    }

    public function store(Request $request){
   
        if (Auth::guard('user')->attempt([
            'user_email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $request->input('remember'))) {
            if(session('link_user') && (session('link_user') != "http://127.0.0.1:8000/sign-up")){
                // return dd(session('link_user'));
                return redirect(session('link_user'));
            }
            return redirect('/');
           
        } else {
            Session::flash('error', 'Đăng nhập không thành công !!! ' );
            return redirect()->back();
            
        }
    }

    public function logout(){
        Auth::guard('user')->logout();
        if(session('link_user')){
            return redirect(session('link_user'));
        }
        return redirect('/');
    }
}
