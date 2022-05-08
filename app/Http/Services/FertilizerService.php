<?php

namespace App\Http\Services;

use App\Models\Fertilizer;
use Illuminate\Support\Facades\Session;

class FertilizerService {

    public function getAllFertilizer(){
        return Fertilizer::with('category_fertilizer')->orderBy('updated_at', 'desc')->paginate(10);
    }

    
}
