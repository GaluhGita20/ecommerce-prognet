
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
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://www.iip-bumn.org/site/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="../css/vendor/jquery-ui.min.css">
  <link rel="stylesheet" href="../css/vendor/fontawesome.css">
  <link rel="stylesheet" href="../css/vendor/plaza-icon.css">
  <link rel="stylesheet" href="../css/vendor/bootstrap.min.css">
  
  <!-- Plugin CSS Files -->
  <link rel="stylesheet" href="../css/plugin/slick.css">
  <link rel="stylesheet" href="../css/plugin/material-scrolltop.css">
  <link rel="stylesheet" href="../css/plugin/price_range_style.css">
  <link rel="stylesheet" href="../css/plugin/in-number.css">
  <link rel="stylesheet" href="../css/plugin/venobox.min.css">
  <link rel="stylesheet" href="../css/plugin/jquery.lineProgressbar.css">

  <!-- Use the minified version files listed below for better performance and remove the files listed above -->
  <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css"/>
  <link rel="stylesheet" href="assets/css/plugin/plugins.min.css"/>
  <link rel="stylesheet" href="assets/css/main.min.css"> -->

  <!-- Main Style CSS File -->
  
  <link rel="stylesheet" href="../css/main.css">
  
  @livewireStyles
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
                      <a @if(Auth::guest()) href="{{Route('belanja.general')}}" @else href="{{Route('shop.general')}}" @endif class="header__nav-link">Shop</a>
                      <span class="menu-label menu-label--red">New</span>
                    </li> <!-- End Single Nav link-->

                    <!--Start Single Nav link-->
                    <li class="header__nav-item pos-relative">
                      <a href="#" class="header__nav-link">Blog</a>
                    </li> <!-- End Single Nav link-->

                    <!--Start Single Nav link-->
                    <li class="header__nav-item pos-relative">
                        <a href="#" class="header__nav-link">My Account<i class="fal fa-chevron-down"></i></a>
                        <!--Single Dropdown Menu-->
                        <ul class="dropdown__menu pos-absoluted" style="position:absolute;">
                            <li class="dropdown__list"><a @if(Auth::guest()) href="#modalLoginDulu" data-toggle="modal" @else href="{{Route('myprofile')}}" @endif class="dropdown__link">My Profile</a></li>
                            <li class="dropdown__list"><a @if(Auth::guest()) href="#modalLoginDulu" data-toggle="modal" @else href="{{Route('cart.index')}}" @endif  class="dropdown__link">Cart</a></li>   
                            <li class="dropdown__list"><a @if(Auth::guest()) href="#modalLoginDulu" data-toggle="modal" @else href="{{Route('mytransaction')}}" @endif  class="dropdown__link">My List Trasaction</a></li>  
                        </ul>
                        <!--Single Dropdown Menu-->
                    </li> <!-- Start Single Nav link-->

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
                      <a @if(Auth::guest()) href="#modalLoginDulu" data-toggle="modal" @else href ="#offcanvas-add-cart__box" @endif class="offcanvas-toggle">
                          <i class="icon-shopping-cart"></i>
                          <!-- <span class="wishlist-item-count pos-absolute">3</span> -->
                          <!-- <span class="wishlist-item-count pos-absolute"></span> -->
                      </a>
                  </li> <!-- End Header Add Cart Box -->
                  
                  @if(!Auth::guest())
                  @livewire('user-notification')
                  @endif
                  <!-- Start Header Wishlist Box -->
                  <li>
                      <a href="{{Route('myprofile')}}">
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
                            <a @if(Auth::guest()) href="#modalLoginDulu" data-toggle="modal" @else href ="#offcanvas-add-cart__box" @endif class="offcanvas-toggle">
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

    @livewire('component-popup-cart')

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

  @livewire('quick-add-cart')

  @livewire('quick-view-product')

  @livewire('component-popup-login-register')
    
  <!-- material-scrolltop button -->
  <button class="material-scrolltop" type="button"></button>  

  <!-- Vendor JS Files -->
  <script src="../js/vendor/jquery-3.5.1.min.js"></script>
  <script src="../js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="../js/vendor/jquery-ui.min.js"></script>
  <script src="../js/vendor/bootstrap.bundle.min.js"></script>

  <!-- Plugins JS Files -->
  <script src="../js/plugin/slick.min.js"></script>
  <script src="../js/plugin/jquery.countdown.min.js"></script>
  <script src="../js/plugin/material-scrolltop.js"></script>
  <script src="../js/plugin/price_range_script.js"></script>
  <script src="../js/plugin/in-number.js"></script>
  <script src="../js/plugin/jquery.elevateZoom-3.0.8.min.js"></script>
  <script src="../js/plugin/venobox.min.js"></script>
  <script src="../js/plugin/jquery.waypoints.js"></script>
  <script src="../js/plugin/jquery.lineProgressbar.js"></script>

  <!-- Use the minified version files listed below for better performance and remove the files listed above -->
  <!-- <script src="/js/vendor/vendor.min.js"></script>
  <script src="/js/plugin/plugins.min.js"></script> -->

  <!-- Main js file that contents all jQuery plugins activation. -->
  <script src="../js/main.js"></script>
  <script>
    $(document).ready(function()
    {
        function refresh()
        {
            var div = $('.reload-notif'),
                divHtml = div.html();

            div.html(divHtml);
        }

        setInterval(function()
        {
            refresh()
        }, 3000                                    ); //300000 is 5minutes in ms
        
    })

  </script>

  @livewireScripts
  @yield('scriptjs')
  

</body>

</html>
