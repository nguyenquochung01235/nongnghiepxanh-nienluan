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
                <form method="post" action="/administrator/province/update/{{$province->province_id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Tỉnh Thành Phố</label>
                            <input required value="{{$province->province_id}}" type="number" class="form-control" id="province_id" name="province_id" placeholder="Nhập ID Tỉnh Thành Phố">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Thành Phố</label>
                            <input required value="{{$province->province_name}}" type="text" class="form-control" id="province_name" name="province_name" placeholder="Nhập Tên Tỉnh Thành Phố">
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