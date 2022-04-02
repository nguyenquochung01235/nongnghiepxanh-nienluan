<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryNewsService;
use App\Models\CategoryNews;
use Illuminate\Http\Request;

class CategoryNewsController extends Controller
{
    protected $categoryNewsService;

    public function __construct(CategoryNewsService $categoryNewsService)
    {
        $this->categoryNewsService = $categoryNewsService;
    }



    public function index(){
        $categorynews = $this->categoryNewsService->getAllCategoryNews();
        return view('administrator.category-news.list',[
            'title' => 'Danh Mục Tinh Tức',
            'categorynews' => $categorynews
        ]);
    }


    public function add(){
        return view('administrator.category-news.add',[
            'title' => 'Thêm Danh Mục Tinh Tức'
        ]);
    }

    public function create(Request $request){
        $result = $this->categoryNewsService->create($request);
        if($result){
            return redirect('/administrator/category-news/');
        }
        return redirect()->back();
    }

    public function show(CategoryNews $categorynews){
        return view('administrator.category-news.update',[
            'title' => 'Chỉnh Sửa Danh Mục Tinh Tức',
            'categorynews' => $categorynews
        ]);
    }

    public function update(Request $request, CategoryNews $categorynews){
         $result = $this->categoryNewsService->update( $request, $categorynews);
         if($result){
            return redirect('/administrator/category-news');
        }
        return redirect()->back();
    }

    public function delete(Request $request){
        $result = $this->categoryNewsService->delete($request);
        if($request){
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


    // public function view(CategoryNews $categoryNews){
    //     return view('administrator.category-news.view')
    // }
}
