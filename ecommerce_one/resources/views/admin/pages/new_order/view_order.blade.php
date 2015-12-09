@extends('admin.main.master')
@section('content')
<aside class="right-side">                
    <!-- Main content -->
    <section class="content">    


        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Order Details..
            </h1>
        </section>

        <!--        <div class="pad margin no-print">
                    <div class="alert alert-info" style="margin-bottom: 0!important;">
                        <i class="fa fa-info"></i>
                        <b>Note:</b> This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                    </div>
                </div>-->
        <!-- Main content -->
        <section class="content invoice">                    
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i>Company Name here
                        <small class="pull-right">Date: <?php echo date('y-m-d'); ?></small>

                    </h2>                            
                </div><!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        @foreach ($data_user as $data)
                        Name:<strong>{{$data->name}}</strong><br>
                        {{$data->present_address}}<br>
                        Phone: {{$data->mobile}}<br/>
                        Email: {{$data->email}}
                        @endforeach
                    </address>
                </div><!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    @foreach($data_order as $data)
                    <address>                        
                        {{$data->shipping_address}}                       
                    </address>                    
                </div><!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Order ID:</b>{{$data->id}}<br/>
                    <b>Order Date:</b>{{$data->created_at}}<br/>                   
                </div><!-- /.col -->
            </div><!-- /.row -->
            @endforeach
            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product SKU</th>
                                <th>Description</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Action</th>

                            </tr>                                    
                        </thead>
                        <tbody>
                            <?php $subtotal = 0; ?>
                            @foreach($data_ordPro as $datam)
                            <tr>
                                <td>{{$datam->product_id}}</td>
                                <td>{{$datam->sku}}</td>
                                <td>{{$datam->product_description}}</td>
                                <td>
                                    <form method="post" action="{{route('update_product_quantity')}}">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="id" value="{{$datam->id}}">
                                        <input size="5" name="quantity" value="{{$datam->quantity}}">
                                        <input type="submit" name="btn" value="Update">
                                    </form>
                                </td>
                                <td>{{$datam->quantity * $datam->product_price}}</td>
                                <td>
                                   
                                    <form method="post" action="{{route('order_status_product')}}">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="id" value="{{$datam->id}}">
                                        <input size="5" name="comment" value="" required>
                                        <button class="btn btn-danger btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove Product"><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                                    <?php $subtotal += $datam->quantity * $datam->product_price; ?>
                            </tr>
                               <?php $order_id=$datam->id?>
                            @endforeach
                        </tbody>
                    </table>                            
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                    <p class="lead">Payment Methods:</p>
<!--                    <img src="admin_resource/img/credit/visa.png" alt="Visa"/>
                    <img src="admin_resource/img/credit/mastercard.png" alt="Mastercard"/>
                    <img src="admin_resource/img/credit/american-express.png" alt="American Express"/>
                    <img src="admin_resource/img/credit/paypal2.png" alt="Paypal"/>-->
                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        Cash On Delivery...
                    </p>
                </div><!-- /.col -->
                <div class="col-xs-6">
                    <p class="lead"></p>
                    <div class="table-responsive">
                        <table class="table" >
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td >{{$subtotal}}</td>
                            </tr>
                            <tr>
                                <th>Tax (0%)</th>
                                <td>{{$vat=($subtotal * 0)/100}}</td>
                            </tr>
                            <tr>
                                <th>Shipping(dhaka City):</th>
                                <td>Free</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>{{$total_price=$vat + $subtotal}}</td>
                            </tr>
                        </table>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="{{route('submit_invoice',['id'=>$order_id])}}"><button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Invoice</button></a>
                    <a href="{{route('order_details_pdf',['id'=>$order_id])}}"><button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button></a>
                </div>
            </div>
        </section><!-- /.content -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
@stop