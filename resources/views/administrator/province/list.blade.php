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
            <a href="/administrator/province/add" style="color: #fff;">Thêm tỉnh - thành phố</a>
        </button>
        @endhasrole
        <hr>
        <div class="card collapsed-card ">
            <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
              <h3 class="card-title">
                <i class="fas fa-filter"></i>
                Bộ lọc
              </h3>

              <div class="card-tools">
                <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="card-body filter" style="display: none;">
              <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                  <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                  <div class=""></div>
                </div>
              </div>
              <div>

                <form class="row" method="get" action="/administrator/province/filter">
                  <div class="form-group col-7">
                    <label>Tìm theo tên</label>
                    <input class="form-control" name="seachTitle" placeholder="Gõ từ khóa">
                  </div>
                 
                  <div class="form-group col-3">
                    <label>Sắp xếp theo</label>
                    <select class="form-control" name="filterBy">
                      <option value="province_id-DESC">ID giảm dần</option>
                      <option value="province_id-ASC">ID tăng dần</option>
                      <option value="updated_at-DESC">Mới nhất</option>
                      <option value="updated_at-ASC">Cũ nhất</option>
                    </select>
                  </div>
                  <div class="form-group col-2">
                    <label style="opacity: 0;">Tìm kiếm</label>
                    <button class="form-control btn btn-primary" type="submit">
                      <i class="fas fa-search"></i>
                      Tìm kiếm
                    </button>
                  </div>
                  @csrf
                </form>

              </div>
            </div>
          </div>
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
                <button type="button" class="btn btn-sm btn-primary"><a style="color: #fff;" href="/administrator/province/view/{{$data->province_id}}"><i class="fas fa-eye"></i></a></button>
                @hasrole(['admin','science'])
                <button type="button" class="btn btn-sm btn-warning"><a style="color: #fff;" href="/administrator/province/edit/{{$data->province_id}}"><i class="fas fa-edit"></i></a></button>
                <button type="button" class="btn btn-sm btn-danger" ><a style="color: #fff;" href="#" 
                onclick="removeRow( <?php  echo $data->province_id ?> ,'/administrator/province/delete')"
                ><i class="fas fa-trash"></i></a></button>
                @endhasrole
                   
                </td>
    
              </tr>
            @endforeach

              
            </tbody>

          </table>
          <div class="card-footer clearfix">
            {!! $province->links() !!}
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