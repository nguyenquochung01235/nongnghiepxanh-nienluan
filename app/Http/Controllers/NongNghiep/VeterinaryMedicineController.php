<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\NongNghiepService\VeterinaryMedicineService;
use App\Models\VeterinaryMedicine;
use Illuminate\Http\Request;

class VeterinaryMedicineController extends Controller
{
    
    protected $veterinarymedicineService;

    public function __construct(VeterinaryMedicineService $veterinarymedicineService)
    {
        $this->veterinarymedicineService = $veterinarymedicineService;
    }


    public function index(){
        $veterinarymedicine = $this->veterinarymedicineService->getAllVeterinaryMedicine();
        return view('nongnghiepxanh.veterinarymedicine.list',[
            'title' => 'Danh Sách Thuốc Thú Y',
            'veterinarymedicine' => $veterinarymedicine
        ]);
    }

    public function view(VeterinaryMedicine $veterinarymedicine){
        $veterinarymedicine = $this->veterinarymedicineService->getVeterinaryMedicineByID($veterinarymedicine->vm_id);
        // return dd($veterinarymedicine);  
        $listveterinarymedicine = $this->veterinarymedicineService->getVeterinaryMedicineRecommend();
        return view('nongnghiepxanh.veterinarymedicine.view',[
            'title' => 'Chi tiết thuốc thú y',
            'veterinarymedicine' => $veterinarymedicine,
            'listveterinarymedicine' => $listveterinarymedicine
        ]);
    }

    public function searchVeterinaryMedicine(Request $request){
        $veterinarymedicine = $this->veterinarymedicineService->searchVeterinaryMedicine($request);
        // return dd($veterinarymedicine);
        return view('nongnghiepxanh.veterinarymedicine.searchveterinarymedicine',[
            'title' => 'Kết Quả Tìm Kiếm: ' . $request->searchnews,
            'veterinarymedicine' => $veterinarymedicine
        ]);
    }
}
