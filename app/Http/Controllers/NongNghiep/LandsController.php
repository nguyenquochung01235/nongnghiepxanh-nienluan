<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandsController extends Controller
{
    public function index(){
        return view ('nongnghiepxanh.land.land', [
            'title' => 'Đất Và Thời Tiết'
        ]);
    }
}
