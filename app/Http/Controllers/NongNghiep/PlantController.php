<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\NongNghiepService\PlantService;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    protected $plantService;

    public function __construct(PlantService $plantService)
    {
        $this->plantService = $plantService;
    }


    public function index(){
        $plant = $this->plantService->getAllPlant();
        return view('nongnghiepxanh.plant.list',[
            'title' => 'Danh Sách Cây Trồng',
            'plant' => $plant
        ]);
    }

    public function view(Plant $plant){
        $plant = $this->plantService->getPlantByID($plant->plant_id);
        $listplant = $this->plantService->getPlantRecommend();
        return view('nongnghiepxanh.plant.view',[
            'title' => 'Chi tiết giống cây trồng',
            'plant' => $plant,
            'listplant' => $listplant
        ]);
    }

    public function searchPlant(Request $request){
        $plant = $this->plantService->searchPlant($request);
        return view('nongnghiepxanh.plant.searchplant',[
            'title' => 'Kết Quá Tìm Kiếm: ' . $request->searchnews,
            'plant' => $plant
        ]);
    }
}
