<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- bootstrap 4.3.1 -->
  <link rel="stylesheet" href="/css/auth/bootstrap.min.css">
  <!-- styles -->
  <link rel="stylesheet" href="/css/auth/forum.css">
  <!-- Favicon -->
  <link rel="shortcut icon" href="/asset/logo/logo freshmart.png" type="image/png">
  <title>Ecommerce | FreshMart</title>
</head>
<body>

  

  <!-- LANDING -->
  <div class="landing">
    <!-- LANDING DECORATION -->
    <div class="landing-decoration"></div>
    <!-- /LANDING DECORATION -->

    

    <!-- LANDING INFO -->
    <div class="landing-info">
      <!-- LOGO -->
      <div class="logo">
        <!-- ICON LOGO AyoBisa-->
        <!-- <svg class="icon-logo-vikinger">
          <use xlink:href="#svg-logo-vikinger"></use>
        </svg> -->
        <!-- /ICON LOGO AyoBisa -->
      </div>
      <!-- /LOGO -->

      

      <!-- LANDING INFO PRETITLE -->
      <h2 class="landing-info-pretitle">Welcome to</h2>
      <!-- /LANDING INFO PRETITLE -->

      <!-- LANDING INFO TITLE -->
      <h1 class="landing-info-title">FreshMart</h1>
      <!-- /LANDING INFO TITLE -->

      <!-- LANDING INFO TEXT -->
      <p class="landing-info-text">Toko online berbelanja sayur segar &amp; melalui FreshMart pelanggan dapat memesan sayur segar organik yang bersumber langsung dari petani dan produsen serta pemasok!</p>
      <!-- /LANDING INFO TEXT -->

      <!-- TAB SWITCH -->
      <div class="tab-switch">
        <!-- TAB SWITCH BUTTON -->
        <a href="{{Route('login')}}"><p class="tab-switch-button login-register-form-trigger {{ (request()->segment(1)=='login') ? 'active' : '' }}">Login</p></a>
        <!-- /TAB SWITCH BUTTON -->

        <!-- TAB SWITCH BUTTON -->
        <a href="{{Route('register')}}"><p class="tab-switch-button login-register-form-trigger {{ (request()->segment(1)=='register') ? 'active' : '' }} ">Register</p></a>
        <!-- /TAB SWITCH BUTTON -->
      </div>
      <!-- /TAB SWITCH -->
    </div>
    <!-- /LANDING INFO -->

    <!-- LANDING FORM -->
    <div class="landing-form">
      <!-- FORM BOX -->
      <div class="form-box login-register-form-element" style="box-shadow: 2px 3px 4px 4px rgba(0,0,0,0.3);">
      
        <!-- FORM BOX DECORATION -->
        <img class="form-box-decoration overflowing" src="../asset/landing/rocket.png" alt="rocket">
        <!-- /FORM BOX DECORATION -->

        <!-- FORM BOX TITLE -->
        <h2 class="form-box-title">Account Login</h2>
        <!-- /FORM BOX TITLE -->

        <!-- FORM -->
        <form class="form" action="{{ route('login_proses') }}" method="post">
            @csrf
            @if(session()->has('success'))
            <div class="alert alert-success">
                    {{ session()->get('success') }}
            </div>
            @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif
          <!-- FORM ROW -->
          <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- FORM INPUT -->
              <div class="form-input">
                <label for="login-username">Email</label>
                <input type="text" id="login-username" name="email"  class="form-control @error ('email') is-invalid @enderror" value="{{ old('email') }}">
                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
              </div>
              <!-- /FORM INPUT -->
            </div>
            <!-- /FORM ITEM -->
          </div>
          <!-- /FORM ROW -->
    
          <!-- FORM ROW -->
          <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- FORM INPUT -->
              <div class="form-input">
                <label for="login-password">Password</label>
                <input type="password" id="login-password" name="password" class="form-control @error ('password') is-invalid @enderror" value="{{old('password')}}">
                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
              </div>
              <!-- /FORM INPUT -->
            </div>
            <!-- /FORM ITEM -->
          </div>
          <!-- /FORM ROW -->
    
          <!-- FORM ROW -->
          <div class="form-row space-between">
            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- CHECKBOX WRAP -->
              <div class="checkbox-wrap">
                <input type="checkbox" id="login-remember" name="login_remember" checked>
                <!-- CHECKBOX BOX -->
                <div class="checkbox-box">
                  <!-- ICON CROSS -->
                  <svg class="icon-cross">
                    <use xlink:href="#svg-cross"></use>
                  </svg>
                  <!-- /ICON CROSS -->
                </div>
                <!-- /CHECKBOX BOX -->
                <label for="login-remember">Remember Me</label>
              </div>
              <!-- /CHECKBOX WRAP -->
            </div>
            <!-- /FORM ITEM -->
    
            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- FORM LINK -->
              <a class="form-link" href="{{ route('password.request') }}">Forgot Password?</a>
              <!-- /FORM LINK -->
            </div>
            <!-- /FORM ITEM -->
          </div>
          <!-- /FORM ROW -->
    
          <!-- FORM ROW -->
          <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- BUTTON -->
              <button type="submit" class="button medium secondary">Login to your Account!</button>
              <!-- /BUTTON -->
            </div>
            <!-- /FORM ITEM -->
          </div>
          <!-- /FORM ROW -->
        </form>
        <!-- /FORM -->
    
        <!-- LINED TEXT -->
        <p class="lined-text">Login with your Social Account</p>
        <!-- /LINED TEXT -->
    
        <!-- SOCIAL LINKS -->
        <div class="social-links">
          <!-- SOCIAL LINK -->
          <a class="social-link facebook" href="#">
            <!-- ICON FACEBOOK -->
            <svg class="icon-facebook">
              <use xlink:href="#svg-facebook"></use>
            </svg>
            <!-- /ICON FACEBOOK -->
          </a>
          <!-- /SOCIAL LINK -->
    
          <!-- SOCIAL LINK -->
          <a class="social-link twitter" href="#">
            <!-- ICON TWITTER -->
            <svg class="icon-twitter">
              <use xlink:href="#svg-twitter"></use>
            </svg>
            <!-- /ICON TWITTER -->
          </a>
          <!-- /SOCIAL LINK -->
    
          <!-- SOCIAL LINK -->
          <a class="social-link twitch" href="#">
            <!-- ICON TWITCH -->
            <svg class="icon-twitch">
              <use xlink:href="#svg-twitch"></use>
            </svg>
            <!-- /ICON TWITCH -->
          </a>
          <!-- /SOCIAL LINK -->
    
          <!-- SOCIAL LINK -->
          <a class="social-link youtube" href="#">
            <!-- ICON YOUTUBE -->
            <svg class="icon-youtube">
              <use xlink:href="#svg-youtube"></use>
            </svg>
            <!-- /ICON YOUTUBE -->
          </a>
          <!-- /SOCIAL LINK -->
        </div>
        <!-- /SOCIAL LINKS -->
      </div>
      <!-- /FORM BOX -->
    </div>
    <!-- /LANDING FORM -->
  </div>
  <!-- /LANDING -->

<!-- app -->
<script src="/js/auth/utils/app.js"></script>
<!-- XM_Plugins -->
<script src="/js/auth/vendor/xm_plugins.min.js"></script>
<!-- form.utils -->
<script src="/js/auth/form/form.utils.js"></script>
<!-- landing.tabs -->
<script src="/js/auth/landing/landing.tabs.js"></script>
<!-- SVG icons -->
<script src="/js/auth/utils/svg-loader.js"></script>
</body>
</html>