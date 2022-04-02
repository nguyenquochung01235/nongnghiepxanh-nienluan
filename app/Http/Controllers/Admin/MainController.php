<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\AdminService;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
   

    public function dashboard(){
        return view('administrator.dashboard',[
            'title' => 'Trang Quảng Trị | Nông Nghiệp Xanh'
        ]);
    }

   
}