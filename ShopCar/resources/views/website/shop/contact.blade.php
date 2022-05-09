@extends('layout.index')
@section('content')	
		<!-- main body - start
		================================================== -->
		<main>

			<!-- breadcrumb_section - start
			================================================== -->
			<section class="breadcrumb_section text-white text-center text-uppercase d-flex align-items-end clearfix" data-background="{{ url('/') }}/images/breadcrumb/bg_01.jpg">
				<div class="overlay" data-bg-color="#1d1d1d"></div>
				<div class="container">
					<h1 class="page_title text-white">Contact Us</h1>
					<ul class="breadcrumb_nav ul_li_center clearfix">
						<li>Home</li>
						<li><a href="{{ route('website.shop.contact') }}">Contact Us</a></li>
					</ul>
				</div>
			</section>
			<!-- breadcrumb_section - end
			================================================== -->
			<hr>
			<marquee>🚂▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇ <img src="{{ url('/') }}/images/logo/logo_01_1x.png"></img> ▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇</marquee>
			<hr>
			<!-- map_section - start
			================================================== -->
			<div class="map_section clearfix">
				<div id="mapBox" data-lat="16.801839" data-lon="107.110959" data-zoom="15" data-info="Dong_Ha" data-mlat="40.16.801839" data-mlon="107.110959">
				</div>
			</div>
			<!-- map_section - end
			================================================== -->


			<!-- main_contact_section - start
			================================================== -->
			<section class="main_contact_section sec_ptb_100 clearfix">
				<div class="container">
					<div class="row justify-content-lg-between">

						<div class="col-lg-5">
							<div class="main_contact_content">
								<h3 class="title_text mb_15">Contact Info</h3>
								<ul class="main_contact_info ul_li_block clearfix">
									<li>
										<span class="icon">
											<i class="fal fa-map-marked-alt"></i>
										</span>
										<p class="mb-0">
											133 Lý Thường Kiệt, Đông Hà, Quảng Trị
										</p>
									</li>
									<li>
										<span class="icon">
											<i class="fal fa-phone-volume"></i>
										</span>
										<p class="mb-0">(+84) 0845591879 - Central Office</p>
									</li>
									<li>
										<span class="icon">
											<i class="fal fa-paper-plane"></i>
										</span>
										<p class="mb-0">hoqhoan6868@gmail.com</p>
									</li>
								</ul>
							</div>
						</div>

						<div class="col-lg-7">
							<div class="main_contact_form">
								<h3 class="title_text mb_30">FeedBack</h3>
								<form action="#">
									<div class="row">
										<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
											<div class="form_item">
												<input type="text" name="name" placeholder="Your Name">
											</div>
										</div>

										<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
											<div class="form_item">
												<input type="email" name="email" placeholder="Your Email">
											</div>
										</div>

										<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
											<div class="form_item">
												<input type="text" name="subject" placeholder="Subject">
											</div>
										</div>
									</div>

									<div class="form_item">
										<textarea name="message" placeholder="Your Message"></textarea>
									</div>
									<button type="submit" class="custom_btn bg_default_red text-uppercase">view projects</button>
								</form>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- main_contact_section - end
			================================================== -->


		</main>
		<!-- main body - end
		================================================== -->
		
@endsection