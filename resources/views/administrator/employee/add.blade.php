@extends('administrator.main')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>

                </div>
                @include('administrator.alert')
                <!-- /.card-header -->
                <!-- Form Add Department -->
                <form method="post" action="/administrator/employee/add/create">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Nhân Viên</label>
                            <input required type="text" class="form-control" id="name" 
                            name="name" 
                            value="{{ old('name') }}"
                            placeholder="Nhập tên nhân viên mới">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input required type="email" class="form-control" id="email" 
                            value="{{ old('email') }}"
                            name="email" placeholder="Nhập email">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input required type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số Điện Thoại</label>
                            <input required type="text" class="form-control" id="phone" 
                            value="{{ old('phone') }}"
                            name="phone" placeholder="Nhập số điện thoại">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số Địa Chỉ</label>
                            <input required type="text" class="form-control" id="address" 
                            value="{{ old('address') }}"
                            name="address" placeholder="Nhập địa chỉ">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày Sinh</label>
                            <input required type="date" class="form-control" id="birthday" 
                            value="{{ old('birthday') }}"
                            name="birthday" placeholder="Chọn ngày sinh">
                        </div>

                
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chức Vụ</label>
                            <select class="form-control" name="job">
                                @foreach($job as $key => $data)
                                <option value="{{$data->job_id}}">{{$data->job_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" checked class="form-check-input" id="active" name="active">
                            <label class="form-check-label" for="exampleCheck1">Active</label>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                    @csrf
                </form>

                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection