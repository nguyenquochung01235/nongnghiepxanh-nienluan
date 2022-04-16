<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\LandService;
use App\Http\Services\ProvinceService;
use App\Models\Lands;
use Illuminate\Http\Request;

class LandController extends Controller
{

    protected $landService;
    protected $provinceService;

    public function __construct(LandService $landService, ProvinceService $provinceService)
    {
        $this->landService = $landService;
        $this->provinceService = $provinceService;
    }

    public function index(){
       $lands = $this->landService->getAllLand();
       return view('administrator.lands.list',[
           'title' => 'Thông Tin Thổ Nhưỡng',
           'lands' => $lands
       ]);
    }

    public function add(){
        $province  = $this->provinceService->getAllProvince();
        
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
            'land' =>  $land
        ]);
    }


    public function show(Lands $lands){
        return dd($lands);
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
