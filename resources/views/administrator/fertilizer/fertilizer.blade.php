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
                    <h4><strong>Thông tin về: {{$fertilizer[0]->fertilizer_name}}</strong></h4>
                    <div class="row">
                        <img style="width: 300px; margin-right: 20px;" src="{{$fertilizer[0]->fertilizer_img_1}}" alt="">
                        <img style="width: 300px; margin-right: 20px;" src="{{$fertilizer[0]->fertilizer_img_2}}" alt="">
                        <img style="width: 300px;" src="{{$fertilizer[0]->fertilizer_img_3}}" alt="">
                    </div>
                    
                    <div style="padding-top: 10px;">
                        <p><strong>Thuộc loại:  </strong>
                            {{$fertilizer[0]->category_fertilizer->category_fertilizer}}
                        </p>
                    </div>

                    <div style="max-width: 700px; margin-top: 20px;">
                        {!! $fertilizer[0]->fertilizer_description !!}
                    </div>

                    <div style="margin-top: 20px;">
                        <p><strong>Các loại cây thường sử dụng: </strong>
                            @foreach($fertilizer[0]->plant as $key => $data)
                                <a href="/administrator/plant/view/{{$data->plant_id}}">{{$data->plant_name}}, </a>
                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="card-footer">
                    <p>Bài viết được tạo ngày {{$fertilizer[0]->created_at}}, được cập nhật vào ngày {{$fertilizer[0]->updated_at}}</p>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection