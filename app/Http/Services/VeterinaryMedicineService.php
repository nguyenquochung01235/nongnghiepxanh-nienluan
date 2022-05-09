<?php

namespace App\Http\Services;

use App\Models\Soa;
use App\Models\VeterinaryMedicine;
use Illuminate\Support\Facades\Session;

class VeterinaryMedicineService {

    public function getAllVeterinaryMedicine(){
        return VeterinaryMedicine::with('category_vm')->orderBy('updated_at', 'desc')->paginate(10);
    }

    public function getVeterinaryMedicineById($vm_id){
        return VeterinaryMedicine::with('category_vm','soa')->where('vm_id', $vm_id)->get();
    }

    public function create($request){
       
        try {
            $request->except('_token');
            VeterinaryMedicine::create([
                'vm_name' => $request->input('vm_name'),
                'vm_description' => $request->input('content'),
                'vm_img_1' => $request->input('vm_img_1_link'),
                'vm_img_2' => $request->input('vm_img_2_link'),
                'vm_img_3' => $request->input('vm_img_3_link'),
                'category_vm_id' => $request->input('category_vm_id'),      
            ]);

            $data_soa = $request->input('data_soa');
            $vm = VeterinaryMedicine::where('vm_name', $request->input('vm_name'))->first();
            if($data_soa != null){
                foreach ($data_soa as $key => $data) {
                    $soa = Soa::where('soa_id', $data)->first();
                    $vm->soa()->attach($soa);
                }    
            }     

            Session::flash('success', 'Thêm Loại Thuốc Mới Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Loại Thuốc Mới Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }

    public function update($request, $vm_id){
        try {
              
            $request->except('_token');
            $updateVeterinaryMedicine = VeterinaryMedicine::find($vm_id);    
            $updateVeterinaryMedicine->vm_name = $request->input('vm_name');
            $updateVeterinaryMedicine->vm_description = $request->input('content');
            $updateVeterinaryMedicine->vm_img_1 = $request->input('vm_img_1_link');
            $updateVeterinaryMedicine->vm_img_2 = $request->input('vm_img_2_link');
            $updateVeterinaryMedicine->vm_img_3 = $request->input('vm_img_3_link');
            $updateVeterinaryMedicine->category_vm_id = $request->input('category_vm');
            $updateVeterinaryMedicine->updated_at = date('Y-m-d H:i:s');
            $updateVeterinaryMedicine->save();

            $updateVeterinaryMedicine->soa()->detach();
            $data_soa = $request->input('data_soa');
            $vm = VeterinaryMedicine::where('vm_name', $request->input('vm_name'))->first();
            if($data_soa != null){
                foreach ($data_soa as $key => $data) {
                    $soa = Soa::where('soa_id', $data)->first();
                    $vm->soa()->attach($soa);
                }    
            }     
            Session::flash('success', 'Cập Nhật Thông Tin Thuốc Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Thông Tin Thuốc Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }

    public function delete($request){
        $vm = VeterinaryMedicine::where('vm_id', $request->input('id'))->first();
        if($vm){
            $vm->delete();
            return true;
        }
        return false;
    }


    public function filter($request){
        $filter = explode("-", filter_var(trim($request->input('filterBy'), "-")));
        if($request->input('category_vm') == null ){
            return VeterinaryMedicine:: orderBy($filter[0], $filter[1])
                    ->where('vm_name', 'like', "%". $request->input('seachTitle') ."%")
                    ->paginate(10)->withQueryString();;
        }
        return VeterinaryMedicine:: orderBy($filter[0], $filter[1])
                    ->where('vm_name', 'like', "%". $request->input('seachTitle') ."%")
                    ->where('category_vm_id',$request->input('category_vm'))
                    ->paginate(10)->withQueryString();;
    }

    public function uploadImg($request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = date("Y-m-d-H-m-s").$request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/vm';

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
