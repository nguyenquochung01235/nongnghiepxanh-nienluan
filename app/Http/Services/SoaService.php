<?php

namespace App\Http\Services;

use App\Models\Soa;
use Illuminate\Support\Facades\Session;

class SoaService{
    

    public function search($request){
        return Soa::where('soa_name','like','%'.$request->search_value.'%')->get();
    }

    public function filter($request){
        $filter = explode("-", filter_var(trim($request->input('filterBy'), "-")));
       
        return Soa:: orderBy($filter[0], $filter[1])
                    ->where('soa_name', 'like', "%". $request->input('seachTitle') ."%")
                    ->paginate(10)->withQueryString();;
    }

    public function getAllSoa(){
        return  Soa::with('animal')->paginate(15);
        
     }


     public function getSoaById($id){
        return  Soa::with('animal')->where('soa_id', $id)->get();
    }


     public function create($request){
        try {
            $request->except('_token');
            Soa::create([
                'soa_name' => $request->input('soa_name'),
                'soa_description' => $request->input('content'),
                'soa_img_1' => $request->input('soa_img_1_link'),
                'soa_img_2' => $request->input('soa_img_2_link'),
                'soa_img_3' => $request->input('soa_img_3_link'),  
            ]);
            
            Session::flash('success', 'Thêm Loại Bệnh Mới Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Loại Bệnh Mới Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function update($request, $soa_id){
        try {
              
            $request->except('_token');
            $updateSoa = Soa::find($soa_id);    
            $updateSoa->soa_name = $request->input('soa_name');
            $updateSoa->soa_description = $request->input('content');
            $updateSoa->soa_img_1 = $request->input('soa_img_1_link');
            $updateSoa->soa_img_2 = $request->input('soa_img_2_link');
            $updateSoa->soa_img_3 = $request->input('soa_img_3_link');
            $updateSoa->updated_at = date('Y-m-d H:i:s');
            $updateSoa->save();

            Session::flash('success', 'Cập Nhật Thông Tin Bệnh Hại Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Thông Tin Bệnh Hại Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }

    
    public function delete($request){
        $soa = Soa::where('soa_id', $request->input('id'))->first();
        if($soa){
            $soa->delete();
            return true;
        }
        return false;
    }

     
    public function uploadImg($request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = date("Y-m-d-H-m-s").$request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/soa';

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
