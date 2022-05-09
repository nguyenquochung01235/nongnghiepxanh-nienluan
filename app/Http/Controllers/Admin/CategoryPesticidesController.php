<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryPesticidesService;
use App\Models\CategoryPesticides;
use Illuminate\Http\Request;

class CategoryPesticidesController extends Controller
{
    protected $categoryPesticidesService;

    public function __construct(CategoryPesticidesService $categoryPesticidesService)
    {
        $this->categoryPesticidesService = $categoryPesticidesService;
    }

    public function index(){
        $categorypesticides = $this->categoryPesticidesService->getAllCategoryPesticides();
        return view('administrator.category-pesticides.list',[
            'title' => 'Danh Mục Thuốc Trừ Sâu',
            'categorypesticides' => $categorypesticides
        ]);
    }

    public function add(){
        return view('administrator.category-pesticides.add',[
            'title' => 'Thêm Danh Mục Thuốc Trừ Sâu'
        ]);
    }

    public function create(Request $request){
        $result = $this->categoryPesticidesService->create($request);
        if($result){
            return redirect('/administrator/category-pesticides/');
        }
        return redirect()->back();
    }

    
    public function show(CategoryPesticides $categorypesticides){
        return view('administrator.category-pesticides.update',[
            'title' => 'Chỉnh Sửa Danh Mục Thuốc Trừ Sâu',
            'categorypesticides' => $categorypesticides
        ]);
    }

    public function update(Request $request, CategoryPesticides $categorypesticides){
         $result = $this->categoryPesticidesService->update( $request, $categorypesticides);
         if($result){
            return redirect('/administrator/category-pesticides');
        }
        return redirect()->back();
    }


    public function delete(Request $request){
        $result = $this->categoryPesticidesService->delete($request);
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
