<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryFertilizerService;
use App\Http\Services\FertilizerService;
use Illuminate\Http\Request;

class FertilizerController extends Controller
{

    protected $fertilizerService;
    protected $categoryFertilizerService;

    public function __construct(FertilizerService $fertilizerService, CategoryFertilizerService $categoryFertilizerService)
    {
        $this->fertilizerService = $fertilizerService;
        $this->categoryFertilizerService = $categoryFertilizerService;
    }

    public function index(){
        $fertilizer = $this->fertilizerService->getAllFertilizer();
        $categoryfertilizer =  $this->categoryFertilizerService->getCategoryFertilizer();
        return view('administrator.fertilizer.list',[
            'title'=>'Danh sách phân bón',
            'fertilizer' => $fertilizer,
            'categoryfertilizer' => $categoryfertilizer
        ]);
    }

}
