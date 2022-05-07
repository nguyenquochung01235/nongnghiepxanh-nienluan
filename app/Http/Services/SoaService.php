<?php

namespace App\Http\Services;

use App\Models\Soa;
use Illuminate\Support\Facades\Session;

class SoaService{
    

    public function search($request){
        return Soa::where('soa_name','like','%'.$request->search_value.'%')->get();
    }


}
