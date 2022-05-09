<?php

namespace App\Http\Services;

use App\Models\CategoryVeterinaryMedicine;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class CategoryVeterinaryMedicineService{

    public function getAllCategoryVeterinaryMedicine(){
        return CategoryVeterinaryMedicine::paginate(15);
    }
    public function getCategoryVeterinaryMedicine(){
        return CategoryVeterinaryMedicine::get();
    }

    public function create($request){
        try {

            $check = CategoryVeterinaryMedicine::where("category_vm",$request->input("category_vm"))->count();
            if($check){
                return Session::flash('error', 'Đã Tồn Tại Danh Mục Này !!! ');
            }

            $request->except('_token');
            CategoryVeterinaryMedicine::create([
                'category_vm' => (string)$request->input('category_vm')
            ]);
            Session::flash('success', 'Thêm Danh Mục Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Danh Mục Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
    }

    
    public function update($request, $categorypesticides){
        try {
            
            $request->except('_token');

            $categorypesticides->category_vm = $request->input('category_vm');
            $categorypesticides->updated_at =  date('Y-m-d H:i:s');
            $categorypesticides->save();

            Session::flash('success', 'Cập Nhật Danh Mục Thành Công !!! ' );
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Danh Mục Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function delete($request){
        $categorypesticides = CategoryVeterinaryMedicine::where('category_vm_id', $request->input('id'))->first();
        if($categorypesticides){
            $categorypesticides->delete();
            return true;
        }
        return false;
    }
    
}