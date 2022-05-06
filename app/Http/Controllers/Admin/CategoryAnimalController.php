<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryAnimalService;
use Illuminate\Http\Request;

class CategoryAnimalController extends Controller
{
    
    protected $categoryAnimalService;

    public function __construct(CategoryAnimalService $categoryAnimalService)
    {
        $this->categoryAnimalService = $categoryAnimalService;
    }


    public function index(){
        $categoryAnimal = $this->categoryAnimalService->getAllCategoryAnimal();
        return view('administrator.category-animal.list',[
            'title' => 'Danh mục vật nuôi',
            'categoryanimal' => $categoryAnimal
        ]);
    }

    public function add(){
        return view('administrator.category-animal.add',[
            'title' => 'Thêm Danh Mục Vật Nuôi'
        ]);
    }

    public function create(Request $request){
        $result = $this->categoryAnimalService->create($request);
        if($result){
            return redirect('/administrator/category-animal/');
        }
        return redirect()->back();
    }
}
