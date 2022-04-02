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
                <form method="post" action="/administrator/department/update/{{$department->department_id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Phòng Ban</label>
                            <input 
                            value="{{$department->department_name}}"
                            required type="text" class="form-control" id="departmentName" name="departmentName" placeholder="Nhập Tên Phòng Ban">
                        </div>
                        <div class="form-check">
                            <input  type="checkbox" class="form-check-input" id="active" name="active"
                            {{$department->active == 1 ? 'checked = ""' : ''}}
                            >
                            <label class="form-check-label" for="exampleCheck1">Active</label>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
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