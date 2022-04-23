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
        @hasrole(['admin','science'])
          <button type="button" class="btn btn-sm btn-primary"> 
            <i class="fas fa-plus"></i>
            <a href="/administrator/commune/add" style="color: #fff;">Thêm xã - phường</a>
        </button>
        @endhasrole
        <hr>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 10px;">ID</th>
                <th >Xã - Phường</th>
                <th>Quận - Huyện</th>
                <th>Tỉnh - Thành Phố</th>
                <th >Created At</th>
                <th>Updated At</th>
                <th style="width: 130px; text-align: center;">Edit</th>
          
              </tr>
            </thead>
            <tbody>
              @foreach($commune as $key => $data)
              <tr>
                <td>{{$data->commune_id}}</td>
                <td>{{$data->commune_name}}</td>
                <td>{{$data->district->district_name}}</td>
                <td>{{$data->district->province->province_name}}</td>
                <td>{{$data->created_at}}</td>
                <td>{{$data->updated_at}}</td>
                <td>
                <button type="button" class="btn btn-sm btn-primary"><a style="color: #fff;" href=""><i class="fas fa-eye"></i></a></button>
                @hasrole(['admin','science'])
                <button type="button" class="btn btn-sm btn-warning"><a style="color: #fff;" href="/administrator/commune/edit/{{$data->commune_id}}"><i class="fas fa-edit"></i></a></button>
                <button type="button" class="btn btn-sm btn-danger" ><a style="color: #fff;" href="#" 
                onclick="removeRow( <?php  echo $data->commune_id ?> ,'/administrator/commune/delete')"
                ><i class="fas fa-trash"></i></a></button>
                @endhasrole
                   
                </td>
    
              </tr>
            @endforeach

              
            </tbody>

          </table>
          <div class="card-footer clearfix">
          {!! $commune->links() !!}</div>
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