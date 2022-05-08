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
                <form method="post" action="/administrator/user/add/create">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Người Dùng</label>
                            <input required type="text" class="form-control" id="user_name" 
                            name="user_name" 
                            value="{{ old('user_name') }}"
                            placeholder="Nhập tên người dùng mới">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input required type="email" class="form-control" id="user_email" 
                            value="{{ old('user_email') }}"
                            name="user_email" placeholder="Nhập email">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input required type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số Điện Thoại</label>
                            <input required type="text" class="form-control" id="user_phone" 
                            value="{{ old('user_phone') }}"
                            name="user_phone" placeholder="Nhập số điện thoại">
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