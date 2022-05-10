<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\NongNghiepService\PesticidesService;
use App\Models\Pesticides;
use Illuminate\Http\Request;

class PesticidesController extends Controller
{
    protected $pesticidesService;

    public function __construct(PesticidesService $pesticidesService)
    {
        $this->pesticidesService = $pesticidesService;
    }


    public function index(){
        $pesticides = $this->pesticidesService->getAllPesticides();
        return view('nongnghiepxanh.pesticides.list',[
            'title' => 'Danh Sách Cây Trồng',
            'pesticides' => $pesticides
        ]);
    }

    public function view(Pesticides $pesticides){
        $pesticides = $this->pesticidesService->getPesticidesByID($pesticides->pesticides_id);
        $listpesticides = $this->pesticidesService->getPesticidesRecommend();
        return view('nongnghiepxanh.pesticides.view',[
            'title' => 'Chi tiết giống cây trồng',
            'pesticides' => $pesticides,
            'listpesticides' => $listpesticides
        ]);
    }

    public function searchPesticides(Request $request){
        $pesticides = $this->pesticidesService->searchPesticides($request);
        return view('nongnghiepxanh.pesticides.searchpesticides',[
            'title' => 'Kết Quá Tìm Kiếm: ' . $request->searchnews,
            'pesticides' => $pesticides
        ]);
    }
}
