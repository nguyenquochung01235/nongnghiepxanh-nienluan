<?php

namespace App\Http\Services;

use App\Models\Admin;
use App\Models\Job;
use App\Models\Roles;
use Illuminate\Support\Facades\Session;

class AdminService{

    public function infor($id){
        return Admin::join('tbl_job', 'tbl_job.job_id', 'tbl_admin.job_id')
        ->join('tbl_department', 'tbl_department.department_id', 'tbl_job.department_id')
        ->where('admin_id',$id)
        ->get(['tbl_admin.*','tbl_job.job_name', 'tbl_job.job_salary','tbl_department.department_name']);
    }

    public function update($id, $request){
        

        try {

            $admin = Admin::where('admin_id', $id)->first();
            $request->except('_token');
            $request->except('email');
            $admin->admin_name = $request->input('name');
            // $admin->admin_email = $request->input('email');
            $admin->admin_phone = $request->input('phone');
            $admin->admin_address = $request->input('address');
            $admin->admin_birthday = $request->input('birthday');
            $admin->admin_avatar = $request->input('avatar');
            $admin->updated_at =  date('Y-m-d H:i:s');
            $admin->save();

            Session::flash('success', 'Cập Nhật Thông Tin Thành Công !!! ' );
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Thông Tin Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }
}