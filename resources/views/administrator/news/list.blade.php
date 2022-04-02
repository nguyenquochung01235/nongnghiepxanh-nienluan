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
        <div class="card-body">
          <button type="button" class="btn btn-sm btn-primary"> 
            <i class="fas fa-plus"></i>
            <a href="/administrator/news/add" style="color: #fff;">Thêm tin tức</a>
        </button>
        <hr>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 10px;">ID</th>
                <th style="max-width: 200px;">Tựa đề</th>
                <th>Danh mục</th>
                <th >Hình ảnh</th>
                <th>Update at</th>
                <th style="width: 60px;">Status</th>
                <th style="width: 130px; text-align: center;">Edit</th>
          
              </tr>
            </thead>
            <tbody>
              @foreach($news as $key => $data)
              <tr>
                <td>{{$data->news_id}}</td>
                <td style="max-width: 280px;">{{$data->news_title}}</td>
                <td>{{$data->categorynews->news_category}}</td>
                <td><img style="max-width: 250px" src="{{$data->news_img}}" alt=""></td>
                <td>{{$data->updated_at}}</td>
                
                <td style="width: 60px;">
                  @if($data->active)
                  <button type="button" class="btn btn-sm btn-success" disabled>Active</button>
                  @else
                  <button type="button" class="btn btn-sm btn-danger" disabled>Block</button>
                  @endif
                </td>
                <td>
                <button type="button" class="btn btn-sm btn-primary"><a style="color: #fff;" href="/administrator/news/view/{{$data->news_id}}"><i class="fas fa-eye"></i></a></button>
                <button type="button" class="btn btn-sm btn-warning"><a style="color: #fff;" href="/administrator/news/edit/{{$data->news_id}}"><i class="fas fa-edit"></i></a></button>
                <button type="button" class="btn btn-sm btn-danger" ><a style="color: #fff;" href="#" 
                onclick="removeRow( <?php  echo $data->news_id ?> ,'/administrator/news/delete')"
                ><i class="fas fa-trash"></i></a></button>
                
                   
                </td>
    
              </tr>
            @endforeach

              
            </tbody>

          </table>
          <div class="card-footer clearfix">
          {!! $news->links() !!}
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection