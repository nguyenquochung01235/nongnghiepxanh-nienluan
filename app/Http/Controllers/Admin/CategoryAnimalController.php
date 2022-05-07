<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryAnimalService;
use App\Models\Toa;
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

    public function show(Toa $categoryanimal){
        return view('administrator.category-animal.update',[
            'title' => 'Chỉnh Sửa Danh Mục Vật Nuôi',
            'categoryanimal' => $categoryanimal
        ]);
    }

    public function update(Request $request, Toa $categoryanimal){
         $result = $this->categoryAnimalService->update( $request, $categoryanimal);
         if($result){
            return redirect('/administrator/category-animal');
        }
        return redirect()->back();
    }

    public function delete(Request $request){
        $result = $this->categoryAnimalService->delete($request);
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
