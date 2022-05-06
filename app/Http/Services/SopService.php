<?php

namespace App\Http\Services;

use App\Models\Sop;
use Illuminate\Support\Facades\Session;

class SopService{
    
    public function getAllSop(){
       return  Sop::with('plant')->paginate(15);
       
    }

    public function getSop(){
        Sop::get();
    }

    public function getSopById($id){
        return  Sop::with('plant')->where('sop_id', $id)->get();
    }

    public function search($request){
        return Sop::where('sop_name','like','%'.$request->search_value.'%')->get();
    }

    public function filter($request){
        $filter = explode("-", filter_var(trim($request->input('filterBy'), "-")));
       
        return Sop:: orderBy($filter[0], $filter[1])
                    ->where('sop_name', 'like', "%". $request->input('seachTitle') ."%")
                    ->paginate(10)->withQueryString();;
    }

    public function create($request){
        
        try {
            $request->except('_token');
            Sop::create([
                'sop_name' => $request->input('sop_name'),
                'sop_description' => $request->input('content'),
                'sop_img_1' => $request->input('sop_img_1_link'),
                'sop_img_2' => $request->input('sop_img_2_link'),
                'sop_img_3' => $request->input('sop_img_3_link'),  
            ]);
            
            Session::flash('success', 'Thêm Loại Bệnh Mới Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Loại Bệnh Mới Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }

    public function update($request, $sop_id){
        try {
              
            $request->except('_token');
            $updateSop = Sop::find($sop_id);    
            $updateSop->sop_name = $request->input('sop_name');
            $updateSop->sop_description = $request->input('content');
            $updateSop->sop_img_1 = $request->input('sop_img_1_link');
            $updateSop->sop_img_2 = $request->input('sop_img_2_link');
            $updateSop->sop_img_3 = $request->input('sop_img_3_link');
            $updateSop->updated_at = date('Y-m-d H:i:s');
            $updateSop->save();

            Session::flash('success', 'Cập Nhật Thông Tin Bệnh Hại Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Thông Tin Bệnh Hại Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function delete($request){
        $sop = Sop::where('sop_id', $request->input('id'))->first();
        if($sop){
            $sop->delete();
            return true;
        }
        return false;
    }


    public function uploadImg($request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = date("Y-m-d-H-m-s").$request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/sop';

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
