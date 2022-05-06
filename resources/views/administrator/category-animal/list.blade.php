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
        @hasrole(['admin','content'])
          <button type="button" class="btn btn-sm btn-primary"> 
            <i class="fas fa-plus"></i>
            <a href="/administrator/category-animal/add" style="color: #fff;">Thêm danh mục vật nuôi</a>
        </button>
        @endhasrole
        <hr>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 10px;">ID</th>
                <th>Tên Danh Mục</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th style="width: 150px; text-align: center;">Edit</th>
          
              </tr>
            </thead>
            <tbody>
              @foreach($categoryanimal as $key => $data)
              <tr>
                <td>{{$data->toa_id}}</td>
                <td>{{$data->toa_name}}</td>
                <td>{{$data->created_at}}</td>
                <td>{{$data->updated_at}}</td>
                <td style="text-align: center;">
                <button type="button" class="btn btn-sm btn-primary"><a style="color: #fff;" href="/administrator/category-animal/view/{{$data->toa_id}}"><i class="fas fa-eye"></i></a></button>
                @hasrole(['admin','content'])
                <button type="button" class="btn btn-sm btn-warning"><a style="color: #fff;" href="/administrator/category-animal/edit/{{$data->toa_id}}"><i class="fas fa-edit"></i></a></button>
                <button type="button" class="btn btn-sm btn-danger" ><a style="color: #fff;" href="#" 
                onclick="removeRow( <?php  echo $data->toa_id ?> ,'/administrator/category-animal/delete')"
                ><i class="fas fa-trash"></i></a></button>
                @endhasrole 
                   
                </td>
    
              </tr>
            @endforeach

              
            </tbody>

          </table>
          <div class="card-footer clearfix">
          {!! $categoryanimal->links() !!}
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