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
            <a href="/administrator/pesticides/add" style="color: #fff;">Thêm loại thuốc</a>
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

                <form class="row" method="get" action="/administrator/pesticides/filter">      
                    <div class="form-group col-5">
                      <label>Tìm theo tên</label>
                      <input class="form-control" name="seachTitle" placeholder="Gõ từ khóa">
                    </div>            
                    <div class="form-group col-3">
                      <label>Danh mục</label>
                      <select class="form-control" name="category_pesticides">
                      <option value="">Tất cả các danh mục</option>
                        @foreach($categorypesticides as $key => $data)
                        <option value="{{$data->category_pesticides_id}}">{{$data->category_pesticides}}</option>
                        @endforeach
                      </select>
                    </div>            
                    <div class="form-group col-2">
                      <label>Sắp xếp theo</label>
                      <select class="form-control" name="filterBy">
                        <option value="pesticides_id-DESC">ID giảm dần</option>
                        <option value="pesticides_id-ASC">ID tăng dần</option>
                        <option value="updated_at-DESC">Tin mới nhất</option>
                        <option value="updated_at-ASC">Tin cũ nhất</option>
            
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
                <th style="max-width: 200px;">Phân bón</th>
                <th>Danh mục</th>
                <th>Hình ảnh</th>
                <th>Update at</th>
                <th style="width: 130px; text-align: center;">Edit</th>

              </tr>
            </thead>
            <tbody>
              @foreach($pesticides as $key => $data)
              <tr>
                <td>{{$data->pesticides_id}}</td>
                <td style="max-width: 280px;">{{$data->pesticides_name}}</td>
                <td>{{$data->category_pesticides->category_pesticides}}</td>
                <td><img style="max-width: 250px" src="{{$data->pesticides_img_1}}" alt=""></td>
                <td>{{$data->updated_at}}</td>

            
                <td>
                  <button type="button" class="btn btn-sm btn-primary"><a style="color: #fff;" href="/administrator/pesticides/view/{{$data->pesticides_id}}"><i class="fas fa-eye"></i></a></button>
                  @hasrole(['admin','content'])
                  <button type="button" class="btn btn-sm btn-warning"><a style="color: #fff;" href="/administrator/pesticides/edit/{{$data->pesticides_id}}"><i class="fas fa-edit"></i></a></button>
                  <button type="button" class="btn btn-sm btn-danger"><a style="color: #fff;" href="#" onclick="removeRow( <?php echo $data->pesticides_id ?> ,'/administrator/pesticides/delete')"><i class="fas fa-trash"></i></a></button>
                  @endhasrole

                </td>

              </tr>
              @endforeach


            </tbody>

          </table>
          <div class="card-footer clearfix">

            {!! $pesticides->links() !!}</div>

        </div>
        <!-- /.card-body -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection