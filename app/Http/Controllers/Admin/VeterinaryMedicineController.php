<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryVeterinaryMedicineService;
use App\Http\Services\VeterinaryMedicineService;
use App\Models\VeterinaryMedicine;
use Illuminate\Http\Request;

class VeterinaryMedicineController extends Controller
{
    protected $veterinaryMedicineService;
    protected $categoryVeterinaryMedicineService;

    public function __construct(VeterinaryMedicineService $veterinaryMedicineService, CategoryVeterinaryMedicineService $categoryVeterinaryMedicineService)
    {
        $this->veterinaryMedicineService = $veterinaryMedicineService;
        $this->categoryVeterinaryMedicineService = $categoryVeterinaryMedicineService;
    }

    public function index(){
        $veterinarymedicine = $this->veterinaryMedicineService->getAllVeterinaryMedicine();
        $categoryveterinarymedicine =  $this->categoryVeterinaryMedicineService->getCategoryVeterinaryMedicine();
        return view('administrator.veterinary-medicine.list',[
            'title'=>'Danh sách thuốc',
            'veterinarymedicine' => $veterinarymedicine,
            'categoryveterinarymedicine' => $categoryveterinarymedicine
        ]);
    }

    public function filter(Request $request){
       $veterinarymedicine = $this->veterinaryMedicineService->filter($request);
        $categoryveterinarymedicine =  $this->categoryVeterinaryMedicineService->getCategoryVeterinaryMedicine();
        return view('administrator.veterinary-medicine.list',[
            'title'=>'Danh sách thuốc',
            'veterinarymedicine' =>$veterinarymedicine,
            'categoryveterinarymedicine' => $categoryveterinarymedicine
        ]); 
    }


    public function add(){
        $categoryveterinarymedicine =  $this->categoryVeterinaryMedicineService->getCategoryVeterinaryMedicine();
        return view("administrator.veterinary-medicine.add",[
            'title' => "Thêm Loại Thuốc Mới",
            'categoryveterinarymedicine' => $categoryveterinarymedicine
        ]);

    }

    public function create(Request $request){
        $result = $this->veterinaryMedicineService->create($request);
        if($result){
            return redirect('/administrator/veterinary-medicine');
        }
        return redirect()->back()->withInput();
    }


    
    public function view(VeterinaryMedicine $veterinarymedicine){
        
       $veterinarymedicine = $this->veterinaryMedicineService->getVeterinaryMedicineById($veterinarymedicine->vm_id);
        return view('administrator.veterinary-medicine.veterinarymedicine',[
            'title'=>'Chi tiết thuốc',
            'veterinarymedicine' =>$veterinarymedicine
        ]);
    }

    public function show(VeterinaryMedicine $veterinarymedicine){
       $veterinarymedicine = $this->veterinaryMedicineService->getVeterinaryMedicineById($veterinarymedicine->vm_id);
        $categoryveterinarymedicine =  $this->categoryVeterinaryMedicineService->getCategoryVeterinaryMedicine();
        return view('administrator.veterinary-medicine.update',[
            'title'=>'Chỉnh sửa thuốc: ' . $veterinarymedicine[0]->vm_name,
            'veterinarymedicine' =>$veterinarymedicine,
            'categoryveterinarymedicine' => $categoryveterinarymedicine
        ]);
    }


    public function update(Request $request, VeterinaryMedicine $veterinarymedicine){
        $result = $this->veterinaryMedicineService->update($request,$veterinarymedicine->vm_id);
        if($result){
           return redirect('/administrator/veterinary-medicine');
        }
        return redirect()->back()->withInput();
    }
    

    public function delete(Request $request){
        $result = $this->veterinaryMedicineService->delete($request);
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
        $url = $this->veterinaryMedicineService->uploadImg($request);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url'   => $url
            ]);
        }
    }
}
