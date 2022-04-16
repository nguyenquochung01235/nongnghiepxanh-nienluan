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
                <form method="post" action="/administrator/land/update/{{$land[0]->land_id}}">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu Đề</label>
                            <input required value="{{$land[0]->land_title}}" type="text" class="form-control" id="landTitle" name="landTitle" placeholder="Nhập Tiêu Đề">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tỉnh Thành Phố</label>
                            <select id="provinceSelectBox" class="form-control" name="province">
                                @foreach($province as $key => $data)
                                <option required 
                                {{ $data->province_id == $land[0]->district->province_id ? 'selected' : ''}}
                                value="{{$data->province_id}}">{{$data->province_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Quận - Huyện</label>
                            <select id="districtSelectBox" class="form-control" name="district">
                                @foreach($district as $key => $data)
                                <option required 
                                {{ $data->district_id == $land[0]->district->district_id ? 'selected' : ''}}
                                value="{{$data->district_id}}">{{$data->district_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">

                            <img id="img_land_1" style="width: 300px;" src="{{$land[0]->land_img_1}}" alt="">
                            <img id="img_land_2" style="width: 300px;" src="{{$land[0]->land_img_2}}" alt="">
                            <img id="img_land_3" style="width: 300px;" src="{{$land[0]->land_img_3}}" alt="">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh</label>

                            <input type="file" name="land_img_1" id="land_img_1">
                            <input type="text" hidden id="land_img_1_link" name="land_img_1_link" value="{{$land[0]->land_img_1}}">

                            <input type="file" name="land_img_2" id="land_img_2">
                            <input type="text" hidden id="land_img_2_link" name="land_img_2_link" value="{{$land[0]->land_img_2}}">

                            <input type="file" name="land_img_3" id="land_img_3">
                            <input type="text" hidden id="land_img_3_link" name="land_img_3_link" value="{{$land[0]->land_img_3}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung bài viết</label>
            
                            <textarea name="content" id="content" class="form-control">{!! $land[0]->land_content !!}</textarea>
                        </div>




                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
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