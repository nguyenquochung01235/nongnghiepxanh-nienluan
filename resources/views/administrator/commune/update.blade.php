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
                <form method="post" action="/administrator/commune/update/{{$commune->commune_id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tỉnh Thành Phố</label>
                            <select id="provinceSelectBox" class="form-control" name="province">
                                @foreach($province as $key => $data)
                                <option 
                                {{ $commune->district->province->province_id == $data->province_id ? 'selected' : ''}}
                                required value="{{$data->province_id}}">{{$data->province_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Quận - Huyện</label>
                            <select required id="districtSelectBox"  class="form-control" name="district">
                            @foreach($district as $key => $data)
                             @if($data->province->province_id == $commune->district->province->province_id) 
                                <option 
                                {{ $commune->district->district_id == $data->district_id ? 'selected' : ''}}
                                required value="{{$data->district_id}}">{{$data->district_name}}
                                </option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Xã - Phường</label>
                            <input required value="{{$commune->commune_name}}" type="text" class="form-control" id="commune_name" name="commune_name" placeholder="Nhập Tên Xã - Phường">
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