<?php

namespace App\Http\Services;

use App\Models\Top;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class CategoryPlantService{

    public function getCategoryPlant(){
        return Top::get();
    }
    public function getAllCategoryPlant(){
        return Top::paginate(15);
    }

    public function create($request){
        try {

            $check = Top::where("top_name",$request->input("topName"))->count();
            if($check){
                return Session::flash('error', 'Đã Tồn Tại Danh Mục Này !!! ');
            }
           
            $request->except('_token');
            Top::create([
                'top_name' => $request->input('topName'),
            ]);
            Session::flash('success', 'Thêm Danh Mục Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Danh Mục Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
    }


    
    public function update($request, $categoryplant){
        try {
           
            $request->except('_token');

            $categoryplant->top_name = $request->input('topName');
            $categoryplant->updated_at =  date('Y-m-d H:i:s');
            $categoryplant->save();

            Session::flash('success', 'Cập Nhật Danh Mục Thành Công !!! ' );
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Danh Mục Không Thành Công !!! <hr>' . $err->getMessage());
            return  false;
        }
        return true;
    }


    public function delete($request){
        $categoryplant = Top::where('top_id', $request->input('id'))->first();
        if($categoryplant){
            $categoryplant->delete();
            return true;
        }
        return false;
    }
}