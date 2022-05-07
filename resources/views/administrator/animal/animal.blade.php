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
                    <h4><strong>Thông tin về: {{$animal[0]->animal_name}}</strong></h4>
                    <div class="row">
                        <img style="width: 300px; margin-right: 20px;" src="{{$animal[0]->animal_img_1}}" alt="">
                        <img style="width: 300px; margin-right: 20px;" src="{{$animal[0]->animal_img_2}}" alt="">
                        <img style="width: 300px;" src="{{$animal[0]->animal_img_3}}" alt="">
                    </div>
                    
                    <div style="padding-top: 10px;">
                        <p><strong>Thuộc giống:  </strong>
                            {{$animal[0]->toa->toa_name}}
                        </p>
                    </div>

                    <div style="max-width: 700px; margin-top: 20px;">
                        {!! $animal[0]->animal_description !!}
                    </div>

                    <div style="margin-top: 20px;">
                        <p><strong>Các loại bệnh thường gặp: </strong>
                            @foreach($animal[0]->soa as $key => $soa)
                                <a href="/administrator/soa/view/{{$soa->soa_id}}">{{$soa->soa_name}}, </a>
                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="card-footer">
                    <p>Bài viết được tạo ngày {{$animal[0]->created_at}}, được cập nhật vào ngày {{$animal[0]->updated_at}}</p>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection