<?php

namespace App\Http\Services\NongNghiepService;

use App\Models\Pesticides;
use Illuminate\Support\Facades\Session;

class PesticidesService{

    public function getAllPesticides(){
        return Pesticides::with('sop', 'category_pesticides')->orderBy('updated_at', 'desc')->get();
    }

    public function getPesticidesRecommend(){
        return Pesticides::with('sop', 'category_pesticides')->orderBy('updated_at', 'desc')->offset(0)->limit(5)->get();
    }


    public function getPesticidesByID($pesticides_id){
        return Pesticides::with('sop', 'category_pesticides')->where('pesticides_id', $pesticides_id)->first();
    }

    public function searchPesticides($request){
        return Pesticides::with('sop','category_pesticides')
        ->where('pesticides_name', 'like', '%'.$request->searchnews.'%')
        ->orderBy('updated_at', 'desc')->get();
    }
}   