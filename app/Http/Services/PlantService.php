<?php

namespace App\Http\Services;

use App\Models\Plant;
use App\Models\Sop;
use Illuminate\Support\Facades\Session;

class PlantService {

    public function getAllPlant(){
        return Plant::with('top')->orderBy('updated_at', 'desc')->paginate(10);
    }

    public function getPlantById($id){
        return Plant::with('top','sop')->where('plant_id', $id)->get();
    }

    public function filter($request){
        $filter = explode("-", filter_var(trim($request->input('filterBy'), "-")));
        if($request->input('categoryplant') == null ){
            return Plant:: orderBy($filter[0], $filter[1])
                    ->where('plant_name', 'like', "%". $request->input('seachTitle') ."%")
                    ->paginate(10)->withQueryString();;
        }
        return Plant:: orderBy($filter[0], $filter[1])
                    ->where('plant_name', 'like', "%". $request->input('seachTitle') ."%")
                    ->where('top_id',$request->input('categoryplant'))
                    ->paginate(10)->withQueryString();;
    }


    public function create($request){
       
        try {
            $request->except('_token');
            Plant::create([
                'plant_name' => $request->input('plant_name'),
                'plant_description' => $request->input('content'),
                'plant_img_1' => $request->input('plant_img_1_link'),
                'plant_img_2' => $request->input('plant_img_2_link'),
                'plant_img_3' => $request->input('plant_img_3_link'),
                'top_id' => $request->input('top_id'),      
            ]);
            $data_sop = $request->input('data_sop');
            $plant = Plant::where('plant_name', $request->input('plant_name'))->first();
            if($data_sop != null){
                foreach ($data_sop as $key => $data) {
                    $sop = Sop::where('sop_id', $data)->first();
                    $plant->sop()->attach($sop);
                }    
            }     

            Session::flash('success', 'Thêm Giống Cây Mới Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'ThêmGiống Cây Mới Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }

    public function update($request, $plant_id){
        try {
              
            $request->except('_token');
            $updatePlant = Plant::find($plant_id);    
            $updatePlant->plant_name = $request->input('plant_name');
            $updatePlant->plant_description = $request->input('content');
            $updatePlant->plant_img_1 = $request->input('plant_img_1_link');
            $updatePlant->plant_img_2 = $request->input('plant_img_2_link');
            $updatePlant->plant_img_3 = $request->input('plant_img_3_link');
            $updatePlant->top_id = $request->input('top_id');
            $updatePlant->updated_at = date('Y-m-d H:i:s');
            $updatePlant->save();

            $updatePlant->sop()->detach();
            $data_sop = $request->input('data_sop');
            $plant = Plant::where('plant_id', $plant_id)->first();
            if($data_sop != null) {
                foreach ($data_sop as $key => $data) {
                    $sop = Sop::where('sop_id', $data)->first();
                    $plant->sop()->attach($sop);
                }         
            };
            Session::flash('success', 'Cập Nhật Thông Tin Giống Cây Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Thông Tin Giống Cây Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function delete($request){
        $plant = Plant::where('plant_id', $request->input('id'))->first();
        if($plant){
            $plant->delete();
            return true;
        }
        return false;
    }



    public function uploadImg($request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = date("Y-m-d-H-m-s").$request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/plant';

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
