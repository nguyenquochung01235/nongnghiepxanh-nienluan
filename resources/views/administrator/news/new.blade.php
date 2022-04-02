@extends('administrator.main')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <h4><strong>{{$new->news_title}}</strong></h4>
                    <div class="info-box" style="max-width: 300px;">
                        <span class="info-box-icon"><img style="border-radius: 100%;" src="{{$new->admin->admin_avatar}}" alt=""></span>

                        <div class="info-box-content">
                            <span class="info-box-number">{{$new->admin->admin_name}}</span>
                            <span style="font-style: italic;">{{$new->updated_at}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <img src="{{$new->news_img}}" alt="">
                    <div style="max-width: 700px; margin-top: 20px;">
                        {!! $new->news_content !!}
                    </div>
                </div>
                <div class="card-footer">
                    <p>Bài viết được tạo ngày {{$new->created_at}}, được cập nhật bởi <strong> {{$new->admin->admin_name}} </strong>, vào ngày {{$new->updated_at}}</p>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection