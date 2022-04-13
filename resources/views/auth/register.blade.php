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
  <link rel="shortcut icon" href="../asset/logo/logo_black.png">
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
      <div class="form-box login-register-form-element">
        <!-- FORM BOX DECORATION -->
        <img class="form-box-decoration" src="/asset/landing/rocket.png" alt="rocket">
        <!-- /FORM BOX DECORATION -->

        <!-- FORM BOX TITLE -->
        <h2 class="form-box-title">Create your Account!</h2>
        <!-- /FORM BOX TITLE -->
    
        <!-- FORM -->
        <form class="form" method="POST" action="{{ route('register_proses') }}">
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
                <label for="email">Your Email</label>
                <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" >
                @error('email')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
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
                <label for="name">Username</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
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
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
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
                <label for="password-confirm">Repeat Password</label>
                <input type="password" id="password-confirm" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
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
              <!-- BUTTON -->
              <button type="submit" class="button medium primary">Register Now!</button>
              <!-- /BUTTON -->
            </div>
            <!-- /FORM ITEM -->
          </div>
          <!-- /FORM ROW -->
        </form>
        <!-- /FORM -->
    
        <!-- FORM TEXT -->
        <p class="form-text">You'll receive a confirmation email in your inbox with a link to activate your account. If you have any problems, <a href="#">contact us</a>!</p>
        <!-- /FORM TEXT -->
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