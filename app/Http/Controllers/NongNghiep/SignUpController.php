<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\NongNghiepService\UserService;
use Illuminate\Http\Request;

class SignUpController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {   
        $this->userService = $userService;
    }

    public function index(){
        return view('nongnghiepxanh.user.signup',[
            'title' => 'Đăng Ký Tài Khoản Nông Nghiệp Xanh'
        ]);
    }

    public function create(Request $request){
       $result = $this->userService->create($request);
       if($result){
           return redirect('/sign-in');
       }
       return redirect()->back()->withInput();
    }
}
