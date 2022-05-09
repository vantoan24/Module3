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
            <h1 class="page_title text-white">CART</h1>
            <ul class="breadcrumb_nav ul_li_center clearfix">
                <li>Home</li>
                <li><a href="#!">Cart</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb_section - end
			================================================== -->


    <!-- cart_section - start
			================================================== -->
    <section class="cart_section sec_ptb_140 clearfix">
        <div class="container">

            <ul class="checkout_step ul_li clearfix">
                <li class="active"><a href="{{ route('website.shop.my-cart') }}"><span>01.</span> Shopping Cart</a></li>
                <li><a href="#"><span>02.</span> Checkout</a></li>
                <li><a href="#"><span>03.</span> Order Completed</a></li>
            </ul>
            <?php if(count($gio_hang) > 0): ?>
            <form action="{{route('cart.update-cart')}}" method="POST">
                @csrf
                <div class="cart_table mb_50">
                    <table class="table">
                        <thead class="text-uppercase bg-white border-bottom">
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        
                        <div class="card-header">
                            @if(Session::has('success'))
                            <span style="color: green"><strong>{{ Session::get('success') }}</strong></span>
                            @endif
                        </div>
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
                                            <img src="{{ Storage::url($product->image) }}" alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h4 class="item_title">{{ $product->name }}</h4>
                                            <span class="item_type">{{ $product->danh_muc->name }}</span>
                                         </div>
                                        
                                        <a href="{{ route('website.shop.destroy-cart', $product->id) }}" class="btn remove_btn" onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                            <i class="fal fa-times"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <span class="price_text">{{ number_format($product->price) }} đ</span>
                                </td>
                                <td>
                                    <div class="quantity_input">

                                        <span class="input_number_decrement">–</span>
                                        <input class="input_number" type="text" name="so_luong[<?= $product->id ?>]"
                                            value="{{ $gio_hang[$product->id] }}">
                                        <span class="input_number_increment">+</span>

                                    </div>
                                </td>
                                <td><span
                                        class="total_price">{{ number_format($product->price * $gio_hang[$product->id]) }}
                                        đ</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="coupon_wrap mb_50">
                    <div class="row justify-content-lg-between">
                        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                            <div class="coupon_form">
                                <a class="custom_btn bg_danger text-uppercase" href="{{ route('website.shop.shop-page') }}"
                                    >Back</a>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                            <div class="cart_update_btn">
                                <button type="submit" class="custom_btn bg_secondary text-uppercase">Update
                                    Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row justify-content-lg-end">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="cart_pricing_table pt-0 text-uppercase" data-bg-color="#f2f3f5">
                        <h3 class="table_title text-center" data-bg-color="#ededed">Cart Total</h3>
                        <ul class="ul_li_block clearfix">
                            <li><span>Subtotal</span> <span>{{ number_format($SP_total) }} đ</span></li>
                            <li><span>Shipping</span> <span>30,000 đ</span></li>
                            <li><span>Total</span> <span>{{ number_format($SP_total + 30000) }} đ</span></li>
                        </ul>
                        <a href="{{ route('website.shop.checkout') }}" class="custom_btn bg_success">Checkout Now</a>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <form>
                <div class="page_title text-black text-center">
                    <br>
                    <h1>CHECKOUT IS EMPTY, ORDER NOW !!! </h1>
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
    <!-- cart_section - end
			================================================== -->


</main>
<!-- main body - end
		================================================== -->
@endsection