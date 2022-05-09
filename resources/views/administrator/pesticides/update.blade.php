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
                <form method="post" action="/administrator/pesticides/update/{{$pesticides[0]->pesticides_id}}">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh Mục Thuốc Trừ Sâu</label>
                            <select class="form-control" name="category_pesticides">
                                @foreach($categorypesticides as $key => $data)

                                <option value="{{$data->category_pesticides_id}}" {{ $data->category_pesticides_id == $pesticides[0]->category_pesticides_id ? 'selected' : ''}}>{{$data->category_pesticides}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Thuốc</label>
                            <input required value="{{$pesticides[0]->pesticides_name}}" type="text" class="form-control" id="pesticides_name" name="pesticides_name" placeholder="Nhập Tên Phân Bón">
                        </div>

                        <div class="form-group">

                            <img id="img_pesticides_1" style="width: 300px;" src="{{$pesticides[0]->pesticides_img_1}}" alt="">
                            <img id="img_pesticides_2" style="width: 300px;" src="{{$pesticides[0]->pesticides_img_2}}" alt="">
                            <img id="img_pesticides_3" style="width: 300px;" src="{{$pesticides[0]->pesticides_img_3}}" alt="">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh</label>

                            <input type="file" name="pesticides_img_1" id="pesticides_img_1">
                            <input type="text" hidden id="pesticides_img_1_link" name="pesticides_img_1_link" value="{{$pesticides[0]->pesticides_img_1}}">

                            <input type="file" name="pesticides_img_2" id="pesticides_img_2">
                            <input type="text" hidden id="pesticides_img_2_link" name="pesticides_img_2_link" value="{{$pesticides[0]->pesticides_img_2}}">

                            <input type="file" name="pesticides_img_3" id="pesticides_img_3">
                            <input type="text" hidden id="pesticides_img_3_link" name="pesticides_img_3_link" value="{{$pesticides[0]->pesticides_img_3}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả phân bón</label>
                            <textarea name="content" id="content" class="form-control">{{$pesticides[0]->pesticides_description}}</textarea>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-5">
                                <label for="exampleInputEmail1">Các loại bệnh thường được sử dụng: </label>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <input type="text" id="search-sop" placeholder="Nhập tên loại bệnh">
                                    </div>

                                    <div class="col-sm-5">

                                        <ul id="list-sop">

                                        </ul>

                                    </div>

                                </div>
                            </div>
                            <div class="form-group col-sm-7">
                                <label for="exampleInputEmail1">Danh sách chọn</label>
                                <ul id="data-sop" style="list-style: none;">
                                    @foreach($pesticides[0]->sop as $key => $data)
                                    <li><input type="checkbox" checked name="data_sop[]" id="selector" value="{{$data->sop_id}}">{{$data->sop_name}}</li>
                                    @endforeach

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

<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>

<!-- ./wrapper -->
@endsection