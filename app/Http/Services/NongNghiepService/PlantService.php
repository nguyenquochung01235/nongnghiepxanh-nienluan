<?php

namespace App\Http\Services\NongNghiepService;

use App\Models\Plant;
use Illuminate\Support\Facades\Session;

class PlantService{

    public function getAllPlant(){
        return Plant::with('top','fertilizer')->orderBy('updated_at', 'desc')->get();
    }

    public function getPlantRecommend(){
        return Plant::with('top','fertilizer')->orderBy('updated_at', 'desc')->offset(0)->limit(5)->get();
    }


    public function getPlantByID($plant_id){
        return Plant::with('top','fertilizer', 'sop')->where('plant_id', $plant_id)->first();
    }

    public function searchPlant($request){
        return Plant::with('top','fertilizer')
        ->where('plant_name', 'like', '%'.$request->searchnews.'%')
        ->orderBy('updated_at', 'desc')->get();
    }
}   