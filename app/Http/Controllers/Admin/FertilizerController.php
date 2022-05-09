<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryFertilizerService;
use App\Http\Services\FertilizerService;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class FertilizerController extends Controller
{

    protected $fertilizerService;
    protected $categoryFertilizerService;

    public function __construct(FertilizerService $fertilizerService, CategoryFertilizerService $categoryFertilizerService)
    {
        $this->fertilizerService = $fertilizerService;
        $this->categoryFertilizerService = $categoryFertilizerService;
    }

    public function index(){
        $fertilizer = $this->fertilizerService->getAllFertilizer();
        $categoryfertilizer =  $this->categoryFertilizerService->getCategoryFertilizer();
        return view('administrator.fertilizer.list',[
            'title'=>'Danh sách phân bón',
            'fertilizer' => $fertilizer,
            'categoryfertilizer' => $categoryfertilizer
        ]);
    }

    public function filter(Request $request){
        $fertilizer = $this->fertilizerService->filter($request);
        $categoryfertilizer =  $this->categoryFertilizerService->getCategoryFertilizer();
        return view('administrator.fertilizer.list',[
            'title'=>'Danh sách phân bón',
            'fertilizer' => $fertilizer,
            'categoryfertilizer' => $categoryfertilizer
        ]); 
    }


    public function add(){
        $categoryfertilizer =  $this->categoryFertilizerService->getCategoryFertilizer();
        return view("administrator.fertilizer.add",[
            'title' => "Thêm Loại Phân Bón Mới",
            'categoryfertilizer' => $categoryfertilizer
        ]);

    }

    public function create(Request $request){
        $result = $this->fertilizerService->create($request);
        if($result){
            return redirect('/administrator/fertilizer');
        }
        return redirect()->back()->withInput();
    }


    
    public function view(Fertilizer $fertilizer){
        $fertilizer = $this->fertilizerService->getFertilizerById($fertilizer->fertilizer_id);
        return view('administrator.fertilizer.fertilizer',[
            'title'=>'Chi tiết phân bón',
            'fertilizer' => $fertilizer
        ]);
    }

    public function show(Fertilizer $fertilizer){
        $fertilizer = $this->fertilizerService->getFertilizerById($fertilizer->fertilizer_id);;
        $categoryfertilizer =  $this->categoryFertilizerService->getCategoryFertilizer();;
        return view('administrator.fertilizer.update',[
            'title'=>'Chỉnh sửa phân bón: ' .  $fertilizer[0]->fertilizer_name,
            'fertilizer' => $fertilizer,
            'categoryfertilizer' => $categoryfertilizer
        ]);
    }


    public function update(Request $request, Fertilizer $fertilizer){
        $result = $this->fertilizerService->update($request, $fertilizer->fertilizer_id);
        if($result){
           return redirect('/administrator/fertilizer');
        }
        return redirect()->back()->withInput();
    }
    

    public function delete(Request $request){
        $result = $this->fertilizerService->delete($request);
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
        $url = $this->fertilizerService->uploadImg($request);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url'   => $url
            ]);
        }
    }

}
