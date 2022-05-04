<?php

namespace App\Http\Services;

use App\Models\Plant;
use Illuminate\Support\Facades\Session;

class PlantService {

    public function getAllPlant(){
        return Plant::with('top')->orderBy('updated_at', 'desc')->paginate(15);
    }

    public function getPlantById($id){
        return Plant::with('top','sop')->where('plant_id', $id)->get();
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
