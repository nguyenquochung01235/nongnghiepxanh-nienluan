<?php

namespace App\Http\Controllers;

use App\Http\Services\DistrictService;
use App\Http\Services\ProvinceService;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    protected $provinceService;
    protected $districtService;

    public function __construct(ProvinceService $provinceService, DistrictService $districtService)
    {
        $this->provinceService = $provinceService;
        $this->districtService = $districtService;
    }


    public function index(){
        $district = $this->districtService->getAllDistrict();
        return view('administrator.district.list',[
            'title' => 'Danh Sách Quận - Huyện',
            'district' => $district
        ]);
    }

    public function add(){
        $province = $this->provinceService->getAllProvince();
        return view('administrator.district.add',[
            'title' => 'Thêm Quận - Huyện',
            'province' => $province
        ]);
    }

    public function create(Request $request){
        return dd($request->all());
    }
}
