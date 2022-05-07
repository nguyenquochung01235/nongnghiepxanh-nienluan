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
                    <h4><strong>Thông tin về: {{$soa[0]->soa_name}}</strong></h4>
                    <div class="row">
                        <img style="width: 300px; margin-right: 20px;" src="{{$soa[0]->soa_img_1}}" alt="">
                        <img style="width: 300px; margin-right: 20px;" src="{{$soa[0]->soa_img_2}}" alt="">
                        <img style="width: 300px;" src="{{$soa[0]->soa_img_3}}" alt="">
                    </div>

                    <div style="max-width: 700px; margin-top: 20px;">
                        {!! $soa[0]->soa_description !!}
                    </div>

                    <div style="margin-top: 20px;">
                        <p><strong>Các giống vật nuôi thường gặp bệnh này : </strong>
                            @foreach($soa[0]->animal as $key => $animal)
                                <a href="/administrator/animal/view/{{$animal->animal_id}}">{{$animal->animal_name}}, </a>
                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="card-footer">
                    <p>Bài viết được tạo ngày {{$soa[0]->created_at}}, được cập nhật vào ngày {{$soa[0]->updated_at}}</p>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection