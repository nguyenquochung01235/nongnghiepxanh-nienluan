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
                    <h4><strong>Thông tin về: {{$pesticides[0]->pesticides_name}}</strong></h4>
                    <div class="row">
                        <img style="width: 300px; margin-right: 20px;" src="{{$pesticides[0]->pesticides_img_1}}" alt="">
                        <img style="width: 300px; margin-right: 20px;" src="{{$pesticides[0]->pesticides_img_2}}" alt="">
                        <img style="width: 300px;" src="{{$pesticides[0]->pesticides_img_3}}" alt="">
                    </div>
                    
                    <div style="padding-top: 10px;">
                        <p><strong>Thuộc loại:  </strong>
                            {{$pesticides[0]->category_pesticides->category_pesticides}}
                        </p>
                    </div>

                    <div style="max-width: 700px; margin-top: 20px;">
                        {!! $pesticides[0]->pesticides_description !!}
                    </div>

                    <div style="margin-top: 20px;">
                        <p><strong>Các loại bệnh thường được sử dụng: </strong>
                            @foreach($pesticides[0]->sop as $key => $data)
                                <a href="/administrator/sop/view/{{$data->sop_id}}">{{$data->sop_name}}, </a>
                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="card-footer">
                    <p>Bài viết được tạo ngày {{$pesticides[0]->created_at}}, được cập nhật vào ngày {{$pesticides[0]->updated_at}}</p>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection