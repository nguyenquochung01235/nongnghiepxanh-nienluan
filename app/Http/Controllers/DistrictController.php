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
        $result = $this->districtService->create($request);

        if($result){
            return redirect('/administrator/district');
        }
        return redirect()->back()->withInput();
    }

    public function show(District $district){
        $province = $this->provinceService->getAllProvince();
        return view('administrator.district.update',[
            'title' => 'Cập Nhật Quận Huyện',
            'province' => $province,
            'district' => $district
        ]);
    }

    public function update(District $district, Request $request){
        $result = $this->districtService->update($district, $request);
        if($result){
            return redirect('/administrator/district');
        }
        return redirect()->back();
    }

    public function delete(Request $request){
        $result = $this->districtService->delete($request);
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
