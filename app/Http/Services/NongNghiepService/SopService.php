<?php

namespace App\Http\Services\NongNghiepService;

use App\Models\Sop;
use Illuminate\Support\Facades\Session;

class SopService{

    public function getAllSop(){
        return Sop::with('plant','pesticides')->orderBy('updated_at', 'desc')->get();
    }

    public function getSopRecommend(){
        return Sop::with('plant','pesticides')->orderBy('updated_at', 'desc')->offset(0)->limit(5)->get();
    }


    public function getSopByID($sop_id){
        return Sop::with('plant','pesticides')->where('sop_id', $sop_id)->first();
    }

    public function searchSop($request){
        return Sop::with('plant','pesticides')
        ->where('sop_name', 'like', '%'.$request->searchnews.'%')
        ->orderBy('updated_at', 'desc')->get();
    }
}   