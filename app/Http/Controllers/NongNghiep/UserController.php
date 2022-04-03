<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function account(User $user){
        return view('nongnghiepxanh.user.account',[
            'title' => 'Thông tin tài khoản',
            'user'=> $user
        ]);
    }
}
