<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryECommerceService;
use App\Models\CategoryECommerce;
use Illuminate\Http\Request;

class CategoryECommerceController extends Controller
{
    protected $categoryECommerceService;

    public function __construct(CategoryECommerceService $categoryECommerceService)
    {   
        $this->categoryECommerceService = $categoryECommerceService;
    }

    public function index(){
        $categoryecommerce = $this->categoryECommerceService->getAllCategoryECommerce();
        return view('administrator.category-ecommerce.list',[
            'title' => 'Danh Mục Sản Phẩm',
            'categoryecommerce' => $categoryecommerce
        ]);
    }

    public function add(){
        return view('administrator.category-ecommerce.add',[
            'title' => 'Thêm Danh Mục Sản Phẩm'
        ]);
    }

    
    public function create(Request $request){
        $result = $this->categoryECommerceService->create($request);
        if($result){
            return redirect('/administrator/category-ecommerce/');
        }
        return redirect()->back();
    }

    public function show(CategoryECommerce $categoryecommerce){
        return view('administrator.category-ecommerce.update',[
            'title' => 'Chỉnh Sửa Danh Mục Tinh Tức',
            'categoryecommerce' => $categoryecommerce
        ]);
    }

    public function update(Request $request, CategoryECommerce $categoryecommerce){
        $result = $this->categoryECommerceService->update( $request, $categoryecommerce);
        if($result){
           return redirect('/administrator/category-ecommerce');
       }
       return redirect()->back();
   }

    public function delete(Request $request){
        $result = $this->categoryECommerceService->delete($request);
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
        $url = $this->categoryECommerceService->uploadImg($request);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url'   => $url
            ]);
        }
    }
}
