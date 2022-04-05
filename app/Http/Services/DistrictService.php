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
            $checkName = District::where("district_name",$request->input("district_name"))
            ->where("province_id", $request->input('province'))
            ->count();
            if($checkName){
                Session::flash('error', 'Đã Tồn Tại Tên Quận - Huyện Này !!! ');
                return false;
            }
           
            $request->except('_token');
            District::create([
                'province_id' => $request->input('province'),
                'district_name' => $request->input('district_name')
            ]);
            Session::flash('success', 'Thêm Quận - Huyện Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Quận - Huyện Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function update($district, $request){

        try {
            
            $request->except('_token');

            $updateDistrict = District::find($district->district_id);

            $updateDistrict->province_id = $request->input('province');
            $updateDistrict->district_name= $request->input('district_name');
            $updateDistrict->updated_at =  date('Y-m-d H:i:s');
            $updateDistrict->save();
            Session::flash('success', 'Cập Nhật Tên Quận - Huyện Thành Công !!! ' );
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Tên Quận - Huyện Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }



    
    public function delete($request){
        $district = District::where('district_id', $request->input('id'))->first();
        if($district){
            $district->delete();
            return true;
        }
        return false;
    }


    public function getDistrictOfProvince($request){
        return District::where('province_id',$request->input('province_id'))->get();
    }

}
