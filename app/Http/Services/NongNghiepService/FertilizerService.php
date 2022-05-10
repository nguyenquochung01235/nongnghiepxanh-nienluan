<?php

namespace App\Http\Services\NongNghiepService;

use App\Models\Fertilizer;
use Illuminate\Support\Facades\Session;

class FertilizerService{

    public function getAllFertilizer(){
        return Fertilizer::with('plant', 'category_fertilizer')->orderBy('updated_at', 'desc')->get();
    }

    public function getFertilizerRecommend(){
        return Fertilizer::with('plant', 'category_fertilizer')->orderBy('updated_at', 'desc')->offset(0)->limit(5)->get();
    }


    public function getFertilizerByID($fertilizer_id){
        return Fertilizer::with('plant', 'category_fertilizer')->where('fertilizer_id', $fertilizer_id)->first();
    }

    public function searchFertilizer($request){
        return Fertilizer::with('plant','category_fertilizer')
        ->where('fertilizer_name', 'like', '%'.$request->searchnews.'%')
        ->orderBy('updated_at', 'desc')->get();
    }
}   