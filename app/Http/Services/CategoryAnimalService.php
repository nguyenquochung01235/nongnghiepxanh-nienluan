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

}