<aside class="left-side sidebar-offcanvas">                
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{URL::to('admin_resource/img/avatar3.png')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Hello, Jane</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>

        <?php $access_level = Auth::user()->access_level; ?>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li class="active">
                <a href="{{URL::to('/dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            @if($access_level==11)
            <li>
                <a href="{{route('manage_admin')}}">
                    <i class="fa fa-th"></i> <span>Manage Admin</span> <small class="badge pull-right bg-green">new</small>
                </a>
            </li>
            @endif
            @if($access_level==11 || $access_level==12)
            <li>
                <a href="{{URl::to('/staff_manage')}}">
                    <i class="fa fa-th"></i> <span>Manage Staff</span> <small class="badge pull-right bg-green">new</small>
                </a>
            </li>

            <li>
                <a href="{{URl::to('/reseller_manage')}}">
                    <i class="fa fa-th"></i> <span>Manage Reseller</span> <small class="badge pull-right bg-green">new</small>
                </a>
            </li>
            <li>
                <a href="{{route('user_manage')}}">
                    <i class="fa fa-th"></i> <span>Manage User</span> <small class="badge pull-right bg-green">new</small>
                </a>
            </li>
            <li>
                <a href="{{route('category_view')}}">
                    <i class="fa fa-th"></i> <span>Manage Category</span> <small class="badge pull-right bg-green">4</small>
                </a>
            </li>
            <li>
                <a href="{{route('subcategory_view')}}">
                    <i class="fa fa-th"></i> <span>Manage Sub Category</span> <small class="badge pull-right bg-green">4</small>
                </a>
            </li>
            @endif
            @if($access_level==11 || $access_level==12 || $access_level==21 || $access_level==13)
            <li>
                <a href="{{route('product_view')}}">
                    <i class="fa fa-th"></i> <span>Manage Product</span> <small class="badge pull-right bg-green">4</small>
                </a>
            </li>
            <li>
                <a href="{{route('order_view')}}">
                    <i class="fa fa-th"></i> <span>New Order</span> <small class="badge pull-right bg-green">4</small>
                </a>
            </li>
            <li>
                <a href="{{route('invoice_view')}}">
                    <i class="fa fa-th"></i> <span>Manage Invoice</span> <small class="badge pull-right bg-green">4</small>
                </a>
            </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>