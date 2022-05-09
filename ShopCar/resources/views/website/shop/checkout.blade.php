@extends('layout.index')
@section('content')
<!-- main body - start
		================================================== -->
<main>




    <!-- breadcrumb_section - start
			================================================== -->
    <section class="breadcrumb_section text-white text-center text-uppercase d-flex align-items-end clearfix"
        data-background="{{ url('/') }}/images/breadcrumb/bg_01.jpg">
        <div class="overlay" data-bg-color="#1d1d1d"></div>
        <div class="container">
            <h1 class="page_title text-white">Checkout</h1>
            <ul class="breadcrumb_nav ul_li_center clearfix">
                <li>Home</li>
                <li>Cart</li>
                <li><a href="#!">Checkout</a></li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb_section - end
			================================================== -->


    <!-- checkout_section - start
			================================================== -->
    <section class="checkout_section sec_ptb_140 clearfix">
        <div class="container">

            <ul class="checkout_step ul_li clearfix">
                <li class="activated"><a href="{{ route('website.shop.my-cart') }}"><span>01.</span> Shopping Cart</a>
                </li>
                <li class="active"><a href="{{ route('website.shop.checkout') }}"><span>02.</span> Checkout</a></li>
                <li><a href="#"><span>03.</span> Order Completed</a></li>
            </ul>
            <?php if(count($gio_hang) > 0): ?>
            <form action="{{ route('website.shop.post-checkout') }}" method="POST">
                @csrf
                <div class="billing_form mb_50">
                    <h3 class="form_title mb_30">BILLING DETAILS</h3>


                    <div class="form_wrap">

                        <div class="row">

                        </div>
                        <div class="form_item">
                            <span class="input_title">Username<sup>*</sup></span>
                            <input type="text" name="user_name">
                        </div>
                        <div class="form_item">
                            <span class="input_title">Address<sup>*</sup></span>
                            <input type="text" name="address">
                        </div>
                        <div class="form_item">
                            <span class="input_title">Phone<sup>*</sup></span>
                            <input type="tel" name="user_phone">
                        </div>

                        <div class="form_item">
                            <span class="input_title">Email Address<sup>*</sup></span>
                            <input type="email" name="email">
                        </div>

                        <hr>

                        <div class="form_item mb-0">
                            <span class="input_title">Order notes<sup>*</sup></span>
                            <textarea name="message"></textarea>
                        </div>

                    </div>

                </div>

                <div class="billing_form">
                    <h3 class="form_title mb_30">Your order</h3>

                    <div class="form_wrap">

                        <div class="checkout_table">
                            <table class="table text-center mb_50">
                                <thead class="text-uppercase text-uppercase">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                $SP_total = 0;
                                ?>
                                    @foreach($products as $key => $product)
                                    <?php 
                            $SP_total += $product->price * $gio_hang[$product->id];
                            ?>
                                    <tr>
                                        <td>
                                            <div class="cart_product">
                                                <div class="item_image">
                                                    <img src="{{ Storage::url($product->image) }}"
                                                        alt="image_not_found">
                                                </div>
                                                <div class="item_content">
                                                    <h4 class="item_title mb-0">{{ $product->name }}</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="price_text">{{ number_format($product->price) }} đ</span>
                                        </td>
                                        <td>
                                            <span class="quantity_text">{{ $gio_hang[$product->id] }}</span>
                                        </td>
                                        <td><span
                                                class="total_price">{{ number_format($product->price * $gio_hang[$product->id]) }}
                                                đ</span></td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span class="subtotal_text">Subtotal</span>
                                        </td>
                                        <td><span class="total_price">{{ number_format($SP_total) }} đ</span></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span class="subtotal_text">Shipping</span>
                                        </td>
                                        <td>
                                            <span class="total_price">30,000 đ</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span class="subtotal_text">TOTAL</span>
                                        </td>
                                        <td>
                                            <span class="total_price">{{ number_format($SP_total + 30000) }} đ</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="billing_payment_mathod">

                            <button type="submit" class="custom_btn bg_default_red">PLACE ORDER</button>
                        </div>

                    </div>

                </div>
            </form>
            <?php else: ?>
            <form>
                <div class="page_title text-black text-center">
                    <br>
                    <h1>CART IS EMPTY, ORDER NOW !!! </h1>
                    <div class="col-lg-12 col-md-12">
                        <div class="pagination-area text-center">
                            <a href="{{ route('website.shop.shop-page') }}" class="custom_btn bg_success">Buy Now</a>

                        </div>
                    </div>

            </form>
            <!-- kết thúc if -->
            <?php endif; ?>
        </div>
    </section>
    <!-- checkout_section - end
			================================================== -->


</main>
<!-- main body - end
		================================================== -->
@endsection