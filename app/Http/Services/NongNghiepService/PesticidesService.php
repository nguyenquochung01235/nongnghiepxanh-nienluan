<?php

namespace App\Http\Services\NongNghiepService;

use App\Models\Pesticides;
use Illuminate\Support\Facades\Session;

class PesticidesService{

    public function getAllPesticides(){
        return Pesticides::with('sop','fertilizer')->orderBy('updated_at', 'desc')->get();
    }

    public function getPesticidesRecommend(){
        return Pesticides::with('sop','fertilizer')->orderBy('updated_at', 'desc')->offset(0)->limit(5)->get();
    }


    public function getPesticidesByID($plant_id){
        return Pesticides::with('sop','fertilizer', 'sop')->where('plant_id', $plant_id)->first();
    }

    public function searchPesticides($request){
        return Pesticides::with('sop','fertilizer')
        ->where('plant_name', 'like', '%'.$request->searchnews.'%')
        ->orderBy('updated_at', 'desc')->get();
    }
}   