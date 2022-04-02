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
            <a href="/administrator/job/add" style="color: #fff;">Thêm Chức Vụ</a>
        </button>
        <hr>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 10px;">ID</th>
                <th>Tên Chức Vụ</th>
                <th>Lương</th>
                <!-- <th>Phòng Ban</th> -->
                <th>Created At</th>
                <th>Updated At</th>
                <th style="width: 60px;">Status</th>
                <th style="width: 130px; text-align: center;">Edit</th>
          
              </tr>
            </thead>
            <tbody>
              @foreach($job as $key => $data)
              <tr>
                <td>{{$data->job_id}}</td>
                <td>{{$data->job_name}}</td>
                <td>{{number_format($data->job_salary)}} VNĐ</td>
                <td>{{$data->created_at}}</td>
                <td>{{$data->updated_at}}</td>
                <td style="width: 60px;">
                  @if($data->active)
                  <button type="button" class="btn btn-sm btn-success" disabled>Active</button>
                  @else
                  <button type="button" class="btn btn-sm btn-danger" disabled>Block</button>
                  @endif
                </td>
                <td>
                <button type="button" class="btn btn-sm btn-primary"><a style="color: #fff;" href="/administrator/job/view/{{$data->job_id}}"><i class="fas fa-eye"></i></a></button>
                <button type="button" class="btn btn-sm btn-warning"><a style="color: #fff;" href="/administrator/job/edit/{{$data->job_id}}"><i class="fas fa-edit"></i></a></button>
                <button type="button" class="btn btn-sm btn-danger" ><a style="color: #fff;" href="#" 
                  onclick="removeRow( <?php  echo $data->job_id ?> ,'/administrator/job/delete')"
                ><i class="fas fa-trash"></i></a></button>
                
                   
                </td>
    
              </tr>
              @endforeach

              
            </tbody>

          </table>
          <div class="card-footer clearfix">
            {!! $job->links() !!}
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