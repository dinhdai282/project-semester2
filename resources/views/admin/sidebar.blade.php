<aside class="main-sidebar elevation-4 bg-primary-color">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-center" style="border-bottom: 1px solid #f500b8; text-decoration:none">
      <span class="my-md-3 site-title primary-color pacifico">Simplon</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-bottom: 1px solid #f500b8;">
        <div class="info">
          <a href="#" class="d-block site-title primary-color pacifico text-capitalize text-center" style="text-decoration: none;">Welcome</a>
          <p class="site-title primary-color pacifico text-capitalize ">{{Session::get('name')}}</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-table primary-color"></i>
              <p class="site-title primary-color pacifico">
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            @if(Session::get('role') == 'admin')
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('view', 'admin')}}" class="nav-link">
                  <i class="fas fa-user-shield nav-icon primary-color"></i>
                  <p class="site-title primary-color pacifico">Admin</p>
                </a>
              </li>
            @endif
            @if(Session::get('role') == 'manager')
              <li class="nav-item">
                <a href="{{route('view', 'seller')}}" class="nav-link">
                  <i class="fas fa-user-tie nav-icon primary-color"></i>
                  <p class="site-title primary-color pacifico">Seller</p>
                </a>
              </li>
            @endif
            @if(Session::get('role') == 'admin' || Session::get('role') == 'manager')
              <li class="nav-item">
                <a href="{{route('view', 'member')}}" class="nav-link">
                  <i class="fas fa-user nav-icon primary-color"></i>
                  <p class="site-title primary-color pacifico">Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('view', 'order')}}" class="nav-link">
                  <i class="fas fa-shopping-cart nav-icon primary-color"></i>
                  <p class="site-title primary-color pacifico">Order</p>
                </a>
              </li>
            @endif
            @if(Session::get('role') == 'admin')
              <li class="nav-item">
                <a href="{{route('view', 'product')}}" class="nav-link">
                  <i class="fab fa-product-hunt nav-icon primary-color"></i>
                  <p class="site-title primary-color pacifico">Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('view', 'brand')}}" class="nav-link">
                  <i class="fas fa-boxes nav-icon primary-color"></i>
                  <p class="site-title primary-color pacifico">Brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('view', 'promotion')}}" class="nav-link">
                  <i class="fas fa-ad nav-icon primary-color"></i>
                  <p class="site-title primary-color pacifico">Promotion</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('view', 'category')}}" class="nav-link">
                  <i class="fas fa-cubes nav-icon primary-color"></i>
                  <p class="site-title primary-color pacifico">Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('view', 'feedback')}}" class="nav-link">
                  <i class="fas fa-comments nav-icon primary-color"></i>
                  <p class="site-title primary-color pacifico">Feedback</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square primary-color"></i>
              <p class="site-title primary-color pacifico">
                Create New
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          @if(Session::get('role') == 'admin')
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('create', 'admin')}}" class="nav-link">
                  <i class="fas fa-user-shield nav-icon primary-color"></i>
                  <p class="site-title primary-color pacifico">Admin</p>
                </a>
              </li>
          @endif
          @if(Session::get('role') == 'manager')
              <li class="nav-item">
                <a href="{{route('create', 'seller')}}" class="nav-link">
                  <i class="fas fa-user-tie nav-icon primary-color"></i>
                  <p class="site-title primary-color pacifico">Seller</p>
                </a>
              </li>
          @endif
          @if(Session::get('role') == 'admin')
              <li class="nav-item">
                <a href="{{route('create', 'product')}}" class="nav-link">
                  <i class="fab fa-product-hunt nav-icon primary-color"></i>
                  <p class="site-title primary-color pacifico">Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('create', 'brand')}}" class="nav-link">
                  <i class="fas fa-boxes nav-icon primary-color"></i>
                  <p class="site-title primary-color pacifico">Brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('create', 'promotion')}}" class="nav-link">
                  <i class="fas fa-ad nav-icon primary-color"></i>
                  <p class="site-title primary-color pacifico">Promotion</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('create', 'category')}}" class="nav-link">
                  <i class="fas fa-cubes nav-icon primary-color"></i>
                  <p class="site-title primary-color pacifico">Category</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt primary-color"></i>
              <p class="site-title primary-color pacifico">
                Sign Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>