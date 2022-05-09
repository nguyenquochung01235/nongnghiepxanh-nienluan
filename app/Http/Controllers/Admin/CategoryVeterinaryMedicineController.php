<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryVeterinaryMedicineService;
use App\Models\CategoryVeterinaryMedicine;
use Illuminate\Http\Request;

class CategoryVeterinaryMedicineController extends Controller
{
    protected $categoryVeterinaryMedicineService;

    public function __construct(CategoryVeterinaryMedicineService $categoryVeterinaryMedicineService)
    {
        $this->categoryVeterinaryMedicineService = $categoryVeterinaryMedicineService;
    }

    public function index(){
        $categoryveterinarymedicine = $this->categoryVeterinaryMedicineService->getAllCategoryVeterinaryMedicine();
        return view('administrator.category-veterinary-medicine.list',[
            'title' => 'Danh Mục Thuốc Thú Y',
            'categoryveterinarymedicine' => $categoryveterinarymedicine
        ]);
    }

    public function add(){
        return view('administrator.category-veterinary-medicine.add',[
            'title' => 'Thêm Danh Mục Thuốc Thú Y'
        ]);
    }

    public function create(Request $request){
        $result = $this->categoryVeterinaryMedicineService->create($request);
        if($result){
            return redirect('/administrator/category-veterinary-medicine/');
        }
        return redirect()->back();
    }

    
    public function show(CategoryVeterinaryMedicine $categoryveterinarymedicine){
        return view('administrator.category-veterinary-medicine.update',[
            'title' => 'Chỉnh Sửa Danh Mục Thuốc Thú Y',
            'categoryveterinarymedicine' => $categoryveterinarymedicine
        ]);
    }

    public function update(Request $request, CategoryVeterinaryMedicine $categoryveterinarymedicine){
         $result = $this->categoryVeterinaryMedicineService->update( $request, $categoryveterinarymedicine);
         if($result){
            return redirect('/administrator/category-veterinary-medicine');
        }
        return redirect()->back();
    }


    public function delete(Request $request){
        $result = $this->categoryVeterinaryMedicineService->delete($request);
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
