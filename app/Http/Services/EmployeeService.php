<?php

namespace App\Http\Services;

use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Support\Facades\Session;

class EmployeeService{

    public function getAllEmployee(){
        return Admin::join('tbl_job', 'tbl_job.job_id', 'tbl_admin.job_id')
        ->get(['tbl_admin.*','tbl_job.job_name', 'tbl_job.job_salary']);
    }

    public function getEmployee($id){
        return Admin::join('tbl_job', 'tbl_job.job_id', 'tbl_admin.job_id')
        ->join('tbl_department', 'tbl_department.department_id', 'tbl_job.department_id')
        ->where('admin_id',$id)
        ->get(['tbl_admin.*','tbl_job.job_name', 'tbl_job.job_salary','tbl_department.department_id','tbl_department.department_name']);
    }

    public function create($request){
        try {
            $check = Admin::where('admin_email',trim($request->input('email')))->count();
            if($check){
                Session::flash('error', 'Email Đã Tồn Tại !!! ');
                return false;
            }
            $active = 1;
            if($request->input('active') =="on"){
                $active = 1;
            }else{
                $active = 0;
            }

            $request->except('_token');
            Admin::create([
                'admin_name' => $request->input('name'),
                'admin_email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'admin_phone' => $request->input('phone'),
                'admin_address' => $request->input('address'),
                'admin_birthday' => $request->input('birthday'),
                // 'admin_avatar' => $request->input('avatar'),
                'job_id' => $request->input('job'),
                'admin_active' => (int)$active
            ]);

            $admin = Admin::where('admin_email', $request->input('email'))->first();
            $role = Roles::where('name', 'user')->first();
            $admin->roles()->attach($role);

            Session::flash('success', 'Thêm Nhân Viên Mới Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Nhân Viên Mới Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function update($id, $request){
        try {
            $request->except('_token');
            $employee = Admin::where('admin_id', $id)->first();
            $active = 1;
            if($request->input('active') =="on"){
                $active = 1;
            }else{
                $active = 0;
            }
            //Update Infomation Administrator
            $employee->admin_name = $request->input('name');
            $employee->admin_email = $request->input('email');
            $employee->admin_phone = $request->input('phone');
            $employee->admin_address = $request->input('address');
            $employee->admin_birthday = $request->input('birthday');
            $employee->admin_avatar = $request->input('avatar');
            $employee->admin_active = $active;
            $employee->job_id = $request->input('job');
            $employee->updated_at =  date('Y-m-d H:i:s');
            $employee->roles()->detach();

            //Update Roles Aministrator
            if($request->input('admin') == 'on'){
                $employee->roles()->attach(Roles::where('name','admin')->first());
            }
            if($request->input('hrm') == 'on'){
                $employee->roles()->attach(Roles::where('name','hrm')->first());
            }
            if($request->input('designer') == 'on'){
                $employee->roles()->attach(Roles::where('name','designer')->first());
            }
            if($request->input('accountant') == 'on'){
                $employee->roles()->attach(Roles::where('name','accountant')->first());
            }
            if($request->input('content') == 'on'){
                $employee->roles()->attach(Roles::where('name','content')->first());
            }
            if($request->input('ecomer') == 'on'){
                $employee->roles()->attach(Roles::where('name','ecomer')->first());
            }
            if($request->input('science') == 'on'){
                $employee->roles()->attach(Roles::where('name','science')->first());
            }
            if($request->input('fresher') == 'on'){
                $employee->roles()->attach(Roles::where('name','fresher')->first());
            }



            $employee->save();

            Session::flash('success', 'Cập Nhật Thông Tin Thành Công !!! ' );
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Thông Tin Không Thành Công !!! <hr>');

            return  false;
        }
        return true;
        

    }



    public function delete($request){
        $employee = Admin::where('admin_id', $request->input('id'))->first();
        if($employee){
            $employee->delete();
            return true;
        }
        return false;
    }
}