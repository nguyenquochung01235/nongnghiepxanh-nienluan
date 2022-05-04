<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryPlantService;
use App\Models\Top;
use Illuminate\Http\Request;

class CategoryPlantController extends Controller
{

    protected $categoryPlantService;

    public function __construct(CategoryPlantService $categoryPlantService)
    {
        $this->categoryPlantService = $categoryPlantService;
    }


    public function index(){
        $categoryplant = $this->categoryPlantService->getAllCategoryPlant();
        return view('administrator.category-plant.list',[
            'title' => 'Danh mục cây trồng',
            'categoryplant' => $categoryplant
        ]);
    }

    // public function view(Top $categoryplant){
    //     return dd();
    // }

    public function add(){
        return view('administrator.category-plant.add',[
            'title' => 'Thêm Danh Mục Cây Trồng'
        ]);
    }

    public function create(Request $request){
        $result = $this->categoryPlantService->create($request);
        if($result){
            return redirect('/administrator/category-plant/');
        }
        return redirect()->back();
    }

    public function show(Top $categoryplant){
        return view('administrator.category-plant.update',[
            'title' => 'Chỉnh Sửa Danh Mục Cây Trồng',
            'categoryplant' => $categoryplant
        ]);
    }

    public function update(Request $request, Top $categoryplant){
         $result = $this->categoryPlantService->update( $request, $categoryplant);
         if($result){
            return redirect('/administrator/category-plant');
        }
        return redirect()->back();
    }

    public function delete(Request $request){
        $result = $this->categoryPlantService->delete($request);
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
