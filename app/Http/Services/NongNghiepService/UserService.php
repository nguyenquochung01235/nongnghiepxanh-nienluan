<?php

namespace App\Http\Services\NongNghiepService;

use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserService{
    public function create($request){
        try {
            $checkEmail =User::where('user_email',trim($request->input('email')))->count();
            $checkPhone =User::where('user_phone',trim($request->input('phone')))->count();
            

            if($checkEmail){
                Session::flash('error', 'Email Đã Tồn Tại !!! ');
                return false;
            }
            if($checkPhone){
                Session::flash('error', 'Số Điện Thoại Đã Tồn Tại !!! ');
                return false;
            }
            
            if($request->input('password') != $request->input('re-password')){
                Session::flash('error', 'Mật khẩu không trùng nhau !!! ');
                return false;
            }
           

            $request->except('_token');
           User::create([
                'user_name' => $request->input('name'),
                'user_email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'user_phone' => $request->input('phone'),
                'user_active' => 1,
                'user_avatar' => '/storage/uploads/user/avatar-new-user.jpg'
            ]);

           
            Session::flash('success', 'Tạo Tài Khoản Mới Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Tạo Tài Khoản Mới Không Thành Công !!! <hr>' . $err->getMessage());
            return  false;
        }
        return true;
    }
}