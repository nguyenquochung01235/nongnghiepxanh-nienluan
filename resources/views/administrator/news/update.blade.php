@extends('administrator.main')

@section('content')



<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>

                </div>
                @include('administrator.alert')
                <!-- /.card-header -->
                <!-- Form Add Department -->
                <form method="post" action="/administrator/news/update/{{$news->news_id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh Mục Bài Viết</label>
                            <select class="form-control" name="id_news_category">
                                @foreach($category as $key => $data)
                                <option 
                                {{ $data->id_news_category == $news->id_news_category ? 'selected' : ''}}
                                value="{{$data->id_news_category}}">{{$data->news_category}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tựa đề bài viết</label>
                            <input required value="{{$news->news_title}}" type="text" class="form-control" id="newTitle" name="newTitle" placeholder="Nhập Tiêu Đề Tin Tức">
                        </div>

                        <div class="form-group">
                            
                            <img id="img_news" style="max-width: 350px;" src="{{$news->news_img}}" alt="">
                          
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh</label>
                    
                            <input type="file" name="file" id="upload_new_img">
                            <input type="text" hidden id="news_img" name="news_img" value="{{$news->news_img}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung bài viết</label>
                            <!-- <input required type="text" class="form-control" id="editor" name="content" placeholder="Nhập Tiêu Đề Tin Tức"> -->
                            <textarea name="content" id="content" class="form-control">{{$news->news_content}}</textarea>
                        </div>



                        <div class="form-check">
                            <input  {{$news->active == 1 ? 'checked = ""' : ''}} type="checkbox" checked class="form-check-input" id="active" name="active">
                            <label class="form-check-label" for="exampleCheck1">Active</label>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                    @csrf
                </form>

                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>

<!-- ./wrapper -->
@endsection