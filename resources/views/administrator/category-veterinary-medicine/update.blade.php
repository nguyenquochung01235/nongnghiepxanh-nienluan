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
                <form method="post" action="/administrator/category-veterinary-medicine/update/{{$categoryveterinarymedicine->category_vm_id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục Thuốc Trừ Sâu</label>
                            <input 
                            value="{{$categoryveterinarymedicine->category_vm}}"
                            required type="text" class="form-control" id="category_vm" name="category_vm" placeholder="Nhập Tên Danh Mục">
                        </div>
                        <div class="form-check">
                            <input  type="checkbox" checked class="form-check-input" id="active" name="active">
                           
                            <label class="form-check-label"  for="exampleCheck1">Active</label>
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