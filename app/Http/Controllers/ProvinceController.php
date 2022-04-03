<?php

namespace App\Http\Controllers;

use App\Http\Services\ProvinceService;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    protected $provinceService;

    public function __construct(ProvinceService $provinceService)
    {
        $this->provinceService= $provinceService;
    }


    public function index(){
        $province = $this->provinceService->getAllProvince();
        
        return view('administrator.province.list',[
            'title' => 'Danh Sách Tỉnh - Thành Phố',
            'province' => $province
        ]);
    }

    public function add(){
        return view('administrator.province.add',[
            'title' => 'Thêm Tỉnh - Thành Phố'
        ]);
    }

    public function create(Request $request){
        $result = $this->provinceService->create($request);
        // return dd($request->all());
        if($result){
            return redirect("/administrator/province/add");
        }
        return redirect()->back()->withInput();
    }

    


}
