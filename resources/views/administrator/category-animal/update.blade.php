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
                <form method="post" action="/administrator/category-animal/update/{{$categoryanimal->toa_id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục Vật Nuôi</label>
                            <input 
                            value="{{$categoryanimal->toa_name}}"
                            required type="text" class="form-control" id="toa_name" name="toa_name" placeholder="Nhập Tên Danh Mục Vật Nuôi">
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