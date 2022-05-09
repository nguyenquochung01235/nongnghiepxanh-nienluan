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

    public function filter(Request $request){
        $plant = $this->plantService->filter($request);
        $categoryplant =  $this->categoryPlantService->getCategoryPlant();
        return view('administrator.plant.list',[
            'title'=>'Danh sách cây trồng',
            'plant' => $plant,
            'categoryplant' => $categoryplant
        ]); 
    }

    public function search(Request $request){
        $result = $this->plantService->search($request);
        return $result;
     }


    public function add(){
        $categoryplant =  $this->categoryPlantService->getCategoryPlant();
        return view("administrator.plant.add",[
            'title' => "Thêm Giống Cây Trồng Mới",
            'categoryplant' => $categoryplant
        ]);

    }

    public function create(Request $request){
        $result = $this->plantService->create($request);
        if($result){
            return redirect('/administrator/plant');
        }
        return redirect()->back()->withInput();
    }

    public function view(Plant $plant){
        $plant = $this->plantService->getPlantById($plant->plant_id);
        return view('administrator.plant.plant',[
            'title'=>'Chi tiết cây trồng',
            'plant' => $plant
        ]);
    }


    public function show(Plant $plant){
        $plant = $this->plantService->getPlantById($plant->plant_id);
        $categoryplant =  $this->categoryPlantService->getCategoryPlant();
        // return dd($plant);
        return view('administrator.plant.update',[
            'title'=>'Chỉnh sửa cây: ' .  $plant[0]->plant_name,
            'plant' => $plant,
            'categoryplant' => $categoryplant
        ]);
    }

    public function update(Request $request, Plant $plant){
        $result = $this->plantService->update($request, $plant->plant_id);
        if($result){
           return redirect('/administrator/plant');
        }
        return redirect()->back()->withInput();
    }
    


    public function delete(Request $request){
        $result = $this->plantService->delete($request);
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
        $url = $this->plantService->uploadImg($request);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url'   => $url
            ]);
        }
    }
        
}
