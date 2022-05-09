<?php

namespace App\Http\Services;

use App\Models\Fertilizer;
use App\Models\Plant;
use Illuminate\Support\Facades\Session;

class FertilizerService {

    public function getAllFertilizer(){
        return Fertilizer::with('category_fertilizer')->orderBy('updated_at', 'desc')->paginate(10);
    }

    public function getFertilizerById($fertilizer_id){
        return Fertilizer::with('category_fertilizer','plant')->where('fertilizer_id', $fertilizer_id)->get();
    }

    public function create($request){
       
        try {
            $request->except('_token');
            Fertilizer::create([
                'fertilizer_name' => $request->input('fertilizer_name'),
                'fertilizer_description' => $request->input('content'),
                'fertilizer_img_1' => $request->input('fertilizer_img_1_link'),
                'fertilizer_img_2' => $request->input('fertilizer_img_2_link'),
                'fertilizer_img_3' => $request->input('fertilizer_img_3_link'),
                'category_fertilizer_id' => $request->input('category_fertilizer_id'),      
            ]);
            $data_plant = $request->input('data_plant');
            $fertilizer = Fertilizer::where('fertilizer_name', $request->input('fertilizer_name'))->first();
            if($data_plant != null){
                foreach ($data_plant as $key => $data) {
                    $plant = Plant::where('plant_id', $data)->first();
                    $fertilizer->plant()->attach($plant);
                }    
            }     

            Session::flash('success', 'Thêm Loại Phân Bón Mới Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Loại Phân Bón Mới Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }

    public function update($request, $fertilizer_id){
        try {
              
            $request->except('_token');
            $updateFertilizer = Fertilizer::find($fertilizer_id);    
            $updateFertilizer->fertilizer_name = $request->input('fertilizer_name');
            $updateFertilizer->fertilizer_description = $request->input('content');
            $updateFertilizer->fertilizer_img_1 = $request->input('fertilizer_img_1_link');
            $updateFertilizer->fertilizer_img_2 = $request->input('fertilizer_img_2_link');
            $updateFertilizer->fertilizer_img_3 = $request->input('fertilizer_img_3_link');
            $updateFertilizer->category_fertilizer_id = $request->input('category_fertilizer');
            $updateFertilizer->updated_at = date('Y-m-d H:i:s');
            $updateFertilizer->save();

            $updateFertilizer->plant()->detach();
            $data_plant = $request->input('data_plant');
            $fertilizer = Fertilizer::where('fertilizer_id', $fertilizer_id)->first();
            if($data_plant != null) {
                foreach ($data_plant as $key => $data) {
                    $plant = Plant::where('plant_id', $data)->first();
                    $fertilizer->plant()->attach($plant);
                }         
            };
            Session::flash('success', 'Cập Nhật Thông Tin Phân Bón Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Thông Tin Phân Bón Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }

    public function delete($request){
        $fertilizer = Fertilizer::where('fertilizer_id', $request->input('id'))->first();
        if($fertilizer){
            $fertilizer->delete();
            return true;
        }
        return false;
    }


    public function filter($request){
        $filter = explode("-", filter_var(trim($request->input('filterBy'), "-")));
        if($request->input('category_fertilizer') == null ){
            return Fertilizer:: orderBy($filter[0], $filter[1])
                    ->where('fertilizer_name', 'like', "%". $request->input('seachTitle') ."%")
                    ->paginate(10)->withQueryString();;
        }
        return Fertilizer:: orderBy($filter[0], $filter[1])
                    ->where('fertilizer_name', 'like', "%". $request->input('seachTitle') ."%")
                    ->where('category_fertilizer_id',$request->input('category_fertilizer'))
                    ->paginate(10)->withQueryString();;
    }

    public function uploadImg($request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = date("Y-m-d-H-m-s").$request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/fertilizer';

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
