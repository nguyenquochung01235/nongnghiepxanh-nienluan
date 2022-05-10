<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\NongNghiepService\AnimalService;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    
    protected $animalService;

    public function __construct(AnimalService $animalService)
    {
        $this->animalService = $animalService;
    }


    public function index(){
        $animal = $this->animalService->getAllAnimal();
        return view('nongnghiepxanh.animal.list',[
            'title' => 'Danh Sách Vật Nuôi',
            'animal' => $animal
        ]);
    }

    public function view(Animal $animal){
        $animal = $this->animalService->getAnimalByID($animal->animal_id);
        $listanimal = $this->animalService->getAnimalRecommend();
        return view('nongnghiepxanh.animal.view',[
            'title' => 'Chi tiết giống vật nuôi',
            'animal' => $animal,
            'listanimal' => $listanimal
        ]);
    }

    public function searchAnimal(Request $request){
        $animal = $this->animalService->searchAnimal($request);
        return view('nongnghiepxanh.animal.searchanimal',[
            'title' => 'Kết Quả Tìm Kiếm: ' . $request->searchnews,
            'animal' => $animal
        ]);
    }
}
