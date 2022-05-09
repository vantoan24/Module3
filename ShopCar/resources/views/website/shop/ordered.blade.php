@extends('layout.index')
@section('content')
<!-- main body - start
		================================================== -->
<main>


    <section class="breadcrumb_section text-white text-center text-uppercase d-flex align-items-end clearfix"
        data-background="{{ url('/') }}/images/breadcrumb/bg_01.jpg">
        <div class="overlay" data-bg-color="#1d1d1d"></div>
        <div class="container">
            <h1 class="page_title text-white">Ordered</h1>
            <ul class="breadcrumb_nav ul_li_center clearfix">

            </ul>
        </div>
    </section>

    <!-- checkout_section - start
			================================================== -->
    <section class="checkout_section sec_ptb_140 clearfix">
        <div class="container">

            <ul class="checkout_step ul_li clearfix">
                <li class="activated"><a href="{{ route('website.shop.my-cart') }}"><span>01.</span> Shopping Cart</a></li>
                <li class="activated"><a href="{{ route('website.shop.checkout') }}"><span>02.</span> Checkout</a></li>
                <li class="active"><a href="{{ route('website.shop.ordered') }}"><span>03.</span> Order Completed</a></li>
            </ul>

            <div class="order_complete_alart text-center">
                <h2>Congratulation! You’ve <strong>Completed</strong> Payment.</h2>
            </div>
            <div class="coupon_wrap mb_50">
                <div class="row justify-content-lg-between text-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="coupon_form">
                            <a href="{{ route('website.home.index') }}" class="custom_btn bg_success">
							Back in Home Page</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- checkout_section - end
			================================================== -->


</main>
<!-- main body - end
		================================================== -->
@endsection