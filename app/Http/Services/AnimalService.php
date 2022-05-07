<?php

namespace App\Http\Services;

use App\Models\Animal;
use App\Models\Soa;
use Illuminate\Support\Facades\Session;

class AnimalService {

    public function getAllAnimal(){
        return Animal::with('toa')->orderBy('updated_at', 'desc')->paginate(10);
    }

    public function getAnimalById($id){
        return Animal::with('toa','soa')->where('animal_id', $id)->get();
    }

    public function create($request){
          try {
            $request->except('_token');
            Animal::create([
                'animal_name' => $request->input('animal_name'),
                'animal_description' => $request->input('content'),
                'animal_img_1' => $request->input('animal_img_1_link'),
                'animal_img_2' => $request->input('animal_img_2_link'),
                'animal_img_3' => $request->input('animal_img_3_link'),
                'toa_id' => $request->input('toa_id'),      
            ]);
            $data_soa = $request->input('data_soa');
            $animal = Animal::where('animal_name', $request->input('animal_name'))->first();
            if($data_soa != null){
                foreach ($data_soa as $key => $data) {
                    $soa = Soa::where('soa_id', $data)->first();
                    $animal->soa()->attach($soa);
                }    
            }     

            Session::flash('success', 'Thêm Giống Vật Nuôi Mới Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Giống Vật Nuôi Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function update($request, $animal_id){
        try {
              
            $request->except('_token');
            $updateAnimal = Animal::find($animal_id);    
            $updateAnimal->animal_name = $request->input('animal_name');
            $updateAnimal->animal_description = $request->input('content');
            $updateAnimal->animal_img_1 = $request->input('animal_img_1_link');
            $updateAnimal->animal_img_2 = $request->input('animal_img_2_link');
            $updateAnimal->animal_img_3 = $request->input('animal_img_3_link');
            $updateAnimal->toa_id = $request->input('toa_id');
            $updateAnimal->updated_at = date('Y-m-d H:i:s');
            $updateAnimal->save();

            $updateAnimal->soa()->detach();
            $data_soa = $request->input('data_soa');
            $animal = Animal::where('animal_id', $animal_id)->first();
            if($data_soa != null) {
                foreach ($data_soa as $key => $data) {
                    $soa = Soa::where('soa_id', $data)->first();
                    $animal->soa()->attach($soa);
                }         
            };
            Session::flash('success', 'Cập Nhật Thông Tin Giống Vật Nuôi Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Thông Tin Giống Vật Nuôi Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function delete($request){
        $animal = Animal::where('animal_id', $request->input('id'))->first();
        if($animal){
            $animal->delete();
            return true;
        }
        return false;
    }


    
    public function filter($request){
        $filter = explode("-", filter_var(trim($request->input('filterBy'), "-")));
        if($request->input('categoryanimal') == null ){
            return Animal:: orderBy($filter[0], $filter[1])
                    ->where('animal_name', 'like', "%". $request->input('seachTitle') ."%")
                    ->paginate(10)->withQueryString();;
        }
        return Animal:: orderBy($filter[0], $filter[1])
                    ->where('animal_name', 'like', "%". $request->input('seachTitle') ."%")
                    ->where('toa_id',$request->input('categoryanimal'))
                    ->paginate(10)->withQueryString();;
    }
    
    public function uploadImg($request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = date("Y-m-d-H-m-s").$request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/animal';

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
