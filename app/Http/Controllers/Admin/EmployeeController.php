<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\AdminService;
use App\Http\Services\DepartmentService;
use App\Http\Services\EmployeeService;
use App\Http\Services\JobService;
use App\Models\Admin;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    protected $employeeService;
    protected $jobService;
    protected $departmentService;
    protected $adminService;

    public function __construct(EmployeeService $employeeService, JobService $jobService, DepartmentService $departmentService ,AdminService $adminService)
    {
        $this->employeeService = $employeeService;
        $this->jobService = $jobService;
        $this->adminService = $adminService;
        $this->departmentService = $departmentService;
    }

    public function index(){
        $employee = $this->employeeService->getAllEmployee();
        return view('administrator.employee.list',[
            'title' => 'Danh Sách Nhân Viên',
            'employee' => $employee
        ]);
    }

    public function add(){
        $jobList = $this->jobService->getAllJob();
        return view('administrator.employee.add',[
            'title' => 'Thêm Nhân Viên Mới',
            'job' => $jobList
        ]);
    }

    public function create(Request $request){
        $result = $this->employeeService->create($request);
        if($result){
            return redirect('/administrator/employee/');
        }
        return redirect()->back()->withInput();
    }

    public function view(Admin $id){
        $info = $this->adminService->infor($id->admin_id);
        return view('administrator.employee.employee',[
            'title' => 'Chi tiết nhân viên ' . $id->admin_name,
            'admin' => $info
        ]);
    }


    public function show($id){
        $employee = $this->employeeService->getEmployee($id);
        $job = $this->jobService->getJobByDepartment($employee[0]->department_id);
        $department = $this->departmentService->getAllDepartment();
        return view('administrator.employee.edit',[
            'title' => 'Cập nhật thông tin nhân viên',
            'employee' =>$employee,
            'job' => $job,
            'department' => $department
        ]);
    }

    public function update($id, Request $request){
        $result = $this->employeeService->update($id, $request);
        if($result){
            return redirect('/administrator/employee/edit/'.$id);
        }
        return redirect()->back();
    }

    public function delete(Request $request){
        $result = $this->employeeService->delete($request);
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
}
