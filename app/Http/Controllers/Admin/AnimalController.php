<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\AnimalService;
use App\Http\Services\CategoryAnimalService;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    protected $animalService;
    protected $categoryAnimalService;

    public function __construct(AnimalService $animalService, CategoryAnimalService $categoryAnimalService)
    {
        $this->animalService = $animalService;
        $this->categoryAnimalService = $categoryAnimalService;
    }


    public function index(){
        $animal =  $this->animalService->getAllAnimal();
        $categoryanimal =  $this->categoryAnimalService->getCategoryAnimal();
        return view('administrator.animal.list',[
            'title'=>'Danh sách vật nuôi',
            'animal' => $animal,
            'categoryanimal' => $categoryanimal
        ]);
    }

    public function filter(Request $request){
        $animal = $this->animalService->filter($request);
        $categoryanimal =  $this->categoryAnimalService->getCategoryAnimal();
        return view('administrator.animal.list',[
            'title'=>'Danh sách vật nuôi',
            'animal' => $animal,
            'categoryanimal' => $categoryanimal
        ]); 
    }


    public function add(){
        $categoryanimal =  $this->categoryAnimalService->getCategoryAnimal();
        return view("administrator.animal.add",[
            'title' => "Thêm Giống Vật Nuôi Mới",
            'categoryanimal' => $categoryanimal
        ]);
    }

    public function create(Request $request){
        // return dd($request->all());
        $result = $this->animalService->create($request);
        if($result){
            return redirect('/administrator/animal');
        }
        return redirect()->back()->withInput();
    }



    public function view(Animal $animal){
        $animal = $this->animalService->getAnimalById($animal->animal_id);
        return view('administrator.animal.animal',[
            'title'=>'Chi tiết giống vật nuôi',
            'animal' => $animal
        ]);
    }

    public function show(Animal $animal){
        $animal = $this->animalService->getAnimalById($animal->animal_id);
        $categoryanimal =  $this->categoryAnimalService->getCategoryAnimal();
        return view('administrator.animal.update',[
            'title'=>'Chỉnh sửa vật nuôi: ' .  $animal[0]->animal_name,
            'animal' => $animal,
            'categoryanimal' => $categoryanimal
        ]);
    }

    public function update(Request $request, Animal $animal){
        $result = $this->animalService->update($request, $animal->animal_id);
        if($result){
           return redirect('/administrator/animal');
        }
        return redirect()->back()->withInput();
    }
    

    public function delete(Request $request){
        $result = $this->animalService->delete($request);
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
        $url = $this->animalService->uploadImg($request);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url'   => $url
            ]);
        }
    }
}
