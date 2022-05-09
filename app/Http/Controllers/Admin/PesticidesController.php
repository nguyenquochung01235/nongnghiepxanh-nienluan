<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryPesticidesService;
use App\Http\Services\PesticidesService;
use App\Models\Pesticides;
use Illuminate\Http\Request;

class PesticidesController extends Controller
{
    protected $pesticidesService;
    protected $categoryPesticidesService;

    public function __construct(PesticidesService $pesticidesService, CategoryPesticidesService $categoryPesticidesService)
    {
        $this->pesticidesService = $pesticidesService;
        $this->categoryPesticidesService = $categoryPesticidesService;
    }

    public function index(){
        $pesticides = $this->pesticidesService->getAllPesticides();
        $categorypesticides =  $this->categoryPesticidesService->getCategoryPesticides();
        return view('administrator.pesticides.list',[
            'title'=>'Danh sách thuốc',
            'pesticides' => $pesticides,
            'categorypesticides' => $categorypesticides
        ]);
    }

    public function filter(Request $request){
        $pesticides = $this->pesticidesService->filter($request);
        $categorypesticides =  $this->categoryPesticidesService->getCategoryPesticides();
        return view('administrator.pesticides.list',[
            'title'=>'Danh sách thuốc',
            'pesticides' => $pesticides,
            'categorypesticides' => $categorypesticides
        ]); 
    }


    public function add(){
        $categorypesticides =  $this->categoryPesticidesService->getCategoryPesticides();
        return view("administrator.pesticides.add",[
            'title' => "Thêm Loại Thuốc Mới",
            'categorypesticides' => $categorypesticides
        ]);

    }

    public function create(Request $request){
        $result = $this->pesticidesService->create($request);
        if($result){
            return redirect('/administrator/pesticides');
        }
        return redirect()->back()->withInput();
    }


    
    public function view(Pesticides $pesticides){
        $pesticides = $this->pesticidesService->getPesticidesById($pesticides->pesticides_id);
        return view('administrator.pesticides.pesticides',[
            'title'=>'Chi tiết thuốc',
            'pesticides' => $pesticides
        ]);
    }

    public function show(Pesticides $pesticides){
        $pesticides = $this->pesticidesService->getPesticidesById($pesticides->pesticides_id);;
        $categorypesticides =  $this->categoryPesticidesService->getCategoryPesticides();;
        return view('administrator.pesticides.update',[
            'title'=>'Chỉnh sửa thuốc: ' .  $pesticides[0]->pesticides_name,
            'pesticides' => $pesticides,
            'categorypesticides' => $categorypesticides
        ]);
    }


    public function update(Request $request, Pesticides $pesticides){
        $result = $this->pesticidesService->update($request, $pesticides->pesticides_id);
        if($result){
           return redirect('/administrator/pesticides');
        }
        return redirect()->back()->withInput();
    }
    

    public function delete(Request $request){
        $result = $this->pesticidesService->delete($request);
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


    public function uploadImg(Request $request){
        $url = $this->pesticidesService->uploadImg($request);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url'   => $url
            ]);
        }
    }
}
