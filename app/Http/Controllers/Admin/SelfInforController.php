<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\AdminService;
use App\Models\Admin;
use Illuminate\Http\Request;

class SelfInforController extends Controller
{

    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index($id){
        $admin = $this->adminService->infor($id);
        // return dd($admin);
        return view('administrator.user.infor',[
            'title' => 'Thông Tin Cá Nhân',
            'admin' => $admin
        ]);
    }

    public function update($id , Request $request){
        $result = $this->adminService->update($id, $request);
        if( $result){
            return redirect('/administrator/'.$id);
        }
        return redirect()->back();
    }
}
