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
                        Manage Admin
                        <small>advanced admin</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{url('/deshboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">


                            <div class="box">
                                <div class="box-header">
                                    <div class="pull-left"> <h3 class="box-title">Manage Admin</h3></div>
                                    <div class="pull-right">
                                        <ol class="breadcrumb">
                                            <li><a href="{{url('/register')}}">Add admin</a></li>
                                           
                                        </ol>
                                    </div>

                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Admin Name</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                
                                                $users=User::all()->get();
                                                                                               
                                                ?>
                                                @foreach($users as $user)
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->phone_no}}</td>
                                                <td>{{$user->email}}</td>
                                                <td> {{$user->status}}</td>
                                                <td>X</td>
                                                @endforeach
                                            </tr>
                                           
                                            <tr>
                                                <td>Other browsers</td>
                                                <td>All others</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>U</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Rendering engine</th>
                                                <th>Browser</th>
                                                <th>Platform(s)</th>
                                                <th>Engine version</th>
                                                <th>CSS grade</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="{{URL::to('../admin_resource/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('../admin_resource/js/plugins/datatables/jquery.dataTables.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('../admin_resource/js/plugins/datatables/dataTables.bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('../admin_resource/js/AdminLTE/app.js')}}" type="text/javascript"></script>

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