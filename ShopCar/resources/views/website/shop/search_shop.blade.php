@extends('layout.index')
@section('content')
<!-- main body - start
		================================================== -->
<main>




    <!-- breadcrumb_section - start
			================================================== -->
    <div class="breadcrumb_section carparts_breadcrumb text-white text-center text-uppercase d-flex align-items-end clearfix"
        data-background="{{ url('/') }}/images/breadcrumb/bg_02.jpg">
        <div class="container">
            <ul class="breadcrumb_nav ul_li_center clearfix">
                <li>Home</li>
                <li><a href="{{ route('website.shop.shop-page') }}">Shop</a></li>
                <li>Cart</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb_section - end
			================================================== -->



    <div class="container">
        <hr class="m-0">
    </div>


    <!-- product_section - start
			================================================== -->
    <section class="product_section sec_ptb_100 clearfix">
        <div class="container">
            <div class="carparts_section_title text-center mb_15">
                <h2 class="title_text">All Of Our Products</h2>
                <span class="sub_title">Customize, Modify, Upgrade, Repair, Replace</span>
            </div>
            <div>
                <form action="{{ route('website.shop.search_shop') }}" method="POST">
                @csrf
                    <div class="form_item search_box">
                        <input type="search" name="search" placeholder="Search">
                        <button type="submit" class="submit_btn bg_carparts"><i
                                class="fal fa-search"></i></button>
                    </div>
                    
                </form>
            </div>
            <div class="carparts_filetr_bar clearfix">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <ul class="carparts_layout_btns nav ul_li" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#grid_layout"><i class="fas fa-th"></i></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#list_layout"><i class="fas fa-list"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <h4 class="result_text text-center">Showing 1 to 10 of 243 products</h4>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <form action="#">
                            <div class="option_select d-flex align-items-center mb-0">
                                <span class="option_title text-uppercase">Sort by:</span>
                                <select>
                                    <option data-display="Select Your Option">Nothing</option>
                                    <option value="1" selected> Popularity</option>
                                    <option value="2">Another option</option>
                                    <option value="3" disabled>A disabled option</option>
                                    <option value="4">Potato</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <div id="grid_layout" class="tab-pane active">
                    <div class="row mb_50 justify-content-center">
                  
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
                                    <li class="bg_carparts_red">New</li>
                                    <li class="bg_carparts_red">Sale</li>
                                </ul>
                            </div>
                        </div>
                      
                    </div>

                    <div class="carparts_pagination_wrap clearfix">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <button type="button" class="custom_btn bg_carparts_red text-uppercase"><i
                                        class="fas fa-arrow-circle-down mr-2"></i> Load More</button>
                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <ul class="carparts_pagination_nav ul_li_right clearfix">
                                    <li><a href="#!">---Back---</a></li>
                                    <li class="active"><a href="#!">1</a></li>
                                    <li><a href="#!">2</a></li>
                                    <li><a href="#!">3</a></li>
                                    <li><a href="#!">...</a></li>
                                    <li><a href="#!">5</a></li>
                                    <li><a href="#!">6</a></li>
                                    <li><a href="#!">7</a></li>
                                    <li><a href="#!">---Next---</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div id="list_layout" class="tab-pane fade">
                    <div class="mb_50">
                
                        <div class="carparts_product_listlayout" data-bg-color="#f0eeee">
                            <div class="item_image" data-bg-color="#f8f8f8">
                                <img src="{{ Storage::url($product->image) }}" style="width:300px; height:300px"
                                    alt="image_not_found">
                                <ul class="product_label ul_li text-uppercase clearfix">
                                    <li class="bg_carparts_red">New</li>
                                    <li class="bg_carparts_red">Sale</li>
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
                                <h3 class="item_title text-uppercase">
                                    <a
                                        href="{{ route('website.shop.shop-details', $product->id) }}">{{ $product->name }}</a>
                                </h3>
                                <p class="mb-0">
                                    {{ $product->describe }}
                                </p>
                                <div class="action_btns_wrap">
                                    <span class="price_text"><strong>{{ number_format($product->price) }} đ</strong>
                                        <del>$28.90</del></span>
                                    <ul class="product_action_btns ul_li clearfix">
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
                            </div>
                        </div>
                       

                    </div>

                    <div class="carparts_pagination_wrap clearfix">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <button type="button" class="custom_btn bg_carparts_red text-uppercase"><i
                                        class="fas fa-arrow-circle-down mr-2"></i> Load More</button>
                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <ul class="carparts_pagination_nav ul_li_right clearfix">
                                    <li class="active"><a href="#!">1</a></li>
                                    <li><a href="#!">2</a></li>
                                    <li><a href="#!">3</a></li>
                                    <li><a href="#!">...</a></li>
                                    <li><a href="#!">5</a></li>
                                    <li><a href="#!">6</a></li>
                                    <li><a href="#!">7</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_section - end
			================================================== -->


    <!-- carparts_newsletter - start
			================================================== -->
    <section class="carparts_newsletter sec_ptb_100 clearfix" data-bg-color="#ebebeb">
        <div class="container">
            <div
                class="row align-items-center justify-content-lg-between justify-content-md-between justify-content-sm-center">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <marquee>
                        <h2>
                            It's Great If You Get The Awesomeness Of These Products !
                        </h2>
                    </marquee>
                </div>
            </div>
        </div>
    </section>
    <!-- carparts_newsletter - end
			================================================== -->


</main>
<!-- main body - end
		================================================== -->
        <!-- product quick view - start -->
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
	                <h2 class="item_title mb_15"><strong>{{ $product->name }}</stong></h2>
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
	<!-- product quick view - end -->

@endsection