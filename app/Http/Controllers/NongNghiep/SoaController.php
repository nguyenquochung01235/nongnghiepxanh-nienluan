<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\NongNghiepService\SoaService;
use App\Models\Soa;
use Illuminate\Http\Request;

class SoaController extends Controller
{
    protected $soaService;

    public function __construct(SoaService $soaService)
    {
        $this->soaService = $soaService;
    }


    public function index(){
        $soa = $this->soaService->getAllSoa();
        return view('nongnghiepxanh.soa.list',[
            'title' => 'Danh Sách Bệnh Hại',
            'soa' => $soa
        ]);
    }

    public function view(Soa $soa){
        $soa = $this->soaService->getSoaByID($soa->soa_id);
        $listsoa = $this->soaService->getSoaRecommend();
        return view('nongnghiepxanh.soa.view',[
            'title' => 'Chi tiết bệnh hại',
            'soa' => $soa,
            'listsoa' => $listsoa
        ]);
    }

    public function searchSoa(Request $request){
        $soa = $this->soaService->searchSoa($request);
        return view('nongnghiepxanh.soa.searchsoa',[
            'title' => 'Kết Quả Tìm Kiếm: ' . $request->searchnews,
            'soa' => $soa
        ]);
    }
}
