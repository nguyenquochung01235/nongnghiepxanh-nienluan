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
                    <h4><strong>{{$land[0]->land_title}}</strong></h4>
                    <div class="row">
                        <img style="width: 300px; margin-right: 20px;" src="{{$land[0]->land_img_1}}" alt="">
                        <img style="width: 300px; margin-right: 20px;" src="{{$land[0]->land_img_2}}" alt="">
                        <img style="width: 300px;" src="{{$land[0]->land_img_3}}" alt="">
                    </div>
                
                    <div style="max-width: 700px; margin-top: 20px;">
                        {!! $land[0]->land_content !!}
                    </div>
                </div>
                <div class="card-footer">
                    <p>Bài viết được tạo ngày {{$land[0]->created_at}}, được cập nhật vào ngày {{$land[0]->updated_at}}</p>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection