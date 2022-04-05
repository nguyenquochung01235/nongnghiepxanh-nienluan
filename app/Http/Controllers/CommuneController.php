<?php

namespace App\Http\Controllers;

use App\Http\Services\CommuneService;
use App\Http\Services\DistrictService;
use App\Http\Services\ProvinceService;
use App\Models\Commune;
use Illuminate\Http\Request;

class CommuneController extends Controller
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
        $commune = $this->communeService->getAllCommune();
        // return dd($commune);
        return view('administrator.commune.list',[
            'title' => 'Danh Sách Xã - Phường',
            'commune' => $commune
        ]);
    }

    public function add(){
        $province  = $this->provinceService->getAllProvince();
        return view('administrator.commune.add',[
            'title' => 'Thêm Xã - Phường Mới',
            'province' => $province
        ]);
    }

    public function create(Request $request){  
        $result = $this->communeService->create($request);

        if($result){
            return redirect('/administrator/commune');
        }
        return redirect()->back()->withInput();
    }


    public function show(Commune $commune){
        $province = $this->provinceService->getAllProvince();
        $district = $this->districtService->getAllDistrict();
        return view('administrator.commune.update',[
            'title' => 'Danh Sách Xã - Phường',
            'province' =>$province,
            'district' =>$district,
            'commune' => $commune
        ]);
    }

    public function update(Commune $commune, Request $request){
        $result = $this->communeService->update($commune, $request);
        if($result){
            return redirect('/administrator/commune');
        }
        return redirect()->back();
    }

    public function delete(Request $request){
        $result = $this->communeService->delete($request);
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
