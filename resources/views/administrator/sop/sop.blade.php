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
                    <h4><strong>Thông tin về: {{$sop[0]->sop_name}}</strong></h4>
                    <div class="row">
                        <img style="width: 300px; margin-right: 20px;" src="{{$sop[0]->sop_img_1}}" alt="">
                        <img style="width: 300px; margin-right: 20px;" src="{{$sop[0]->sop_img_2}}" alt="">
                        <img style="width: 300px;" src="{{$sop[0]->sop_img_3}}" alt="">
                    </div>

                    <div style="max-width: 700px; margin-top: 20px;">
                        {!! $sop[0]->sop_description !!}
                    </div>

                    <div style="margin-top: 20px;">
                        <p><strong>Các giống cây thường gặp bệnh này : </strong>
                            @foreach($sop[0]->plant as $key => $plant)
                                <a href="/administrator/plant/view/{{$plant->plant_id}}">{{$plant->plant_name}}, </a>
                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="card-footer">
                    <p>Bài viết được tạo ngày {{$sop[0]->created_at}}, được cập nhật vào ngày {{$sop[0]->updated_at}}</p>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection