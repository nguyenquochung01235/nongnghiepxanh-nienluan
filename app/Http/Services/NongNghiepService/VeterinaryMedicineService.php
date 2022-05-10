<?php

namespace App\Http\Services\NongNghiepService;

use App\Models\VeterinaryMedicine;
use Illuminate\Support\Facades\Session;

class VeterinaryMedicineService{

    public function getAllVeterinaryMedicine(){
        return VeterinaryMedicine::with('soa', 'category_vm')->orderBy('updated_at', 'desc')->get();
    }

    public function getVeterinaryMedicineRecommend(){
        return VeterinaryMedicine::with('soa', 'category_vm')->orderBy('updated_at', 'desc')->offset(0)->limit(5)->get();
    }


    public function getVeterinaryMedicineByID($vm_id){
        return VeterinaryMedicine::with('soa', 'category_vm')->where('vm_id', $vm_id)->first();
    }

    public function searchVeterinaryMedicine($request){
        return VeterinaryMedicine::with('soa','category_vm')
        ->where('vm_name', 'like', '%'.$request->searchnews.'%')
        ->orderBy('updated_at', 'desc')->get();
    }
}   