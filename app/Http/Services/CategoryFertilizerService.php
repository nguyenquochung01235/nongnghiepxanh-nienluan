<?php

namespace App\Http\Services;

use App\Models\CategoryFertilizer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class CategoryFertilizerService{

    public function getAllCategoryFertilizer(){
        return CategoryFertilizer::paginate(15);
    }

    public function create($request){
        try {

            $check = CategoryFertilizer::where("category_fertilizer",$request->input("category_fertilizer"))->count();
            if($check){
                return Session::flash('error', 'Đã Tồn Tại Danh Mục Này !!! ');
            }

            $request->except('_token');
            CategoryFertilizer::create([
                'category_fertilizer' => (string)$request->input('category_fertilizer')
            ]);
            Session::flash('success', 'Thêm Danh Mục Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Danh Mục Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
    }

    
    public function update($request, $categoryfertilizer){
        try {
            
            $request->except('_token');

            $categoryfertilizer->category_fertilizer = $request->input('category_fertilizer');
            $categoryfertilizer->updated_at =  date('Y-m-d H:i:s');
            $categoryfertilizer->save();

            Session::flash('success', 'Cập Nhật Danh Mục Thành Công !!! ' );
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Danh Mục Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function delete($request){
        $categoryfertilizer = CategoryFertilizer::where('category_fertilizer_id', $request->input('id'))->first();
        if($categoryfertilizer){
            $categoryfertilizer->delete();
            return true;
        }
        return false;
    }
    
}