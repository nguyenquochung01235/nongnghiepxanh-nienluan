<?php

namespace App\Http\Services\NongNghiepService;

use App\Models\Soa;
use Illuminate\Support\Facades\Session;

class SoaService{

    public function getAllSoa(){
        return Soa::with('animal','veterinary_medicine')->orderBy('updated_at', 'desc')->get();
    }

    public function getSoaRecommend(){
        return Soa::with('animal','veterinary_medicine')->orderBy('updated_at', 'desc')->offset(0)->limit(5)->get();
    }


    public function getSoaByID($soa_id){
        return Soa::with('animal','veterinary_medicine')->where('soa_id', $soa_id)->first();
    }

    public function searchSoa($request){
        return Soa::with('animal','veterinary_medicine')
        ->where('soa_name', 'like', '%'.$request->searchnews.'%')
        ->orderBy('updated_at', 'desc')->get();
    }
}   