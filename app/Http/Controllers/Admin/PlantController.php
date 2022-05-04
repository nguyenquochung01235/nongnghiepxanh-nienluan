<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryPlantService;
use App\Http\Services\PlantService;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    protected $plantService;
    protected $categoryPlantService;

    public function __construct(PlantService $plantService, CategoryPlantService $categoryPlantService)
    {
        $this->plantService = $plantService;
        $this->categoryPlantService = $categoryPlantService;
    }


    public function index() {
        $plant = $this->plantService->getAllPlant();
        $categoryplant =  $this->categoryPlantService->getCategoryPlant();
        return view('administrator.plant.list',[
            'title'=>'Danh sách cây trồng',
            'plant' => $plant,
            'categoryplant' => $categoryplant
        ]);
    }

    public function add(){
        $categoryplant =  $this->categoryPlantService->getCategoryPlant();
        return view("administrator.plant.add",[
            'title' => "Thêm Giống Cây Trồng Mới",
            'categoryplant' => $categoryplant
        ]);

    }

    public function view(Plant $plant){
        $plant = $this->plantService->getPlantById($plant->plant_id);
        return view('administrator.plant.plant',[
            'title'=>'Chi tiết cây trồng',
            'plant' => $plant
        ]);
    }


    public function uploadImg(Request $request){
        $url = $this->plantService->uploadImg($request);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url'   => $url
            ]);
        }
    }
        
}
