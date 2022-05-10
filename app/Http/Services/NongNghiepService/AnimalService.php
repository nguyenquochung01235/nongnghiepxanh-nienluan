<?php

namespace App\Http\Services\NongNghiepService;

use App\Models\Animal;
use Illuminate\Support\Facades\Session;

class AnimalService{

    public function getAllAnimal(){
        return Animal::with('toa')->orderBy('updated_at', 'desc')->get();
    }

    public function getAnimalRecommend(){
        return Animal::with('toa')->orderBy('updated_at', 'desc')->offset(0)->limit(5)->get();
    }


    public function getAnimalByID($animal_id){
        return Animal::with('toa','soa')->where('animal_id', $animal_id)->first();
    }

    public function searchAnimal($request){
        return Animal::with('toa')
        ->where('animal_name', 'like', '%'.$request->searchnews.'%')
        ->orderBy('updated_at', 'desc')->get();
    }
}   