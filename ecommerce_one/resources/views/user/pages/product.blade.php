@extends('user.master.master')
@section('main_content')

<section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
    <div class="clearfix m_bottom_30 t_xs_align_c">
        <div class="photoframe type_2 shadow r_corners f_left f_sm_none d_xs_inline_b product_single_preview relative m_right_30 m_bottom_5 m_sm_bottom_20 m_xs_right_0 w_mxs_full">
            <span class="hot_stripe"><img src="{{URL::to('front_end_resource/images/sale_product.png')}}" alt=""></span>
            <div class="relative d_inline_b m_bottom_10 qv_preview d_xs_block">
                <img id="zoom_image"  height="438px" width="438" src="{{ URL::to($products->first()->productImage->first()['image_path']) }}" data-zoom-image="{{ URL::to($products->first()->productImage->first()['image_path']) }}" class="tr_all_hover" alt="">
                <a href="{{URL::to('front_end_resource/images/preview_zoom_1.jpg')}}" class="d_block button_type_5 r_corners tr_all_hover box_s_none color_light p_hr_0">
                    <i class="fa fa-expand"></i>
                </a>
            </div>
            <!--carousel-->
            <div class="relative qv_carousel_wrap">
                <button class="button_type_11 bg_light_color_1 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_single_prev">
                    <i class="fa fa-angle-left "></i>
                </button>
                <ul class="qv_carousel_single d_inline_middle">
                    @foreach($products->first()->productImage as $productImage)
                    <a href="#" data-image="{{ URL::to($productImage['image_path']) }}" data-zoom-image="{{URL::to($productImage['image_path'])}}"><img src="{{URL::to($productImage['image_path'])}}" alt=""></a>
                  
                    @endforeach
                </ul>
                <button class="button_type_11 bg_light_color_1 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_single_next">
                    <i class="fa fa-angle-right "></i>
                </button>
            </div>
        </div>
        <div class="p_top_10 t_xs_align_l">
            <!--description-->
            <h2 class="color_dark fw_medium m_bottom_10">{{ $products->first()['product_name'] }}</h2>
            <div class="m_bottom_10">
                <!--rating-->
                <ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover">
                    <li class="active">
                        <i class="fa fa-star-o empty tr_all_hover"></i>
                        <i class="fa fa-star active tr_all_hover"></i>
                    </li>
                    <li class="active">
                        <i class="fa fa-star-o empty tr_all_hover"></i>
                        <i class="fa fa-star active tr_all_hover"></i>
                    </li>
                    <li class="active">
                        <i class="fa fa-star-o empty tr_all_hover"></i>
                        <i class="fa fa-star active tr_all_hover"></i>
                    </li>
                    <li class="active">
                        <i class="fa fa-star-o empty tr_all_hover"></i>
                        <i class="fa fa-star active tr_all_hover"></i>
                    </li>
                    <li>
                        <i class="fa fa-star-o empty tr_all_hover"></i>
                        <i class="fa fa-star active tr_all_hover"></i>
                    </li>
                </ul>
                <a href="#" class="d_inline_middle default_t_color f_size_small m_left_5">1 Review(s) </a>
            </div>
            <hr class="m_bottom_10 divider_type_3">
            <table class="description_table m_bottom_10">
                <tr>
                    <td>Manufacturer:</td>
                    <td><a href="#" class="color_dark">{{ $products->first()['brand_name']}}</a></td>
                </tr>
                <tr>
                    <td>Availability:</td>
                    <td><span class="color_green">in stock</span> 20 item(s)</td>
                </tr>
                <tr>
                    <td>Product Code:</td>
                    <td>PS06</td>
                </tr>
            </table>
            <h5 class="fw_medium m_bottom_10">Product Dimensions and Weight</h5>
            <table class="description_table m_bottom_5">
                <tr>
                    <td>Product Length:</td>
                    <td><span class="color_dark">10.0000M</span></td>
                </tr>
                <tr>
                    <td>Product Weight:</td>
                    <td>10.0000KG</td>
                </tr>
            </table>
            <hr class="divider_type_3 m_bottom_10">
            <p class="m_bottom_10">{{ $products->first()['product_description'] }}</p>
            <hr class="divider_type_3 m_bottom_15">
            <div class="m_bottom_15">
                <s class="v_align_b f_size_ex_large">TK. 152</s><span class="v_align_b f_size_big m_left_5 scheme_color fw_medium">TK.{{ $products->first()['product_price'] }}</span>
            </div>
            <form method="post" action="{{route('addToCart')}}">
                {{ csrf_field() }}
                <input name="product_id" type="hidden" value="{{ $products->first()['id'] }}"
                
            <table class="description_table type_2 m_bottom_15">
                @if($products->first()->productSize->first()['size_name'] != -1)
                <tr>
                    <td class="v_align_m"><br>Size:</td>
                    <td class="v_align_m">
                        <div class="custom_select f_size_medium relative d_inline_middle">
