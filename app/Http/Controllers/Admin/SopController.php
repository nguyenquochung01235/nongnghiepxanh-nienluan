<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\SopService;
use Illuminate\Http\Request;

class SopController extends Controller
{
    
    protected $sopService;

    public function __construct(SopService $sopService)
    {
        $this->sopService = $sopService;
    }

    public function search(Request $request){
       $result = $this->sopService->search($request);
       return $result;
    }


}
