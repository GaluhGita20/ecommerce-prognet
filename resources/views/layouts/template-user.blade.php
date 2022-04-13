
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <title>FreshMart| {{$title}}</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- ::::::::::::::Favicon icon::::::::::::::-->
  <link rel="shortcut icon" href="/asset/logo/logo freshmart.png" type="image/png">

  <!-- ::::::::::::::All CSS Files here :::::::::::::: -->

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="css/vendor/jquery-ui.min.css">
  <link rel="stylesheet" href="css/vendor/fontawesome.css">
  <link rel="stylesheet" href="css/vendor/plaza-icon.css">
  <link rel="stylesheet" href="css/vendor/bootstrap.min.css">
  
  <!-- Plugin CSS Files -->
  <link rel="stylesheet" href="css/plugin/slick.css">
  <link rel="stylesheet" href="css/plugin/material-scrolltop.css">
  <link rel="stylesheet" href="/css/plugin/price_range_style.css">
  <link rel="stylesheet" href="/css/plugin/in-number.css">
  <link rel="stylesheet" href="/css/plugin/venobox.min.css">
  <link rel="stylesheet" href="/css/plugin/jquery.lineProgressbar.css">

  <!-- Use the minified version files listed below for better performance and remove the files listed above -->
  <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css"/>
  <link rel="stylesheet" href="assets/css/plugin/plugins.min.css"/>
  <link rel="stylesheet" href="assets/css/main.min.css"> -->

  <!-- Main Style CSS File -->
  <link rel="stylesheet" href="/css/main.css">
</head>

