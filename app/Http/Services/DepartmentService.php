<?php

namespace App\Http\Services;

use App\Models\Department;
use App\Models\Job;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class DepartmentService{


    public function getAllDepartment(){
        return Department::paginate(10);
    }

    public function getJob($department){
        // return  Department::with('job')->where('department_id', $department->department_id)->paginate(10);
        return Job::where('department_id', $department->department_id)->paginate(10);
    }


    public function create($request){
        try {

            $check = Department::where("department_name",$request->input("departmentName"))->count();
            if($check){
                return Session::flash('error', 'Đã Tồn Tại Phòng Ban Này !!! ');
            }
            $active = 1;
            if($request->input('active') =="on"){
                $active = 1;
            }else{
                $active = 0;
            }
            $request->except('_token');
            Department::create([
                'department_name' => (string)$request->input('departmentName'),
                'active' => (int)$active
            ]);
            Session::flash('success', 'Thêm Phòng Ban Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Phòng Ban Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
    }


    public function update($request, $department){

        try {
            $active = 1;
            if($request->input('active') =="on"){
                $active = 1;
            }else{
                $active = 0;
            }
            $request->except('_token');

            $updateDepartment = Department::find($department->department_id);
            $updateDepartment->department_name = $request->input('departmentName');
            $updateDepartment->active = (int)$active;
            $updateDepartment->updated_at =  date('Y-m-d H:i:s');
            $updateDepartment->save();

            Session::flash('success', 'Cập Nhật Phòng Ban Thành Công !!! ' );
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Phòng Ban Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function delete($request){
        $department = Department::where('department_id', $request->input('id'))->first();
        if($department){
            $department->delete();
            return true;
        }
        return false;
    }
      
}