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
                    <h4><strong>{{$forum->forum_title}}</strong></h4>
                    <div class="info-box" style="max-width: 300px;">
                        <span class="info-box-icon"><img style="border-radius: 100%;" src="{{$forum->user->user_avatar}}" alt=""></span>

                        <div class="info-box-content">
                            <span class="info-box-number">{{$forum->user->user_name}}</span>
                            <span style="font-style: italic;">{{$forum->updated_at}}</span>
                            @if($forum->active)
                            <button type="button" class="btn btn-sm btn-success" disabled><strong>Trạng thái: </strong>Duyệt</button>
                            @else
                            <button type="button" class="btn btn-sm btn-danger" disabled><strong>Trạng thái: </strong>Chưa duyệt</button>
                            @endif
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <div class="row">
                        <img style="width: 300px; margin-right: 20px;" src="{{$forum->forum_img_1}}" alt="">
                        <img style="width: 300px; margin-right: 20px;" src="{{$forum->forum_img_2}}" alt="">
                        <img style="width: 300px;" src="{{$forum->forum_img_3}}" alt="">
                    </div>
                    <div style="max-width: 700px; margin-top: 20px;">
                        {!! $forum->forum_content !!}
                        
                    </div>
                    <div style="margin-top: 20px;">
                     <form action="/administrator/forum/approve/{{$forum->forum_id}}" method="post">
                        @if($forum->active)
                        <button type="submit" name='active' value="0" class="btn btn-sm btn-danger" >Hủy Duyệt</button>
                        @else
                        <button type="submit" name='active' value="1" class="btn btn-sm btn-success">Duyệt Bài</button>
                        @endif
                        @csrf
                     </form>
                    </div>
                </div>
                <div class="card-footer">
                    <p>Bài viết được tạo ngày {{$forum->created_at}} 
                        <strong> 
                            @if($forum->admin_name != null)
                            , được cập nhật bởi nhân viên:
                            {{$forum->admin->admin_name}} 
                            , vào ngày {{$forum->updated_at}}</p>
                            @endif
                        </strong>
                       
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection