<?php

namespace App\Http\Services;

use App\Models\Commune;
use App\Models\Lands;
use Illuminate\Support\Facades\Session;

class LandService{

    public function getAllLand(){
        return Lands::with('district.province')->orderBy('updated_at', 'desc')->paginate(15)->withQueryString();
    }

    public function getLandByID($land_id){
        return Lands::with('district.province')->where('land_id', $land_id)->get();
    }

      
    public function filterLand($request){
        $filter = explode("-", filter_var(trim($request->input('filterBy'), "-")));
        if($request->input('province') == null ){
            return Lands::with('district.province')->orderBy('tbl_lands.'.$filter[0], $filter[1])
                    ->where('land_title', 'like', "%". $request->input('seachTitle') ."%")
                    ->paginate(15)->withQueryString();
        }
        return Lands::with('district.province')->orderBy('tbl_lands.'.$filter[0], $filter[1])
                    ->join('tbl_district', 'tbl_lands.district_id', '=', 'tbl_district.district_id')
                    ->where('land_title', 'like', "%". $request->input('seachTitle') ."%")
                    ->where('province_id',$request->input('province'))
                    ->paginate(15)->withQueryString();
}


    public function create($request){
        try {
            $checkID = Lands::where("district_id",$request->input("district"))
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


    public function update($request, $land_id){
        try {
              
            $request->except('_token');
            $updateLand = Lands::find($land_id);    
            $updateLand->land_title = $request->input('landTitle');
            $updateLand->district_id = $request->input('district');
            $updateLand->land_img_1 = $request->input('land_img_1_link');
            $updateLand->land_img_2 = $request->input('land_img_2_link');
            $updateLand->land_img_3 = $request->input('land_img_3_link');
            $updateLand->land_content = $request->input('content');
            $updateLand->updated_at = date('Y-m-d H:i:s');
            $updateLand->save();
            
            Session::flash('success', 'Cập Nhật Thông Tin Thổ Nhưỡng Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Thông Tin Thổ Nhưỡng Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }

    public function delete($request){
        $land = Lands::where('land_id', $request->input('id'))->first();
        if($land){
            $land->delete();
            return true;
        }
        return false;
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