<!--                            <div class="select_title r_corners relative color_dark">Select Size</div>-->
                            <ul class="select_list d_none"></ul>
                            <select name="product_size" id="pd_size">
                                @foreach($products->first()->productSize as $productSize)
                                <option value="{{ $productSize['size_name'] }}">{{ $productSize['size_name'] }}</option>
<!--                            <option value="m">m</option>
                                <option value="l">l</option>-->
                                @endforeach
                            </select>
                        </div>
                    </td>
                </tr>
                @endif
                @if($products->first()->productColor->first()['color_name'] != -1)
                <tr>
                    <td class="v_align_m">Color:</td>
                    <td class="v_align_m">
                        <div class="custom_select f_size_medium relative d_inline_middle">
                            <div class="select_title r_corners relative color_dark">Select Color</div>
                            <ul class="select_list d_none"></ul>
                            <select name="product_color" id="pd_color">
                                
                                @foreach($products->first()->productColor as $productColor)
                                <option value="{{ $productColor['color_name'] }}">{{ $productColor['color_name'] }}</option>
<!--                            <option value="m">m</option>
                                <option value="l">l</option>-->
                                @endforeach
                            </select>
                        </div>
                    </td>
                </tr>
                @endif
                <tr>
                    <td class="v_align_m"><br><br>Quantity:</td>
                    <td class="v_align_m">
                        <div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark">
                            <button class="bg_tr d_block f_left" data-direction="down">-</button>
                            <input type="text" name="quantity" id="pd_quantity" readonly value="1" class="f_left">
                            <button class="bg_tr d_block f_left" data-direction="up">+</button>
                        </div>
                    </td>
                </tr>
                
            </table>
            <div class="d_ib_offset_0 m_bottom_20">
                <button class="button_type_12 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large" id="add_to_cart" value="">Add to Cart</button>
                <button class="button_type_12 bg_light_color_2 tr_delay_hover d_inline_b r_corners color_dark m_left_5 p_hr_0"><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Wishlist</span><i class="fa fa-heart-o f_size_big"></i></button>
                <button class="button_type_12 bg_light_color_2 tr_delay_hover d_inline_b r_corners color_dark m_left_5 p_hr_0"><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Compare</span><i class="fa fa-files-o f_size_big"></i></button>
                <button class="button_type_12 bg_light_color_2 tr_delay_hover d_inline_b r_corners color_dark m_left_5 p_hr_0 relative"><i class="fa fa-question-circle f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Ask a Question</span></button>
            </div>
        </form>
            <p class="d_inline_middle">Share this:</p>
            <div class="d_inline_middle m_left_5 addthis_widget_container">
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                    <a class="addthis_button_preferred_1"></a>
                    <a class="addthis_button_preferred_2"></a>
                    <a class="addthis_button_preferred_3"></a>
                    <a class="addthis_button_preferred_4"></a>
                    <a class="addthis_button_compact"></a>
                    <a class="addthis_counter addthis_bubble_style"></a>
                </div>
                <!-- AddThis Button END -->
            </div>
        </div>
    </div>
    <!--tabs-->
    <div class="tabs m_bottom_45">
        <!--tabs navigation-->
        <nav>
            <ul class="tabs_nav horizontal_list clearfix">
                <li class="f_xs_none"><a href="#tab-1" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Description</a></li>
                <li class="f_xs_none"><a href="#tab-2" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Specifications</a></li>
                <li class="f_xs_none"><a href="#tab-3" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Reviews</a></li>
                <li class="f_xs_none"><a href="#tab-4" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Custom Tab</a></li>
            </ul>
        </nav>
        <section class="tabs_content shadow r_corners">
            <div id="tab-1">
                <p class="m_bottom_10">Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consecvtetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. </p>
                <p class="m_bottom_15">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit agna,endrerit sit amet, tincidunt ac, viverra sed, nulla. Donec porta diam eu massa. Quisque diam lorem, interdum vitae,dapibus ac, scelerisque vitae, pede. Donec eget tellus non erat lacinia fermentum. </p>
                <hr class="m_bottom_15">
                Tags: <a href="#" class="color_dark">black</a>, <a href="#" class="color_dark">dresses</a>, 
                <a href="#" class="color_dark">woman</a>, <a href="#" class="color_dark">sexy</a>
            </div>
            <div id="tab-2">
                <h5 class="fw_medium m_bottom_15">Item specifics:</h5>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6 m_xs_bottom_15">
                        <div class="table_sm_wrap">
                            <table class="description_table type_3 m_xs_bottom_10">
                                <tr>
                                    <td>Condition:</td>
                                    <td>New with tags</td>
                                </tr>
                                <tr>
                                    <td>Country of Manufacture:</td>
                                    <td>China</td>
                                </tr>
                                <tr>
                                    <td>Style:</td>
                                    <td>Flared Pleated Mini Skirt</td>
                                </tr>
                                <tr>
                                    <td>Skirt Length:</td>
                                    <td>38CM/14.82"</td>
                                </tr>
                                <tr>
                                    <td>Waist:</td>
                                    <td>66-80CM/25.9"-31.4"</td>
                                </tr>
                                <tr>
                                    <td>Occasion:</td>
                                    <td>casual</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="table_sm_wrap">
                            <table class="description_table type_3 m_xs_bottom_10">
                                <tr>
                                    <td>Brand:</td>
                                    <td>Chanel</td>
                                </tr>
                                <tr>
                                    <td>Size Type:</td>
                                    <td>Regular</td>
                                </tr>
                                <tr>
                                    <td>Bottoms Size (Women's):</td>
                                    <td>One size</td>
                                </tr>
                                <tr>
                                    <td>Material:</td>
                                    <td>Cotton Blend</td>
                                </tr>
                                <tr>
                                    <td>Length:</td>
                                    <td>Mini</td>
                                </tr>
                                <tr>
                                    <td>Pattern:</td>
                                    <td>Plaids &amp; Checks</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-3">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <h5 class="fw_medium m_bottom_15">Last Reviews</h5>
                        <!--review-->
                        <article>
                            <div class="clearfix m_bottom_10">
                                <p class="f_size_medium f_left f_mxs_none m_mxs_bottom_5">By John Smith - Thursday, 26 December 2013</p>
                                <!--rating-->
                                <ul class="horizontal_list f_right f_mxs_none clearfix rating_list type_2">
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                </ul>	
                            </div>
                            <p class="m_bottom_15">Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consecvtetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit.</p>
                        </article>
                        <hr class="m_bottom_15">
                        <!--review-->
                        <article>
                            <div class="clearfix m_bottom_10">
                                <p class="f_size_medium f_left f_mxs_none m_mxs_bottom_5">By Admin - Thursday, 26 December 2013</p>
                                <!--rating-->
                                <ul class="horizontal_list f_right f_mxs_none clearfix rating_list type_2">
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                </ul>	
                            </div>
                            <p class="m_bottom_15">Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sollicitudin velit sed leo.</p>
                        </article>
                        <hr class="m_bottom_15">
                        <!--review-->
                        <article>
                            <div class="clearfix m_bottom_10">
                                <p class="f_size_medium f_left f_mxs_none m_mxs_bottom_5">By Alan Doe - Thursday, 26 December 2013</p>
                                <!--rating-->
                                <ul class="horizontal_list f_right f_mxs_none clearfix rating_list type_2">
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                </ul>	
                            </div>
                            <p class="m_bottom_15">Ut pharetra augue nec augue. Nam elit agna,endrerit sit amet, tincidunt ac, viverra sed, nulla. Donec porta diam eu massa. Quisque diam lorem, interdum vitae,dapibus ac, scelerisque vitae, pede. Donec eget tellus non erat lacinia fermentum. Donec in velit vel ipsum auctor pulvinar. Vestibulum iaculis lacinia est.</p>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <h5 class="fw_medium m_bottom_15">Write a Review</h5>
                        <p class="f_size_medium m_bottom_15">Now please write a (short) review....(min. 100, max. 2000 characters)</p>
                        
                            <textarea class="r_corners full_width m_bottom_10 review_tarea"></textarea>
                            <p class="f_size_medium m_bottom_5">First: Rate the product. Please select a rating between 0 (poorest) and 5 stars (best).</p>
                            <div class="d_block full_width m_bottom_10">
                                <div class="d_block m_bottom_5 v_align_m">
                                    <p class="f_size_medium d_inline_middle m_right_5">Rating:</p>
                                    <!--rating-->
                                    <ul class="horizontal_list clearfix rating_list type_2 d_inline_middle">
                                        <li class="active">
                                            <i class="fa fa-star-o empty tr_all_hover"></i>
                                            <i class="fa fa-star active tr_all_hover"></i>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-star-o empty tr_all_hover"></i>
                                            <i class="fa fa-star active tr_all_hover"></i>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-star-o empty tr_all_hover"></i>
                                            <i class="fa fa-star active tr_all_hover"></i>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-star-o empty tr_all_hover"></i>
                                            <i class="fa fa-star active tr_all_hover"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star-o empty tr_all_hover"></i>
                                            <i class="fa fa-star active tr_all_hover"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="f_size_medium m_bottom_10 d_block">
                                    <p class="d_inline_middle">Characters written:</p>
                                    <input type="text" class="r_corners d_inline_middle type_2 m_left_5 m_sm_left_0 m_xs_left_5 mxw_0 small_field" value="0">
                                </div>
                            </div>
                            <button type="submit" class="r_corners button_type_4 tr_all_hover mw_0 color_dark bg_light_color_2">Submit</button>
                       
                    </div>
                </div>
            </div>
            <div id="tab-4">
                <div class="iframe_video_wrap">
                    <iframe src="http://www.youtube.com/embed/Du8ld5hrqN0?wmode=transparent"></iframe>
                </div>
            </div>
        </section>
    </div>
    <div class="clearfix">
        <h2 class="color_dark tt_uppercase f_left m_bottom_15 f_mxs_none">Related Products</h2>
        <div class="f_right clearfix nav_buttons_wrap f_mxs_none m_mxs_bottom_5">
            <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners rp_prev"><i class="fa fa-angle-left"></i></button>
            <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners rp_next"><i class="fa fa-angle-right"></i></button>
        </div>
    </div>
    <div class="related_projects m_bottom_15 m_sm_bottom_0 m_xs_bottom_15">
        <figure class="r_corners photoframe shadow relative d_xs_inline_b tr_all_hover">
            <!--product preview-->
            <a href="#" class="d_block relative pp_wrap">
                <!--hot product-->
                <span class="hot_stripe type_2"><img src="{{URL::to('front_end_resource/images/hot_product_type_2.png')}}" alt=""></span>
                <img src="{{URL::to('front_end_resource/images/product_img_5.jpg')}}" class="tr_all_hover" alt="">
                <span data-popup="#quick_view_product" class="t_md_align_c button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
            </a>
            <!--description and price of product-->
            <figcaption class="t_xs_align_l">
                <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis">Eget elementum vel</a></h5>
                <div class="clearfix">
                    <p class="scheme_color f_left f_size_large m_bottom_15">$102.00</p>
                    <!--rating-->
                    <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li>
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                    </ul>
                </div>
                <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
            </figcaption>
        </figure>
        <figure class="r_corners photoframe shadow relative d_xs_inline_b tr_all_hover">
            <!--product preview-->
            <a href="#" class="d_block relative pp_wrap">
                <img src="{{URL::to('front_end_resource/images/product_img_7.jpg')}}" class="tr_all_hover" alt="">
                <span data-popup="#quick_view_product" class="t_md_align_c button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
            </a>
            <!--description and price of product-->
            <figcaption class="t_xs_align_l">
                <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis">Cursus eleifend elit aenean elit aenean</a></h5>
                <div class="clearfix">
                    <p class="scheme_color f_left f_size_large m_bottom_15">$99.00</p>
                    <!--rating-->
                    <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li>
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                    </ul>
                </div>
                <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
            </figcaption>
        </figure>
        <figure class="r_corners photoframe shadow relative d_xs_inline_b tr_all_hover">
            <!--product preview-->
            <a href="#" class="d_block relative pp_wrap">
                <!--sale product-->
                <span class="hot_stripe type_2"><img src="{{URL::to('front_end_resource/images/sale_product_type_2.png')}}" alt=""></span>
                <img src="{{URL::to('front_end_resource/images/product_img_8.jpg')}}" class="tr_all_hover" alt="">
                <span data-popup="#quick_view_product" class="t_md_align_c button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
            </a>
            <!--description and price of product-->
            <figcaption class="t_xs_align_l">
                <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis">Aliquam erat volutpat</a></h5>
                <div class="clearfix">
                    <p class="scheme_color f_left f_size_large m_bottom_15">$36.00</p>
                    <!--rating-->
                    <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li>
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                    </ul>
                </div>
                <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
            </figcaption>
        </figure>
        <figure class="r_corners photoframe shadow relative d_xs_inline_b tr_all_hover">
            <!--product preview-->
            <a href="#" class="d_block relative pp_wrap">
                <!--hot product-->
                <span class="hot_stripe type_2"><img src="{{URL::to('front_end_resource/images/hot_product_type_2.png')}}" alt=""></span>
                <img src="{{URL::to('front_end_resource/images/product_img_3.jpg')}}" class="tr_all_hover" alt="">
                <span data-popup="#quick_view_product" class="t_md_align_c button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
            </a>
            <!--description and price of product-->
            <figcaption class="t_xs_align_l">
                <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis">Eget elementum vel</a></h5>
                <div class="clearfix">
                    <p class="scheme_color f_left f_size_large m_bottom_15">$102.00</p>
                    <!--rating-->
                    <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li>
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                    </ul>
                </div>
                <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
            </figcaption>
        </figure>
        <figure class="r_corners photoframe shadow relative d_xs_inline_b tr_all_hover">
            <!--product preview-->
            <a href="#" class="d_block relative pp_wrap">
                <img src="images/product_img_1.jpg" class="tr_all_hover" alt="">
                <span data-popup="#quick_view_product" class="t_md_align_c button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
            </a>
            <!--description and price of product-->
            <figcaption class="t_xs_align_l">
                <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis">Cursus eleifend elit aenean...</a></h5>
                <div class="clearfix">
                    <p class="scheme_color f_left f_size_large m_bottom_15">$99.00</p>
                    <!--rating-->
                    <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li>
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                    </ul>
                </div>
                <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
            </figcaption>
        </figure>
        <figure class="r_corners photoframe shadow relative d_xs_inline_b tr_all_hover">
            <!--product preview-->
            <a href="#" class="d_block relative pp_wrap">
                <!--sale product-->
                <span class="hot_stripe type_2"><img src="{{URL::to('front_end_resource/images/sale_product_type_2.png')}}" alt=""></span>
                <img src="{{URL::to('front_end_resource/images/product_img_9.jpg')}}" class="tr_all_hover" alt="">
                <span data-popup="#quick_view_product" class="t_md_align_c button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
            </a>
            <!--description and price of product-->
            <figcaption class="t_xs_align_l">
                <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis">Aliquam erat volutpat</a></h5>
                <div class="clearfix">
                    <p class="scheme_color f_left f_size_large m_bottom_15">$36.00</p>
                    <!--rating-->
                    <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li>
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                    </ul>
                </div>
                <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0" value="">Add to Cart</button>
            </figcaption>
        </figure>
    </div>
    <hr class="divider_type_3 m_bottom_15">
    <a href="category_grid.html" role="button" class="d_inline_b bg_light_color_2 color_dark tr_all_hover button_type_4 r_corners"><i class="fa fa-reply m_left_5 m_right_10 f_size_large"></i>Back to: Woman</a>
</section>
@stop
