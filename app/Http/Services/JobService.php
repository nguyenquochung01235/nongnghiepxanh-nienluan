<?php

namespace App\Http\Services;

use App\Models\Admin;
use App\Models\Department;
use App\Models\Job;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class JobService{


    public function getAllJob(){
        return Job::with('department')->orderBy('department_id')->paginate();
    }

    public function getJobByDepartment($department_id){
        return Job::where('department_id',  $department_id)->get(['job_id', 'job_name']);
    }

    public function getJobByDepartmentAjax($request){
        return Job::where('department_id', $request->input('department_id'))->get();
    
    }
    public function getSalaryOfJobAjax($request){

        return Job::where('job_id', $request->input('job_id'))->get('job_salary');
    }

    public function getEmployee($job){
        return Admin::where('job_id', $job->job_id)->get();
    }


    public function create($request){
        try {

            $check = Job::where("job_name",$request->input("jobName"))->count();
            if($check){
                return Session::flash('error', 'Đã Tồn Tại Chức Vụ Này !!! ');
            }
            $active = 1;
            if($request->input('active') =="on"){
                $active = 1;
            }else{
                $active = 0;
            }
            $request->except('_token');
            Job::create([
                'job_name' => $request->input('jobName'),
                'job_salary' => $request->input('jobSalary'),
                'department_id' => (string)$request->input('department'),
                'active' => (int)$active
            ]);
            Session::flash('success', 'Thêm Chức Vụ Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Chức Vụ Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
    }


    public function update($request, $job){

        try {
            $active = 1;
            if($request->input('active') =="on"){
                $active = 1;
            }else{
                $active = 0;
            }
            $request->except('_token');

            $updateJob = Job::find( $job->job_id);

            $updateJob->job_name = $request->input('jobName');
            $updateJob->job_salary= $request->input('jobSalary');
            $updateJob->active = (int)$active;
            $updateJob->department_id = (int) $request->input('department');
            $updateJob->updated_at =  date('Y-m-d H:i:s');
            $updateJob->save();

            Session::flash('success', 'Cập Nhật Chức Vụ Thành Công !!! ' );
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Chức Vụ Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function delete($request){
        $job = Job::where('job_id', $request->input('id'))->first();
        if($job){
            $job->delete();
            return true;
        }
        return false;
    }
      
}