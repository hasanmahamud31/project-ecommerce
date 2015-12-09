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
                        Order acknowledgement
                        <small>Receive history</small>
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
                                    <div class="pull-left"> 
                                        <h3 class="box-title">Order acknowledgement</h3>

                                    </div>
                                </div><!-- /.box-header -->
                                <div class="col-sm-offset-4 col-xs-offset-2">
                                    @if(session('message'))
                                    <!-- Form Error List -->
                                    <div class="badge bg-green">
                                        <ul><p style="text-align: center">{{session('message')}}</p></ul>
                                    </div>
                                    @endif 
                                </div>  
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Order Id</th>                                               
                                                <th>Product Id</th>
                                                <th>Time</th>
                                                <th>status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($data as $invoice)
                                            <tr>                                                
                                                <td>{{$invoice->id}}</td>                                               
                                                <td>{{$invoice->order_id}}</td>
                                                <td>{{$invoice->product_id}}</td>                                               
                                                <td>{{$invoice->created_at}}</td>
                                                <td style="text-align: center">
                                                    @if($invoice->status=='1')
                                                    <small class="badge bg-green">Active</small>
                                                    @endif
                                                </td>
                                                <td class="center">
                                                    <a href="{{route('pertial_accept_product',['id'=>$invoice->id])}}"> <button class="btn btn-edit btn-sm" data-widget='collapse' data-toggle="tooltip" title="pertial accept product"><i class="fa fa-adjust"></i></button></a>
                                                    <a href="{{route('full_accept_product',['id'=>$invoice->id])}}"> <button class="btn btn-edit btn-sm" data-widget='collapse' data-toggle="tooltip" title="full accept product"><i class="fa fa-shopping-cart"></i></button></a>
                                                    <a href="{{route('reject_product',['id'=>$invoice->id])}}"> <button class="btn btn-danger btn-sm" data-widget='remove' data-toggle="tooltip" title="reject product"><i class="fa fa-times"></i></button></a>
                                                </td>

                                            </tr>

                                            @endforeach


                                        </tbody>
                                        <tfoot>
<!--                                            <tr>
                                                <th>Rendering engine</th>
                                                <th>Browser</th>
                                                <th>Platform(s)</th>
                                                <th>Engine version</th>

                                            </tr>-->
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