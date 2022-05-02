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
            <a href="#" style="color: #fff;">Duyệt bài viết</a>
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

                <form class="row" method="get" action="/administrator/forum/filter">      
                    <div class="form-group col-5">
                      <label>Tìm theo tên</label>
                      <input class="form-control" name="seachTitle" placeholder="Gõ từ khóa">
                    </div>            
                    <div class="form-group col-3">
                      <label>Danh mục</label>
                      <select class="form-control" name="active">
                        <option value="">Tất cả các danh mục</option>
                        <option value="1">Đã duyệt</option>
                        <option value="0">Chưa duyệt</option>
                      </select>
                    </div>            
                    <div class="form-group col-2">
                      <label>Sắp xếp theo</label>
                      <select class="form-control" name="filterBy">
                        <option value="forum_id-DESC">ID giảm dần</option>
                        <option value="forum_id-ASC">ID tăng dần</option>
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
                <th style="max-width: 200px;">Tựa đề</th>
                <th>Người đăng</th>
                <th>Hình ảnh</th>
                <th>Update at</th>
                <th style="width: 60px;">Status</th>
                <th style="width: 130px; text-align: center;">Edit</th>

              </tr>
            </thead>
            <tbody>
              @foreach($forum as $key => $data)
              <tr>
                <td>{{$data->forum_id}}</td>
                <td style="max-width: 280px;">{{$data->forum_title}}</td>
                <td>{{$data->user->user_name}}</td>
                <td><img style="max-width: 250px" src="{{$data->forum_img_1}}" alt=""></td>
                <td>{{$data->updated_at}}</td>

                <td style="width: 60px;">
                  @if($data->active)
                  <button type="button" class="btn btn-sm btn-success" disabled>Duyệt</button>
                  @else
                  <button type="button" class="btn btn-sm btn-danger" disabled>Chưa duyệt</button>
                  @endif
                </td>
                <td>
                  <button type="button" class="btn btn-sm btn-primary"><a style="color: #fff;" href="/administrator/forum/view/{{$data->forum_id}}"><i class="fas fa-eye"></i></a></button>
                  @hasrole(['admin','content'])
                  <button type="button" class="btn btn-sm btn-warning"><a style="color: #fff;" href="#"><i class="fas fa-edit"></i></a></button>
                  <button type="button" class="btn btn-sm btn-danger"><a style="color: #fff;" href="#" onclick="removeRow( <?php echo $data->forum_id ?> ,'/administrator/forum/delete')"><i class="fas fa-trash"></i></a></button>
                  @endhasrole

                </td>

              </tr>
              @endforeach


            </tbody>

          </table>
          <div class="card-footer clearfix">

            {!! $forum->links() !!}</div>

        </div>
        <!-- /.card-body -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection