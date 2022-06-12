<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    {{-- <div class="c-content-box">
       <div id="slider" class="owl-theme section section-cate slideshow_full_width ">
          <div id="slide_banner" class="owl-carousel">
             <div class="item">
                <a href="#" alt="banner chung">
                <img src="{{asset('frontend/img/banner.jpg')}}" alt="banner chung">
                </a>
             </div>
             <div class="item">
                <a href="/" alt="nitvn2">
                <img src="img/banner.jpg" alt="nitvn2">
                </a>
             </div>
             <div class="item">
                <a href="/" alt="nitvn3">
                <img src="img/banner.jpg" alt="nitvn3">
                </a>
             </div>
          </div>
       </div>
    </div> --}}

    {{-- <div class="c-content-box c-size-md c-bg-white">
       <div class="container">
          <!-- Begin: Testimonals 1 component -->
          <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
             <!-- Begin: Title 1 component -->
             <div class="c-content-title-1">
                <h3 class="c-center c-font-uppercase c-font-bold">Dịch vụ nổi bật</h3>
                <div class="c-line-center c-theme-bg"></div>
             </div>
             <div class="owl-carousel owl-theme c-theme owl-bordered1 c-owl-nav-center" data-items="6" data-desktop-items="4" data-desktop-small-items="3" data-tablet-items="3" data-mobile-items="2" data-slide-speed="5000" data-rtl="false">
                <div class="item">
                   <a href="{{route('category.index')}}" ><img src="{{asset('frontend/img/vHPm7XyQah_1623147701.jpg')}}" alt="Trang cá nhân nickvn"/></a>
                </div>
                <div class="item">
                   <a href="#" ><img src="{{asset('frontend/img/vHPm7XyQah_1623147701.jpg')}}" alt="Trang cá nhân nickvn"/></a>
                </div>
                <div class="item">
                   <a href="#" ><img src="{{asset('frontend/img/vHPm7XyQah_1623147701.jpg')}}" alt="Trang cá nhân nickvn"/></a>
                </div>
                <div class="item">
                   <a href="#" ><img src="{{asset('frontend/img/vHPm7XyQah_1623147701.jpg')}}" alt="Trang cá nhân nickvn"/></a>
                </div>
             </div>
             <!-- End-->
          </div>
          <!-- End-->
       </div>
    </div> --}}
    <script type="text/javascript">
       $('.owl-carousel-dicvu').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:5,
                nav:true,
                loop:false
            }
        }
    })
    </script>
