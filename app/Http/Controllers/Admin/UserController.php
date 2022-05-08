<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(){
        $user = $this->userService->getAllUser();
        return view('administrator.user-2.list',[
            'title' => 'Quản Lý Người Dùng',
            'user' => $user
        ]);
    }

    public function filter(Request $request){
        $user = $this->userService->filter($request);
        return view('administrator.user-2.list',[
            'title' => 'Quản Lý Người Dùng',
            'user' => $user
        ]);
    }

    public function add(){
        return view('administrator.user-2.add',[
            'title' => 'Thêm Người Dùng',
        ]);
    }

    public function create(Request $request){
        $result = $this->userService->create($request);
        if($result){
            return redirect('/administrator/user');
        }
        return redirect()->back()->withInput();
     }


     public function show(User $user){
        $user = $this->userService->getUserById($user->user_id);
        return view('administrator.user-2.update',[
            'title' => 'Quản Lý Người Dùng',
            'user' => $user[0]
        ]);
     }

     public function update(User $user, Request $request){
       
         $result = $this->userService->update($user->user_id, $request);
         if($result){
            return redirect('/administrator/user/edit/'.$user->user_id);
        }
        return redirect()->back()->withInput();
     }


     
    public function delete(Request $request){
        $result = $this->userService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => "Đã xóa thành công !!!"
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => "Không thể xóa vì đã liên kết dữ liệu !!!"
            ]);
        }
    }
}
