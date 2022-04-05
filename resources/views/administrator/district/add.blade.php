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
                <form method="post" action="/administrator/district/add/create">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tỉnh Thành Phố</label>
                            <select class="form-control" name="province">
                                @foreach($province as $key => $data)
                                <option value="{{$data->province_id}}">{{$data->province_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Quận - Huyện</label>
                            <input required value="{{old('district_name')}}" type="text" class="form-control" id="district_name" name="district_name" placeholder="Nhập Tên Quận - Huyện">
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