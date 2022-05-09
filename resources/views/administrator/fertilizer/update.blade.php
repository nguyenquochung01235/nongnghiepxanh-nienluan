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
                <form method="post" action="/administrator/fertilizer/update/{{$fertilizer[0]->fertilizer_id}}">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh Mục Phân Bón</label>
                            <select class="form-control" name="category_fertilizer">
                                @foreach($categoryfertilizer as $key => $data)

                                <option value="{{$data->category_fertilizer_id}}" {{ $data->category_fertilizer_id == $fertilizer[0]->category_fertilizer_id ? 'selected' : ''}}>{{$data->category_fertilizer}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên giống cây</label>
                            <input required value="{{$fertilizer[0]->fertilizer_name}}" type="text" class="form-control" id="fertilizer_name" name="fertilizer_name" placeholder="Nhập Tên Phân Bón">
                        </div>

                        <div class="form-group">

                            <img id="img_fertilizer_1" style="width: 300px;" src="{{$fertilizer[0]->fertilizer_img_1}}" alt="">
                            <img id="img_fertilizer_2" style="width: 300px;" src="{{$fertilizer[0]->fertilizer_img_2}}" alt="">
                            <img id="img_fertilizer_3" style="width: 300px;" src="{{$fertilizer[0]->fertilizer_img_3}}" alt="">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh</label>

                            <input type="file" name="fertilizer_img_1" id="fertilizer_img_1">
                            <input type="text" hidden id="fertilizer_img_1_link" name="fertilizer_img_1_link" value="{{$fertilizer[0]->fertilizer_img_1}}">

                            <input type="file" name="fertilizer_img_2" id="fertilizer_img_2">
                            <input type="text" hidden id="fertilizer_img_2_link" name="fertilizer_img_2_link" value="{{$fertilizer[0]->fertilizer_img_2}}">

                            <input type="file" name="fertilizer_img_3" id="fertilizer_img_3">
                            <input type="text" hidden id="fertilizer_img_3_link" name="fertilizer_img_3_link" value="{{$fertilizer[0]->fertilizer_img_3}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả phân bón</label>
                            <textarea name="content" id="content" class="form-control">{{$fertilizer[0]->fertilizer_description}}</textarea>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-5">
                                <label for="exampleInputEmail1">Các loại cây thường sử dụng: </label>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <input type="text" id="search-plant" placeholder="Nhập tên loại bệnh">
                                    </div>

                                    <div class="col-sm-5">

                                        <ul id="list-plant">

                                        </ul>

                                    </div>

                                </div>
                            </div>
                            <div class="form-group col-sm-7">
                                <label for="exampleInputEmail1">Danh sách chọn</label>
                                <ul id="data-plant" style="list-style: none;">
                                    @foreach($fertilizer[0]->plant as $key => $data)
                                    <li><input type="checkbox" checked name="data_plant[]" id="selector" value="{{$data->plant_id}}">{{$data->plant_name}}</li>
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