<!DOCTYPE html>
<html>
    <!--     head section start -->

    @include('admin.includes.head')

    <!--     head section end -->
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <!--         header logo: style can be found in header.less -->

        @include('admin.includes.header')
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <!--             Left side column. contains the logo and side bar -->

            @include('admin.includes.left_menu')

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage Staff
                        <small>advanced staff</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{url('/deshboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-default">

                                    <div class="panel-body">
                                        <div class="row">
                                            @foreach($user_basic_info as $data)
                                            <div class="col-xs-12 col-sm-8">
                                                <h3>Profile details:</h3>
                                                <p><strong>Name: </strong> {{$data->name}} </p>
                                                <p><strong>Email: </strong>{{$user_info['email']}}</p>
                                                <p><strong>Mobile: </strong> {{$data->mobile}} </p>
                                                <p><strong>Address: </strong> {{$data->present_address}} </p>
                                                <p><strong>A/c Created Date: </strong> {{$data->created_at}} </p>
                                                
                                            </div><!--/col-->          
                                            <div class="col-xs-12 col-sm-4 text-center">
                                                @if($data->image=='')
                                                <img src="{{url::to('../public/profile_image/default.jpg')}}" alt="" class="center-block img-circle img-responsive" height="200"width="200">
                                                @else
                                                <img src="{{$data->image}}" alt="" class="center-block img-circle img-responsive">
                                                @endif

                                            </div><!--/col-->
                                             
                                            <div class="col-xs-12 col-sm-12">  
                                                <a href="{{route('edit_profile',['id'=>$data->id])}}"> <button class="btn btn-success btn-small"><span class="fa fa-plus-circle"></span> Edit Profile</button></a>
                                                @endforeach 
                                                <a href="{{route('change_password',['id'=>$user_info['id']])}}"><button class="btn btn-success btn-small"><span class="fa fa-plus-circle"></span> Chang Password</button></a>
                                                <a href="{{route('change_image',['id'=>$user_info['id']])}}"><button class="btn btn-success btn-small"><span class="fa fa-plus-circle"></span> Change Image </button></a>           
                                            </div><!--/col-->


                                        </div><!--/row-->

                                    </div><!--/panel-body-->
                                </div><!--/panel-->



                            </div>
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="{{URL::to('admin_resource/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('admin_resource/js/plugins/datatables/jquery.dataTables.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('admin_resource/js/plugins/datatables/dataTables.bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('admin_resource/js/AdminLTE/app.js')}}" type="text/javascript"></script>

        <!-- page script -->
        <script type="text/javascript">
$(function () {
    $("#example1").dataTable();
    $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
    });
});
        </script>

    </body>
</html>