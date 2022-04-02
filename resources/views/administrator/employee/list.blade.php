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
            <a href="/administrator/employee/add" style="color: #fff;">Thêm Nhân Viên</a>
        </button>
        <hr>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 10px;">ID</th>
                <th>Tên nhân viên</th>
                <th>Chức vụ</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Updated At</th>
                <th style="width: 60px;">Status</th>
                <th style="width: 130px; text-align: center;">Edit</th>
          
              </tr>
            </thead>
            <tbody>
              @foreach($employee as $key => $data)
              <tr>
                <td>{{$data->admin_id}}</td>
                <td>{{$data->admin_name}}</td>
                <td>{{$data->job_name}}</td>
                <td>{{$data->admin_email}}</td>
                <td>{{$data->admin_phone}}</td>
                <td>{{$data->updated_at}}</td>
                <td style="width: 60px;">
                  @if($data->admin_active)
                  <button type="button" class="btn btn-sm btn-success" disabled>Active</button>
                  @else
                  <button type="button" class="btn btn-sm btn-danger" disabled>Block</button>
                  @endif
                </td>
                <td>
                <button type="button" class="btn btn-sm btn-primary"><a style="color: #fff;" href="/administrator/employee/view/{{$data->admin_id}}"><i class="fas fa-eye"></i></a></button>
                <button type="button" class="btn btn-sm btn-warning"><a style="color: #fff;" href="/administrator/employee/edit/{{$data->admin_id}}"><i class="fas fa-edit"></i></a></button>
                <button type="button" class="btn btn-sm btn-danger" ><a style="color: #fff;" href="#" 
                onclick="removeRow( <?php  echo $data->admin_id ?> ,'/administrator/employee/delete')"
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