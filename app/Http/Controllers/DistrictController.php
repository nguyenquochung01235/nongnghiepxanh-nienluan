<?php

namespace App\Http\Controllers;

use App\Http\Services\CommuneService;
use App\Http\Services\DistrictService;
use App\Http\Services\ProvinceService;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    protected $communeService;
    protected $districtService;
    protected $provinceService;
    
    public function __construct(CommuneService $communeService, DistrictService $districtService, ProvinceService $provinceService)
    {
        $this->communeService = $communeService;
        $this->districtService = $districtService;
        $this->provinceService = $provinceService;
    }


    public function index(){
        $district = $this->districtService->getAllDistrict();
        $province = $this->provinceService->getAllProvinceNongNghiepXanh();
        return view('administrator.district.list',[
            'title' => 'Danh Sách Quận - Huyện',
            'district' => $district,
            'province' => $province
        ]);
    }


    public function filter(Request $request){
        $district = $this->districtService->filterDistrict($request);
        $province = $this->provinceService->getAllProvinceNongNghiepXanh();
        return view('administrator.district.list',[
            'title' => 'Danh Sách Quận - Huyện',
            'district' =>$district,
            'province' => $province
        ]);
    }



    public function view(District $district){
        $district = $this->communeService->getAllCommuneByDistrict($district->district_id);
        return view('administrator.commune.list',[
            'title' => 'Danh Sách Xã - Phường',
            'commune' => $district
        ]);
    }

    public function add(){
        $province = $this->provinceService->getAllProvinceNongNghiepXanh();
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
        $province = $this->provinceService->getAllProvinceNongNghiepXanh();
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




    public function getDistrictOfProvince(Request $request){
        $result = $this->districtService->getDistrictOfProvince($request);
        return $result;  
    }

}
