<?php

namespace App\Http\Services;

use App\Models\Sop;
use Illuminate\Support\Facades\Session;

class SopService{
    
    public function getSop(){
        Sop::get();
    }

    public function search($request){
        return Sop::where('sop_name','like','%'.$request->search_value.'%')->get();
    }

}
