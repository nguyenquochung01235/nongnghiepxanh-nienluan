<?php

namespace App\Http\Services;

use App\Models\District;
use App\Models\Province;
use Illuminate\Support\Facades\Session;

class DistrictService{

    public function getAllDistrict(){
        return District::with('province')->orderBy('province_id', 'desc')->get();
    }

    public function create($request){
        try {
            $checkName = District::where("district_name",$request->input("district_name"))->count();
            if($checkName){
                return Session::flash('error', 'Đã Tồn Tại Tên Quận - Huyện Này !!! ');
            }
           
            $request->except('_token');
            // return dd($request->input('province_id'), $request->input('province_name'));
            District::create([
                'province_id' => $request->input('province_id'),
                'district_name' => $request->input('province_name')
            ]);
            Session::flash('success', 'Thêm Quận - Huyện Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Quận - Huyện Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    // public function update($province, $request){

    //     try {
            
    //         $request->except('_token');

    //         $updateProvince = Province::find($province->province_id);

    //         $updateProvince->province_id = $request->input('province_id');
    //         $updateProvince->province_name= $request->input('province_name');
    //         $updateProvince->updated_at =  date('Y-m-d H:i:s');
    //         $updateProvince->save();
    //         Session::flash('success', 'Cập Nhật Tên Tỉnh - Thành Thành Công !!! ' );
    //     } catch (\Exception $err) {
    //         Session::flash('error', 'Cập Nhật Tên Tỉnh - Thành Không Thành Công !!! <hr>' . $err->getMessage());

    //         return  false;
    //     }
    //     return true;
    // }



    
    // public function delete($request){
    //     $province = Province::where('province_id', $request->input('id'))->first();
    //     if($province){
    //         $province->delete();
    //         return true;
    //     }
    //     return false;
    // }
}
