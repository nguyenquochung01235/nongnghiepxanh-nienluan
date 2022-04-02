<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\NongNghiepNewsService;
use Illuminate\Http\Request;

class MainController extends Controller
{

    protected $nongnghiepNewsService;

    public function __construct(NongNghiepNewsService $nongnghiepNewsService)
    {
        $this->nongnghiepNewsService = $nongnghiepNewsService;
    }


    public function index(){
        $hostNews = $this->nongnghiepNewsService->getHotNew1();
        $hostNews2 = $this->nongnghiepNewsService->getHotNew2();
        $hostNews3 = $this->nongnghiepNewsService->getHotNew3();
        $marketHot1 = $this->nongnghiepNewsService->marketHot1();
        $marketHot2 = $this->nongnghiepNewsService->marketHot2();
        $agriculturue = $this->nongnghiepNewsService->agriculturue();
        $localProduct1 = $this->nongnghiepNewsService->localProduct1();
        $localProduct2 = $this->nongnghiepNewsService->localProduct2();
        $enterprise1 = $this->nongnghiepNewsService->enterprise1();
        $enterprise2 = $this->nongnghiepNewsService->enterprise2();
        $financy1 = $this->nongnghiepNewsService->financy1();
        $financy2 = $this->nongnghiepNewsService->financy2();
        $organic1 = $this->nongnghiepNewsService->organic1();
        $organic2 = $this->nongnghiepNewsService->organic2();
        $cuisine1 = $this->nongnghiepNewsService->cuisine1();
        $cuisine2 = $this->nongnghiepNewsService->cuisine2();

        return view('nongnghiepxanh.home',[
            'title' => 'Nông Nghiệp Xanh | Phát Triển Nông Nghiệp Vững Mạnh Lâu Dài',
            'hostNews' => $hostNews,
            'hostNews2' => $hostNews2,
            'hostNews3' => $hostNews3,
            'marketHot1' => $marketHot1,
            'marketHot2' => $marketHot2,
            'agriculturue' => $agriculturue,
            'localProduct1' => $localProduct1,
            'localProduct2' => $localProduct2,
            'enterprise1' => $enterprise1,
            'enterprise2' => $enterprise2,
            'financy1' => $financy1,
            'financy2' => $financy2,
            'organic1' => $organic1,
            'organic2' => $organic2,
            'cuisine1' => $cuisine1,
            'cuisine2' => $cuisine2
        ]);

    }
}