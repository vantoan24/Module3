@extends('layout.index')
@section('content')
<!-- main body - start
		================================================== -->

<?php  
		$pro_images = $product->imgs->pluck('images')->toArray();

		
		?>
<main>




    <!-- breadcrumb_section - start
			================================================== -->
    <div class="breadcrumb_section carparts_breadcrumb text-white text-center text-uppercase d-flex align-items-end clearfix"
        data-background="{{ url('/') }}/images/breadcrumb/bg_02.jpg">
        <div class="container">
            <ul class="breadcrumb_nav ul_li_center clearfix">
                <li>Home</li>
                <li>Shop</li>
                <li>Cart</li>
                <li><a href="#!">Shop Details</a></li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb_section - end
			================================================== -->


    <!-- details_section - start
			================================================== -->
    <section class="details_section shop_details sec_ptb_140 pb-0 clearfix">
        <div class="container">
            <div class="row mb_100 justify-content-lg-between">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="shop_details_image">
                        <div class="tab-content">
                            <div id="tab_1" class="tab-pane active">
                                <img src="{{ Storage::url($product->image) }}" alt="image_not_found">
                            </div>
                            <div id="tab_2" class="tab-pane fade">
                                <img src="{{ url('/') }}/images/details/carparts/img_01.jpg" alt="image_not_found">
                            </div>
                            <div id="tab_3" class="tab-pane fade">
                                <img src="{{ url('/') }}/images/details/carparts/img_01.jpg" alt="image_not_found">
                            </div>
                            <div id="tab_4" class="tab-pane fade">
                                <img src="{{ url('/') }}/images/details/carparts/img_01.jpg" alt="image_not_found">
                            </div>
                        </div>

                        <ul class="nav ul_li clearfix" role="tablist">

                            @foreach($pro_images as $pro_image)
                            <li>
                                <a class="active" data-toggle="tab" href="#tab_2">
                                    <img src="{{ Storage::url($pro_image) }}" alt="image_not_found">
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="shop_details_content">

                        <h2 class="item_title mb-2">{{ $product->name }}</h2>


                        <p class="mb-0">
                            <span class="price_text"><strong>{{ number_format($product->price) }} đ</strong>
                                <del>$48.90</del></span>
                        </p>
                        <hr>
                        <h3>➻❥ Category : {{ $product->danh_muc->name }}</h3>
                        <div class="rating_review_wrap d-flex align-items-center mb_15 clearfix">
                            <ul class="rating_star ul_li">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                            <span>4 Review(s)</span>

                        </div>
                        <hr>
                        <div id="description_tab" class="tab-pane active">
                            <h2 class="list_title">Description</h2>
                            <p class="mb-0">
                                {{ $product->describe }}
                            </p>
                        </div>
                        <hr>

                        <div class="item_color_list mb_30 clearfix">
                            <h4 class="list_title mb_15 text-uppercase">Color</h4>
                            <p class="mb-0">

                            </p>
                            <p class="mb-0">

                            </p>
                            <p class="mb-0">

                            </p>
                        </div>
                        <form action="{{ route('website.shop.post-cart', $product->id) }}" method="POST">
                            @csrf
                            <ul class="btns_group_1 ul_li mb_30 clearfix">
                                <li>
                                    <div class="quantity_input">

                                        <span class="input_number_decrement">–</span>
                                        <input class="input_number" name="quantily" type="text" value="1">
                                        <input class="input_number" name="productid_hidden" type="hidden"
                                            value="{{$product->id}}">
                                        <span class="input_number_increment">+</span>

                                    </div>
                                </li>
                                <li>
                                    <button type="submit" class="custom_btn bg_black text-uppercase"><i
                                            class="fal fa-shopping-bag mr-2"></i>Add To Cart</button>
                                </li>
                            </ul>
                        </form>
                        <hr>

                        <ul class="product_info ul_li_block mb_30 clearfix">
                            <li><strong>SKU:</strong> U2012</li>
                            <li><strong>Categories:</strong> <a href="#!">Dress</a> <a href="#!">Handbag</a> <a
                                    href="#!">T-Shirts</a></li>
                            <li><strong>Tags:</strong> <a href="#!">Hot</a> <a href="#!">Women</a></li>
                        </ul>

                        <div class="share_links d-flex align-items-center">
                            <h4 class="list_title text-uppercase mb-0">Share:</h4>
                            <ul class="circle_social_links ul_li_right clearfix">
                                <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#!"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="details_description_tab">
                <ul class="nav ul_li_center text-uppercase" role="tablist">
                    <li>
                        <a class="active" data-toggle="tab" href="#description_tab">Product Description</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#reviews_tab">Reviews</a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="description_tab" class="tab-pane active">
                        <h4 class="list_title">Description</h4>
                        <p class="mb-0">
                            {{ $product->describe }}
                        </p>
                    </div>

                    <div id="reviews_tab" class="tab-pane fade">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form_item">
                                        <input type="text" name="name" placeholder="Your Name">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form_item">
                                        <input type="email" name="email" placeholder="Your Email">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form_item">
                                        <input type="text" name="subject" placeholder="Subject">
                                    </div>
                                </div>
                            </div>

                            <div class="form_item">
                                <textarea name="message" placeholder="Your Message"></textarea>
                            </div>
                            <button type="submit" class="custom_btn bg_default_red text-uppercase">Submit
                                Review</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- details_section - end
			================================================== -->


    <!-- product_section - start
			================================================== -->
    <section class="product_section sec_ptb_100 clearfix">
        <div class="container">
            <div class="carparts_section_title text-center mb_15">
                <h2 class="title_text mb-0">Related Products</h2>
            </div>

            <div class="row">
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
                                        href="{{ route('website.shop.quickview', $product->id) }}" data-toggle="modal"
                                        data-target="#quickview_modal"><i class="fal fa-search"></i></a></li>
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
                                <a href="{{ route('website.shop.shop-details', $product->id) }}">{{ $product->name }}</a>
                            </h3>
                            <span class="price_text"><strong>{{ number_format($product->price) }} đ</strong> <del>$48.90</del></span>
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
    </section>
    <!-- product_section - end
			================================================== -->
    <!-- carparts_newsletter - start
			================================================== -->
    <section class="carparts_newsletter sec_ptb_100 clearfix" data-bg-color="#ebebeb">
        <div class="container">
            <div
                class="row align-items-center justify-content-lg-between justify-content-md-between justify-content-sm-center">
                <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12">
                    <h2 class="newsletter_title">
                        <i class="fal fa-paper-plane"></i>
                        Join Our Newsletter Now
                    </h2>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                    <div class="form_item">
                        <input type="email" name="email" placeholder="Enter Your Email">
                        <button type="submit" class="custom_btn bg_carparts_red">SUBCRIBE</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- carparts_newsletter - end
			================================================== -->


</main>
<!-- main body - end
		================================================== -->
@endsection