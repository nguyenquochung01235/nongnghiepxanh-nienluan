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
                <form method="post" action="/administrator/plant/add/create">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh Mục Cây Trồng</label>
                            <select class="form-control" name="id_news_category">
                                @foreach($categoryplant as $key => $data)
                                <option value="{{$data->top_id}}">{{$data->top_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên giống cây</label>
                            <input required value="{{old('plant_name')}}" type="text" class="form-control" id="plant_name" name="plant_name" placeholder="Nhập Tên Giống Cây Trồng">
                        </div>

                        <div class="form-group">

                            <img id="img_plant_1" style="width: 300px;" src="" alt="">
                            <img id="img_plant_2" style="width: 300px;" src="" alt="">
                            <img id="img_plant_3" style="width: 300px;" src="" alt="">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh</label>

                            <input type="file" name="plant_img_1" id="plant_img_1">
                            <input type="text" hidden id="plant_img_1_link" name="plant_img_1_link" value="">

                            <input type="file" name="plant_img_2" id="plant_img_2">
                            <input type="text" hidden id="plant_img_2_link" name="plant_img_2_link" value="">

                            <input type="file" name="plant_img_3" id="plant_img_3">
                            <input type="text" hidden id="plant_img_3_link" name="plant_img_3_link" value="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả giống cây</label>
                            <textarea name="content" id="content" class="form-control">{{old('content')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Các loại bệnh thường gặp</label>
                            <div class="row">
                                        <div class="col-sm-3" style="background-color: red;">
                                            <div class="form-check">
                                            <select id="chkveg" multiple="multiple">
                                            
                                            <option value="cheese">Cheese</option>
                                            <option value="tomatoes">Tomatoes</option>
                                            <option value="mozarella">Mozzarella</option>
                                            <option value="mushrooms">Mushrooms</option>
                                            <option value="pepperoni">Pepperoni</option>
                                            <option value="onions">Onions</option>
                                            
                                        </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-7" style="background-color: blue;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="active" name="admin" >
                                                <label class="form-check-label" for="exampleCheck1">Quản trị viên</label>
                                            </div>
                                        </div>
                                       
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