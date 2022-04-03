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
            <a href="/administrator/province/add" style="color: #fff;">Thêm tỉnh - thành phố</a>
        </button>
        <hr>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 10px;">ID</th>
                <th style=>Tỉnh / Thành Phố</th>
                <th style=>Created At</th>
                <th style=>Updated At</th>
                <th style="width: 130px; text-align: center;">Edit</th>
          
              </tr>
            </thead>
            <tbody>
              @foreach($province as $key => $data)
              <tr>
                <td>{{$data->province_id}}</td>
                <td style="max-width: 280px;">{{$data->province_name}}</td>
                <td>{{$data->created_at}}</td>
                <td>{{$data->updated_at}}</td>
                <td>
                <button type="button" class="btn btn-sm btn-primary"><a style="color: #fff;" href=""><i class="fas fa-eye"></i></a></button>
                <button type="button" class="btn btn-sm btn-warning"><a style="color: #fff;" href="/administrator/province/edit/{{$data->province_id}}"><i class="fas fa-edit"></i></a></button>
                <button type="button" class="btn btn-sm btn-danger" ><a style="color: #fff;" href="#" 
                onclick="removeRow( <?php  echo $data->province_id ?> ,'/administrator/province/delete')"
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