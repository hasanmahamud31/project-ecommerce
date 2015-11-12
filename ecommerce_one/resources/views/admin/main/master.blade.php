<!DOCTYPE html>
<html>
    <!--     head section start -->

    @include('admin.includes.head')

    <!--     head section end -->
    <body class="skin-blue">

        <!--         header logo: style can be found in header.less -->

        @include('admin.includes.header')

        <div class="wrapper row-offcanvas row-offcanvas-left">

            <!--             Left side column. contains the logo and side bar -->

            @include('admin.includes.left_menu')

            <!--            main content start -->

            @yield('content')

            <!--            main content end -->

        </div> 

        <!--         script start from here    -->
        @include('admin.includes.script')
        <!--         script end from here   -->
    </boy>
</html>


