<?php

namespace App\Http\Services;

use App\Models\Commune;
use App\Models\District;
use App\Models\Province;
use Illuminate\Support\Facades\Session;

class CommuneService{

    public function getAllCommune(){
        return Commune::with('district.province')->orderBy('district_id', 'desc')->paginate(20);
    }
    
    public function getAllCommuneByDistrict($district_id){
        return Commune::with('district.province')
        ->where('district_id', $district_id)
        ->orderBy('district_id', 'desc')->paginate(20);
    }
    
    public function getAllCommuneNongNghiepXanh(){
        return Commune::with('district.province')->orderBy('district_id', 'desc')->get();
    }
    
    public function create($request){
        try {
            $checkName = Commune::where("commune_name",$request->input("commune_name"))
            ->where("district_id",$request->input("district"))
            ->count();
            if($checkName){
                Session::flash('error', 'Đã Tồn Tại Tên Xã - Phường Này !!! ');
                return false;
            }
           
            $request->except('_token');
            Commune::create([
                'district_id' => $request->input('district'),
                'commune_name' => $request->input('commune_name')
            ]);
            Session::flash('success', 'Thêm Xã - Phường Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Xã - Phường Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }

    public function update($commune, $request){

        try {
            
            $request->except('_token');

            $updateCommune = Commune::find($commune->commune_id);

            $updateCommune->district_id = $request->input('district');
            $updateCommune->commune_name= $request->input('commune_name');
            $updateCommune->updated_at =  date('Y-m-d H:i:s');
            $updateCommune->save();
            Session::flash('success', 'Cập Nhật Xã - Phường Thành Công !!! ' );
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Tên Xã - Phường Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }



    
    public function delete($request){
        $commune = Commune::where('commune_id', $request->input('id'))->first();
        if($commune){
            $commune->delete();
            return true;
        }
        return false;
    }

    public function getCommuneOfDistrict($request){
        return Commune::where('district_id',$request->input('district_id'))->get();
    }

 
}
