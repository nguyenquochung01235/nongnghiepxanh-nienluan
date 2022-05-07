<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\SoaService;
use App\Models\Soa;
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

     public function index(){
        $soa =  $this->soaService->getAllSoa();
        return view('administrator.soa.list',[
            'title' => 'Danh Sách Bệnh Hại',
            'soa' => $soa
        ]);
    }

    public function filter(Request $request){
        $soa =  $this->soaService->filter($request);
        return view('administrator.soa.list',[
            'title' => 'Danh Sách Bệnh Hại',
            'soa' => $soa
        ]);
    }

    public function add(){
        return view('administrator.soa.add',[
            'title' => 'Thêm Loại Bệnh Hại Mới',
        ]);
    }

    public function create(Request $request){
        $result = $this->soaService->create($request);
        if($result){
            return redirect('/administrator/soa');
        }
        return redirect()->back()->withInput();
    }

    public function view(Soa $soa){
        $soa = $this->soaService->getSoaById($soa->soa_id);
        // return dd($soa);
        return view('administrator.soa.soa',[
            'title' => 'Chi tiết loại bệnh: ' . $soa[0]->soa_name,
            'soa' => $soa
        ]);
    }


    public function show(Soa $soa){
        return view('administrator.soa.update',[
            'title' => 'Chi tiết loại bệnh: ' . $soa->soa_name,
            'soa' => $soa
        ]);
    }

    public function delete(Request $request){
        $result = $this->soaService->delete($request);
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
    
    public function update(Request $request, Soa $soa){
        $result = $this->soaService->update($request, $soa->soa_id);
        if($result){
           return redirect('/administrator/soa');
        }
        return redirect()->back()->withInput();
    }



      
    public function uploadImg(Request $request){
        $url = $this->soaService->uploadImg($request);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url'   => $url
            ]);
        }
    }
}
