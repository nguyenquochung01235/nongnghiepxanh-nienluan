<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\SoaService;
use Illuminate\Http\Request;

class SoaController extends Controller
{

    protected $soaService;

    public function __construct(SoaService $soaService)
    {
        $this->soaService = $soaService;
    }

    public function search(Request $request){
        $result = $this->soaService->search($request);
        return $result;
     }
}
