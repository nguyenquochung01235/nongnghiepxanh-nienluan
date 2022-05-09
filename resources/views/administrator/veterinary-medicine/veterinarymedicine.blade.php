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
                    <h4><strong>Thông tin về: {{$veterinarymedicine[0]->vm_name}}</strong></h4>
                    <div class="row">
                        <img style="width: 300px; margin-right: 20px;" src="{{$veterinarymedicine[0]->vm_img_1}}" alt="">
                        <img style="width: 300px; margin-right: 20px;" src="{{$veterinarymedicine[0]->vm_img_2}}" alt="">
                        <img style="width: 300px;" src="{{$veterinarymedicine[0]->vm_img_3}}" alt="">
                    </div>
                    
                    <div style="padding-top: 10px;">
                        <p><strong>Thuộc loại:  </strong>
                            {{$veterinarymedicine[0]->category_vm->category_vm}}
                        </p>
                    </div>

                    <div style="max-width: 700px; margin-top: 20px;">
                        {!! $veterinarymedicine[0]->vm_description !!}
                    </div>

                    <div style="margin-top: 20px;">
                        <p><strong>Các loại bệnh thường được sử dụng: </strong>
                            @foreach($veterinarymedicine[0]->soa as $key => $data)
                                <a href="/administrator/soa/view/{{$data->soa_id}}">{{$data->soa_name}}, </a>
                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="card-footer">
                    <p>Bài viết được tạo ngày {{$veterinarymedicine[0]->created_at}}, được cập nhật vào ngày {{$veterinarymedicine[0]->updated_at}}</p>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection