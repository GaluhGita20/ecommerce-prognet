<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>
  <body>

<header class="navbar navbar-dark sticky-top bg-danger flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Perpus</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-nav">
    <div class="nav-item text-nowrap">

    <form action="{{route('logout')}}" method="post">
        @csrf
      <button type="submit" class="btn-danger border:0">Sign out</button>
    </form>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{Request::is('profile')? 'active':''}}" aria-current="page" href="{{route('profile')}}">
                <span data-feather="layers"></span>
                Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('master-makanan')? 'active':''}}" aria-current="page" href="{{route('master-makanan')}}">
                <span data-feather="book"></span>
                Master Makanan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('master-kategori')? 'active':''}}" aria-current="page" href="{{route('master-kategori')}}">
                <span data-feather="book"></span>
                Master Kategori
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request::is('Menu-makanan')? 'active':'' }}" aria-current="page" href="{{route('Menu-makanan')}}">
                <span data-feather="layers"></span>
                Menu Makanan
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('master-pembeli')? 'active':''}}" aria-current="page" href="{{route('master-pembeli')}}">
                <span data-feather="layers"></span>
                Master-Pembeli
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('transaksi')? 'active':''}}" aria-current="page" href="{{route('transaksi-pemesanan')}}">
                <span data-feather="activity"></span>
                Transaksi Makanan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('detail-transaksi')? 'active':''}}" aria-current="page" href="{{route('detail-transaksi-pemesanan')}}">
                <span data-feather="activity"></span>
                Detail Transaksi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('transaksi-pembayaran')? 'active':''}}" aria-current="page" href="{{route('transaksi-pembayaran')}}">
                <span data-feather="activity"></span>
                Transaksi Pembayaran
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('report-pendapatan')? 'active':''}}" aria-current="page" href="{{route('report-pendapatan')}}">
                <span data-feather="bar-chart"></span>
                Reports Pendapatan 
                </a>
            </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('content')
    </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="js/dashboard.js"></script>
  </body>

</html>
