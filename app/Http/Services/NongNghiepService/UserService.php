<?php

namespace App\Http\Services\NongNghiepService;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function infor($user_id){
       return User::with('commune.district.province')->where('user_id', $user_id)->get();

    }

    // public function uploadImg($request, $id)
    // {
    //     if ($request->hasFile('file')) {
    //         try {
    //             $type = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_EXTENSION);
    //             // $pathFull = 'uploads/' . date("Y/m/d");
    //             $name = 'avatar-'. $id .'.'.$type;
    //             $pathFull = 'uploads/user';

    //             $request->file('file')->storeAs(
    //                 'public/' . $pathFull, $name
    //             );

    //             return '/storage/' . $pathFull . '/' . $name;
    //         } catch (\Exception $error) {
    //             return false;
    //             // return false;
    //         }
    //     }
    // }


    public function uploadImg($request)
    {
        if ($request->hasFile('file')) {
            try {
                // $type = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_EXTENSION);
                // $pathFull = 'uploads/' . date("Y/m/d");
                $name = date("Y-m-d-H-m-s").$request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/user';

                $request->file('file')->storeAs(
                    'public/' . $pathFull, $name
                );

                return '/storage/' . $pathFull . '/' . $name;

            } catch (\Exception $error) {
                return false;
            }
        }
    }


    public function update($user_id, $request){
        
        try {
            // return dd($request->all());
            $user = User::where('user_id', $user_id)->first();
            $request->except('_token');
            $request->except('email');
            $user->user_name = $request->input('name');
            $user->user_phone = $request->input('phone');
            $user->user_address = $request->input('commune');
            $user->user_birthday = $request->input('birthday');
            $user->user_gender = $request->input('gender');
            $user->user_avatar = $request->input('user_avatar');
            $user->updated_at =  date('Y-m-d H:i:s');
            $user->save();

            Session::flash('success', 'Cập Nhật Thông Tin Thành Công !!! ' );
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Thông Tin Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function changePassword($user_id, $request){
        try {
    
            $user = User::where('user_id', $user_id)->first();
            $check = Hash::check($request->input('currentPassword'), $user->password);
            if($check){
                if($request->input('newPassword') == $request->input('confirmPassword')){
                    $user->password = bcrypt($request->input('newPassword'));
                    $user->save();
                    Session::flash('success', 'Cập Nhật Mật Khẩu Thành Công !!! ' );
                }else{
                    Session::flash('error', 'Mật Khẩu Không Khớp !!! ' );
                }
            }else{
                Session::flash('error', 'Mật Khẩu Cũ Không Đúng !!! ' );
            }
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Thông Tin Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;


    }
}