<body>
  <!-- ::::::  Start Header Section  ::::::  -->
  <header>
    <!--  Start Large Header Section   -->
    <div class="header d-none d-lg-block">
      <!-- Start Header Center area -->
      <div class="header__center sticky-header p-tb-10">
        <div class="container">
          <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
              <!-- Start Logo -->
              <div class="header__logo">
                <a href="index.html" class="header__logo-link img-responsive">
                    <img class="header__logo-img img-fluid" src="/asset/logo/freshmart.png" style=""alt="">
                </a>
              </div> <!-- End Logo -->
              <!-- Start Header Menu -->
              <div class="header-menu">
                <nav>
                  <ul class="header__nav">
                    <!--Start Single Nav link-->
                    <li class="header__nav-item pos-relative">
                      <a href="@if (Auth::guest()) {{Route('welcome')}} @else {{Route('home')}}@endif" class="header__nav-link">Home</a>
                    </li> <!-- End Single Nav link-->

                    <!--Start Single Nav link-->
                    <li class="header__nav-item pos-relative">
                      <a href="#" class="header__nav-link">Shop</a>
                    </li> <!-- End Single Nav link-->

                    <!--Start Single Nav link-->
                    <li class="header__nav-item pos-relative">
                      <a href="#" class="header__nav-link">Blog</a>
                    </li> <!-- End Single Nav link-->

                     <!--Start Single Nav link-->
                     <li class="header__nav-item pos-relative">
                      <a href="#" class="header__nav-link">My Account</a>
                    </li> <!-- End Single Nav link-->

                    <!--Start Single Nav link-->
                    <li class="header__nav-item pos-relative">
                      <a href="#" class="header__nav-link">Contact Us</a>
                    </li> <!-- End Single Nav link-->
                  </ul>
                </nav>
              </div> <!-- End Header Menu -->
              <form action="{{Route('logout')}}" method="POST">
                @csrf
                <ul class="header__user-action-icon">
                  <!-- Start Header Add Cart Box -->
                  <li>
                      <a href="#offcanvas-add-cart__box" class="offcanvas-toggle">
                          <i class="icon-shopping-cart"></i>
                          <span class="wishlist-item-count pos-absolute">3</span>
                      </a>
                  </li> <!-- End Header Add Cart Box -->
                  <!-- Start Header Wishlist Box -->
                  <li>
                      <a href="{{Route('myaccount')}}">
                          <i class="icon-users"></i>
                      </a>
                  </li> <!-- End Header Wishlist Box -->
                  @if (Auth::guest())
                  <li>
                    <a href="{{Route('login')}}" class="btn btn--medium btn--radius btn--transparent btn--border-black btn--border-black-hover-green font--light text-uppercase">Anda belum login</a>
                  </li>
                  @else
                  <li>       
                    <p style="font-size:17px; margin-bottom:0px;"><?php echo Auth::user()->name?></p>               
                  </li>
                  <li>
                    <button type="submit" href="{{Route('logout')}}"><i style="color:#666; font-weight:400;" class="fas fa-sign-out-alt"></i></button>
                  </li>
                  @endif
                </ul> 
              </form>
              <!-- Start Wishlist-AddCart -->
            </div>
          </div>
        </div>
      </div> <!-- End Header Center area -->

      <!-- Start Header bottom area -->
      <div class="header__bottom p-tb-30">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-3 col-lg-3">
                    <div class="header-menu-vertical pos-relative">
                        <h4 class="menu-title link--icon-left"><i class="far fa-align-left"></i>CATEGORIES</h4>
                        <ul class="menu-content pos-absolute">
                            <li class="menu-item"><a href="#">Search Terms</a></li>
                            <li class="menu-item"><a href="#">Advanced Search</a></li>
                            <li class="menu-item"><a href="#">Helps & Faqs</a></li>
                            <li class="menu-item"><a href="#">Store Location</a></li>
                            <li class="menu-item"><a href="#"> Orders & Returns</a></li>
                            <li class="menu-item"><a href="#"> Deliveries</a></li>
                            <li class="menu-item"><a href="#"> Refund & Returns</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <form class="header-search" action="#" method="post">
                        <div class="header-search__content pos-relative">
                            <input type="search" name="header-search" placeholder="Search our store" required>
                            <button class="pos-absolute" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-xl-2 col-lg-3">
                    <div class="header-phone text-right"><span>Call Us: +62 14045</span></div>
                </div>
            </div>
        </div>
      </div> <!-- End Header bottom area -->
        
    </div> <!--  End Large Header Section  -->

    <!--  Start Mobile Header Section   -->
    <div class="header__mobile mobile-header--1 d-block d-lg-none p-tb-20">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <ul class="header__mobile--leftside d-flex align-items-center justify-content-start">
                        <li>
                            <div class="header__mobile-logo">
                                <a href="index.html" class="header__mobile-logo-link">
                                    <img src="assets/img/logo/logo.png" alt="" class="header__mobile-logo-img">
                                </a>
                            </div>
                        </li>
                    </ul>
                    <!-- Start User Action -->
                    <ul class="header__mobile--rightside header__user-action-icon  d-flex align-items-center justify-content-end"> 
                        <!-- Start Header Add Cart Box -->
                        <li>
                            <a href="#offcanvas-add-cart__box" class="offcanvas-toggle">
                                <i class="icon-shopping-cart"></i>
                                <span class="wishlist-item-count pos-absolute">3</span>
                            </a>
                        </li> <!-- End Header Add Cart Box -->
                        <li><a href="#offcanvas-mobile-menu" class="offcanvas-toggle"><i class="far fa-bars"></i></a></li>

                    </ul>   <!-- End User Action -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="header-menu-vertical pos-relative m-t-30">
                        <h4 class="menu-title link--icon-left"><i class="far fa-align-left"></i>CATEGORIES</h4>
                        <ul class="menu-content pos-absolute">
                            <li class="menu-item"><a href="#">Search Terms</a></li>
                            <li class="menu-item"><a href="#">Advanced Search</a></li>
                            <li class="menu-item"><a href="#">Helps & Faqs</a></li>
                            <li class="menu-item"><a href="#">Store Location</a></li>
                            <li class="menu-item"><a href="#"> Orders & Returns</a></li>
                            <li class="menu-item"><a href="#"> Deliveries</a></li>
                            <li class="menu-item"><a href="#"> Refund & Returns</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--  Start Mobile Header Section   -->

    <!--  Start Mobile-offcanvas Menu Section   -->
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
        <div class="offcanvas__top">
            <span class="offcanvas__top-text"></span>
            <button class="offcanvas-close"><i class="fal fa-times"></i></button>
        </div>
        
        <div class="offcanvas-inner">
            <ul class="user-set-role d-flex justify-content-between m-tb-15">
                <li class="user-currency pos-relative">
                    <a class="user-set-role__button" href="#" data-toggle="dropdown" aria-expanded="false">Select Language<i class="fal fa-chevron-down"></i></a>
                    <ul class="expand-dropdown-menu dropdown-menu" >
                        <li><a href="#"><img src="assets/img/icon/flag/icon_usa.png" alt="">English</a></li>
                        <li><a href="#"><img src="assets/img/icon/flag/icon_france.png" alt="">French</a></li>
                    </ul>
                </li>
                <li class="user-info pos-relative">
                    <a class="user-set-role__button" href="#" data-toggle="dropdown" aria-expanded="false" >Select Currency <i class="fal fa-chevron-down"></i></a>
                    <ul class="expand-dropdown-menu dropdown-menu" >
                        <li><a href="#">USD</a></li>
                        <li><a href="#">POUND</a></li>
                    </ul>
                </li>
            </ul>
            <form class="header-search m-tb-15" action="#" method="post">
                <div class="header-search__content pos-relative">
                    <input type="search" name="header-search" placeholder="Search our store" required>
                    <button class="pos-absolute" type="submit"><i class="icon-search"></i></button>
                </div>
            </form>
              <!-- Start Mobile User Action -->
            <ul class="header__user-action-icon m-tb-15 text-center">
                <!-- Start Header Wishlist Box -->
                <li>
                    <a href="my-account.html">
                        <i class="icon-users">
                        @if (!Auth::user())
                          <p>Anda belum Login</p>
                        @else
                          <p><?php echo Auth::user()->name?></p>
                        @endif
                        </i>
                    </a>
                </li> 
                <!-- End Header Wishlist Box -->
                <!-- Start Header Add Cart Box -->
                <li>
                    <a href="cart.html">
                        <i class="icon-shopping-cart"></i>
                        <span class="wishlist-item-count pos-absolute">3</span>
                    </a>
                </li> <!-- End Header Add Cart Box -->
            </ul>  <!-- End Mobile User Action -->
            <div class="offcanvas-menu">
                <ul>
                    <li><a href="index.html"><span>Home</span></a></li>
                    <li>
                        <a href="#"><span>Shop</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#">Shop Layout</a>
                                <ul class="sub-menu">
                                    <li><a href="shop-sidebar-grid-left.html">Grid Left Sidebar</a></li>
                                    <li><a href="shop-sidebar-grid-right.html">Grid Right Sidebar</a></li>
                                    <li><a href="shop-sidebar-full-width.html">Full Width</a></li>
                                    <li><a href="shop-sidebar-left-list-view.html">List Left Sidebar</a></li>
                                    <li><a href="shop-sidebar-right-list-view.html">List Right Sidebar</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="sub-menu">
                            <li>
                                <a href="#">Shop Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="compare.html">Compare</a></li>
                                    <li><a href="empty-cart.html">Empty Cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="login.html">Login</a></li>
                                                    
                                </ul>
                            </li>
                        </ul>
                        <ul class="sub-menu">
                            <li>
                                <a href="#">Product Single</a>
                                <ul class="sub-menu">
                                    <li><a href="product-single-default.html">Simple</a></li>
                                    <li><a href="product-single-affiliate.html">Affiliate</a></li>
                                    <li><a href="product-single-group.html">Grouped</a></li>
                                    <li><a href="product-single-variable.html">Variable</a></li>
                                    <li><a href="product-single-tab-left.html">Left Tab</a></li>
                                    <li><a href="product-single-tab-right.html">Right Tab</a></li>
                                    <li><a href="product-single-slider.html">Single Slider</a></li>
                                    <li><a href="product-single-gallery-left.html">Gallery Left</a></li>
                                    <li><a href="product-single-gallery-right.html">Gallery Right</a></li>
                                    <li><a href="product-single-sticky-left.html">Sticky Left</a></li>
                                    <li><a href="product-single-sticky-right.html">Sticky Right</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><span>Blogs</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#">Blog Grid</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-grid-sidebar-left.html"> Blog Grid Left Sidebar</a></li>
                                    <li><a href="blog-grid-sidebar-right.html"> Blog Grid Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Blog List</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-list-sidebar-left.html"> Blog List Left Sidebar</a></li>
                                    <li><a href="blog-list-sidebar-right.html"> Blog List Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Blog Single</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-single-sidebar-left.html"> Blog Single Left Sidebar</a></li>
                                    <li><a href="blog-single-sidebar-right.html"> Blog Single Right Sidebar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><span>Pages</span></a>
                        <ul class="sub-menu">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="frequently-questions.html">Frequently Questions</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="404.html">404 Page</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <ul class="offcanvas__social-nav m-t-50">
            <li class="offcanvas__social-list"><a href="#" class="offcanvas__social-link"><i class="fab fa-facebook-f"></i></a></li>
            <li class="offcanvas__social-list"><a href="#" class="offcanvas__social-link"><i class="fab fa-twitter"></i></a></li>
            <li class="offcanvas__social-list"><a href="#" class="offcanvas__social-link"><i class="fab fa-youtube"></i></a></li>
            <li class="offcanvas__social-list"><a href="#" class="offcanvas__social-link"><i class="fab fa-google-plus-g"></i></a></li>
            <li class="offcanvas__social-list"><a href="#" class="offcanvas__social-link"><i class="fab fa-instagram"></i></a></li>
        </ul>
    </div> <!--  End Mobile-offcanvas Menu Section   -->

    <!--  Start Popup Add Cart  -->
    <div  id="offcanvas-add-cart__box" class="offcanvas offcanvas-cart offcanvas-add-cart">
        <div class="offcanvas__top">
            <span class="offcanvas__top-text"><i class="icon-shopping-cart"></i>Cart</span>
            <button class="offcanvas-close"><i class="fal fa-times"></i></button>
        </div>
        <!-- Start Add Cart Item Box-->
        <ul class="offcanvas-add-cart__menu">
            <!-- Start Single Add Cart Item-->
            <li class="offcanvas-add-cart__list pos-relative d-flex align-items-center justify-content-between ">
                <div class="offcanvas-add-cart__content d-flex align-items-start m-r-10">
                    <div class="offcanvas-add-cart__img-box pos-relative">
                        <a href="product-single-default.html" class="offcanvas-add-cart__img-link img-responsive"><img src="assets/img/product/size-small/product-home-1-img-1.jpg" alt="" class="add-cart__img"></a>
                        <span class="offcanvas-add-cart__item-count pos-absolute">2x</span>
                    </div>
                    <div class="offcanvas-add-cart__detail">
                        <a href="product-single-default.html" class="offcanvas-add-cart__link">Lucky Wooden Elephant</a>
                        <span class="offcanvas-add-cart__price">$29.00</span>
                        <span class="offcanvas-add-cart__info">Dimension: 40x60cm</span>
                    </div>
                </div>
                <button class="offcanvas-add-cart__item-dismiss"><i class="fal fa-times"></i></button>
            </li> <!-- Start Single Add Cart Item-->
            <!-- Start Single Add Cart Item-->
            <li class="offcanvas-add-cart__list pos-relative d-flex align-items-center justify-content-between">
                <div class="offcanvas-add-cart__content d-flex  align-items-start m-r-10">
                    <div class="offcanvas-add-cart__img-box pos-relative">
                        <a href="product-single-default.html" class="offcanvas-add-cart__img-link img-responsive"><img src="assets/img/product/size-small/product-home-1-img-2.jpg" alt="" class="add-cart__img"></a>
                        <span class="offcanvas-add-cart__item-count pos-absolute">2x</span>
                    </div>
                    <div class="offcanvas-add-cart__detail">
                        <a href="product-single-default.html" class="offcanvas-add-cart__link">Lucky Wooden Elephant</a>
                        <span class="offcanvas-add-cart__price">$29.00</span>
                        <span class="offcanvas-add-cart__info">Dimension: 40x60cm</span>
                    </div>
                </div>
                <button class="offcanvas-add-cart__item-dismiss"><i class="fal fa-times"></i></button>
            </li> <!-- Start Single Add Cart Item-->
        </ul> <!-- Start Add Cart Item Box-->
        <!-- Start Add Cart Checkout Box-->
        <div class="offcanvas-add-cart__checkout-box-bottom">
            <!-- Start offcanvas Add Cart Checkout Info-->
            <ul class="offcanvas-add-cart__checkout-info">
                <!-- Start Single Add Cart Checkout Info-->
                <li class="offcanvas-add-cart__checkout-list">
                    <span class="offcanvas-add-cart__checkout-left-info">Subtotal</span>
                    <span class="offcanvas-add-cart__checkout-right-info">$60.59</span>
                </li> <!-- End Single Add Cart Checkout Info-->
                <!-- Start Single Add Cart Checkout Info-->
                <li class="offcanvas-add-cart__checkout-list">
                    <span class="offcanvas-add-cart__checkout-left-info">Shipping</span>
                    <span class="offcanvas-add-cart__checkout-right-info">$7.00</span>
                </li> <!-- End Single Add Cart Checkout Info-->
                <!-- Start Single Add Cart Checkout Info-->
                <li class="offcanvas-add-cart__checkout-list">
                    <span class="offcanvas-add-cart__checkout-left-info">Taxes</span>
                    <span class="offcanvas-add-cart__checkout-right-info">$0.00</span>
                </li> <!-- End Single Add Cart Checkout Info-->
                <!-- Start Single Add Cart Checkout Info-->
                <li class="offcanvas-add-cart__checkout-list">
                    <span class="offcanvas-add-cart__checkout-left-info">Total</span>
                    <span class="offcanvas-add-cart__checkout-right-info">$67.59</span>
                </li> <!-- End Single Add Cart Checkout Info-->
            </ul> <!-- End offcanvas Add Cart Checkout Info-->

            <div class="offcanvas-add-cart__btn-checkout">
                <a href="checkout.html" class="btn btn--block btn--radius btn--box btn--black btn--black-hover-green btn--large btn--uppercase font--bold">Checkout</a>
            </div>
        </div> <!-- End Add Cart Checkout Box-->
    </div> <!-- End Popup Add Cart -->

    <div class="offcanvas-overlay"></div>
  </header>  <!-- :::::: End Header Section ::::::  -->  

  @yield('content')

  <!-- ::::::  Start  Footer ::::::  -->
  <footer class="footer m-t-100">
    <div class="container">
      <!-- Start Footer Top Section --> 
      <div class="footer__top">
        <div class="row">
          <div class="col-lg-4 col-md-5">
            <div class="footer__about">
              <div class="footer__logo">
                <a href="#" class="footer__logo-link">
                    <img src="/asset/logo/freshmart.png" alt="" class="footer__logo-img">
                </a>
              </div>
              <ul class="footer__address">
                <li class="footer__address-item"><i class="fa fa-home"></i>Kampus Unud Jimbaran, Kuta Selatan, Bali</li>
                <li class="footer__address-item"><i class="fa fa-phone-alt"></i>+62 14045</li>
                <li class="footer__address-item"><i class="fa fa-envelope"></i>freshmart@gmail.com</li>
              </ul>
              <ul class="footer__social-nav">
                  <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-facebook-f"></i></a></li>
                  <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-twitter"></i></a></li>
                  <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-youtube"></i></a></li>
                  <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-google-plus-g"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-6 col-12">
            <!-- Start Footer Nav -->  
            <div class="footer__menu">
                <h4 class="footer__nav-title footer__nav-title--dash footer__nav-title--dash-red">INFORMATION</h4>
                <ul class="footer__nav">
                    <li class="footer__list"><a href="" class="footer__link">Delivery Information</a></li>
                    <li class="footer__list"><a href="" class="footer__link">Advanced Search</a></li>
                    <li class="footer__list"><a href="" class="footer__link">Helps & Faqs</a></li>
                    <li class="footer__list"><a href="" class="footer__link">Store Location</a></li>
                    <li class="footer__list"><a href="" class="footer__link">Orders & Returns</a></li>
                    <li class="footer__list"><a href="" class="footer__link">Deliveries</a></li>
                    <li class="footer__list"><a href="" class="footer__link"> Refund & Returns</a></li>
                </ul>
            </div> <!-- End Footer Nav --> 
          </div>
          <div class="col-lg-2 col-md-3 col-sm-6 col-12">
            <div class="footer__menu">
              <h4 class="footer__nav-title footer__nav-title--dash footer__nav-title--dash-red">OUR COMPANY</h4>
              <ul class="footer__nav">
                <li class="footer__list"><a href="" class="footer__link">Delivery</a></li>
                <li class="footer__list"><a href="" class="footer__link">Legal Notice</a></li>
                <li class="footer__list"><a href="" class="footer__link">Sitemap</a></li>
                <li class="footer__list"><a href="" class="footer__link">Secure payment</a></li>
                <li class="footer__list"><a href="" class="footer__link">Blog</a></li>
                <li class="footer__list"><a href="" class="footer__link">About us</a></li>
                <li class="footer__list"><a href="" class="footer__link">Carrers</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-6 col-12">
            <div class="footer__menu">
              <h4 class="footer__nav-title footer__nav-title--dash footer__nav-title--dash-red">MY ACCOUNT</h4>
              <ul class="footer__nav">
                <li class="footer__list"><a href="" class="footer__link">Search Terms</a></li>
                <li class="footer__list"><a href="" class="footer__link">Advanced Search</a></li>
                <li class="footer__list"><a href="" class="footer__link">Helps & Faqs</a></li>
                <li class="footer__list"><a href="" class="footer__link">Store Location</a></li>
                <li class="footer__list"><a href="" class="footer__link">Orders & Returns</a></li>
                <li class="footer__list"><a href="" class="footer__link">Deliveries</a></li>
                <li class="footer__list"><a href="" class="footer__link">Refund & Returns</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-6 col-12">
            <div class="footer__menu">
              <h4 class="footer__nav-title footer__nav-title--dash footer__nav-title--dash-red">OPENING TIME</h4>
              <ul class="footer__nav">
                <li class="footer__list">Mon - Fri: 8AM - 10PM</li>
                <li class="footer__list">Sat: 9AM-8PM</li>
                <li class="footer__list">Suns: 14hPM-18hPM</li>
                <li class="footer__list">Mon - Fri: 8AM - 10PM</li>
                <li class="footer__list">We Work All The Holidays</li>
                <li class="footer__list"><a href="" class="footer__link font--bold">Download our app</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div> <!-- End Footer Top Section -->
      <!-- Start Footer Bottom Section --> 
      <div class="footer__bottom">
        <div class="row">
          <div class="col-lg-12 col-md-6 col-12">
            <!-- Start Footer Copyright Text -->
            <div class="footer__copyright-text">
                <p class="text-center">Copyright &copy; <a href="#">FreshMart</a>. All Rights Reserved</p>
            </div> <!-- End Footer Copyright Text -->
          </div>
        </div>
      </div> <!-- End Footer Bottom Section --> 
    </div>
  </footer> <!-- ::::::  End  Footer ::::::  -->
    
  <!-- material-scrolltop button -->
  <button class="material-scrolltop" type="button"></button>

  <!-- Start Modal Add cart -->
  <div class="modal fade" id="modalAddCart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col text-right">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"> <i class="fal fa-times"></i></span>
              </button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-4">
                        <div class="modal__product-img">
                            <img class="img-fluid" src="assets/img/product/size-normal/product-home-1-img-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="link--green link--icon-left"><i class="fal fa-check-square"></i>Added to cart successfully!</div>
                        <div class="modal__product-cart-buttons m-tb-15">
                            <a href="cart.html" class="btn btn--box  btn--tiny btn--green btn--green-hover-black btn--uppercase">View Cart</a>
                            <a href="checkout.html" class="btn btn--box  btn--tiny btn--green btn--green-hover-black btn--uppercaset">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 modal__border">
              <ul class="modal__product-shipping-info">
                <li class="link--icon-left"><i class="icon-shopping-cart"></i> There Are 5 Items In Your Cart.</li>
                <li>TOTAL PRICE: <span>$187.00</span></li>
                <li><a href="#" class="btn text-underline color-green" data-dismiss="modal">CONTINUE SHOPPING</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div> <!-- End Modal Add cart -->

  <!-- Start Modal Quickview cart -->
  <div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col text-right">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"> <i class="fal fa-times"></i></span>
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="product-gallery-box m-b-60">
                  <div class="modal-product-image--large">
                    <img class="img-fluid" src="assets/img/product/gallery/gallery-large/product-gallery-large-1.jpg" alt="">
                  </div>
                </div>
              </div>
                <div class="col-md-6">
                  <div class="product-details-box">
                    <h5 class="title title--normal m-b-20">Aliquam lobortis</h5>
                    <div class="product__price">
                        <span class="product__price-del">$35.90</span>
                        <span class="product__price-reg">$31.69</span>
                    </div>
                    <ul class="product__review m-t-15">
                      <li class="product__review--fill"><i class="icon-star"></i></li>
                      <li class="product__review--fill"><i class="icon-star"></i></li>
                      <li class="product__review--fill"><i class="icon-star"></i></li>
                      <li class="product__review--fill"><i class="icon-star"></i></li>
                      <li class="product__review--blank"><i class="icon-star"></i></li>
                    </ul>
                      <div class="product__desc m-t-25 m-b-30">
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will</p>
                      </div>

                      <div class="product-var p-t-30">
                        <div class="product-quantity product-var__item d-flex align-items-center flex-wrap">
                          <span class="product-var__text">Quantity: </span>
                          <form class="modal-quantity-scale m-l-20">
                            <div class="value-button" id="modal-decrease" onclick="decreaseValueModal()">-</div>
                            <input type="number" id="modal-number" value="1" />
                            <div class="value-button" id="modal-increase" onclick="increaseValueModal()">+</div>
                          </form>
                      </div>
                      </div>
                      
                      <div class="product-links">
                        <div class="product-social m-tb-30">
                          <span>SHARE THIS PRODUCT</span>
                          <ul class="product-social-link">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                          </ul>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- End Modal Quickview cart -->


  <!-- Vendor JS Files -->
  <script src="/js/vendor/jquery-3.5.1.min.js"></script>
  <script src="/js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="/js/vendor/jquery-ui.min.js"></script>
  <script src="/js/vendor/bootstrap.bundle.min.js"></script>

  <!-- Plugins JS Files -->
  <script src="/js/plugin/slick.min.js"></script>
  <script src="/js/plugin/jquery.countdown.min.js"></script>
  <script src="/js/plugin/material-scrolltop.js"></script>
  <script src="/js/plugin/price_range_script.js"></script>
  <script src="/js/plugin/in-number.js"></script>
  <script src="/js/plugin/jquery.elevateZoom-3.0.8.min.js"></script>
  <script src="/js/plugin/venobox.min.js"></script>
  <script src="/js/plugin/jquery.waypoints.js"></script>
  <script src="/js/plugin/jquery.lineProgressbar.js"></script>

  <!-- Use the minified version files listed below for better performance and remove the files listed above -->
  <!-- <script src="/js/vendor/vendor.min.js"></script>
  <script src="/js/plugin/plugins.min.js"></script> -->

  <!-- Main js file that contents all jQuery plugins activation. -->
  <script src="/js/main.js"></script>
</body>

</html>
