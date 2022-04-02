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
                <form method="post" action="/administrator/category-news/update/{{$categorynews->id_news_category}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục Tin Tức</label>
                            <input 
                            value="{{$categorynews->news_category}}"
                            required type="text" class="form-control" id="categoryNewsName" name="categoryNewsName" placeholder="Nhập Tên Danh Mục Tin Tức">
                        </div>
                        <div class="form-check">
                            <input  type="checkbox" class="form-check-input" id="active" name="active"
                            {{$categorynews->active == 1 ? 'checked = ""' : ''}}
                            >
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
<!-- ./wrapper -->
@endsection