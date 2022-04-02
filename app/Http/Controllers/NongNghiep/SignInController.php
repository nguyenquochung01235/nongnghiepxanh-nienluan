<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\NongNghiepService\UserService;
use Illuminate\Http\Request;

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

    public function create(Request $request){
        return dd($request->all());
    }
}
