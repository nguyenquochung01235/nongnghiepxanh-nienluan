<?php

namespace App\Http\Services;

use App\Models\Province;
use Illuminate\Support\Facades\Session;

class ProvinceService{

    public function getAllProvince(){
        return Province::get();
    }

    public function create($request){
        try {

            $checkID = Province::where("province_id",$request->input("province_id"))->count();
            $checkName = Province::where("province_name",$request->input("province_name"))->count();
            if($checkID){
                return Session::flash('error', 'Đã Tồn Tại ID Này !!! ');
            }
            if($checkName){
                return Session::flash('error', 'Đã Tồn Tại Tên Tỉnh - Thành Phố Này !!! ');
            }
           
            $request->except('_token');
            // return dd($request->input('province_id'), $request->input('province_name'));
            Province::create([
                'province_id' => $request->input('province_id'),
                'province_name' => $request->input('province_name')
            ]);
            Session::flash('success', 'Thêm Tỉnh - Thành Phố Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Tỉnh - Thành Phố Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
    }
}
