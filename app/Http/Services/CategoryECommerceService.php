<?php

namespace App\Http\Services;

use App\Models\CategoryECommerce;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class CategoryECommerceService{

    public function getAllCategoryECommerce(){
        return CategoryECommerce::paginate(10);
    }
    public function getCategoryECommerce(){
        return CategoryECommerce::get();
    }


    public function create($request){
        try {

            $check = CategoryECommerce::where("category_ecommerce",$request->input("category_ecommerce"))->count();
            if($check){
                return Session::flash('error', 'Đã Tồn Tại Danh Mục Này !!! ');
            }
            $active = 1;
            if($request->input('active') =="on"){
                $active = 1;
            }else{
                $active = 0;
            }
            $request->except('_token');
            CategoryECommerce::create([
                'category_ecommerce' => (string)$request->input('category_ecommerce'),
                'category_ecommerce_img' => (string)$request->input('category_ecommerce_img_1_link'),
                'active' => (int)$active
            ]);
            Session::flash('success', 'Thêm Danh Mục Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Danh Mục Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
    }


    public function update($request, $category_ecommerce){
        try {
            $active = 1;
            if($request->input('active') =="on"){
                $active = 1;
            }else{
                $active = 0;
            }
            $request->except('_token');

            $category_ecommerce->category_ecommerce = $request->input('category_ecommerce');
            $category_ecommerce->category_ecommerce_img = $request->input('category_ecommerce_img_1_link');
            $category_ecommerce->active = (int)$active;
            $category_ecommerce->updated_at =  date('Y-m-d H:i:s');
            $category_ecommerce->save();

            Session::flash('success', 'Cập Nhật Danh Mục Thành Công !!! ' );
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Danh Mục Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function delete($request){
        $categoryecommerce = CategoryECommerce::where('category_ecommerce_id', $request->input('id'))->first();
        if($categoryecommerce){
            $categoryecommerce->delete();
            return true;
        }
        return false;
    }


    public function uploadImg($request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = date("Y-m-d-H-m-s").$request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/category-ecommerce';

                $request->file('file')->storeAs(
                    'public/' . $pathFull, $name
                );

                return '/storage/' . $pathFull . '/' . $name;

            } catch (\Exception $error) {
                return false;
            }
        }
    }
      
}