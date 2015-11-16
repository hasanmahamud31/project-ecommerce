<?php //dd($category); ?>

@extends('user.master.master')
@section('main_content')
<section class="col-lg-9 col-md-9 col-sm-9">
    <h2 class="tt_uppercase color_dark m_bottom_10 heading5 animate_ftr">Featured products</h2>
    <!--products-->
    <section class="products_container a_type_2 category_grid clearfix m_bottom_25">
        <!--product item-->
        @foreach ($products as $product)
        <div class="product_item hit w_xs_full">
            <figure class="r_corners photoframe animate_ftb type_2 t_align_c tr_all_hover shadow relative">
                <!--product preview-->
                <a href="#" class="d_block relative pp_wrap m_bottom_15">
                    <!--hot product-->
                    <span class="hot_stripe"><img src="{{URL::to('front_end_resource/images/hot_product.png')}}" alt=""></span>
                    <img src="{{URL::to('front_end_resource/images/product_img_1.jpg')}}" class="tr_all_hover" alt="">
                    <span role="button" data-popup="#quick_view_product{{ $product['id'] }}" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                </a>
                <!--description and price of product-->
                <figcaption>
                    <h5 class="m_bottom_10"><a href="{{route('singleProduct', ['productId' => $product['id']])}}" class="color_dark">{{ $product['product_name'] }}</a></h5>
                    <!--rating-->
                    <ul class="horizontal_list d_inline_b m_bottom_10 clearfix rating_list type_2 tr_all_hover">
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
                    <p class="scheme_color f_size_large m_bottom_15">TK. {{ $product['product_price'] }}</p>	
                    <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15">Add to Cart</button>
                    <div class="clearfix m_bottom_5">
                        <ul class="horizontal_list d_inline_b l_width_divider">
                            <li class="m_right_15 f_md_none m_md_right_0"><a href="#" class="color_dark">Add to Wishlist</a></li>
                            <li class="f_md_none"><a href="#" class="color_dark">Add to Compare</a></li>
                        </ul>
                    </div>
                </figcaption>
            </figure>
        </div>
         @endforeach
        <!--product item-->
        <div class="product_item featured w_xs_full">
            <figure class="r_corners photoframe animate_ftb long type_2 t_align_c shadow relative">
                <!--product preview-->
                <a href="#" class="d_block relative pp_wrap m_bottom_15">
                    <img src="{{URL::to('front_end_resource/images/product_img_2.jpg')}}" class="tr_all_hover" alt="">
                    <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                </a>
                <!--description and price of product-->
                <figcaption>
                    <h5 class="m_bottom_10"><a href="#" class="color_dark">Ut tellus dolor dapibus</a></h5>
                    <div class="clearfix m_bottom_15">
                        <!--rating-->
                        <ul class="horizontal_list type_2 m_bottom_10 d_inline_b clearfix rating_list tr_all_hover">
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
                        <p class="scheme_color f_size_large">$57.00</p>
                    </div>
                    <div class="clearfix">
                        <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15">Add to Cart</button>
                    </div>
                    <div class="clearfix m_bottom_5">
                        <ul class="horizontal_list d_inline_b l_width_divider">
                            <li class="m_right_15 f_md_none m_md_right_0"><a href="#" class="color_dark">Add to Wishlist</a></li>
                            <li class="f_md_none"><a href="#" class="color_dark">Add to Compare</a></li>
                        </ul>
                    </div>
                </figcaption>
            </figure>
        </div>
        <!--product item-->
        <div class="product_item new w_xs_full">
            <figure class="r_corners photoframe animate_ftb long type_2 t_align_c shadow relative">
                <!--product preview-->
                <a href="#" class="d_block relative pp_wrap m_bottom_15">
                    <img src="{{URL::to('front_end_resource/images/product_img_3.jpg')}}" class="tr_all_hover" alt="">
                    <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                </a>
                <!--description and price of product-->
                <figcaption>
                    <h5 class="m_bottom_10"><a href="#" class="color_dark">Cursus eleifend elit aenean.</a></h5>
                    <div class="clearfix">
                        <!--rating-->
                        <ul class="horizontal_list d_inline_b m_bottom_10 type_2 clearfix rating_list tr_all_hover">
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
                        <p class="scheme_color f_size_large m_bottom_15">$99.00</p>
                    </div>
                    <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15">Add to Cart</button>
                    <div class="clearfix m_bottom_5">
                        <ul class="horizontal_list d_inline_b l_width_divider">
                            <li class="m_right_15 f_md_none m_md_right_0"><a href="#" class="color_dark">Add to Wishlist</a></li>
                            <li class="f_md_none"><a href="#" class="color_dark">Add to Compare</a></li>
                        </ul>
                    </div>
                </figcaption>
            </figure>
        </div>
        <!--product item-->
        <div class="product_item specials w_xs_full">
            <figure class="r_corners photoframe animate_ftb long type_2 t_align_c shadow relative">
                <!--product preview-->
                <a href="#" class="d_block relative pp_wrap m_bottom_15">
                    <img src="{{URL::to('front_end_resource/images/product_img_7.jpg')}}" class="tr_all_hover" alt="">
                    <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                </a>
                <!--description and price of product-->
                <figcaption>
                    <h5 class="m_bottom_10"><a href="#" class="color_dark">Eget elementum vel</a></h5>
                    <div class="clearfix">
                        <!--rating-->
                        <ul class="horizontal_list d_inline_b m_bottom_10 type_2 clearfix rating_list tr_all_hover">
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
                        <p class="scheme_color f_size_large m_bottom_15">$99.00</p>
                    </div>
                    <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15">Add to Cart</button>
                    <div class="clearfix m_bottom_5">
                        <ul class="horizontal_list d_inline_b l_width_divider">
                            <li class="m_right_15 f_md_none m_md_right_0"><a href="#" class="color_dark">Add to Wishlist</a></li>
                            <li class="f_md_none"><a href="#" class="color_dark">Add to Compare</a></li>
                        </ul>
                    </div>
                </figcaption>
            </figure>
        </div>
        <!--product item-->
        <div class="product_item specials w_xs_full">
            <figure class="r_corners photoframe animate_ftb long type_2 t_align_c shadow relative">
                <!--product preview-->
                <a href="#" class="d_block relative pp_wrap m_bottom_15">
                    <!--sale product-->
                    <span class="hot_stripe"><img src="{{URL::to('front_end_resource/images/sale_product.png')}}" alt=""></span>
                    <img src="{{URL::to('front_end_resource/images/product_img_9.jpg')}}" class="tr_all_hover" alt="">
                    <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                </a>
                <!--description and price of product-->
                <figcaption>
                    <h5 class="m_bottom_10"><a href="#" class="color_dark">Cursus eleifend elit aenean.</a></h5>
                    <div class="clearfix">
                        <!--rating-->
                        <ul class="horizontal_list d_inline_b m_bottom_10 type_2 clearfix rating_list tr_all_hover">
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
                        <p class="scheme_color f_size_large m_bottom_15">$99.00</p>
                    </div>
                    <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15">Add to Cart</button>
                    <div class="clearfix m_bottom_5">
                        <ul class="horizontal_list d_inline_b l_width_divider">
                            <li class="m_right_15 f_md_none m_md_right_0"><a href="#" class="color_dark">Add to Wishlist</a></li>
                            <li class="f_md_none"><a href="#" class="color_dark">Add to Compare</a></li>
                        </ul>
                    </div>
                </figcaption>
            </figure>
        </div>
        <!--product item-->
        <div class="product_item rated w_xs_full">
            <figure class="r_corners photoframe animate_ftb long type_2 t_align_c shadow relative">
                <!--product preview-->
                <a href="#" class="d_block relative pp_wrap m_bottom_15">
                    <img src="{{URL::to('front_end_resource/images/product_img_6.jpg')}}" class="tr_all_hover" alt="">
                    <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                </a>
                <!--description and price of product-->
                <figcaption>
                    <h5 class="m_bottom_10"><a href="#" class="color_dark">Aliquam erat volutpat</a></h5>
                    <div class="clearfix">
                        <!--rating-->
                        <ul class="horizontal_list d_inline_b m_bottom_10 type_2 clearfix rating_list tr_all_hover">
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
                        <p class="scheme_color f_size_large m_bottom_15">$36.00</p>
                    </div>
                    <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15">Add to Cart</button>
                    <div class="clearfix m_bottom_5">
                        <ul class="horizontal_list d_inline_b l_width_divider">
                            <li class="m_right_15 f_md_none m_md_right_0"><a href="#" class="color_dark">Add to Wishlist</a></li>
                            <li class="f_md_none"><a href="#" class="color_dark">Add to Compare</a></li>
                        </ul>
                    </div>
                </figcaption>
            </figure>
        </div>
    </section>
    <!--banners-->
    <div class="row clearfix m_bottom_45">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <a href="#" class="d_block animate_ftb h_md_auto m_xs_bottom_15 banner_type_2 r_corners red t_align_c tt_uppercase vc_child n_sm_vc_child">
                <span class="d_inline_middle">
                    <img class="d_inline_middle m_md_bottom_5" src="{{URL::to('front_end_resource/images/banner_img_3.png')}}" alt="">
                    <span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
                        <b>100% Satisfaction</b><br><span class="color_dark">Guaranteed</span>
                    </span>
                </span>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <a href="#" class="d_block animate_ftb h_md_auto m_xs_bottom_15 banner_type_2 r_corners green t_align_c tt_uppercase vc_child n_sm_vc_child">
                <span class="d_inline_middle">
                    <img class="d_inline_middle m_md_bottom_5" src="{{URL::to('front_end_resource/images/banner_img_4.png')}}" alt="">
                    <span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
                        <b>Free<br class="d_none d_sm_block"> Shipping</b><br><span class="color_dark">On All Items</span>
                    </span>
                </span>
            </a>
        </div>
    </div>
    <div class="clearfix">
        <h2 class="color_dark tt_uppercase f_left m_bottom_15 f_mxs_none heading5 animate_ftr">New Collection</h2>
        <div class="f_right clearfix nav_buttons_wrap animate_fade f_mxs_none m_mxs_bottom_5">
            <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners nc_prev"><i class="fa fa-angle-left"></i></button>
            <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners nc_next"><i class="fa fa-angle-right"></i></button>
        </div>
    </div>
    <!--bestsellers carousel-->
    <div class="nc_carousel m_bottom_30 m_sm_bottom_20">
        <figure class="r_corners photoframe animate_ftb long tr_all_hover type_2 t_align_c shadow relative">
            <!--product preview-->
            <a href="#" class="d_block relative pp_wrap m_bottom_15">
                <!--hot product-->
                <span class="hot_stripe type_2"><img src="{{URL::to('front_end_resource/images/hot_product_type_2.png')}}" alt=""></span>
                <img src="{{URL::to('front_end_resource/images/product_img_5.jpg')}}" class="tr_all_hover" alt="">
                <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
            </a>
            <!--description and price of product-->
            <figcaption class="p_vr_0">
                <h5 class="m_bottom_10"><a href="#" class="color_dark">Aliquam erat volutpat</a></h5>
                <div class="clearfix">
                    <!--rating-->
                    <ul class="horizontal_list d_inline_b m_bottom_10 type_2 clearfix rating_list tr_all_hover">
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
                    <p class="scheme_color f_size_large m_bottom_15">$102.00</p>
                </div>
                <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15">Add to Cart</button>
                <div class="clearfix m_bottom_5">
                    <ul class="horizontal_list d_inline_b l_width_divider">
                        <li class="m_right_15 f_md_none m_md_right_0"><a href="#" class="color_dark">Add to Wishlist</a></li>
                        <li class="f_md_none"><a href="#" class="color_dark">Add to Compare</a></li>
                    </ul>
                </div>
            </figcaption>
        </figure>
        <figure class="r_corners photoframe animate_ftb long tr_all_hover type_2 t_align_c shadow relative">
            <!--product preview-->
            <a href="#" class="d_block relative pp_wrap m_bottom_15">
                <img src="{{URL::to('front_end_resource/images/product_img_8.jpg')}}" class="tr_all_hover" alt="">
                <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
            </a>
            <!--description and price of product-->
            <figcaption class="p_vr_0">
                <h5 class="m_bottom_10"><a href="#" class="color_dark">Eget elementum vel</a></h5>
                <div class="clearfix">
                    <!--rating-->
                    <ul class="horizontal_list d_inline_b m_bottom_10 type_2 clearfix rating_list tr_all_hover">
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
                    <p class="scheme_color f_size_large m_bottom_15">$102.00</p>
                </div>
                <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15">Add to Cart</button>
                <div class="clearfix m_bottom_5">
                    <ul class="horizontal_list d_inline_b l_width_divider">
                        <li class="m_right_15 f_md_none m_md_right_0"><a href="#" class="color_dark">Add to Wishlist</a></li>
                        <li class="f_md_none"><a href="#" class="color_dark">Add to Compare</a></li>
                    </ul>
                </div>
            </figcaption>
        </figure>
        <figure class="r_corners photoframe animate_ftb long type_2 t_align_c shadow relative tr_all_hover">
            <!--product preview-->
            <a href="#" class="d_block relative pp_wrap m_bottom_15">
                <!--sale product-->
                <span class="hot_stripe type_2"><img src="images/sale_product_type_2.png" alt=""></span>
                <img src="{{URL::to('front_end_resource/images/product_img_4.jpg')}}" class="tr_all_hover" alt="">
                <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
            </a>
            <!--description and price of product-->
            <figcaption class="p_vr_0">
                <h5 class="m_bottom_10"><a href="#" class="color_dark">Ut tellus dolor dapibus</a></h5>
                <div class="clearfix m_bottom_15">
                    <!--rating-->
                    <ul class="horizontal_list d_inline_b m_bottom_10 type_2 clearfix rating_list tr_all_hover">
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
                    <p class="scheme_color f_size_large">$57.00</p>
                </div>
                <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15">Add to Cart</button>
                <div class="clearfix m_bottom_5">
                    <ul class="horizontal_list d_inline_b l_width_divider">
                        <li class="m_right_15 f_md_none m_md_right_0"><a href="#" class="color_dark">Add to Wishlist</a></li>
                        <li class="f_md_none"><a href="#" class="color_dark">Add to Compare</a></li>
                    </ul>
                </div>
            </figcaption>
        </figure>
        <figure class="r_corners photoframe animate_ftb long tr_all_hover type_2 t_align_c shadow relative">
            <!--product preview-->
            <a href="#" class="d_block relative wrapper pp_wrap m_bottom_15">
                <img src="{{URL::to('front_end_resource/images/product_img_6.jpg')}}" class="tr_all_hover" alt="">
                <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
            </a>
            <!--description and price of product-->
            <figcaption class="p_vr_0">
                <h5 class="m_bottom_10"><a href="#" class="color_dark">Aliquam erat volutpat</a></h5>
                <div class="clearfix">
                    <!--rating-->
                    <ul class="horizontal_list d_inline_b m_bottom_10 type_2 clearfix rating_list tr_all_hover">
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
                    <p class="scheme_color f_size_large m_bottom_15">$36.00</p>
                </div>
                <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15">Add to Cart</button>
                <div class="clearfix m_bottom_5">
                    <ul class="horizontal_list d_inline_b l_width_divider">
                        <li class="m_right_15 f_md_none m_md_right_0"><a href="#" class="color_dark">Add to Wishlist</a></li>
                        <li class="f_md_none"><a href="#" class="color_dark">Add to Compare</a></li>
                    </ul>
                </div>
            </figcaption>
        </figure>
    </div>
    <!--product brands-->
    <div class="clearfix m_bottom_25 m_sm_bottom_20">
        <h2 class="tt_uppercase color_dark f_left heading2 animate_fade f_mxs_none m_mxs_bottom_15">Product Brands</h2>
        <div class="f_right clearfix nav_buttons_wrap animate_fade f_mxs_none">
            <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners pb_prev"><i class="fa fa-angle-left"></i></button>
            <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners pb_next"><i class="fa fa-angle-right"></i></button>
        </div>
    </div>
    <!--product brands carousel-->
    <div class="product_brands with_sidebar m_sm_bottom_35">
        <a href="#" class="d_block t_align_c animate_fade"><img src="{{URL::to('front_end_resource/images/brand_logo.jpg')}}" alt=""></a>
        <a href="#" class="d_block t_align_c animate_fade"><img src="{{URL::to('front_end_resource/images/brand_logo.jpg')}}" alt=""></a>
        <a href="#" class="d_block t_align_c animate_fade"><img src="{{URL::to('front_end_resource/images/brand_logo.jpg')}}" alt=""></a>
        <a href="#" class="d_block t_align_c animate_fade"><img src="{{URL::to('front_end_resource/images/brand_logo.jpg')}}" alt=""></a>
        <a href="#" class="d_block t_align_c animate_fade"><img src="{{URL::to('front_end_resource/images/brand_logo.jpg')}}" alt=""></a>
        <a href="#" class="d_block t_align_c animate_fade"><img src="{{URL::to('front_end_resource/images/brand_logo.jpg')}}" alt=""></a>
        <a href="#" class="d_block t_align_c animate_fade"><img src="{{URL::to('front_end_resource/images/brand_logo.jpg')}}" alt=""></a>
        <a href="#" class="d_block t_align_c animate_fade"><img src="{{URL::to('front_end_resource/images/brand_logo.jpg')}}" alt=""></a>
        <a href="#" class="d_block t_align_c animate_fade"><img src="{{URL::to('front_end_resource/images/brand_logo.jpg')}}" alt=""></a>
        <a href="#" class="d_block t_align_c animate_fade"><img src="{{URL::to('front_end_resource/images/brand_logo.jpg')}}" alt=""></a>
        <a href="#" class="d_block t_align_c animate_fade"><img src="{{URL::to('front_end_resource/images/brand_logo.jpg')}}" alt=""></a>
        <a href="#" class="d_block t_align_c animate_fade"><img src="{{URL::to('front_end_resource/images/brand_logo.jpg')}}" alt=""></a>
    </div>
</section>
@stop
