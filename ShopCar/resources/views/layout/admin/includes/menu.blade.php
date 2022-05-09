<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.index') }}" class="brand-link">
        <img src="{{ url('/') }}/images/logo/logo_02_1x.png" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">NeonCart.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('/admin') }}/dist/img/avatar5.png" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Huynh Toan</a>
                <ul class="settings_options ul_li_block clearfix">               
                    <li><a href="{{ route('postLogout') }}"> Logout</a></li>
                </ul>
            </div>           
        </div>
        
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            DASHBOARD
                        </p>
                    </a>
                    <a href="{{ route('category.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            CATEGORY
                        </p>
                    </a>
                    <a href="{{ route('product.index') }}" class="nav-link ">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            PRODUCT
                        </p>
                    </a>
                    <!-- <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            USER
                        </p>
                    </a> -->
                    <a href="{{ route('order.index') }}" class="nav-link ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            ORDER
                        </p>
                    </a>


                </li>
                <!-- <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>