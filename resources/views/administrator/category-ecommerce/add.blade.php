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
                <form method="post" action="/administrator/category-ecommerce/add/create">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục Sản Phẩm</label>
                            <input required type="text" class="form-control" id="category_ecommerce" name="category_ecommerce" placeholder="Nhập Tên Danh Mục Sản Phẩm">
                        </div>
                        <div class="form-group">
                            <img id="img_category_ecommerce_1" style="width: 300px;" src="" alt="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh</label>

                            <input type="file" name="category_ecommerce_img_1" id="category_ecommerce_img_1">
                            <input type="text" hidden id="category_ecommerce_img_1_link" name="category_ecommerce_img_1_link" value="">

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
<!-- ./wrapper -->
@endsection