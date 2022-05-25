<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>FreshMart | Admin Dashboard </title>
  <!-- ::::::::::::::Favicon icon::::::::::::::-->
  <link rel="shortcut icon" href="/asset/logo/logo freshmart.png" type="image/png">
	<link href="/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
  <link href="/css/admin/style.css" rel="stylesheet">
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/css/admin/star.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/rating.css">
  @livewireStyles
</head>
<body>

  <!--*******************
      Preloader start
  ********************-->
  <div id="preloader">
    <div class="sk-three-bounce">
      <div class="sk-child sk-bounce1"></div>
      <div class="sk-child sk-bounce2"></div>
      <div class="sk-child sk-bounce3"></div>
    </div>
  </div>
  <!--*******************
      Preloader end
  ********************-->

  <!--**********************************
      Main wrapper start
  ***********************************-->
  <div id="main-wrapper">
    <div class="nav-header" style="display:flex; align-items:center; justify-content:center;">
      <div class="dashboard_bar" style="font-size:30px; font-weight:600; color:#36c95f;">
        FMart
      </div>

      <div class="nav-control">
        <div class="hamburger">
          <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
      </div>
    </div>
  
    <!--**********************************
      Header start
    ***********************************-->
    <div class="header">
      <div class="header-content">
        <nav class="navbar navbar-expand">
          <div class="collapse navbar-collapse justify-content-between">
            <div class="header-left">
              <div class="dashboard_bar">
                Dashboard
              </div>
            </div>

            <ul class="navbar-nav header-right">
              @livewire('admin-notification')
              <li class="nav-item dropdown header-profile">
                <a class="nav-link" href="javascript:;" role="button" data-toggle="dropdown">
                  <img src="/admin/avatar/1.png" width="20" alt=""/>
                  <div class="header-info">
                    <span>Hello,<strong> {{Auth::guard('admin')->user()->name}}</strong></span>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="./app-profile.html" class="dropdown-item ai-icon">
                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    <span class="ml-2">Profile </span>
                  </a>
                  <a href="./email-inbox.html" class="dropdown-item ai-icon">
                    <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    <span class="ml-2">Inbox </span>
                  </a>
                  <form action="{{route('admin.logout')}}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item ai-icon">
                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                    <span class="ml-2">Logout </span>
                    </button>
                  </form>
                  
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!--**********************************
      Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="deznav">
      <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
          <li>
            <a class="ai-icon" href="{{Route('admin.home')}}" aria-expanded="false">
              <i class="flaticon-381-networking"></i>
              <span class="nav-text">Dashboard</span>
            </a>
          </li>
          <li>
            <a class="ai-icon" href="{{Route('admin.managementAdmin.index')}}" aria-expanded="false">
              <i class="flaticon-381-internet"></i>
              <span class="nav-text">User Management</span>
            </a>
          </li>
          <li>
            <a class="ai-icon" href="{{Route('admin.transaksi.index')}}" aria-expanded="false">
              <i class="flaticon-381-notepad"></i>
              <span class="nav-text">Transaksi</span>
            </a>
          </li>
          <li>
            <a class="ai-icon" href="{{Route('admin.respond.index')}}" aria-expanded="false">
              <i class="flaticon-381-heart"></i>
              <span class="nav-text">Respond Review</span>
            </a>
          </li>
          <li>
            <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
              <i class="flaticon-381-layer-1"></i>
              <span class="nav-text">Table Master</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{Route('admin.product.index')}}">Product</a></li>
                <li><a href="{{Route('admin.category.index')}}">Category</a></li>
                <li><a href="{{Route('admin.diskon.index')}}">Diskon</a></li>
                <li><a href="{{Route('admin.couriers.index')}}">Couriers</a></li>
            </ul>
          </li>
          <li>
            <a class="ai-icon" href="javascript:void()" aria-expanded="false">
              <i class="flaticon-381-controls-3"></i>
              <span class="nav-text">History</span>
            </a>
          </li>
        </ul>     
      </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->
    @yield('content')
  </div>
  <!--**********************************
      Main wrapper end
  ***********************************-->

  <!--**********************************
      Scripts
  ***********************************-->
  <!-- Required vendors -->
  <script src="/vendor/global/global.min.js"></script>
	<script src="/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="/vendor/chart.js/Chart.bundle.min.js"></script>
  <script src="/js/admin/custom.min.js"></script>
	<script src="/js/admin/deznav-init.js"></script>
	<script src="/vendor/owl-carousel/owl.carousel.js"></script>
	
	<!-- Apex Chart -->
	<script src="/vendor/apexchart/apexchart.js"></script>

  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  

  @yield('scriptjs')
	@livewireScripts
  <script>
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('admin.markNotification') }}", {
            method: 'POST',
            data: {
                _token,
                id
            }
        });
    }
    $(function() {
        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));
            request.done(() => {
                $(this).parents('div.alert').remove();
            });
        });
        $('#mark-all').click(function() {
            let request = sendMarkRequest();
            request.done(() => {
                $('div.alert').remove();
            })
        });
    });
  </script>
	
	<!-- Dashboard 1 -->
	<script src="/js/admin/dashboard/dashboard-1.js"></script>
	<!-- <script>
		function assignedDoctor()
		{
		
      /*  testimonial one function by = owl.carousel.js */
      jQuery('.assigned-doctor').owlCarousel({
        loop:false,
        margin:30,
        nav:true,
        autoplaySpeed: 3000,
        navSpeed: 3000,
        paginationSpeed: 3000,
        slideSpeed: 3000,
        smartSpeed: 3000,
        autoplay: false,
        dots: false,
        navText: ['<i class="fa fa-caret-left"></i>', '<i class="fa fa-caret-right"></i>'],
        responsive:{
          0:{
            items:1
          },
          576:{
            items:2
          },	
          767:{
            items:3
          },			
          991:{
            items:2
          },
          1200:{
            items:3
          },
          1600:{
            items:5
          }
        }
      })
    }
    
    jQuery(window).on('load',function(){
      setTimeout(function(){
        assignedDoctor();
      }, 1000); 
    });
		
	</script> -->
  
</body>
</html>