<?php
  $title="Detail Transaksi";

  function rupiah ($angka) {
    $hasil = 'Rp. ' . number_format($angka, 0, ",", ".");
    return $hasil;
  }
  $temp_shipping=0;
  $temp_biaya=0;
  $total_tagihan=0;
?>  
@extends('layouts.template-user')

@section('content')

  <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
  <div class="page-breadcrumb" style="background: url('/asset/home/banner-product.webp'); background-size:cover; width:100%; height:100%; object-fit: fill;">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <ul class="page-breadcrumb__menu">
                      <li class="page-breadcrumb__nav"><a href="{{route('home')}}">Home</a></li>
                      <li class="page-breadcrumb__nav active">Transaction Detail</li>
                  </ul>
              </div>
          </div>
      </div>
  </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

  <!-- ::::::  Start  Main Container Section  ::::::  -->
  <main id="main-container" class="main-container">
    <div class="container">
      @if(session()->has('success'))
        <div class="alert alert-success mt-2">
                {{ session()->get('success') }}
            </div>
        @endif
      <div class="row">
        <!-- Start Client Shipping Address -->
        
        <div class="col-lg-7">
          <div class="section-content">
              <h5 class="section-content__title">Time Countdown</h5>
              @if($carts->proof_of_payment == null)
              <input type="text" id="temp_timeout" value="{{$carts->timeout}}">
              @endif
          </div>
          <div class="card-countdown-time m-t-40 m-b-30" style=" display:flex; align-items:center; justify-content:center;width:100%;">
            <div class="wrapper" style="user-select:none; width:100%;">
              <div class="time" style="width:100%; display:flex; align-items:center; justify-content:center; border:1px solid #E2E2E2; padding: 20px; height:200px; border-radius:6px; box-shadow:10px 10px 20px rgba(0,0,0,0.09);">
                <span class="hour" style="width:100px;text-align:center;font-size:50px; font-weight:500;">-</span>
                <span class="colon" style="width:100px;text-align:center; font-size:50px; font-weight:500;">:</span>
                <span class="minute" style="width:100px;text-align:center;font-size:50px; font-weight:500;">-</span>
                <span class="colon" style="width:100px;text-align:center; font-size:50px; font-weight:500;">:</span>
                <span class="second" style="width:100px;text-align:center; font-size:50px; font-weight:500;">-</span>
              </div>
            </div>
          </div>
          @if($carts->status == "unverified")
          @if($carts->proof_of_payment == null)
          <form action="{{route('checkout.upload.bukti_payment', $carts->id)}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-12">
                <!-- :::::::::: Start My Account Section :::::::::: -->
                <div class="my-account-area">
                  <div class="row" style="margin-bottom:20px;">
                    <div class="col-12">
                      <!-- :::::::::: Start My Account Section :::::::::: -->
                      <div class="my-account-area">
                        <div class="row">
                          <div class="col-12">
                            <div class="my-account-details account-wrapper">
                              <div class="row">
                                <div class="col-12">
                                  <h4 class="account-title">Form Input Bukti Pembayaran</h4>
                                </div>
                              </div>
                              <div class="account-details" style="margin-top:20px;">
                                <hr>
                                <div class="col-md-12">
                                  <div class="form-box__single-group">
                                  <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                                  </div>
                                </div>
                                <hr>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- :::::::::: End My Account Section :::::::::: -->
                    </div>
                  </div>
                </div><!-- :::::::::: End My Account Section :::::::::: -->
              </div>
            </div>
            <div class="text-center">
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn--small btn--radius  btn--green btn--uppercase font--bold" style="width:100%;">Upload Bukti Pembayaran</button>
                </div>
              </div>
            </div> 
          </form>
          @else
          <div class="row">
            <div class="col-12">
              <!-- :::::::::: Start My Account Section :::::::::: -->
              <div class="my-account-area">
                <div class="row" style="margin-bottom:20px;">
                  <div class="col-12">
                    <!-- :::::::::: Start My Account Section :::::::::: -->
                    <div class="my-account-area">
                      <div class="row">
                        <div class="col-12">
                          <div class="my-account-details account-wrapper">
                            <div class="row">
                              <div class="col-12">
                                <h4 class="account-title">Bukti Pembayaran yang Anda Upload</h4>
                              </div>
                            </div>
                            <div class="account-details" style="margin-top:20px;">
                              <hr>
                              <div class="col-md-12">
                                <img src="/asset/payment/{{$carts->proof_of_payment}}" alt="" style="width:100%; height:200px;">
                              </div>
                              <hr>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!-- :::::::::: End My Account Section :::::::::: -->
                  </div>
                </div>
              </div><!-- :::::::::: End My Account Section :::::::::: -->
            </div>
          </div>
          <div class="text-center">
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn--small btn--radius  btn--green btn--uppercase font--bold" style="width:100%;">Admin akan mengecek bukti pembayaran Anda</button>
              </div>
            </div>
          </div> 
          @endif
          @elseif($carts->status == "cancelled")
          <div class="text-center">
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn--small btn--radius  btn--black btn--uppercase font--bold" style="width:100%;color:#fff;">Transaction Telah Di-Cancelled</button>
              </div>
            </div>
          </div>
          @elseif($carts->status == "expired")
          <div class="text-center">
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn--small btn--radius  btn--black btn--uppercase font--bold" style="width:100%;color:#fff;">Expired Transaction</button>
              </div>
            </div>
          </div>
          @elseif($carts->status == "verified") 
          <div class="text-center">
            <div class="row">
              <div class="col-12">
                <!-- :::::::::: Start My Account Section :::::::::: -->
                <div class="my-account-area">
                  <div class="row">
                    <div class="col-12">
                      <div class="my-account-details account-wrapper">
                        <div class="row">
                          <div class="col-12">
                            <h4 class="account-title">Bukti Pembayaran yang Anda Upload</h4>
                          </div>
                        </div>
                        <div class="account-details" style="margin-top:20px;">
                          <hr>
                          <div class="col-md-12">
                            <img src="/asset/payment/{{$carts->proof_of_payment}}" alt="" style="width:100%; height:200px;">
                          </div>
                          <hr>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- :::::::::: End My Account Section :::::::::: -->
                <div class="col-12" style="margin-top:20px;">
                  <button type="submit" class="btn btn--small btn--radius  btn--green btn--uppercase font--bold" style="width:100%;color:#fff;">Pembayaran telah disetujui, barang sedang diproses</button>
                </div>
              </div>
            </div>
          </div>
          @elseif($carts->status == "delivered") 
          <div class="text-center">
            <div class="row">
              <div class="col-12">
                <!-- :::::::::: Start My Account Section :::::::::: -->
                <div class="my-account-area">
                  <div class="row">
                    <div class="col-12">
                      <div class="my-account-details account-wrapper">
                        <div class="row">
                          <div class="col-12">
                            <h4 class="account-title">Bukti Pembayaran yang Anda Upload</h4>
                          </div>
                        </div>
                        <div class="account-details" style="margin-top:20px;">
                          <hr>
                          <div class="col-md-12">
                            <img src="/asset/payment/{{$carts->proof_of_payment}}" alt="" style="width:100%; height:200px;">
                          </div>
                          <hr>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- :::::::::: End My Account Section :::::::::: -->
                <div class="col-12" style="margin-top:20px;">
                  <form action="{{ route('admin.transaksi.success',$carts->id) }}" method="POST">
                    @csrf
                      <button type="submit" onclick="return confirm('Yakin sudah menerima pesanan?')" class="btn btn--small btn--radius  btn-success btn--uppercase font--bold" style="width:100%;color:#00;">Barang sedang dikirim ke lokasi sesuai transaksi. Sudah diterima?</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
          @elseif($carts->status == "success") 
          <div class="text-center">
            <div class="row">
              <div class="col-12">
                <!-- :::::::::: Start My Account Section :::::::::: -->
                <div class="my-account-area">
                  <div class="row">
                    <div class="col-12">
                      <div class="my-account-details account-wrapper">
                        <div class="row">
                          <div class="col-12">
                            <h4 class="account-title">Bukti Pembayaran yang Anda Upload</h4>
                          </div>
                        </div>
                        <div class="account-details" style="margin-top:20px;">
                          <hr>
                          <div class="col-md-12">
                            <img src="/asset/payment/{{$carts->proof_of_payment}}" alt="" style="width:100%; height:200px;">
                          </div>
                          <hr>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- :::::::::: End My Account Section :::::::::: -->
                <div class="col-12" style="margin-top:20px;">
                  <div class="alert alert-success" role="alert" style="width:100%;">Barang telah diterima oleh costumer, Transaksi sukses</div>
                </div>
              </div>
            </div>
          </div>
          @endif
        </div> <!-- End Client Shipping Address -->
          
        <!-- Start Order Wrapper -->
        <div class="col-lg-5">
          <div class="your-order-section">
            <div class="section-content">
                <h5 class="section-content__title">Your order</h5>
            </div>
            <div class="your-order-box gray-bg m-t-40 m-b-30">
              <div class="your-order-product-info">
                <div class="your-order-top d-flex justify-content-between">
                    <h6 class="your-order-top-left font--bold">Product</h6>
                    <h6 class="your-order-top-right font--bold">Total</h6>
                </div>
                <ul class="your-order-middle">
                  @foreach($carts->transaction_details as $cart)
                  <?php 
                  $temp = 0;
                  $discount_product =[];
                  $discount_product = $cart->product->discounts->where('status_aktif', '=',0)->last();
                  if(!is_null($discount_product)){
                      $temp = $discount_product->percentage/100;
                  $harga_jual_product = $cart->product->price - ($cart->product->price*$temp);

                  }else{
                      $harga_jual_product = $cart->product->price;
                  }
                  ?>
                    <li class="d-flex justify-content-between">
                        <span class="your-order-middle-left font--semi-bold">{{$cart->product->product_name}} X {{$cart->qty}}</span>
                        <span class="your-order-middle-right font--semi-bold">{{rupiah($harga_jual_product*$cart->qty)}}</span>
                    </li>
                  @endforeach
                </ul>
                <div class="your-order-bottom d-flex justify-content-between">
                    <h6 class="your-order-bottom-left font--bold">Shipping</h6>
                    <span class="your-order-bottom-right font--semi-bold" id="input_biaya_nota">{{rupiah($carts->shipping_cost)}}</span>
                </div>
                <div class="your-order-total d-flex justify-content-between">
                    <h5 class="your-order-total-left font--bold">Total</h5>
                    <h5 class="your-order-total-right font--bold">{{rupiah($carts->total)}}</h5>
                </div>

                <div class="payment-method">
                    <div class="payment-accordion element-mrg">
                        <div class="panel-group" id="accordion">
                            <div class="panel payment-accordion">
                                <div class="panel-heading" id="method-one">
                                    <h4 class="panel-title">
                                        <a class="collapsed d-flex justify-content-between align-items-center" data-toggle="collapse" data-parent="#accordion" href="#method1" aria-expanded="false">
                                            Direct bank transfer <i class="far fa-chevron-down"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="method1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel payment-accordion">
                                <div class="panel-heading" id="method-two">
                                    <h4 class="panel-title">
                                        <a class="collapsed d-flex justify-content-between align-items-center" data-toggle="collapse" data-parent="#accordion" href="#method2" aria-expanded="false">
                                            Check payments <i class="far fa-chevron-down"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="method2" class="panel-collapse collapse" >
                                    <div class="panel-body">
                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel payment-accordion">
                                <div class="panel-heading" id="method-three">
                                    <h4 class="panel-title">
                                        <a class="collapsed d-flex justify-content-between align-items-center" data-toggle="collapse" data-parent="#accordion" href="#method3" aria-expanded="false">
                                            Cash on delivery <i class="far fa-chevron-down"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="method3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            @if($carts->status == "unverified")
            <div class="sweetalert">
              <form action="{{ route('checkout.cancelled',$carts->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn--small btn--radius  btn--black btn--green-hover-black btn--uppercase font--bold" onclick="return confirm('Yakin Ingin Cancelled Transaksi Anda?')" style="width:100%;">Cancelled Transaction</button>
              </form>
            </div>
            @endif
          </div>
        </div> <!-- End Order Wrapper -->
      </div>
      <hr style="margin-top:100px;margin-bottom:100px;">
      @if($carts->is_review == 0)
      <div class="row" style="margin-bottom:100px;">
        <h2 class="text-center">Review Product FreshMart</h2>
        <p class="text-center">Bagaimana pengalaman Anda berbelanja di ecommerce kami? <br>Tolong berikan kami review product kami untuk improve kinerja kami kedepannya...</p>
      </div>
      <style>
        .rating {
          display: inline-block;
          position: relative;
          height: 50px;
          line-height: 50px;
          font-size: 50px;
        }

        .rating label {
          position: absolute;
          top: 0;
          left: 0;
          height: 100%;
          cursor: pointer;
        }

        .rating label span{
          font-size: 30px;
        }

        .rating label:last-child {
          position: static;
        }

        .rating label:nth-child(1) {
          z-index: 5;
        }

        .rating label:nth-child(2) {
          z-index: 4;
        }

        .rating label:nth-child(3) {
          z-index: 3;
        }

        .rating label:nth-child(4) {
          z-index: 2;
        }

        .rating label:nth-child(5) {
          z-index: 1;
        }

        .rating label input {
          position: absolute;
          top: 0;
          left: 0;
          opacity: 0;
        }

        .rating label .icon {
          float: left;
          color: transparent;
        }

        .rating label:last-child .icon {
          color: #000;
        }

        .rating:not(:hover) label input:checked ~ .icon,
        .rating:hover label:hover input ~ .icon {
          color: #09f;
        }

        .rating label input:focus:not(:checked) ~ .icon:last-child {
          color: #000;
          text-shadow: 0 0 5px #09f;
        }
      </style>
      @foreach($carts->product_reviews as $dd)
      @if($dd->is_finish == 0)
      <form action="{{route('review_post', $dd->id)}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-12">
            <!-- :::::::::: Start My Account Section :::::::::: -->
            <div class="my-account-area">
              <div class="row" style="margin-bottom:20px;">
                <div class="col-12">
                    <!-- :::::::::: Start My Account Section :::::::::: -->
                    <div class="my-account-area">
                      <div class="row">
                        <div class="col-12">
                          <div class="my-account-details account-wrapper">
                          <div class="row">
                            <div class="col-4">
                              <img 
                              <?php $i=0; ?>
                              @foreach($dd->product->product_images as $gg) 
                                src="/asset/product/{{$dd->product->id}}/{{$gg->image_name}}"
                              <?php $i++; ?>
                              @endforeach alt="" style="width:100%; height:300px;">
                              <h5 class="text-center" style="margin-top:20px;">{{$dd->product->product_name}}</h5>
                            </div>
                            <div class="col-8">
                              <div class="col-12">
                                  <div class="form-box__single-group">
                                      <label for="form-name">Your Rating*</label>
                                      <div class="rating">
                                        <label>
                                          <input type="radio" name="stars" value="1" />
                                          <span class="icon">★</span>
                                        </label>
                                        <label>
                                          <input type="radio" name="stars" value="2" />
                                          <span class="icon">★</span>
                                          <span class="icon">★</span>
                                        </label>
                                        <label>
                                          <input type="radio" name="stars" value="3" />
                                          <span class="icon">★</span>
                                          <span class="icon">★</span>
                                          <span class="icon">★</span>   
                                        </label>
                                        <label>
                                          <input type="radio" name="stars" value="4" />
                                          <span class="icon">★</span>
                                          <span class="icon">★</span>
                                          <span class="icon">★</span>
                                          <span class="icon">★</span>
                                        </label>
                                        <label>
                                          <input type="radio" name="stars" value="5" />
                                          <span class="icon">★</span>
                                          <span class="icon">★</span>
                                          <span class="icon">★</span>
                                          <span class="icon">★</span>
                                          <span class="icon">★</span>
                                        </label>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-box__single-group">
                                      <label for="form-review">Your review*</label>
                                      <textarea id="form-review" rows="8" name="content" placeholder="Write a review"></textarea>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <button type="submit" class="btn btn--box btn--small btn--black btn--black-hover-green btn--uppercase font--bold m-t-30" type="submit">Submit</button>
                              </div>
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div><!-- :::::::::: End My Account Section :::::::::: -->
                </div>
              </div>
            </div><!-- :::::::::: End My Account Section :::::::::: -->
          </div>
        </div>    
      </form>
      @endif
      @endforeach
      @endif
    </div>
  </main> <!-- ::::::  End  Main Container Section  ::::::  -->

@endsection

@section('scriptjs')

<script type="text/javascript">
  var x = document.getElementById("temp_timeout");
  let launchDate = new Date(x.value).getTime();

  let timer = setInterval(tick, 1000);

  function tick(){
    let now = new Date().getTime();

    let t = launchDate - now;

    if(t > 0){
      let hours = Math.floor((t % (1000*60*60*24))/(1000*60*60));
      if(hours<10) {hours="0" + hours;}

      let mins = Math.floor((t%(1000*60*60))/(1000*60));
      if(mins<10){mins="0"+mins;}

      let secs = Math.floor((t%(1000*60))/1000);
      if(secs <10){secs= "0"+secs;}

    document.querySelector('.hour').innerText = hours;
    document.querySelector('.minute').innerText = mins;
    document.querySelector('.second').innerText = secs;


      
    }

  }
</script>
@endsection