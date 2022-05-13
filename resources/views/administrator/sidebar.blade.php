<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/administrator/dashboard" class="brand-link">
      <img src="/admintemplate/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">Nông Nghiệp Xanh</span>
      <!-- <h6>Version 1.0.1</h6> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
   
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src=" {!!  \App\Helpers\Helper::avatarAdmin()  !!}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/administrator/{!!  \App\Helpers\Helper::idAdmin()  !!}" class="d-block">{!!  \App\Helpers\Helper::nameAdmin()  !!}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/administrator/dashboard" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>
   
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tractor"></i>
              <p>
                Tin Tức Nông Nghiệp
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/administrator/category-news" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục tin tức</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/administrator/news" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tin tức</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-forumbee"></i>
              <p>
                Diễn Đàn Nông Nghiệp
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/administrator/forum" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách bài viết</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
              <p>
                Cây Trồng & Bệnh Hại
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="/administrator/category-plant" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục cây trồng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/administrator/plant" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách cây trồng</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/administrator/sop" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách bệnh hại</p>
                </a>
              </li>

             

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-fish"></i>
            
              <p>
                Vật Nuôi & Bệnh Hại
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/administrator/category-animal" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục vật nuôi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/administrator/animal" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách vật nuôi</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/administrator/soa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách bệnh hại</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-biohazard"></i>
              <p>
                Thuốc & Vật Tư
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="/administrator/category-pesticides" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục thuốc trừ sâu</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/administrator/pesticides" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách thuốc trừ sâu</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/administrator/category-veterinary-medicine" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục thuốc thú y</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/administrator/veterinary-medicine" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách thuốc thú y</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/administrator/category-fertilizer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục phân bón</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/administrator/fertilizer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách phân bón</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-globe-africa nav-icon"></i>
              <p>
                Quản Lý Địa Chất
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="/administrator/province/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách tỉnh - thành</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/administrator/district/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách quận - huyện</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/administrator/commune/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách xã - phường</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/administrator/land/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thông tin địa chất</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cart-arrow-down"></i>
              <p>
                Thương Mại Điện Tử
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="/administrator/category-ecommerce" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục sản phẩm</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="pages/charts/uplot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cập nhật danh mục</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="pages/charts/uplot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tin tức</p>
                </a>
              </li>

            </ul>
          </li>
          @hasrole(['admin','hrm'])
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Quản Lý Người Dùng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="/administrator/user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách người dùng</p>
                </a>
              </li>             

            </ul>
          </li>
          @endhasrole

          @hasrole(['admin','hrm'])
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Administrator
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="/administrator/department" class="nav-link" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý phòng ban</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/administrator/job" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý chức vụ</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/administrator/employee" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý nhân sự</p>
                </a>
              </li>

            </ul>
          </li>
          @endhasrole
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>