<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\NongNghiepService\FertilizerService;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class FertilizerController extends Controller
{
    protected $fertilizerService;

    public function __construct(FertilizerService $fertilizerService)
    {
        $this->fertilizerService = $fertilizerService;
    }


    public function index(){
        $fertilizer = $this->fertilizerService->getAllFertilizer();
        // return dd( $fertilizer);
        return view('nongnghiepxanh.fertilizer.list',[
            'title' => 'Danh Sách Phân Bón',
            'fertilizer' => $fertilizer
        ]);
    }

    public function view(Fertilizer $fertilizer){
        $fertilizer = $this->fertilizerService->getFertilizerByID($fertilizer->fertilizer_id);
        $listfertilizer = $this->fertilizerService->getFertilizerRecommend();
        return view('nongnghiepxanh.fertilizer.view',[
            'title' => 'Chi tiết phân bón',
            'fertilizer' => $fertilizer,
            'listfertilizer' => $listfertilizer
        ]);
    }

    public function searchFertilizer(Request $request){
        $fertilizer = $this->fertilizerService->searchFertilizer($request);
        // return dd($fertilizer);
        return view('nongnghiepxanh.fertilizer.searchfertilizer',[
            'title' => 'Kết Quả Tìm Kiếm: ' . $request->searchnews,
            'fertilizer' => $fertilizer
        ]);
    }
}
