<?php
  $title="Checkout";


?>  
@extends('layouts.template-user')

@section('content')

  <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
  <div class="page-breadcrumb" style="background: url('/asset/home/banner-product.webp'); background-size:cover; width:100%; height:100%; object-fit: fill;">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <ul class="page-breadcrumb__menu">
                      <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                      <li class="page-breadcrumb__nav active">Checkout</li>
                  </ul>
              </div>
          </div>
      </div>
  </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

  <!-- ::::::  Start  Main Container Section  ::::::  -->
  <main id="main-container" class="main-container">
    <div class="container">
      @livewire('billing-details')
    </div>
  </main> <!-- ::::::  End  Main Container Section  ::::::  -->


@endsection

@section('scriptjs')

@endsection