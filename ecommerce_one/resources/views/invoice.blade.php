<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Invoice</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <style>
            aside{
                width: 100%;
            }
            section{
                width: 100%;
                margin: 1px;
            }
            .row_top{
                width: 100%;
                margin: 1px;
                // background-color: red;
            }
            .top_subdiv{
                width: 33.32%;
                // background-color: green;
                display: inline-block;
                float: right;
            }
            .table_design{
                width: 100%;
                //  border-bottom:1px solid;
                // background-color: gray;
            }
            .table_row{

            }
            th, td{
                text-align: left;
                border-bottom: 1px solid black;

            }
            .row_cash{
                width: 50%;
                // background-color: green;
                display: inline-block;
                float: left; 
               // text-align: right;
            }
            .table_bottom td{
                text-align: center;
              //  background-color: #0000ff;
                
                
                
                
            }
            .table_bottom table{
             //   background-color: #0073b7;
                width: 100%;
            }
            .div_sin{
                display: inline-block;
                float: left;
                width: 40%
            }
           
        </style>

    </head>
    <body>      
        <div>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside>                
                <!-- Content Header (Page header) -->

                <!-- Main content -->
                <section>                    
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                Company Name here<br>
                            </h2> 
                            <small>address of the Company</small>
                        </div><!-- /.col -->
                        <hr>
                    </div>
                    <!-- info row -->
                    <div class="row_top">
                        <div class="top_subdiv">
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
                        <div class="top_subdiv">
                            To
                            @foreach($data_order as $data)
                            <address>                        
                                {{$data->shipping_address}}                       
                            </address> 
                        </div><!-- /.col -->
                        <div class="top_subdiv">
                            <b>Order ID:</b>{{$data->id}}<br/>
                            <b>Order Date:</b>{{$data->created_at}}<br/> 
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    @endforeach
                    <!-- Table row -->
                    <div class="row_top">
                        <div class="row_top">
                            <table class="table_design">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product SKU</th>
                                        <th>Description</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>


                                    </tr>                                    
                                </thead>
                                <tbody>
                                    <?php $subtotal = 0; ?>
                                    @foreach($data_ordPro as $datam)
                                    <tr>
                                        <td>{{$datam->product_id}}</td>
                                        <td>{{$datam->sku}}</td>
                                        <td>{{$datam->product_description}}</td>
                                        <td>{{$datam->quantity}}</td>
                                        <td>{{$datam->quantity * $datam->product_price}}</td>
                                        <?php $subtotal += $datam->quantity * $datam->product_price; ?>
                                    </tr>
                                    <?php $order_id = $datam->order_id ?>
                                    @endforeach
                                </tbody>
                            </table>                            
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row_top">
                        <!-- accepted payments column -->
                        <div class="row_cash">
                            <p class="lead">Payment Methods:</p>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                Cash on Delivery
                            </p>
                        </div><!-- /.col -->
                        <div class="row_cash">
                          <p class="lead">Total Payment Amount:</p>
                            <div class="table_bottom">
                                <table class="" >
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>{{$subtotal}}</td>
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
                    <div class="row_top">                      
                        <div class="div_sin">
                            <p>........................<br>Company</p>                            
                        </div><!-- /.col -->
                        <div class="div_sin">
                            <p>........................<br>Receiver</p>                            
                        </div><!-- /.col -->
                        <div class="div_sin">
                            <p>........................<br>Invoice</p>                            
                        </div><!-- /.col -->
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->




    </body>
</html>