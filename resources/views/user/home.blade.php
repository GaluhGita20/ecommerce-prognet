<?php
  $title = "Home";
?>

@extends('layouts.template-user')

@section('content')
  <!-- :::::: Start Main Container Wrapper :::::: -->
  <main id="main-container" class="main-container">
    <div class="hero slider-dot-fix slider-dot slider-dot-fix slider-dot--center slider-dot-size--medium slider-dot-circle  slider-dot-style--fill slider-dot-style--fill-white-active-green dot-gap__X--10">
      <!-- Start Single Hero Slide -->
      <div class="hero-slider">
        <img src="/asset/home/hero-home-1.webp" alt="">
        <div class="hero__content">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                <div class="hero__content--inner">
                  <h6 class="title__hero title__hero--tiny text-uppercase">100% Healthy & Affordable</h6>
                  <h1 class="title__hero title__hero--xlarge font--regular text-uppercase">Organic <br>  Vegetables</h1>
                  <h4 class="title__hero title__hero--small font--regular">Small Changes Big Difference</h4>
                  <a href="#" class="btn btn--large btn--radius btn--black btn--black-hover-green font--bold text-uppercase">Shop now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Single Hero Slide -->
      <!-- Start Single Hero Slide -->
      <div class="hero-slider">
        <img src="/asset/home/hero-home-2.webp" alt="">
        <div class="hero__content">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                <div class="hero__content--inner">
                  <h6 class="title__hero title__hero--tiny text-uppercase">100% Healthy & Affordable</h6>
                  <h1 class="title__hero title__hero--xlarge font--regular text-uppercase">Organic <br>   fresh fruits</h1>
                  <h4 class="title__hero title__hero--small font--regular">Small Changes Big Difference</h4>
                  <a href="#" class="btn btn--large btn--radius btn--black btn--black-hover-green font--bold text-uppercase">Shop now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Single Hero Slide -->
    </div> <!-- ::::::  End Hero Section  ::::::  -->

    <!-- ::::::  Start banner Section  ::::::  -->
    <div class="banner m-t-30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="banner__box">
              <!-- Start Single Banner Item -->
              <div class="banner__box--single banner__box--single-text-style-1 pos-relative">
                  <a href="#" class="banner__link">
                      <img src="/asset/home/banner-box-1.webp" alt="" class="banner__img">
                  </a>
                  <div class="banner__content banner__content--center pos-absolute">
                      <h6 class="banner__title  font--regular letter-spacing--4  text-center m-b-10">Green Vegetable</h6>
                      <h2 class="banner__title banner__title--large font--medium letter-spacing--4  text-uppercase">100% ORGANIC</h2>
                      <h6 class="banner__title font--regular letter-spacing--4  text-center m-b-20">Healthy Nutrition</h6>
                      <div class="text-center">
                          <a href="#" class="btn btn--medium btn--radius btn--transparent btn--border-black btn--border-black-hover-green font--light text-uppercase">Buy Now</a>
                      </div>
                  </div>
              </div> <!-- End Single Banner Item -->
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="banner__box">
              <!-- Start Single Banner Item -->
              <div class="banner__box--single banner__box--single-text-style-1 pos-relative">
                <a href="#" class="banner__link">
                    <img src="/asset/home/banner-box-2.webp" alt="" class="banner__img">
                </a>
                <div class="banner__content banner__content--center pos-absolute">
                  <h6 class="banner__title letter-spacing--4 font--regular text-center m-b-10">Fresh herbs</h6>
                  <h2 class="banner__title banner__title--large letter-spacing--4 font--medium text-uppercase">SPINACH</h2>
                  <h6 class="banner__title letter-spacing--4 font--regular text-center m-b-20">Healthy Food</h6>
                  <div class="text-center">
                    <a href="#" class="btn btn--medium btn--radius btn--transparent btn--border-black btn--border-black-hover-green font--light text-uppercase">Buy Now</a>
                  </div>
                </div>
              </div> <!-- End Single Banner Item -->
            </div>
          </div>
        </div>
      </div>
    </div> <!-- ::::::  End banner Section  ::::::  -->

    @livewire('component-home-category')

    @livewire('component-home-top-product')

      <!-- ::::::  Start banner Section  ::::::  -->
    <div class="banner m-t-100 pos-relative">
      <div class="banner__bg">
        <img src="/asset/home/banner-product.webp" alt="">
      </div>
      <div class="banner__box banner__box--single-text-style-2">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="banner__content banner__content--center pos-absolute">
                <h6 class="banner__title  font--medium m-b-10">SPECIAL DISCOUNT</h6>
                <h1 class="banner__title banner__title--large font--regular text-capitalize">For all Grocery <br>
                    products</h1>
                <h6 class="banner__title font--medium m-b-40">Take now 20% off for all grocer product.</h6>
                <a href="product-single-default.html" class="btn btn--large btn--radius btn--black btn--black-hover-green font--bold text-uppercase">Shop now</a>
              </div> 
            </div>
          </div>
        </div>
      </div>    
    </div> <!-- ::::::  End banner Section  ::::::  -->

    <!-- ::::::  Start  Product Style - Default Section  ::::::  -->
    <div class="product m-t-100">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <!-- Start Section Title -->
            <div class="section-content section-content--border m-b-35">
              <h5 class="section-content__title">New Products</h5>
              <a href="#" class="btn btn--icon-left btn--small btn--radius btn--transparent btn--border-green btn--border-green-hover-green font--regular text-capitalize">More Products<i class="fal fa-angle-right"></i></a>
            </div>  <!-- End Section Title -->
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="default-slider default-slider--hover-bg-red product-default-slider">
              <div class="product-default-slider-4grid-1rows gap__col--30 gap__row--40">

                  <!-- Start Single Default Product -->
                  <div class="product__box product__default--single text-center">
                    <!-- Start Product Image -->
                    <div class="product__img-box  pos-relative">
                      <a href="#" class="product__img--link">
                          <img class="product__img img-fluid" src="/asset/produk/produk-1.webp" alt="">
                      </a>
                      <!-- Start Procuct Label -->
                      <span class="product__label product__label--sale-dis">-34%</span>
                      <!-- End Procuct Label -->
                      <!-- Start Product Action Link-->
                      <ul class="product__action--link pos-absolute">
                        <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                        <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                        <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                        <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                      </ul> <!-- End Product Action Link -->
                    </div> <!-- End Product Image -->
                    <!-- Start Product Content -->
                    <div class="product__content m-t-20">
                        <ul class="product__review">
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--blank"><i class="icon-star"></i></li>
                        </ul>
                        <a href="product-single-default.html" class="product__link">Fresh green vegetable</a>
                        <div class="product__price m-t-5">
                            <span class="product__price">Rp.13.000<del>Rp.15.400</del></span>
                        </div>
                    </div> <!-- End Product Content -->
                  </div> <!-- End Single Default Product -->

                  <!-- Start Single Default Product -->
                  <div class="product__box product__default--single text-center">
                    <!-- Start Product Image -->
                    <div class="product__img-box  pos-relative">
                      <a href="#" class="product__img--link">
                          <img class="product__img img-fluid" src="/asset/produk/produk-2.webp" alt="">
                      </a>
                      <!-- Start Procuct Label -->
                      <span class="product__label product__label--sale-dis">-34%</span>
                      <!-- End Procuct Label -->
                      <!-- Start Product Action Link-->
                      <ul class="product__action--link pos-absolute">
                        <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                        <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                        <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                        <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                      </ul> <!-- End Product Action Link -->
                    </div> <!-- End Product Image -->
                    <!-- Start Product Content -->
                    <div class="product__content m-t-20">
                        <ul class="product__review">
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--blank"><i class="icon-star"></i></li>
                        </ul>
                        <a href="product-single-default.html" class="product__link">Fresh green vegetable</a>
                        <div class="product__price m-t-5">
                            <span class="product__price">Rp.4.000 <del>Rp.6.200</del></span>
                        </div>
                    </div> <!-- End Product Content -->
                  </div> <!-- End Single Default Product -->

                  <!-- Start Single Default Product -->
                  <div class="product__box product__default--single text-center">
                    <!-- Start Product Image -->
                    <div class="product__img-box  pos-relative">
                      <a href="#" class="product__img--link">
                          <img class="product__img img-fluid" src="/asset/produk/produk-3.webp" alt="">
                      </a>
                      <!-- Start Procuct Label -->
                      <span class="product__label product__label--sale-dis">-34%</span>
                      <!-- End Procuct Label -->
                      <!-- Start Product Action Link-->
                      <ul class="product__action--link pos-absolute">
                        <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                        <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                        <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                        <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                      </ul> <!-- End Product Action Link -->
                    </div> <!-- End Product Image -->
                    <!-- Start Product Content -->
                    <div class="product__content m-t-20">
                        <ul class="product__review">
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--blank"><i class="icon-star"></i></li>
                        </ul>
                        <a href="product-single-default.html" class="product__link">Fresh green vegetable</a>
                        <div class="product__price m-t-5">
                            <span class="product__price">Rp.19.000 <del>Rp.22.000</del></span>
                        </div>
                    </div> <!-- End Product Content -->
                  </div> <!-- End Single Default Product -->

                  <!-- Start Single Default Product -->
                  <div class="product__box product__default--single text-center">
                    <!-- Start Product Image -->
                    <div class="product__img-box  pos-relative">
                      <a href="#" class="product__img--link">
                          <img class="product__img img-fluid" src="/asset/produk/produk-4.webp" alt="">
                      </a>
                      <!-- Start Procuct Label -->
                      <span class="product__label product__label--sale-dis">-34%</span>
                      <!-- End Procuct Label -->
                      <!-- Start Product Action Link-->
                      <ul class="product__action--link pos-absolute">
                        <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                        <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                        <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                        <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                      </ul> <!-- End Product Action Link -->
                    </div> <!-- End Product Image -->
                    <!-- Start Product Content -->
                    <div class="product__content m-t-20">
                        <ul class="product__review">
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--blank"><i class="icon-star"></i></li>
                        </ul>
                        <a href="product-single-default.html" class="product__link">Fresh green vegetable</a>
                        <div class="product__price m-t-5">
                            <span class="product__price">Rp.19.000 <del>Rp.22.000</del></span>
                        </div>
                    </div> <!-- End Product Content -->
                  </div> <!-- End Single Default Product -->

                  <!-- Start Single Default Product -->
                  <div class="product__box product__default--single text-center">
                    <!-- Start Product Image -->
                    <div class="product__img-box  pos-relative">
                      <a href="#" class="product__img--link">
                          <img class="product__img img-fluid" src="/asset/produk/produk-5.webp" alt="">
                      </a>
                      <!-- Start Procuct Label -->
                      <span class="product__label product__label--sale-dis">-34%</span>
                      <!-- End Procuct Label -->
                      <!-- Start Product Action Link-->
                      <ul class="product__action--link pos-absolute">
                        <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                        <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                        <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                        <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                      </ul> <!-- End Product Action Link -->
                    </div> <!-- End Product Image -->
                    <!-- Start Product Content -->
                    <div class="product__content m-t-20">
                        <ul class="product__review">
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--blank"><i class="icon-star"></i></li>
                        </ul>
                        <a href="product-single-default.html" class="product__link">Fresh green vegetable</a>
                        <div class="product__price m-t-5">
                            <span class="product__price">Rp.19.000 <del>Rp.22.000</del></span>
                        </div>
                    </div> <!-- End Product Content -->
                  </div> <!-- End Single Default Product -->

                  <!-- Start Single Default Product -->
                  <div class="product__box product__default--single text-center">
                    <!-- Start Product Image -->
                    <div class="product__img-box  pos-relative">
                      <a href="#" class="product__img--link">
                          <img class="product__img img-fluid" src="/asset/produk/produk-9.webp" alt="">
                      </a>
                      <!-- Start Procuct Label -->
                      <span class="product__label product__label--sale-dis">-34%</span>
                      <!-- End Procuct Label -->
                      <!-- Start Product Action Link-->
                      <ul class="product__action--link pos-absolute">
                        <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                        <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                        <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                        <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                      </ul> <!-- End Product Action Link -->
                    </div> <!-- End Product Image -->
                    <!-- Start Product Content -->
                    <div class="product__content m-t-20">
                        <ul class="product__review">
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--blank"><i class="icon-star"></i></li>
                        </ul>
                        <a href="product-single-default.html" class="product__link">Fresh green vegetable</a>
                        <div class="product__price m-t-5">
                            <span class="product__price">Rp.19.000 <del>Rp.22.000</del></span>
                        </div>
                    </div> <!-- End Product Content -->
                  </div> <!-- End Single Default Product -->

                  <!-- Start Single Default Product -->
                  <div class="product__box product__default--single text-center">
                    <!-- Start Product Image -->
                    <div class="product__img-box  pos-relative">
                      <a href="#" class="product__img--link">
                          <img class="product__img img-fluid" src="/asset/produk/produk-10.webp" alt="">
                      </a>
                      <!-- Start Procuct Label -->
                      <span class="product__label product__label--sale-dis">-34%</span>
                      <!-- End Procuct Label -->
                      <!-- Start Product Action Link-->
                      <ul class="product__action--link pos-absolute">
                        <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                        <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                        <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                        <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                      </ul> <!-- End Product Action Link -->
                    </div> <!-- End Product Image -->
                    <!-- Start Product Content -->
                    <div class="product__content m-t-20">
                        <ul class="product__review">
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                            <li class="product__review--blank"><i class="icon-star"></i></li>
                        </ul>
                        <a href="product-single-default.html" class="product__link">Fresh green vegetable</a>
                        <div class="product__price m-t-5">
                            <span class="product__price">Rp.19.000 <del>Rp.22.000</del></span>
                        </div>
                    </div> <!-- End Product Content -->
                  </div> <!-- End Single Default Product -->
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- ::::::  End  Product Style - Default Section  ::::::  -->

    <!-- ::::::  Start Testimonial Section  ::::::  -->
    <div class="testimonial m-t-100 pos-relative">
      <div class="testimonial__bg">
        <img src="/asset/home/banner-info.webp" alt="">
      </div>
        <div class="testimonial__content pos-absolute absolute-center text-center">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="section-content__inner">
                  <h2>Yang Perlu Kalian Ketahui Mengenai FreshMart!</h2>
                </div>
                <div class="testimonial__slider default-slider">
                  <div class="testimonial__content--slider ">
                    <div class="testimonial__single">
                      <p class="testimonial__desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                  </div>
                  <div class="testimonial__content--slider ">
                      <div class="testimonial__single">
                          <p class="testimonial__desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                          <div class="testimonial__info">
                              <img class="testimonial__info--user" src="assets/img/testimonial/testimonial-home-1-img-2.png" alt="">
                              <h5 class="testimonial__info--desig m-t-20">Torvi / <span>C0O</span> </h5>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div> <!-- ::::::  End Testimonial Section  ::::::  -->
  </main>  <!-- :::::: End MainContainer Wrapper :::::: -->
@endsection
