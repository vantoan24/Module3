@extends('layout.index')
@section('content')
<!-- main body - start
		================================================== -->
<main>
    <!-- sidebar mobile menu & sidebar cart - start
    ================================================== -->
    <div class="sidebar-menu-wrapper">
        <div class="cart_sidebar">
            <button type="button" class="close_btn"><i class="fal fa-times"></i></button>

            <ul class="cart_items_list ul_li_block mb_30 clearfix">
            <?php
            $SP_total = 0;
            ?>
                @foreach($cart_products as $key => $product)
                <?php 
                                $SP_total += $product->price * $gio_hang[$product->id];
                            ?>
                <li>
                    <div class="item_image">
                        <img src="{{ Storage::url($product->image) }}" alt="image_not_found">
                    </div>
                    <div class="item_content">
                        <h4 class="item_title">{{ $product->name }}</h4>
                        <span class="item_price">{{ number_format($product->price) }} đ</span>
                    </div>
                </li>
                @endforeach
            </ul>

            <ul class="total_price ul_li_block mb_30 clearfix">
                <li>
                    <span>Subtotal:</span>
                    <span>{{ number_format($SP_total) }} đ</span>
                </li>
                <li>
                    <span>Shipping:</span>
                    <span>30,000 đ</span>
                </li>

                <li>
                    <span>Total:</span>
                    <span>{{ number_format($SP_total + 30000) }} đ</span>
                </li>
            </ul>

            <ul class="btns_group ul_li_block clearfix">
                <li><a href="{{ route('website.shop.my-cart') }}">View Cart</a></li>
                <li><a href="{{ route('website.shop.checkout') }}">Checkout</a></li>
            </ul>
        </div>


        <div class="overlay"></div>
    </div>
    <!-- sidebar mobile menu & sidebar cart - end
    ================================================== -->


    <!-- banner_section - start
    ================================================== -->
    <section class="banner_section carparts_banner parallaxie d-flex align-items-center clearfix"
        data-background="{{ url('/') }}/images/banner/car_parts/bg_01.jpg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="banner_content text-center">
                        <p>Customize, Modify, Upgrade, Repair, Replace</p>
                        <h1 class="text-white">
                            SEARCH MATCHING YOUR VEHICLE PARTS
                        </h1>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- banner_section - end
    ================================================== -->



    <!-- category_section - start
    ================================================== -->
    <section class="category_section sec_ptb_100 clearfix">
        <div class="container">
            <div class="carparts_section_title text-center mb_15">
                <h2 class="title_text">Products Big Sale Off 19%</h2>
                <span class="sub_title">Customize, Modify, Upgrade, Repair, Replace</span>
            </div>

            <div class="carparts_category_carousel clearfix">
                @foreach($products as $key => $product)
                <div class="item">
                    <div class="primary_carparts_category">
                        <div class="item_offer bg_carparts_red">
                            <span>-19</span>
                            <span>OFF</span>
                        </div>
                        <div class="item_image">
                            <img src="{{ Storage::url($product->image) }}" alt="image_not_found">
                            <a class="icon_btn bg_carparts_red"
                                href="{{ route('website.shop.shop-details', $product->id) }}"><i
                                    class="fal fa-arrow-right"></i></a>
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">{{ $product->name }}</h3>
                            <span class="item_instock">{{ number_format($product->price) }} đ</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- category_section - end
    ================================================== -->




    <!-- product_section - start
    ================================================== -->
    <section class="product_section sec_ptb_100 clearfix">
        <div class="container">

            <div class="carparts_section_title text-center mb_15">
                <h2 class="title_text">All of Our Products</h2>
                <span class="sub_title">Customize, Modify, Upgrade, Repair, Replace</span>
            </div>
            <div>
                <form action="{{ route('website.home.search') }}" method="POST">
                @csrf
                    <div class="form_item search_box">
                        <input type="search" name="search" placeholder="Search">
                        <button type="submit" class="submit_btn bg_carparts"><i
                                class="fal fa-search"></i></button>
                    </div>
                    
                </form>
            </div>

            <div class="tab_wrap position-relative">
                <ul class="carparts_block_tabs nav ul_li_block clearfix" role="tablist">
                    <li>
                        <a class="active" data-toggle="tab" href="#service_tab">Service Kit</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#lighting1_tab">Lighting</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#trending_tab">Trending</a>
                    </li>

                </ul>
                <div class="tab-content mb_50 clearfix">
                    <div id="service_tab" class="tab-pane active">
                        <div class="row justify-content-center">
                            @foreach($products as $key => $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="carparts_product_grid" data-bg-color="#f0eeee">
                                    <div class="item_image" data-bg-color="#f8f8f8">
                                        <img src="{{ Storage::url($product->image) }}" alt="image_not_found">
                                        <ul class="product_action_btns ul_li_center clearfix">
                                            <li><a class="tooltips" data-placement="top" title="Detail"
                                                    href="{{ route('website.shop.shop-details', $product->id) }}"><i
                                                        class="fal fa-heart"></i></a></li>
                                            <li><a class="tooltips" data-placement="top" title="Add To Cart"
                                                    href="{{ route('website.shop.add-cart', $product->id) }}"><i
                                                        class="fal fa-shopping-basket"></i></a></li>
                                            <li><a class="tooltips" data-placement="top" title="Quick View"
                                                    href="{{ route('website.shop.quickview', $product->id) }}"
                                                    data-toggle="modal" data-target="#quickview_modal"><i
                                                        class="fal fa-search"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="item_content">
                                        <ul class="rating_star ul_li clearfix">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fal fa-star"></i></li>
                                        </ul>
                                        <h3 class="item_title">
                                            <a
                                                href="{{ route('website.shop.shop-details', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <span class="price_text"><strong>{{ number_format($product->price) }} đ</strong>
                                            <del>$48.90</del></span>
                                    </div>
                                    <ul class="product_label ul_li text-uppercase clearfix">
                                        <li class="bg_carparts_red">New</li>
                                        <li class="bg_carparts_red">Sale</li>
                                    </ul>
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>

                    <div id="lighting1_tab" class="tab-pane fade">

                        <div class="row justify-content-center">
                            @foreach($products as $key => $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="carparts_product_grid" data-bg-color="#f0eeee">
                                    <div class="item_image" data-bg-color="#f8f8f8">
                                        <img src="{{ Storage::url($product->image) }}" alt="image_not_found">
                                        <ul class="product_action_btns ul_li_center clearfix">
                                            <li><a class="tooltips" data-placement="top" title="Add To Wishlist"
                                                    href="{{ route('website.shop.shop-details', $product->id) }}"><i
                                                        class="fal fa-heart"></i></a></li>
                                            <li><a class="tooltips" data-placement="top" title="Add To Cart"
                                                    href="{{ route('website.shop.add-cart', $product->id) }}"><i
                                                        class="fal fa-shopping-basket"></i></a></li>
                                            <li><a class="tooltips" data-placement="top" title="Quick View"
                                                    href="{{ route('website.shop.quickview', $product->id) }}"
                                                    data-toggle="modal" data-target="#quickview_modal"><i
                                                        class="fal fa-search"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="item_content">
                                        <ul class="rating_star ul_li clearfix">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fal fa-star"></i></li>
                                        </ul>
                                        <h3 class="item_title">
                                            <a
                                                href="{{ route('website.shop.shop-details', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <span class="price_text"><strong>{{ number_format($product->price) }} đ</strong>
                                            <del>$48.90</del></span>
                                    </div>
                                    <ul class="product_label ul_li text-uppercase clearfix">
                                        <li class="bg_carparts_red">Sale</li>
                                    </ul>
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>

                    <div id="trending_tab" class="tab-pane fade">
                        <div class="row justify-content-center">
                            @foreach($products as $key => $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="carparts_product_grid" data-bg-color="#f0eeee">
                                    <div class="item_image" data-bg-color="#f8f8f8">
                                        <img src="{{ Storage::url($product->image) }}" alt="image_not_found">
                                        <ul class="product_action_btns ul_li_center clearfix">
                                            <li><a class="tooltips" data-placement="top" title="Add To Wishlist"
                                                    href="{{ route('website.shop.shop-details', $product->id) }}"><i
                                                        class="fal fa-heart"></i></a></li>
                                            <li><a class="tooltips" data-placement="top" title="Add To Cart"
                                                    href="{{ route('website.shop.add-cart', $product->id) }}"><i
                                                        class="fal fa-shopping-basket"></i></a></li>
                                            <li><a class="tooltips" data-placement="top" title="Quick View"
                                                    href="{{ route('website.shop.quickview', $product->id) }}"
                                                    data-toggle="modal" data-target="#quickview_modal"><i
                                                        class="fal fa-search"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="item_content">
                                        <ul class="rating_star ul_li clearfix">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fal fa-star"></i></li>
                                        </ul>
                                        <h3 class="item_title">
                                            <a
                                                href="{{ route('website.shop.shop-details', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <span class="price_text"><strong>{{ number_format($product->price) }} đ</strong>
                                            <del>$48.90</del></span>
                                    </div>
                                    <ul class="product_label ul_li text-uppercase clearfix">
                                        <li class="bg_carparts_red">Sale</li>
                                    </ul>
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>

                    <div id="lighting2_tab" class="tab-pane fade">
                        <div class="row justify-content-center">
                            @foreach($products as $key => $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="carparts_product_grid" data-bg-color="#f0eeee">
                                    <div class="item_image" data-bg-color="#f8f8f8">
                                        <img src="{{ Storage::url($product->image) }}" alt="image_not_found">
                                        <ul class="product_action_btns ul_li_center clearfix">
                                            <li><a class="tooltips" data-placement="top" title="Add To Wishlist"
                                                    href="{{ route('website.shop.shop-details', $product->id) }}"><i
                                                        class="fal fa-heart"></i></a></li>
                                            <li><a class="tooltips" data-placement="top" title="Add To Cart"
                                                    href="{{ route('website.shop.add-cart', $product->id) }}"><i
                                                        class="fal fa-shopping-basket"></i></a></li>
                                            <li><a class="tooltips" data-placement="top" title="Quick View"
                                                    href="{{ route('website.shop.quickview', $product->id) }}"
                                                    data-toggle="modal" data-target="#quickview_modal"><i
                                                        class="fal fa-search">

                                                    </i></a></li>
                                        </ul>
                                    </div>
                                    <div class="item_content">
                                        <ul class="rating_star ul_li clearfix">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fal fa-star"></i></li>
                                        </ul>
                                        <h3 class="item_title">
                                            <a
                                                href="{{ route('website.shop.shop-details', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <span class="price_text"><strong>{{ number_format($product->price) }} đ</strong>
                                            <del>$48.90</del></span>
                                    </div>
                                    <ul class="product_label ul_li text-uppercase clearfix">
                                        <li class="bg_carparts_red">Sale</li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>

                <div class="load_more text-center clearfix">
                    <a class="custom_btn bg_carparts_red text-uppercase" href="carparts_shop.html">View More</a>
                </div>
            </div>
            <div aria-label="Page navigation">
                {{ $products->links() }}
            </div>
        </div>
    </section>
    <!-- product_section - end
    ================================================== -->


    <!-- interior_carparts_section - start
    ================================================== -->
    <section class="interior_carparts_section sec_ptb_100 clearfix"
        data-background="{{ url('/') }}/images/backgrounds/bg_02.jpg">
        <div class="container">
            <div class="row mt__30">

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="Interior_carparts">
                        <img src="{{ url('/') }}/images/category/car_parts/img_06.jpg" alt="image_not_found">
                        <div class="item_content">
                            <span class="sub_title">Customize, Modify</span>
                            <h3 class="item_title text-white">Interior Parts</h3>
                            <a class="custom_btn btn_sm bg_carparts_red text-uppercase" href="{{ route('website.shop.shop-page') }}">Shop Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="Interior_carparts">
                        <img src="{{ url('/') }}/images/category/car_parts/img_07.jpg" alt="image_not_found">
                        <div class="item_content">
                            <span class="sub_title">Customize, Modify</span>
                            <h3 class="item_title text-white">Interior Parts</h3>
                            <a class="custom_btn btn_sm bg_carparts_red text-uppercase" href="{{ route('website.shop.shop-page') }}">Shop Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="Interior_carparts">
                        <img src="{{ url('/') }}/images/category/car_parts/img_08.jpg" alt="image_not_found">
                        <div class="item_content">
                            <span class="sub_title">Customize, Modify</span>
                            <h3 class="item_title text-white">Interior Parts</h3>
                            <a class="custom_btn btn_sm bg_carparts_red text-uppercase" href="{{ route('website.shop.shop-page') }}">Shop Now</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- interior_carparts_section - end
    ================================================== -->


    <!-- product_section - start
    ================================================== -->
    <section class="product_section sec_ptb_100 pb-0 clearfix">
        <div class="container">

            <div class="row mb_15 align-items-end justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="carparts_section_title">
                        <h2 class="title_text">Featured products</h2>
                        <span class="sub_title">Customize, Modify, Upgrade, Repair, Replace</span>
                    </div>
                </div>

                <div class="col-lg-6">
                    <ul class="carparts_inline_tabs nav ul_li_right" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#stoptech_tab">Stoptech</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#wheeltire_tab">Wheel & Tire</a>
                        </li>
                        
                        <li>
                            <a data-toggle="tab" href="#bodyparts_tab">Auto Body Parts</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content has_multy_carousel mb_50">
                <div id="stoptech_tab" class="tab-pane active">
                    <div class="product3_collumn_carousel row arrow_ycenter" data-slick='{"dots": false}'>
                        @foreach($products as $key => $product)
                        <div class="item col">
                            <div class="carparts_product_grid column_3" data-bg-color="#f0eeee">
                                <div class="item_image" data-bg-color="#f8f8f8">
                                    <img src="{{ Storage::url($product->image) }}" alt="image_not_found">
                                    <ul class="product_action_btns ul_li_center clearfix">
                                        <li><a class="tooltips" data-placement="top" title="Add To Wishlist"
                                                href="{{ route('website.shop.shop-details', $product->id) }}"><i
                                                    class="fal fa-heart"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Add To Cart"
                                                href="{{ route('website.shop.add-cart', $product->id) }}"><i
                                                    class="fal fa-shopping-basket"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Quick View"
                                                href="{{ route('website.shop.quickview', $product->id) }}"
                                                data-toggle="modal" data-target="#quickview_modal"><i
                                                    class="fal fa-search"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <ul class="rating_star ul_li clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fal fa-star"></i></li>
                                    </ul>
                                    <h3 class="item_title">
                                        <a
                                            href="{{ route('website.shop.shop-details', $product->id) }}">{{ $product->name }}</a>
                                    </h3>
                                    <span class="price_text"><strong>{{ number_format($product->price) }} đ</strong>
                                        <del>$48.90</del></span>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>

                </div>

                <div id="wheeltire_tab" class="tab-pane fade">
                    <div class="product3_collumn_carousel row arrow_ycenter" data-slick='{"dots": false}'>
                        <div class="item col">
                            <div class="carparts_product_grid column_3" data-bg-color="#f0eeee">
                                <div class="item_image" data-bg-color="#f8f8f8">
                                    <img src="{{ url('/') }}/images/shop/car_parts/img_13.png" alt="image_not_found">
                                    <ul class="product_action_btns ul_li_center clearfix">
                                        <li><a class="tooltips" data-placement="top" title="Add To Wishlist"
                                                href="#!"><i class="fal fa-heart"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#!"><i
                                                    class="fal fa-shopping-basket"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Quick View" href="#!"
                                                data-toggle="modal" data-target="#quickview_modal"><i
                                                    class="fal fa-search"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <ul class="rating_star ul_li clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fal fa-star"></i></li>
                                    </ul>
                                    <h3 class="item_title">
                                        <a href="#!">earphone case</a>
                                    </h3>
                                    <span class="price_text"><strong>$29.90</strong> <del>$48.90</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="item col">
                            <div class="carparts_product_grid column_3" data-bg-color="#f0eeee">
                                <div class="item_image" data-bg-color="#f8f8f8">
                                    <img src="{{ url('/') }}/images/shop/car_parts/img_14.png" alt="image_not_found">
                                    <ul class="product_action_btns ul_li_center clearfix">
                                        <li><a class="tooltips" data-placement="top" title="Add To Wishlist"
                                                href="#!"><i class="fal fa-heart"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#!"><i
                                                    class="fal fa-shopping-basket"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Quick View" href="#!"
                                                data-toggle="modal" data-target="#quickview_modal"><i
                                                    class="fal fa-search"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <ul class="rating_star ul_li clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fal fa-star"></i></li>
                                    </ul>
                                    <h3 class="item_title">
                                        <a href="#!">earphone case</a>
                                    </h3>
                                    <span class="price_text"><strong>$29.90</strong> <del>$48.90</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="item col">
                            <div class="carparts_product_grid column_3" data-bg-color="#f0eeee">
                                <div class="item_image" data-bg-color="#f8f8f8">
                                    <img src="{{ url('/') }}/images/shop/car_parts/img_15.png" alt="image_not_found">
                                    <ul class="product_action_btns ul_li_center clearfix">
                                        <li><a class="tooltips" data-placement="top" title="Add To Wishlist"
                                                href="#!"><i class="fal fa-heart"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#!"><i
                                                    class="fal fa-shopping-basket"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Quick View" href="#!"
                                                data-toggle="modal" data-target="#quickview_modal"><i
                                                    class="fal fa-search"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <ul class="rating_star ul_li clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fal fa-star"></i></li>
                                    </ul>
                                    <h3 class="item_title">
                                        <a href="#!">earphone case</a>
                                    </h3>
                                    <span class="price_text"><strong>$29.90</strong> <del>$48.90</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="item col">
                            <div class="carparts_product_grid column_3" data-bg-color="#f0eeee">
                                <div class="item_image" data-bg-color="#f8f8f8">
                                    <img src="{{ url('/') }}/images/shop/car_parts/img_13.png" alt="image_not_found">
                                    <ul class="product_action_btns ul_li_center clearfix">
                                        <li><a class="tooltips" data-placement="top" title="Add To Wishlist"
                                                href="#!"><i class="fal fa-heart"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#!"><i
                                                    class="fal fa-shopping-basket"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Quick View" href="#!"
                                                data-toggle="modal" data-target="#quickview_modal"><i
                                                    class="fal fa-search"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <ul class="rating_star ul_li clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fal fa-star"></i></li>
                                    </ul>
                                    <h3 class="item_title">
                                        <a href="#!">earphone case</a>
                                    </h3>
                                    <span class="price_text"><strong>$29.90</strong> <del>$48.90</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="item col">
                            <div class="carparts_product_grid column_3" data-bg-color="#f0eeee">
                                <div class="item_image" data-bg-color="#f8f8f8">
                                    <img src="{{ url('/') }}/images/shop/car_parts/img_14.png" alt="image_not_found">
                                    <ul class="product_action_btns ul_li_center clearfix">
                                        <li><a class="tooltips" data-placement="top" title="Add To Wishlist"
                                                href="#!"><i class="fal fa-heart"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#!"><i
                                                    class="fal fa-shopping-basket"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Quick View" href="#!"
                                                data-toggle="modal" data-target="#quickview_modal"><i
                                                    class="fal fa-search"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <ul class="rating_star ul_li clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fal fa-star"></i></li>
                                    </ul>
                                    <h3 class="item_title">
                                        <a href="#!">earphone case</a>
                                    </h3>
                                    <span class="price_text"><strong>$29.90</strong> <del>$48.90</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="item col">
                            <div class="carparts_product_grid column_3" data-bg-color="#f0eeee">
                                <div class="item_image" data-bg-color="#f8f8f8">
                                    <img src="{{ url('/') }}/images/shop/car_parts/img_15.png" alt="image_not_found">
                                    <ul class="product_action_btns ul_li_center clearfix">
                                        <li><a class="tooltips" data-placement="top" title="Add To Wishlist"
                                                href="#!"><i class="fal fa-heart"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#!"><i
                                                    class="fal fa-shopping-basket"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Quick View" href="#!"
                                                data-toggle="modal" data-target="#quickview_modal"><i
                                                    class="fal fa-search"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <ul class="rating_star ul_li clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fal fa-star"></i></li>
                                    </ul>
                                    <h3 class="item_title">
                                        <a href="#!">earphone case</a>
                                    </h3>
                                    <span class="price_text"><strong>$29.90</strong> <del>$48.90</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

                <div id="bodyparts_tab" class="tab-pane fade">
                    <div class="product3_collumn_carousel row arrow_ycenter" data-slick='{"dots": false}'>
                        <div class="item col">
                            <div class="carparts_product_grid column_3" data-bg-color="#f0eeee">
                                <div class="item_image" data-bg-color="#f8f8f8">
                                    <img src="{{ url('/') }}/images/shop/car_parts/img_13.png" alt="image_not_found">
                                    <ul class="product_action_btns ul_li_center clearfix">
                                        <li><a class="tooltips" data-placement="top" title="Add To Wishlist"
                                                href="#!"><i class="fal fa-heart"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#!"><i
                                                    class="fal fa-shopping-basket"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Quick View" href="#!"
                                                data-toggle="modal" data-target="#quickview_modal"><i
                                                    class="fal fa-search"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <ul class="rating_star ul_li clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fal fa-star"></i></li>
                                    </ul>
                                    <h3 class="item_title">
                                        <a href="#!">earphone case</a>
                                    </h3>
                                    <span class="price_text"><strong>$29.90</strong> <del>$48.90</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="item col">
                            <div class="carparts_product_grid column_3" data-bg-color="#f0eeee">
                                <div class="item_image" data-bg-color="#f8f8f8">
                                    <img src="{{ url('/') }}/images/shop/car_parts/img_14.png" alt="image_not_found">
                                    <ul class="product_action_btns ul_li_center clearfix">
                                        <li><a class="tooltips" data-placement="top" title="Add To Wishlist"
                                                href="#!"><i class="fal fa-heart"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#!"><i
                                                    class="fal fa-shopping-basket"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Quick View" href="#!"
                                                data-toggle="modal" data-target="#quickview_modal"><i
                                                    class="fal fa-search"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <ul class="rating_star ul_li clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fal fa-star"></i></li>
                                    </ul>
                                    <h3 class="item_title">
                                        <a href="#!">earphone case</a>
                                    </h3>
                                    <span class="price_text"><strong>$29.90</strong> <del>$48.90</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="item col">
                            <div class="carparts_product_grid column_3" data-bg-color="#f0eeee">
                                <div class="item_image" data-bg-color="#f8f8f8">
                                    <img src="{{ url('/') }}/images/shop/car_parts/img_15.png" alt="image_not_found">
                                    <ul class="product_action_btns ul_li_center clearfix">
                                        <li><a class="tooltips" data-placement="top" title="Add To Wishlist"
                                                href="#!"><i class="fal fa-heart"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#!"><i
                                                    class="fal fa-shopping-basket"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Quick View" href="#!"
                                                data-toggle="modal" data-target="#quickview_modal"><i
                                                    class="fal fa-search"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <ul class="rating_star ul_li clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fal fa-star"></i></li>
                                    </ul>
                                    <h3 class="item_title">
                                        <a href="#!">earphone case</a>
                                    </h3>
                                    <span class="price_text"><strong>$29.90</strong> <del>$48.90</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="item col">
                            <div class="carparts_product_grid column_3" data-bg-color="#f0eeee">
                                <div class="item_image" data-bg-color="#f8f8f8">
                                    <img src="{{ url('/') }}/images/shop/car_parts/img_13.png" alt="image_not_found">
                                    <ul class="product_action_btns ul_li_center clearfix">
                                        <li><a class="tooltips" data-placement="top" title="Add To Wishlist"
                                                href="#!"><i class="fal fa-heart"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#!"><i
                                                    class="fal fa-shopping-basket"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Quick View" href="#!"
                                                data-toggle="modal" data-target="#quickview_modal"><i
                                                    class="fal fa-search"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <ul class="rating_star ul_li clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fal fa-star"></i></li>
                                    </ul>
                                    <h3 class="item_title">
                                        <a href="#!">earphone case</a>
                                    </h3>
                                    <span class="price_text"><strong>$29.90</strong> <del>$48.90</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="item col">
                            <div class="carparts_product_grid column_3" data-bg-color="#f0eeee">
                                <div class="item_image" data-bg-color="#f8f8f8">
                                    <img src="{{ url('/') }}/images/shop/car_parts/img_14.png" alt="image_not_found">
                                    <ul class="product_action_btns ul_li_center clearfix">
                                        <li><a class="tooltips" data-placement="top" title="Add To Wishlist"
                                                href="#!"><i class="fal fa-heart"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#!"><i
                                                    class="fal fa-shopping-basket"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Quick View" href="#!"
                                                data-toggle="modal" data-target="#quickview_modal"><i
                                                    class="fal fa-search"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <ul class="rating_star ul_li clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fal fa-star"></i></li>
                                    </ul>
                                    <h3 class="item_title">
                                        <a href="#!">earphone case</a>
                                    </h3>
                                    <span class="price_text"><strong>$29.90</strong> <del>$48.90</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="item col">
                            <div class="carparts_product_grid column_3" data-bg-color="#f0eeee">
                                <div class="item_image" data-bg-color="#f8f8f8">
                                    <img src="{{ url('/') }}/images/shop/car_parts/img_15.png" alt="image_not_found">
                                    <ul class="product_action_btns ul_li_center clearfix">
                                        <li><a class="tooltips" data-placement="top" title="Add To Wishlist"
                                                href="#!"><i class="fal fa-heart"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#!"><i
                                                    class="fal fa-shopping-basket"></i></a></li>
                                        <li><a class="tooltips" data-placement="top" title="Quick View" href="#!"
                                                data-toggle="modal" data-target="#quickview_modal"><i
                                                    class="fal fa-search"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <ul class="rating_star ul_li clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fal fa-star"></i></li>
                                    </ul>
                                    <h3 class="item_title">
                                        <a href="#!">earphone case</a>
                                    </h3>
                                    <span class="price_text"><strong>$29.90</strong> <del>$48.90</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="load_more text-center clearfix">
                <a class="custom_btn bg_carparts_red text-uppercase" href="carparts_shop.html">View More</a>
            </div>

        </div>
    </section>
    <!-- product_section - end
    ================================================== -->


    <!-- interior_carparts_section - start
    ================================================== -->
    <section class="interior_carparts_section sec_ptb_100 clearfix">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="Interior_carparts">
                        <img src="{{ url('/') }}/images/category/car_parts/img_09.jpg" alt="image_not_found">
                        <div class="item_content">
                            <span class="sub_title">Customize, Modify</span>
                            <h3 class="item_title text-white mb-0">Interior Parts</h3>
                            <ul class="parts_category_list ul_li_block text-white clearfix">
                                <li><a href="#!">Wheel Hubs</a></li>
                                <li><a href="#!">Air Suspension</a></li>
                                <li><a href="#!">Ball Joints</a></li>
                                <li><a href="#!">Brake Discs</a></li>
                            </ul>
                            <a class="icon_btn btn_sm bg_carparts_red text-uppercase" href="#!"><i
                                    class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="Interior_carparts">
                        <img src="{{ url('/') }}/images/category/car_parts/img_10.jpg" alt="image_not_found">
                        <div class="item_content">
                            <span class="sub_title">Customize, Modify</span>
                            <h3 class="item_title text-white mb-0">Interior Parts</h3>
                            <ul class="parts_category_list ul_li_block text-white clearfix">
                                <li><a href="#!">Wheel Hubs</a></li>
                                <li><a href="#!">Air Suspension</a></li>
                                <li><a href="#!">Ball Joints</a></li>
                                <li><a href="#!">Brake Discs</a></li>
                            </ul>
                            <a class="icon_btn btn_sm bg_carparts_red text-uppercase" href="#!"><i
                                    class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- interior_carparts_section - end
    ================================================== -->
    <!-- carparts_policy - start
    ================================================== -->
    <section class="carparts_policy d-flex align-items-center clearfix" data-bg-color="#fafafa">
        <div class="container">
            <div class="row mt__50">

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="carparts_policy_item">
                        <div class="item_icon">
                            <img src="{{ url('/') }}/images/policy/car_parts/icon_01.png" alt="icon_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Free Shipping</h3>
                            <p>For orders From $50</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="carparts_policy_item">
                        <div class="item_icon">
                            <img src="{{ url('/') }}/images/policy/car_parts/icon_02.png" alt="icon_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Support 24/7</h3>
                            <p>Call us anytime</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="carparts_policy_item">
                        <div class="item_icon">
                            <img src="{{ url('/') }}/images/policy/car_parts/icon_03.png" alt="icon_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">100% Safety</h3>
                            <p>Only secure payments</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="carparts_policy_item">
                        <div class="item_icon">
                            <img src="{{ url('/') }}/images/policy/car_parts/icon_04.png" alt="icon_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Hot Offers</h3>
                            <p>Discounts up to 90%</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- carparts_policy - end
    ================================================== -->


</main>
@foreach($products as $key => $product)
<div class="quickview_modal modal fade" id="quickview_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content clearfix">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="item_image">
                <img src="{{ Storage::url($product->image) }}" alt="image_not_found">
            </div>
            <div class="item_content">
                <h2 class="item_title mb_15"><strong>{{ $product->name }}</stong>
                </h2>
                <div class="rating_star mb_30 clearfix">
                    <ul class="float-left ul_li mr-2">
                        <li class="active"><i class="las la-star"></i></li>
                        <li class="active"><i class="las la-star"></i></li>
                        <li class="active"><i class="las la-star"></i></li>
                        <li class="active"><i class="las la-star"></i></li>
                        <li><i class="las la-star"></i></li>
                    </ul>
                    <span class="review_text">{{ $product->view }} Review</span>
                </div>
                <span class="item_price mb_15">{{ number_format($product->price) }} đ</span>
                <p class="mb_30">
                    {{ $product->describe }}
                </p>
                <div class="quantity_form mb_30 clearfix">
                    <strong class="list_title">Quantity:</strong>
                    <div class="quantity_input">
                        <form action="#">
                            <span class="input_number_decrement">–</span>
                            <input class="input_number" type="text" value="1">
                            <span class="input_number_increment">+</span>
                        </form>
                    </div>
                </div>
                <ul class="btns_group ul_li mb_30 clearfix">
                    <li><a href="#!" class="custom_btn bg_carparts_red">Add to Cart</a></li>
                    <li><a href="#!" data-toggle="tooltip" data-placement="top" title=""
                            data-original-title="Compare Product"><i class="fal fa-sync"></i></a></li>
                    <li><a href="#!" data-toggle="tooltip" data-placement="top" title=""
                            data-original-title="Add To Wishlist"><i class="fal fa-heart"></i></a></li>
                </ul>
                <ul class="info_list ul_li_block clearfix">
                    <li><strong class="list_title">Category:</strong> <a href="#!">Medical Equipment</a></li>
                    <li class="social_icon">
                        <strong class="list_title">Share:</strong>
                        <ul class="ul_li clearfix">
                            <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#!"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</div>
@endforeach
<!-- main body - end

================================================== -->
@endsection