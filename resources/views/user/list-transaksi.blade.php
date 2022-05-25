<?php
  $title="My List Transaksi";

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
  <div class="page-breadcrumb" style="background:url(../asset/home/myaccount.webp);width:100%;background-size:cover;">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <ul class="page-breadcrumb__menu">
              <li class="page-breadcrumb__nav"><a href="{{route('home')}}">Home</a></li>
              <li class="page-breadcrumb__nav active">My Transactions</li>
          </ul>
        </div>
      </div>
    </div>
  </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

  <style>
    .my-account-area a:hover{
      color:#000;
    }
  </style>
  <!-- ::::::  Start  Main Container Section  ::::::  -->
  <main id="main-container" class="main-container">
    <div class="container">
      @if(session()->has('success'))
      <div class="alert alert-success mt-2">
              {{ session()->get('success') }}
          </div>
      @endif
      @foreach($trxs as $trx)
      <div class="row">
        <div class="col-12">
          <!-- :::::::::: Start My Account Section :::::::::: -->
          <div class="my-account-area">
            <a class="product__img--link" href="{{route('checkout.detail', $trx->id)}}">
              <div class="row" style="margin-bottom:20px;">
                <div class="col-12">
                    <!-- :::::::::: Start My Account Section :::::::::: -->
                    <div class="my-account-area">
                      <div class="row">
                        <div class="col-12">
                          <div class="my-account-details account-wrapper">
                            <div class="row">
                              <div class="col-8">
                                @if($trx->status == "unverified")
                                <h4 class="account-title">Menunggu Pembayaran</h4>
                                @elseif($trx->status == "verified")
                                <h4 class="account-title">Pembayaran Disetujui</h4>
                                @elseif($trx->status == "delivered")
                                <h4 class="account-title">Sedang Dikirim</h4>
                                @elseif($trx->status == "success")
                                <h4 class="account-title">Transaksi Berhasil</h4>
                                @elseif($trx->status == "expired")
                                <h4 class="account-title">Transaksi Expired Pembayaran</h4>
                                @elseif($trx->status == "cancelled")
                                <h4 class="account-title">Transaksi Cancelled</h4>
                                @elseif($trx->status == "ditolak")
                                <h4 class="account-title">Pembayaran Ditolak oleh Admin</h4>
                                @endif

                              </div>
                              <div class="col-4">
                                <p class="account-title" style="float:right;">{{ \Carbon\Carbon::parse($trx->created_at)->diffForHumans() }}</p>
                              </div>
                            </div>
                            
                            <div class="account-details" style="margin-top:20px;">
                              <hr>
                              <div class="row">
                                  <div class="col-md-12">
                                    <div class="row">
                                      <div class="col-4">
                                        <div class="form-box__single-group" style="margin-top:0px;">
                                            <label for="form-address-1">Pengiriman</label>
                                        </div>
                                      </div>
                                      <div class="col-8">
                                        <div class="form-box__single-group" style="margin-top:0px;">
                                            <label for="form-address-1">: Denpasar (Bali) ke {{$trx->regency}} ({{$trx->province}})</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="row">
                                      <div class="col-4">
                                        <div class="form-box__single-group" style="margin-top:0px;">
                                            <label for="form-address-1">Tanggal</label>
                                        </div>
                                      </div>
                                      <div class="col-8">
                                        <div class="form-box__single-group" style="margin-top:0px;">
                                            <label for="form-address-1">: {{$trx->created_at}}</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="row">
                                      <div class="col-4">
                                        <div class="form-box__single-group" style="margin-top:0px;">
                                            <label for="form-address-1">Shipping Cost</label>
                                        </div>
                                      </div>
                                      <div class="col-8">
                                        <div class="form-box__single-group" style="margin-top:0px;">
                                            <label for="form-address-1">: {{rupiah($trx->shipping_cost)}}</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="row">
                                      <div class="col-4">
                                        <div class="form-box__single-group" style="margin-top:0px;">
                                            <label for="form-address-1">Total</label>
                                        </div>
                                      </div>
                                      <div class="col-8">
                                        <div class="form-box__single-group" style="margin-top:0px;">
                                            <label for="form-address-1">: {{rupiah($trx->total)}}</label>
                                        </div>
                                      </div>
                                    </div>
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
            </a>
          </div><!-- :::::::::: End My Account Section :::::::::: -->
        </div>
      </div>
      @endforeach
    </div>
  </main> <!-- ::::::  End  Main Container Section  ::::::  -->


@endsection