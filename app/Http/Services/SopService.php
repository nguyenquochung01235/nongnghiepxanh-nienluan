<?php

namespace App\Http\Services;

use App\Models\Sop;
use Illuminate\Support\Facades\Session;

class SopService{
    
    public function getSop(){
        Sop::get();
    }

}
