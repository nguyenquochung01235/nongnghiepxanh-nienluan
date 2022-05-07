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
                <form method="post" action="/administrator/animal/add/create">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh Mục Vật Nuôi</label>
                            <select class="form-control" name="toa_id">
                                @foreach($categoryanimal as $key => $data)
                                <option value="{{$data->toa_id}}">{{$data->toa_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên giống vật nuôi</label>
                            <input required value="{{old('animal_name')}}" type="text" class="form-control" id="animal_name" name="animal_name" placeholder="Nhập Tên Giống Vật Nuôi">
                        </div>

                        <div class="form-group">

                            <img id="img_animal_1" style="width: 300px;" src="" alt="">
                            <img id="img_animal_2" style="width: 300px;" src="" alt="">
                            <img id="img_animal_3" style="width: 300px;" src="" alt="">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh</label>

                            <input type="file" name="animal_img_1" id="animal_img_1">
                            <input type="text" hidden id="animal_img_1_link" name="animal_img_1_link" value="">

                            <input type="file" name="animal_img_2" id="animal_img_2">
                            <input type="text" hidden id="animal_img_2_link" name="animal_img_2_link" value="">

                            <input type="file" name="animal_img_3" id="animal_img_3">
                            <input type="text" hidden id="animal_img_3_link" name="animal_img_3_link" value="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả giống vật nuôi</label>
                            <textarea name="content" id="content" class="form-control">{{old('content')}}</textarea>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-5">
                                <label for="exampleInputEmail1">Các loại bệnh thường gặp</label>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <input type="text" id="search-soa" placeholder="Nhập tên loại bệnh">
                                    </div>
                                    
                                    <div class="col-sm-5">
                                        
                                        <ul id="list-soa">
                                        

                                        </ul>

                                    </div>

                                </div>
                            </div>
                            <div class="form-group col-sm-7">
                                <label for="exampleInputEmail1">Danh sách chọn</label>
                                <ul id="data-soa">
                                        

                                </ul>
                            </div>
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

<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>

<!-- ./wrapper -->
@endsection