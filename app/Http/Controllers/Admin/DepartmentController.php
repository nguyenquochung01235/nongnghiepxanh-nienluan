<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\DepartmentService;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }


    public function index(){
        $departmentList = $this->departmentService->getAllDepartment();
        return view('administrator.department.list',[
            'title'=>'Quản Lý Phòng Ban',
            'departmentList'=>$departmentList
        ]);
    }

    public function add(){
        return view('administrator.department.add',[
            'title' => 'Thêm Phòng Ban'
        ]);
    }

    public function view(Department $department){
        // return dd($this->departmentService->getJob($department));
        return view('administrator.department.job',[
            'title' => 'Danh Sách Chức Vụ Thuộc ' . $department->department_name . '',
            'job' => $this->departmentService->getJob($department)
        ]);
    }

    public function create(Request $request){
        $this->departmentService->create($request);
        return redirect()->back();
    }


    public function show(Department $department){
        return view('administrator.department.update',[
            'title' => 'Cập Nhật Phòng Ban',
            'department' => $department
        ]);
    }

    public function update(Request $request, Department $department){
       $result = $this->departmentService->update($request, $department);
       if($result){
           return redirect('/administrator/department');
       }
       return redirect()->back();
    }


    public function delete(Request $request){
        $result = $this->departmentService->delete($request);
        if($request){
            return response()->json([
                'error' => false,
                'message' => "Đã xóa thành công danh mục!!!"
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => "Không thể xóa vì đã liên kết dữ liệu !!!"
            ]);
        }
    }

    
}
