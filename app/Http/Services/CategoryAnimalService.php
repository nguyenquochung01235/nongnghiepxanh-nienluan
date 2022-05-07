<?php

namespace App\Http\Services;

use App\Models\Toa;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class CategoryAnimalService{

    public function getCategoryAnimal(){
        return Toa::get();
    }
    public function getAllCategoryAnimal(){
        return Toa::paginate(15);
    }

    public function create($request){
        try {

            $check = Toa::where("toa_name",$request->input("toa_name"))->count();
            if($check){
                return Session::flash('error', 'Đã Tồn Tại Danh Mục Này !!! ');
            }
           
            $request->except('_token');
            Toa::create([
                'toa_name' => $request->input('toa_name'),
            ]);
            Session::flash('success', 'Thêm Danh Mục Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Danh Mục Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
    }

      
    public function update($request, $categoryanimal){
        try {
           
            $request->except('_token');

            $categoryanimal->toa_name = $request->input('toa_name');
            $categoryanimal->updated_at =  date('Y-m-d H:i:s');
            $categoryanimal->save();

            Session::flash('success', 'Cập Nhật Danh Mục Thành Công !!! ' );
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Danh Mục Không Thành Công !!! <hr>' . $err->getMessage());
            return  false;
        }
        return true;
    }

    public function delete($request){
        $categoryanimal = Toa::where('toa_id', $request->input('id'))->first();
        if($categoryanimal){
            $categoryanimal->delete();
            return true;
        }
        return false;
    }

}