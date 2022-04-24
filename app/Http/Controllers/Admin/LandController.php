<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\DistrictService;
use App\Http\Services\LandService;
use App\Http\Services\ProvinceService;
use App\Models\Lands;
use Illuminate\Http\Request;

class LandController extends Controller
{

    protected $landService;
    protected $provinceService;
    protected $districtService;

    public function __construct(LandService $landService, ProvinceService $provinceService, DistrictService $districtService)
    {
        $this->landService = $landService;
        $this->provinceService = $provinceService;
        $this->districtService = $districtService;
        
    }

    public function index(){
       $lands = $this->landService->getAllLand();
       $province = $this->provinceService->getAllProvinceNongNghiepXanh();
       return view('administrator.lands.list',[
           'title' => 'Thông Tin Thổ Nhưỡng',
           'lands' => $lands,
           'province' => $province
       ]);
    }

    public function filter(Request $request){
        $lands = $this->landService->filterLand($request);
        $province = $this->provinceService->getAllProvinceNongNghiepXanh();
        return view('administrator.lands.list',[
            'title' => 'Thông Tin Thổ Nhưỡng',
            'lands' => $lands,
            'province' => $province
        ]);
    }

    public function add(){
        $province  = $this->provinceService->getAllProvinceNongNghiepXanh();
        
        return view('administrator.lands.add',[
            'title'=> 'Thêm Thông Tin Thổ Nhưỡng',
            'province' =>  $province
        ]);
    }

    public function create(Request $request){
        // return dd($request->all());
        $result = $this->landService->create($request);

        if($result){
            return redirect('/administrator/land');
        }
        return redirect()->back()->withInput();
    }



    public function view(Lands $lands){
        $land = $this->landService->getLandByID($lands->land_id);
  
        // return dd($land);
        return view('administrator.lands.land',[
            'title'=> 'Thông Tin Thổ Nhưỡng',
            'land' =>  $land,
            
        ]);
    }


    public function show(Lands $lands){
        $land = $this->landService->getLandByID($lands->land_id);
        $district = $this->districtService->getAllDistrictNongNghiepXanh();
        $province = $this->provinceService->getAllProvinceNongNghiepXanh();
        return view('administrator.lands.update',[
            'title'=> 'Cập Nhật Thông Tin Thổ Nhưỡng',
            'land' =>  $land,
            'district' => $district,
            'province' => $province
        ]);
    }

    public function update(Request $request, Lands $lands){
        // return dd($request->all());
        $result = $this->landService->update($request, $lands->land_id);
        if($result){
           return redirect('/administrator/land');
        }
        return redirect()->back()->withInput();
    }

    public function delete(Request $request){
        $result = $this->landService->delete($request);
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

    public function uploadImg(Request $request){
        $url = $this->landService->uploadImg($request);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url'   => $url
            ]);
        }

        return response()->json(['error' => true]);
    }

}
