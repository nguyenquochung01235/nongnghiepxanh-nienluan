@extends('administrator.main')

@section('content')

@foreach($admin as $key =>$data)
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
                  <img id="admin_avatar" class="profile-user-img img-fluid img-circle"
                       src="{{$data['admin_avatar']}}"
                       alt="User profile picture">
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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Thông Tin Cá Nhân</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-envelope"></i> Email</strong>

                <p class="text-muted">
                 {{$data['admin_email']}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>

                <p class="text-muted">{{$data['admin_address']}}</p>

                <hr>

                <strong><i class="fas fa-phone"></i>  Điện thoại</strong>

                <p class="text-muted">
                {{$data['admin_phone']}}
                </p>

                <hr>

                <strong><i class="fas fa-birthday-cake"></i>  Ngày sinh</strong>

                <p class="text-muted">{{$data['admin_birthday']}}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Thông tin chức vụ</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label>Phòng ban</label>
                    <input disabled type="text" class="form-control" value="{{$data['department_name']}}">
                  </div>
                  <div class="form-group">
                    <label>Chức vụ</label>
                    <input disabled type="text" class="form-control" value="{{$data['job_name']}}">
                  </div>
                  <div class="form-group">
                    <label>Lương</label>
                    <input disabled type="text" class="form-control" value="{{
                        number_format($data['job_salary'])
                    }} VNĐ">
                  </div>
                  
                  
                </div>
                
            </div>
            @include('administrator.alert')
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Cập nhật thông tin cá nhân</h3>
                
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="/administrator/{{$data['admin_id']}}/admin/update">
                <div class="card-body">
                  <div class="form-group">
                  <input type="text" id="admin_id" hidden value="{{$data['admin_id']}}" name="admin_id">
                    <label for="exampleInputEmail1">Họ và tên</label>
                    <input type="text" required
                        value="{{$data['admin_name']}}" name ="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập họ và tên">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input disabled required value="{{$data['admin_email']}}" name= "email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input required value="{{$data['admin_phone']}}" name= "phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ</label>
                    <input required value="{{$data['admin_address']}}" name= "address" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ngày sinh</label>
                    <input required value="{{$data['admin_birthday']}}" name= "birthday" type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Avatar</label>
                      <input type="file" name="file" id="upload">
                      <input type="text" hidden id="avatar" name="avatar" value="{{$data['admin_avatar']}}">
                  </div>
                 
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
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