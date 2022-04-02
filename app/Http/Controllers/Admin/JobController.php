<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\DepartmentService;
use App\Http\Services\JobService;
use App\Models\Department;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{   
    protected $jobService;
    protected $departmentService;

    public function __construct(JobService $jobService, DepartmentService $departmentService)
    {
        $this->jobService = $jobService;
        $this->departmentService = $departmentService;
    }


    public function index(JobService $jobService){

        $jobList = $this->jobService->getAllJob();

        return view('administrator.job.list',[
            'title' => 'Danh Sách Chức Vụ',
            'jobList' => $jobList
        ]);
    }

    public function add(DepartmentService $departmentService){
        return view('administrator.job.add',[
            'title' => 'Thêm Chức Vụ',
            'department' => $this->departmentService->getAllDepartment()
        ]);
    }


    public function view(Job $job){
        $employeeJob = $this->jobService->getEmployee($job);
        return view('administrator.job.employee',[
            'title' => 'Danh Sách Nhân Viên Thuộc Chức Vụ ' . $job->job_name,
            'employee' => $employeeJob
        ]);
    }

    public function create(Request $request){
        $this->jobService->create($request);
        return redirect()->back();
    }

    public function show(Job $job, DepartmentService $departmentService){
        return view('administrator.job.update',[
            'title' => 'Cập Nhật Chức Vụ',
            'job' => $job,
            'department' => $this->departmentService->getAllDepartment()
        ]);
    }

    public function update(Request $request, Job $job){
        $result = $this->jobService->update($request, $job);
        if($result){
            return redirect('/administrator/job');
        }
        return redirect()->back();
    }
    

    public function delete(Request $request){
        $result = $this->jobService->delete($request);
        if($request){
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

    public function getJobByDepartmentAjax(Request $request){
        $result = $this->jobService->getJobByDepartmentAjax($request);
        return $result;
    
    }
    public function getSalaryOfJobAjax(Request $request){
        $result = $this->jobService->getSalaryOfJobAjax($request);
        return $result;
    }



}
