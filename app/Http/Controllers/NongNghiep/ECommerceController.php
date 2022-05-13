<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\NongNghiepService\ECommerceService;
use Illuminate\Http\Request;

class ECommerceController extends Controller
{

    protected $ecommerceService;

    public function __construct(ECommerceService $ecommerceService)
    {
        $this->ecommerceService = $ecommerceService;        
    }

    public function index(){
        $categoryecommerce = $this->ecommerceService->getAllCategoryECommerce();
        return view('nongnghiepxanh.e-commerce.index',[
            'title' => 'Chợ Nông Nghiệp',
            'categoryecommerce' => $categoryecommerce
        ]);
    }
}
