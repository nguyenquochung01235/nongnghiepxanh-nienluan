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
                    <h4><strong>Thông tin về: {{$plant[0]->plant_name}}</strong></h4>
                    <div class="row">
                        <img style="width: 300px; margin-right: 20px;" src="{{$plant[0]->plant_img_1}}" alt="">
                        <img style="width: 300px; margin-right: 20px;" src="{{$plant[0]->plant_img_2}}" alt="">
                        <img style="width: 300px;" src="{{$plant[0]->plant_img_3}}" alt="">
                    </div>
                    
                    <div style="padding-top: 10px;">
                        <p><strong>Thuộc giống:  </strong>
                            {{$plant[0]->top->top_name}}
                        </p>
                    </div>

                    <div style="max-width: 700px; margin-top: 20px;">
                        {!! $plant[0]->plant_description !!}
                    </div>

                    <div style="margin-top: 20px;">
                        <p><strong>Các loại bệnh thường gặp: </strong>
                            @foreach($plant[0]->sop as $key => $sop)
                                <a href="/administrator/sop/view/{{$sop->sop_id}}">{{$sop->sop_name}}, </a>
                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="card-footer">
                    <p>Bài viết được tạo ngày {{$plant[0]->created_at}}, được cập nhật vào ngày {{$plant[0]->updated_at}}</p>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection