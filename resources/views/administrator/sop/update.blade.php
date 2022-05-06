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
                <form method="post" action="/administrator/sop/update/{{$sop->sop_id}}">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên loại bệnh hại</label>
                            <input required value="{{$sop->sop_name}}" type="text" class="form-control" id="sop_name" name="sop_name" placeholder="Nhập Tên Loại Bệnh">
                        </div>

                        <div class="form-group">

                            <img id="img_sop_1" style="width: 300px;" src="{{$sop->sop_img_1}}" alt="">
                            <img id="img_sop_2" style="width: 300px;" src="{{$sop->sop_img_2}}" alt="">
                            <img id="img_sop_3" style="width: 300px;" src="{{$sop->sop_img_3}}" alt="">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh</label>

                            <input type="file" name="sop_img_1" id="sop_img_1">
                            <input type="text" hidden id="sop_img_1_link" name="sop_img_1_link" value="{{$sop->sop_img_1}}">

                            <input type="file" name="sop_img_2" id="sop_img_2">
                            <input type="text" hidden id="sop_img_2_link" name="sop_img_2_link" value="{{$sop->sop_img_2}}">

                            <input type="file" name="sop_img_3" id="sop_img_3">
                            <input type="text" hidden id="sop_img_3_link" name="sop_img_3_link" value="{{$sop->sop_img_3}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả loại bệnh</label>
                            <textarea name="content" id="content" class="form-control">{{$sop->sop_description}}</textarea>
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