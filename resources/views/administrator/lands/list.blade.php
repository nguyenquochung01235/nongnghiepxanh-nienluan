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
            <a href="/administrator/land/add" style="color: #fff;">Thêm Thông Tin Thổ Nhưỡng</a>
        </button>
        <hr>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 10px;">ID</th>
                <th style="max-width: 200px;">Tựa đề</th>
                <th>Trực thuộc</th>
                <th>Hình ảnh</th>
                <th>Nội Dung</th>
                <th>Update at</th>
                <th style="width: 130px; text-align: center;">Edit</th>
          
              </tr>
            </thead>
            <tbody>
              @foreach($lands as $key => $data)
              <tr>
                <td>{{$data->land_id}}</td>
                <td style="max-width: 280px;">{{$data->land_title}}</td>
                <td>{{$data->district->district_name}}</td>
                <td><img style="max-width: 250px" src="{{$data->land_img_1}}" alt=""></td>
                <td class="mota1">{{$data->land_content}}</td>
                <td>{{$data->updated_at}}</td>
                <td>
                <button type="button" class="btn btn-sm btn-primary"><a style="color: #fff;" href="/administrator/land/view/{{$data->land_id}}"><i class="fas fa-eye"></i></a></button>
                <button type="button" class="btn btn-sm btn-warning"><a style="color: #fff;" href="/administrator/land/edit/{{$data->land_id}}"><i class="fas fa-edit"></i></a></button>
                <button type="button" class="btn btn-sm btn-danger" ><a style="color: #fff;" href="#" 
                onclick="removeRow( <?php  echo $data->land_id ?> ,'/administrator/land/delete')"
                ><i class="fas fa-trash"></i></a></button>
                
                   
                </td>
    
              </tr>
            @endforeach

              
            </tbody>

          </table>
          <div class="card-footer clearfix">
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