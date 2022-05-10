<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\NongNghiepService\SopService;
use App\Models\Sop;
use Illuminate\Http\Request;

class SopController extends Controller
{
    protected $sopService;

    public function __construct(SopService $sopService)
    {
        $this->sopService = $sopService;
    }


    public function index(){
        $sop = $this->sopService->getAllSop();
        return view('nongnghiepxanh.sop.list',[
            'title' => 'Danh Sách Bệnh Hại',
            'sop' => $sop
        ]);
    }

    public function view(Sop $sop){
        $sop = $this->sopService->getSopByID($sop->sop_id);
        $listsop = $this->sopService->getSopRecommend();
        return view('nongnghiepxanh.sop.view',[
            'title' => 'Chi tiết giống bệnh hại',
            'sop' => $sop,
            'listsop' => $listsop
        ]);
    }

    public function searchSop(Request $request){
        $sop = $this->sopService->searchSop($request);
        return view('nongnghiepxanh.sop.searchsop',[
            'title' => 'Kết Quả Tìm Kiếm: ' . $request->searchnews,
            'sop' => $sop
        ]);
    }
}
