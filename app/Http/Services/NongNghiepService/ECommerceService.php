<?php

namespace App\Http\Services\NongNghiepService;

use App\Models\CategoryECommerce;
use Illuminate\Support\Facades\Session;

class ECommerceService{

    public function getAllCategoryECommerce(){
        return CategoryECommerce::where('active', '1')->get();
    }

}   