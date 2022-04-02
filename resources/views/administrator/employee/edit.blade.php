@extends('administrator.main')

@section('content')

@foreach($employee as $key =>$data)

@endforeach


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-success card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img id="admin_avatar" class="profile-user-img img-fluid img-circle" src="{{$data->admin_avatar}}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$data['admin_name']}}</h3>

                            <p class="text-muted text-center">{{$data['job_name']}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Ngày Công</b> <a class="float-right">28</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Login</b> <a class="float-right">{{$time = date('H:i:s')}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Cập nhật ngày</b> <a class="float-right">{{$data['updated_at']}}</a>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-success btn-block"><b>Xem Bảng Thành Tích</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    @include('administrator.alert')
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Cập nhật thông tin {{$data['admin_name']}} </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="/administrator/employee/update/{{$data['admin_id']}}"> 
                            <div class="card-body">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Thông tin cá nhân</h3>
                                    </div>
                                </div>
                                <input type="text" id="admin_id" hidden value="{{$data['admin_id']}}" name="admin_id">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và tên</label>
                                    <input type="text" id="name" required value="{{$data['admin_name']}}" name="name" class="form-control" placeholder="Nhập họ và tên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input required value="{{$data['admin_email']}}" name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input required value="{{$data['admin_phone']}}" name="phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input required value="{{$data['admin_address']}}" name="address" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày sinh</label>
                                    <input required value="{{$data['admin_birthday']}}" name="birthday" type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Avatar</label>
                                    <input type="file" name="file" id="upload">
                                    <input type="text" hidden id="avatar" name="avatar" value="{{$data['admin_avatar']}}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái hoạt động</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="active" name="active" {{$data->admin_active == 1 ? 'checked = ""' : ''}}>
                                    <label class="form-check-label" for="exampleCheck1">Active</label>
                                </div>
                                </br>
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Thông tin chức vụ</h3>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label>Phòng ban</label>
                                    <select class="form-control department" name="department" id="department" onchange="getJobByDepartmentAjax();"> 
                                        @foreach($department as $key => $department)
                                        <option 
                                        {{$data->department_id == $department->department_id ? 'selected ' : ''}} value="{{$department->department_id}}">{{$department->department_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Chức vụ</label>
                                    <select class="form-control" name="job" id='job' onchange="getSalaryOfJob();">
                                        @foreach($job as $key => $jobList)
                                        <option  {{$data->job_id == $jobList->job_id ? 'selected = ""' : ''}} value="{{$jobList->job_id}}">{{$jobList->job_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Lương</label>
                                    <input id="salary" disabled name="salary" type="text" class="form-control" 
                                    value="{{ number_format($data['job_salary'])}} VNĐ">
                                </div>
                                </br>
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Thông tin phân quyền</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="active" name="admin" {{$data->hasRole('admin') ? 'checked = ""' : ''}}>
                                                <label class="form-check-label" for="exampleCheck1">Quản trị viên</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="active" name="hrm" {{$data->hasRole('hrm') ? 'checked = ""' : ''}}>
                                                <label class="form-check-label" for="exampleCheck1">Nhân sự</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="active" name="designer" {{$data->hasRole('designer') ? 'checked = ""' : ''}}>
                                                <label class="form-check-label" for="exampleCheck1">Thiết kế</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="active" name="accountant" {{$data->hasRole('designer') ? 'checked = ""' : ''}}>
                                                <label class="form-check-label" for="exampleCheck1">Kế toán</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="active" name="content" {{$data->hasRole('content') ? 'checked = ""' : ''}}>
                                                <label class="form-check-label" for="exampleCheck1">Nội dung</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="active" name="ecomer" {{$data->hasRole('ecomer') ? 'checked = ""' : ''}}>
                                                <label class="form-check-label" for="exampleCheck1">Thương mại điện tử</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="active" name="science" {{$data->hasRole('science') ? 'checked = ""' : ''}}>
                                                <label class="form-check-label" for="exampleCheck1">Nghiên cứu</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="active" name="fresher" {{$data->hasRole('fresher') ? 'checked = ""' : ''}}>
                                                <label class="form-check-label" for="exampleCheck1">Thực tập</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" style="float: right;">Cập nhật</button>
                            </div>
                            @csrf
                        </form>
                    </div>


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->  
@endsection