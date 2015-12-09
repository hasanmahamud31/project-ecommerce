@extends('user.master.master')
@section('main_content')
<section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
    <h2 class="tt_uppercase color_dark m_bottom_25">Cart</h2>
    <!--cart table-->
    <table class="table_type_4 responsive_table full_width r_corners wraper shadow t_align_l t_xs_align_c m_bottom_30">
        <thead>
            <tr class="f_size_large">
                <!--titles for td-->
                <th>Product Image &amp; Name</th>
                <th>SKU</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @if(!Cart::isEmpty())
            @foreach($cartProducts as $cartProduct)
            <tr>
                <!--Product name and image-->
                <td data-title="Product Image &amp; name" class="t_md_align_c">
                    <img src="images/quick_view_img_10.jpg" alt="" class="m_md_bottom_5 d_xs_block d_xs_centered">
                    <a href="#" class="d_inline_b m_left_5 color_dark">{{ $cartProduct['name'] }}</a>
                </td>
                <!--product key-->
                <td data-title="SKU">{{ $cartProduct['id'] }}</td>
                <!--product price-->
                <td data-title="Price">
        <!--<s>TK. {{ $cartProduct['price'] }}</s>-->
                    <p class="f_size_large color_dark">TK. {{ $cartProduct['price'] }}</p>
                </td>
                <!--quanity-->
        <form id="cart" method="post" action="">
                <td data-title="Quantity">
                    <div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark m_bottom_10">
                        <button class="bg_tr d_block f_left" data-direction="down">-</button>
                        <input type="text" readonly value="{{ $cartProduct['quantity'] }}" class="f_left">
                        <button class="bg_tr d_block f_left"  data-direction="up">+</button>
                    </div>
                    @if($cartProduct['attributes']['size'] != null)
                    <div class="custom_select f_size_medium relative d_inline_middle">
                        <div class="select_title r_corners relative color_dark">Select Size</div>
                        <ul class="select_list d_none"></ul>
                        <select name="product_size" id="pd_size">
                            @foreach($products->first()->productSize as $productSize)
                            <option value="{{ $productSize['size_name'] }}">{{ $productSize['size_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div>
                        <div class="custom_select f_size_medium relative d_inline_middle">
                            {{ $cartProduct['attributes']['color'] }}
                        </div> 
                    </div>
<!--                    @if($products->first()->productColor->first()['color_name'] != -1)
                    <div class="custom_select f_size_medium relative d_inline_middle">
                            <div class="select_title r_corners relative color_dark">Select Color</div>
                            <ul class="select_list d_none"></ul>
                            <select name="product_color" id="pd_color">
                                @foreach($products->first()->productColor as $productColor)
                                <option value="{{ $productColor['color_name'] }}">{{ $productColor['color_name'] }}</option>
                                @endforeach
                            </select>
                    </div>
                    @endif-->
                    <div>
                        <input type="submit" value="update">
                        <a href="#" id="update{{ $cartProduct['price'] }}" class="color_dark"><i class="fa fa-check f_size_medium m_right_5"></i>Update</a><br>
                        <a href="#" class="color_dark"><i class="fa fa-times f_size_medium m_right_5"></i>Remove</a><br>
                    </div>
                </td>
                </form>
                <!--subtotal-->
                <td data-title="Subtotal">
                    <p class="f_size_large fw_medium scheme_color">TK. {{ $cartProduct['quantity'] * $cartProduct['price'] }}</p>
                </td>
            </tr>
            @endforeach
            @endif


            <!--prices-->
            <tr>
                <td colspan="4">
                    <p class="fw_medium f_size_large t_align_r t_xs_align_c">Discount:</p>
                </td>
                <td colspan="1">
                    <p class="fw_medium f_size_large color_dark">TK. 0.00</p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p class="fw_medium f_size_large t_align_r t_xs_align_c">Subtotal:</p>
                </td>
                <td colspan="1">
                    <p class="fw_medium f_size_large color_dark">TK. {{ Cart::getSubTotal() }}</p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p class="fw_medium f_size_large t_align_r t_xs_align_c">Payment Fee:</p>
                </td>
                <td colspan="1">
                    <p class="fw_medium f_size_large color_dark">TK. 0.00</p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p class="fw_medium f_size_large t_align_r t_xs_align_c">Shipment Fee:</p>
                </td>
                <td colspan="1">
                    <p class="fw_medium f_size_large color_dark">TK. 0.00</p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p class="fw_medium f_size_large t_align_r t_xs_align_c">Tax Total:</p>
                </td>
                <td colspan="1">
                    <p class="fw_medium f_size_large color_dark">TK. 0.00</p>
                </td>
            </tr>
            <!--total-->
            <tr>
                <td colspan="4" class="v_align_m d_ib_offset_large t_xs_align_l">
                    <!--coupon-->
                    <form class="d_ib_offset_0 d_inline_middle half_column d_xs_block w_xs_full m_xs_bottom_5">
                        <input type="text" placeholder="Enter your coupon code" name="" class="r_corners f_size_medium">
                        <button class="button_type_4 r_corners bg_light_color_2 m_left_5 mw_0 tr_all_hover color_dark">Save</button>
                    </form>
                    <p class="fw_medium f_size_large t_align_r scheme_color p_xs_hr_0 d_inline_middle half_column d_ib_offset_normal d_xs_block w_xs_full t_xs_align_c">Total:</p>
                </td>
                <td colspan="1" class="v_align_m">
                    <p class="fw_medium f_size_large scheme_color m_xs_bottom_10">$101.05</p>
                </td>
            </tr>
        </tbody>
    </table>
</section>
@stop
