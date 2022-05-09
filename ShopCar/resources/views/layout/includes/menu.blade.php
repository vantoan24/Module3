<div class="col-lg-9">
                        <div class="header_top">
                            <div class="row w-100 d-flex align-items-center justify-content-lg-between">
                                <div class="col-lg-6">
                                    <form action="#" method="POST">
                                        <div class="form_item search_box">
                                            <input type="search" name="search" placeholder="Search">
                                            <button type="submit" class="submit_btn bg_carparts_red"><i
                                                    class="fal fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-lg-3">
                                    <div class="login_cart_btn user_btn" data-toggle="collapse" role="button"
                                        data-target="#use_deropdown" aria-expanded="false"
                                        aria-controls="use_deropdown">
                                        <div class="item_icon">
                                            <img src="{{ url('/') }}/images/icons/user.png" alt="user_icon">
                                        </div>
                                        <div class="item_content">
                                            <span>Login here</span>
                                            <strong>My Account</strong>
                                        </div>
                                    </div>
                                    <div id="use_deropdown" class="collapse_dropdown collapse">
                                        <div class="dropdown_content">
                                            <div class="profile_info clearfix">
                                                <div class="user_thumbnail">
                                                    <img src="{{ url('/') }}/images/meta/img_01.png"
                                                        alt="thumbnail_not_found">
                                                </div>
                                                <div class="user_content">
                                                    <h4 class="user_name">Huynh tOAN</h4>
                                                    <span class="user_title">Seller</span>
                                                </div>
                                            </div>
                                            <ul class="settings_options ul_li_block clearfix">
                                                <li><a href="#!"><i class="fal fa-user-circle"></i> Profile</a></li>
                                                <li><a href="#!"><i class="fal fa-user-cog"></i> Settings</a></li>
                                                <li><a href="#!"><i class="fal fa-sign-out-alt"></i> Logout</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="login_cart_btn cart_btn">
                                        <div class="item_icon">
                                            <img src="{{ url('/') }}/images/icons/shopping_cart.png" alt="user_icon">
                                            <span class="indicator__area"><span class="text-white"
                                                    style="background: red; text-align: center;"><b>
                                                    {{ count($gio_hang) }}

                                                    </b></span>      
                                        </div>
                                        <div class="item_content">
                                            <span><strong>My Cart</strong></span>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="header_bottom">
                            <nav class="main_menu clearfix">
                                <ul class="ul_li clearfix">
                                    <li>
                                        <a href="{{ route('website.home.index') }}">Home</a>
                                        <!-- class="menu_item_has_child" -->
                                    </li>
                                    <li>
                                        <a href="{{ route('website.shop.shop-page') }}">Shop</a>
                                        <!-- <div class="mega_menu pt-0">
                                            <div class="background" data-bg-color="#ffffff">
                                                <div class="container">
                                                    <div class="row mt__30">
                                                        <div class="col-lg-3">
                                                            <div class="page_links">
                                                                <h3 class="title_text">Carparts</h3>
                                                                <ul class="ul_li_block">
                                                                    <li><a href="carparts_shop.html">Shop Page</a></li>
                                                                    <li><a href="carparts_shop_grid.html">Shop Grid</a>
                                                                    </li>
                                                                    <li><a href="carparts_shop_list.html">Shop List</a>
                                                                    </li>
                                                                    <li><a href="carparts_shop_details.html">Shop
                                                                            Details</a></li>
                                                                </ul>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </li>
                                    <li>
                                        <a href="{{ route('website.shop.my-cart') }}">Cart</a>
                                        <!-- <ul class="submenu">
                                            <li class="menu_item_has_child">
                                                <a href="#!">Shop Inner Pages</a>
                                                <ul class="submenu">
                                                    <li><a href="shop_cart.html">Shopping Cart</a></li>
                                                    <li><a href="shop_checkout.html">Checkout Step 1</a></li>
                                                    <li><a href="shop_checkout_step2.html">Checkout Step 2</a></li>
                                                    <li><a href="shop_checkout_step3.html">Checkout Step 3</a></li>
                                                </ul>
                                            </li>

                                        </ul> -->
                                    </li>
                                    <li><a href="{{ route('website.shop.contact') }}">Contact us</a></li>
                                </ul>
                            </nav>

                            <a class="custom_btn bg_carparts_red" href="{{ route('website.shop.shop-page') }}">Buy
                                Now</a>
                        </div>
                    </div>
                </div>

                <div id="search_body_collapse" class="search_body_collapse collapse">
                    <div class="search_body">
                        <div class="container-fluid prl_90">
                            <form action="#">
                                <div class="form_item mb-0">
                                    <input type="search" name="search" placeholder="Type here...">
                                    <button type="submit"><i class="fal fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>