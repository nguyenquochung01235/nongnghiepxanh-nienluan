<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserService{

    public function getAllUser(){
        return User::paginate(15);
    }


    public function getUserById($user_id){
        return User::where('user_id', $user_id)->get();
    }

    public function filter($request){
        $filter  = $request->input('filterBy');
        return User::where( $filter, 'like', "%". $request->input('seachTitle') ."%")
                    ->paginate(10)->withQueryString();;
    }


    public function create($request){
        try {
            $checkEmail =User::where('user_email',trim($request->input('user_email')))->count();
            $checkPhone =User::where('user_phone',trim($request->input('user_phone')))->count();
            

            if($checkEmail){
                Session::flash('error', 'Email Đã Tồn Tại !!! ');
                return false;
            }
            if($checkPhone){
                Session::flash('error', 'Số Điện Thoại Đã Tồn Tại !!! ');
                return false;
            }         

            $request->except('_token');
           User::create([
                'user_name' => $request->input('user_name'),
                'user_email' => $request->input('user_email'),
                'password' => bcrypt($request->input('password')),
                'user_phone' => $request->input('user_phone'),
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


    public function update($user_id, $request){
        
        try {
            $user = User::where('user_id', $user_id)->first();
            $request->except('_token');
            $user->user_name = $request->input('user_name');
            $user->user_phone = $request->input('user_phone');
            if($request->input('password') != null){
                $user->password = bcrypt($request->input('password'));
            }
            if($request->input('active') != null){
                $user->user_active = 1;
            }else{
                $user->user_active = 0;
            }
            $user->updated_at =  date('Y-m-d H:i:s');
            
            $user->save();

            Session::flash('success', 'Cập Nhật Thông Tin Thành Công !!! ' );
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Thông Tin Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    
    public function delete($request){
        $user = User::where('user_id', $request->input('id'))->first();
        if($user){
            $user->delete();
            return true;
        }
        return false;
    }



    
}