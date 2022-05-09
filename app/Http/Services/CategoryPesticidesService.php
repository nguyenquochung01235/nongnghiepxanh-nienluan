<?php

namespace App\Http\Services;

use App\Models\CategoryPesticides;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class CategoryPesticidesService{

    public function getAllCategoryPesticides(){
        return CategoryPesticides::paginate(15);
    }
    public function getCategoryPesticides(){
        return CategoryPesticides::get();
    }

    public function create($request){
        try {

            $check = CategoryPesticides::where("category_pesticides",$request->input("category_pesticides"))->count();
            if($check){
                return Session::flash('error', 'Đã Tồn Tại Danh Mục Này !!! ');
            }

            $request->except('_token');
            CategoryPesticides::create([
                'category_pesticides' => (string)$request->input('category_pesticides')
            ]);
            Session::flash('success', 'Thêm Danh Mục Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Danh Mục Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
    }

    
    public function update($request, $categorypesticides){
        try {
            
            $request->except('_token');

            $categorypesticides->category_pesticides = $request->input('category_pesticides');
            $categorypesticides->updated_at =  date('Y-m-d H:i:s');
            $categorypesticides->save();

            Session::flash('success', 'Cập Nhật Danh Mục Thành Công !!! ' );
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Danh Mục Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function delete($request){
        $categorypesticides = CategoryPesticides::where('category_pesticides_id', $request->input('id'))->first();
        if($categorypesticides){
            $categorypesticides->delete();
            return true;
        }
        return false;
    }
    
}