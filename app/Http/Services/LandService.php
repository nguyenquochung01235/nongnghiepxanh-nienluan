<?php

namespace App\Http\Services;

use App\Models\Lands;
use Illuminate\Support\Facades\Session;

class LandService{

    public function getAllLand(){
        return Lands::with('district')->get();
    }

    public function getLandByID($land_id){
        return Lands::with('district.province')->where('land_id', $land_id)->get();
    }

    public function create($request){
        try {
            $checkID = Lands::where("district_id",$request->input("district_id"))
            ->where("district_id",$request->input("district"))
            ->count();
            if($checkID){
                Session::flash('error', 'Đã Tồn Tại Thông Tin Địa Chất Ở Đây !!! ');
                return false;
            }
           
            $request->except('_token');
            Lands::create([
                'land_title' => $request->input('landTitle'),
                'district_id' => $request->input('district'),
                'land_img_1' => $request->input('land_img_1_link'),
                'land_img_2' => $request->input('land_img_2_link'),
                'land_img_3' => $request->input('land_img_3_link'),
                'land_content' => $request->input('content'),
                
            ]);
            Session::flash('success', 'Thêm Thông Tin Thổ Nhưỡng Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Thông Tin Thổ Nhưỡng Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }





    public function uploadImg($request)
    {
        if ($request->hasFile('file')) {
            try {
                // $type = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_EXTENSION);
                // $pathFull = 'uploads/' . date("Y/m/d");
                $name = date("Y-m-d-H-m-s").$request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/land';

                $request->file('file')->storeAs(
                    'public/' . $pathFull, $name
                );

                return '/storage/' . $pathFull . '/' . $name;

            } catch (\Exception $error) {
                return false;
            }
        }
    }
}
