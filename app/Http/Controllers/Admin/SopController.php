<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\SopService;
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
        $sop =  $this->sopService->getAllSop();
        return view('administrator.sop.list',[
            'title' => 'Danh Sách Bệnh Hại',
            'sop' => $sop
        ]);
    }

    public function filter(Request $request){
        $sop =  $this->sopService->filter($request);
        return view('administrator.sop.list',[
            'title' => 'Danh Sách Bệnh Hại',
            'sop' => $sop
        ]);
    }


    public function add(){
        return view('administrator.sop.add',[
            'title' => 'Thêm Loại Bệnh Hại Mới',

        ]);
    }

    public function create(Request $request){
        $result = $this->sopService->create($request);
        if($result){
            return redirect('/administrator/sop');
        }
        return redirect()->back()->withInput();
    }

    public function view(Sop $sop){
        $sop = $this->sopService->getSopById($sop->sop_id);
        // return dd($sop);
        return view('administrator.sop.sop',[
            'title' => 'Chi tiết loại bệnh: ' . $sop[0]->sop_name,
            'sop' => $sop
        ]);
    }

    public function show(Sop $sop){
        return view('administrator.sop.update',[
            'title' => 'Chi tiết loại bệnh: ' . $sop->sop_name,
            'sop' => $sop
        ]);
    }

    public function update(Request $request, Sop $sop){
        $result = $this->sopService->update($request, $sop->sop_id);
        if($result){
           return redirect('/administrator/sop');
        }
        return redirect()->back()->withInput();
    }


   
    public function delete(Request $request){
        $result = $this->sopService->delete($request);
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


    public function search(Request $request){
       $result = $this->sopService->search($request);
       return $result;
    }

    
    public function uploadImg(Request $request){
        $url = $this->sopService->uploadImg($request);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url'   => $url
            ]);
        }
    }


}
