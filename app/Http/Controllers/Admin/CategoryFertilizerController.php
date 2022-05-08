<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryFertilizerService;
use App\Models\CategoryFertilizer;
use Illuminate\Http\Request;

class CategoryFertilizerController extends Controller
{

    protected $categoryFertilizerService;

    public function __construct(CategoryFertilizerService $categoryFertilizerService )
    {
     $this->categoryFertilizerService = $categoryFertilizerService; 
    }

    public function index(){
        $categoryfertilizer = $this->categoryFertilizerService->getAllCategoryFertilizer();
        return view('administrator.category-fertilizer.list',[
            'title' => 'Danh Mục Phân Bón',
            'categoryfertilizer' => $categoryfertilizer
        ]);
    }

    public function add(){
        return view('administrator.category-fertilizer.add',[
            'title' => 'Thêm Danh Mục Phân Bón'
        ]);
    }

    public function create(Request $request){
        $result = $this->categoryFertilizerService->create($request);
        if($result){
            return redirect('/administrator/category-fertilizer/');
        }
        return redirect()->back();
    }

    
    public function show(CategoryFertilizer $categoryfertilizer){
        return view('administrator.category-fertilizer.update',[
            'title' => 'Chỉnh Sửa Danh Mục Phân Bón',
            'categoryfertilizer' => $categoryfertilizer
        ]);
    }

    public function update(Request $request, CategoryFertilizer $categoryfertilizer){
         $result = $this->categoryFertilizerService->update( $request, $categoryfertilizer);
         if($result){
            return redirect('/administrator/category-fertilizer');
        }
        return redirect()->back();
    }


    public function delete(Request $request){
        $result = $this->categoryFertilizerService->delete($request);
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
