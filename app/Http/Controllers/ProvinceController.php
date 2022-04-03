<?php

namespace App\Http\Controllers;

use App\Http\Services\ProvinceService;
use App\Models\Province;
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
            return redirect("/administrator/province/");
        }
        return redirect()->back()->withInput();
    }

    public function show(Province $province){
        return view('administrator.province.update',[
            'title' => 'Chỉnh Sửa Tỉnh - Thành Phố',
            'province' =>  $province
        ]);
    }

    public function update(Province $province, Request $request){
        // return dd($province, $request->all());
        $result = $this->provinceService->update($province, $request);
        if($result){
            return redirect('/administrator/province/');
        }
        return redirect()->back();
    }

 

    public function delete(Request $request){
        $result = $this->provinceService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => "Đã xóa thành công !!!"
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => "Không thể xóa vì đã liên kết dữ liệu !!!"
            ]);
        }
    }
    


}
