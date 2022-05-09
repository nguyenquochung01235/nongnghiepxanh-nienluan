<?php

namespace App\Http\Services;

use App\Models\Pesticides;
use App\Models\Plant;
use App\Models\Sop;
use Illuminate\Support\Facades\Session;

class PesticidesService {

    public function getAllPesticides(){
        return Pesticides::with('category_pesticides')->orderBy('updated_at', 'desc')->paginate(10);
    }

    public function getPesticidesById($pesticides_id){
        return Pesticides::with('category_pesticides','sop')->where('pesticides_id', $pesticides_id)->get();
    }

    public function create($request){
       
        try {
            $request->except('_token');
            Pesticides::create([
                'pesticides_name' => $request->input('pesticides_name'),
                'pesticides_description' => $request->input('content'),
                'pesticides_img_1' => $request->input('pesticides_img_1_link'),
                'pesticides_img_2' => $request->input('pesticides_img_2_link'),
                'pesticides_img_3' => $request->input('pesticides_img_3_link'),
                'category_pesticides_id' => $request->input('category_pesticides_id'),      
            ]);

            $data_sop = $request->input('data_sop');
            $pesticides = Pesticides::where('pesticides_name', $request->input('pesticides_name'))->first();
            if($data_sop != null){
                foreach ($data_sop as $key => $data) {
                    $sop = Sop::where('sop_id', $data)->first();
                    $pesticides->sop()->attach($sop);
                }    
            }     

            Session::flash('success', 'Thêm Loại Thuốc Mới Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Loại Thuốc Mới Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }

    public function update($request, $pesticides_id){
        try {
              
            $request->except('_token');
            $updatePesticides = Pesticides::find($pesticides_id);    
            $updatePesticides->pesticides_name = $request->input('pesticides_name');
            $updatePesticides->pesticides_description = $request->input('content');
            $updatePesticides->pesticides_img_1 = $request->input('pesticides_img_1_link');
            $updatePesticides->pesticides_img_2 = $request->input('pesticides_img_2_link');
            $updatePesticides->pesticides_img_3 = $request->input('pesticides_img_3_link');
            $updatePesticides->category_pesticides_id = $request->input('category_pesticides');
            $updatePesticides->updated_at = date('Y-m-d H:i:s');
            $updatePesticides->save();

            $updatePesticides->sop()->detach();
            $data_sop = $request->input('data_sop');
            $pesticides = Pesticides::where('pesticides_name', $request->input('pesticides_name'))->first();
            if($data_sop != null){
                foreach ($data_sop as $key => $data) {
                    $sop = Sop::where('sop_id', $data)->first();
                    $pesticides->sop()->attach($sop);
                }    
            }     
            Session::flash('success', 'Cập Nhật Thông Tin Thuốc Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Thông Tin Thuốc Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }

    public function delete($request){
        $pesticides = Pesticides::where('pesticides_id', $request->input('id'))->first();
        if($pesticides){
            $pesticides->delete();
            return true;
        }
        return false;
    }


    public function filter($request){
        $filter = explode("-", filter_var(trim($request->input('filterBy'), "-")));
        if($request->input('category_pesticides') == null ){
            return Pesticides:: orderBy($filter[0], $filter[1])
                    ->where('pesticides_name', 'like', "%". $request->input('seachTitle') ."%")
                    ->paginate(10)->withQueryString();;
        }
        return Pesticides:: orderBy($filter[0], $filter[1])
                    ->where('pesticides_name', 'like', "%". $request->input('seachTitle') ."%")
                    ->where('category_pesticides_id',$request->input('category_pesticides'))
                    ->paginate(10)->withQueryString();;
    }

    public function uploadImg($request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = date("Y-m-d-H-m-s").$request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/pesticides';

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
