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
                <form method="post" action="/administrator/land/add/create">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu Đề</label>
                            <input required value="{{old('landTitle')}}" type="text" class="form-control" id="landTitle" name="landTitle" placeholder="Nhập Tiêu Đề">

                        </div>
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
                            <select required id="districtSelectBox" class="form-control" name="district">

                            </select>
                        </div>


                        <div class="form-group">

                            <img id="img_land_1" style="width: 300px;" src="" alt="">
                            <img id="img_land_2" style="width: 300px;" src="" alt="">
                            <img id="img_land_3" style="width: 300px;" src="" alt="">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh</label>

                            <input type="file" name="land_img_1" id="land_img_1">
                            <input type="text" hidden id="land_img_1_link" name="land_img_1_link" value="">

                            <input type="file" name="land_img_2" id="land_img_2">
                            <input type="text" hidden id="land_img_2_link" name="land_img_2_link" value="">

                            <input type="file" name="land_img_3" id="land_img_3">
                            <input type="text" hidden id="land_img_3_link" name="land_img_3_link" value="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung bài viết</label>
            
                            <textarea name="content" id="content" class="form-control">{{old('content')}}</textarea>
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