<script src="{{URL::to('front_end_resource/js/jquery-2.1.0.min.js')}}"></script>

<script type="text/javascript">
        $(document).ready(function () {
//            laravel ajax setup
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var token = $(this).data('token');
// start : remove product form cart
            $('.close_product').click(function () {
                $.ajax({
                    url : 'deletecart',
                    type: "post",
                    dataType: 'json',
                    data: {'id':$(this).val(), _token : token},
                    success: function(data){
                    //console.log(data);
                    var product_price;
                    var count = 0;
                    var total_price = 0;
                        $.each( data, function( key, val ) {
                           console.log(key + "price: " + data[key].price + "quanlity :"  + data[key].quantity );
                           count++;
                           total_price += data[key].price;
                        });
                        console.log(count);
                        console.log(total_price);
                        
                    //$('#subtotal').html('TK.' + data.pric);
                    }
                });
            });
        // end : remove product
        
        // start : add product to cart
         var dataArr     = [];
        $('#add_to_cart').click(function() { 
           
            alert($("#pd_color").val());
            var color       = (document.getElementById('pd_color') !== null) ?  (($("#pd_color").val() !== 0) && ($("#pd_color").val() !== null)) ? $("#pd_color").val() : 0 : -1;
            var size        = (document.getElementById('pd_size') !== null) ? (($("#pd_size").val() !== 0) && ($("#pd_size").val() !== null)) ? $("#pd_size").val() : 0 : -1;
            var quantity    = (document.getElementById('pd_quantity') !== null) ? $("#pd_quantity").val(): -1;
            alert(color);
            if(color != -1) {
                if(color == 0){
                    alert("please select color!");
                }else{
                    dataArr.push({
                        "color" : color
                    });
                }
            }
            if(size != -1) {
                if(size == 0){
                    alert("please select size!");
                } else {
                    dataArr.push({
                        "size" : size
                    });
                }
            }
            alert("color : " + color + 'size : ' + size);
            if((color == -1) && (size == -1)) {
                dataArr.push({
                        "_token" : token,
                        "quantity" : quantity
                });
                addToCart();
            } else if((color == -1) && (size != 0)) {
                dataArr.push({
                        "_token" : token,
                        "quantity" : quantity
                });
                addToCart();
            } else if((size == -1) && (color != 0)) {
                dataArr.push({
                        "_token" : token,
                        "quantity" : quantity
                });
                addToCart();
            } else if((color != 0) && (size != 0)) {
                dataArr.push({
                        "_token" : token,
                        "quantity" : quantity
                });
                addToCart();
            }
            
            
            console.log(" color : " + color + " quantity : " + quantity + " size : " + size);
            alert(" color : " + color + " quantity : " + quantity + " size : " + size);
            
        });
        // end : add product to cart
        function addToCart() {
                var jsonString = JSON.stringify(dataArr);
                alert(jsonString);
                
                    $.ajax({
                    url     : 'add_to_cart',
                    type    : "post",
                    //dataType: "json",
                    data    : {dataArr},
                    success : function(data){
                        console.log(data);
                    }
                });
               
        }
        
    });
    
    //document.forms['cart'].elements['category'].value = '<?php // echo $datam->category; ?>';
        
</script>
<script src="{{URL::to('front_end_resource/js/jquery-ui.min.js')}}"></script>
<script src="{{URL::to('front_end_resource/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{URL::to('front_end_resource/js/retina.js')}}"></script>
<script src="{{URL::to('front_end_resource/js/elevatezoom.min.js')}}"></script>
<script src="{{URL::to('front_end_resource/js/jquery.flexslider-min.js')}}"></script>
<script src="{{URL::to('front_end_resource/js/styleswitcher.js')}}"></script>
<script src="{{URL::to('front_end_resource/js/jquery.fancybox-1.3.4.js')}}"></script>
<script src="{{URL::to('front_end_resource/js/colorpicker.js')}}"></script>
<script src="{{URL::to('front_end_resource/js/waypoints.min.js')}}"></script>
<script src="{{URL::to('front_end_resource/js/jquery.isotope.min.js')}}"></script>
<script src="{{URL::to('front_end_resource/js/owl.carousel.min.js')}}"></script>
<script src="{{URL::to('front_end_resource/js/jquery.tweet.min.js')}}"></script>
<script src="{{URL::to('front_end_resource/js/jquery.custom-scrollbar.js')}}"></script>
<script src="{{URL::to('front_end_resource/js/styleswitcher.js')}}"></script>
<script src="{{URL::to('front_end_resource/js/scripts.js')}}"></script>
<script type="text/javascript" src="../../s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5306f8f674bfda4c"></script>
