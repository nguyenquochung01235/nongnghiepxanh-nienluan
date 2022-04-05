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
                <form method="post" action="/administrator/commune/add/create">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tỉnh Thành Phố</label>
                            <select id="provinceSelectBox" class="form-control" name="province">
                                @foreach($province as $key => $data)
                                <option required value="{{$data->province_id}}">{{$data->province_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Quận - Huyện</label>
                            <select required id="districtSelectBox"  class="form-control" name="district">
                                    
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Xã - Phường</label>
                            <input required value="{{old('commune_name')}}" type="text" class="form-control" id="commune_name" name="commune_name" placeholder="Nhập Tên Xã - Phường">
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