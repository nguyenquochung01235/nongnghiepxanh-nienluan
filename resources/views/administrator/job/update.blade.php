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
                <form method="post" action="/administrator/job/update/{{$job->job_id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Chức Vụ</label>
                            <input 
                                value="{{$job->job_name}}"
                            required type="text" class="form-control" id="jobName" name="jobName" placeholder="Nhập Tên Chức Vụ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lương</label>
                            <input 
                            value="{{$job->job_salary}}"
                            required type="number" class="form-control" id="jobSalary" name="jobSalary" placeholder="Nhập Mức Lương">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Phòng Ban</label>
                            <select class="form-control" name="department">
                                @foreach($department as $key => $data)
                                <option
                                    {{ $job->department_id == $data->department_id ? 'selected' : ''}}
                                value="{{$data->department_id}}">{{$data->department_name}}
                            </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check">
                            <input   {{$job->active == 1 ? 'checked = ""' : ''}} type="checkbox"  class="form-check-input" id="active" name="active">
                            <label  class="form-check-label" for="exampleCheck1">Active</label>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
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