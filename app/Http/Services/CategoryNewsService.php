<?php

namespace App\Http\Services;

use App\Models\CategoryNews;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class CategoryNewsService{

    public function getAllCategoryNews(){
        return CategoryNews::paginate(10);
    }


    public function create($request){
        try {

            $check = CategoryNews::where("news_category",$request->input("categoryNewsName"))->count();
            if($check){
                return Session::flash('error', 'Đã Tồn Tại Danh Mục Này !!! ');
            }
            $active = 1;
            if($request->input('active') =="on"){
                $active = 1;
            }else{
                $active = 0;
            }
            $request->except('_token');
            CategoryNews::create([
                'news_category' => (string)$request->input('categoryNewsName'),
                'active' => (int)$active
            ]);
            Session::flash('success', 'Thêm Danh Mục Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Danh Mục Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
    }


    public function update($request, $news_category){
        try {
            $active = 1;
            if($request->input('active') =="on"){
                $active = 1;
            }else{
                $active = 0;
            }
            $request->except('_token');

            $news_category->news_category = $request->input('categoryNewsName');
            $news_category->active = (int)$active;
            $news_category->updated_at =  date('Y-m-d H:i:s');
            $news_category->save();

            Session::flash('success', 'Cập Nhật Danh Mục Thành Công !!! ' );
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Danh Mục Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function delete($request){
        $categorynews = CategoryNews::where('id_news_category', $request->input('id'))->first();
        if($categorynews){
            $categorynews->delete();
            return true;
        }
        return false;
    }
      
}