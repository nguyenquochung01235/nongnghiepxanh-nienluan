<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\NongNghiepService\LandService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandsController extends Controller
{
    protected $landService;

    public function __construct(LandService $landService)
    {
        $this->landService = $landService;
    }

    public function index(){

        $land = $this->landService->getLandDetail();
        return view ('nongnghiepxanh.land.land', [
            'title' => 'Đất Và Thời Tiết',
            'land' => $land
        ]);
    }

    public function searchLands(Request $request){
        $land = $this->landService->searchLands($request);
        return view ('nongnghiepxanh.land.land', [
            'title' => 'Đất Và Thời Tiết',
            'land' => $land
        ]);
    }
}
