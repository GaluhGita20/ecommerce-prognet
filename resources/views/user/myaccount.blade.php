<?php
  $title="My Profile";

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
              <li class="page-breadcrumb__nav active">My Profile</li>
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
        <div class="col-12">
          <!-- :::::::::: Start My Account Section :::::::::: -->
          <div class="my-account-area">
            <div class="row">
              <div class="col-8">
                <form action="{{route('myprofile.update')}}" method="POST"  enctype="multipart/form-data">
                  @csrf
                  <!-- :::::::::: Start My Account Section :::::::::: -->
                  <div class="my-account-area">
                    <div class="row">
                      <div class="col-12">
                        <div class="my-account-details account-wrapper">
                          <h4 class="account-title">Profile Details</h4>
                          <div class="account-details">
                            <div class="row">
                                <div class="col-md-12">
                                  <div class="form-box__single-group">
                                      <label for="form-address-1">Name</label>
                                      <input type="text" name="name" value="{{$user->name}}" placeholder="Masukkan nama Anda">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-box__single-group">
                                      <label for="form-address-1">Email</label>
                                      <input type="email" name="email" value="{{$user->email}}" placeholder="Masukkan email Anda" readonly>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-box__single-group">
                                      <label for="form-address-1">No. Telepon</label>
                                      <input type="text" name="no_telp" value="{{$user->no_telp}}" placeholder="Masukkan no. telp Anda">
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-box__single-group">
                                      <label for="form-address-1">Alamat</label>
                                      <textarea  id="form-additional-info" rows="5" name="alamat" placeholder="Masukkan alamat Anda">{{$user->alamat}}</textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-box__single-group">
                                      <label for="form-address-1">Joined At</label>
                                      <input type="text" name="join" value="{{$user->created_at}}" readonly>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-box__single-group">
                                      <button type="submit" class="btn btn--box btn--radius btn--small btn--black btn--black-hover-green btn--uppercase font--bold">Save Change</button>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div><!-- :::::::::: End My Account Section :::::::::: -->
                </form>
              </div>
              <div class="col-4">
                <form action="{{route('myprofile.update.photo')}}" method="POST"  enctype="multipart/form-data">
                  @csrf
                  <div class="my-account-details account-wrapper">
                    <h4 class="account-title">Foto Profil User</h4>
                    <div class="account-details">
                      <div class="row">
                        <div class="product__box product__default--single text-center">
                          <!-- Start Product Image -->
                          <div class="product__img-box  pos-relative">
                              <a href="javascript:void(0);" class="product__img--link">
                                @if(is_null($user->profile_image) || $user->profile_image == "")
                                <img class="product__img img-fluid" style="width:268px; height:268px;" src="/asset/users/default-photo-profile.jpg"alt="">
                                @else
                                <img class="product__img img-fluid" style="width:268px; height:268px;" src="/asset/users/{{$user->id}}/{{$user->profile_image}}"alt="">
                                @endif
                              </a>         
                          </div> <!-- End Product Image -->
                        </div> <!-- End Single Default Product -->
                        <hr style="margin-top:40px;">
                        <div class="col-md-12">
                          <div class="form-box__single-group">
                              <label for="form-address-1">Update Photo Profil</label>
                              <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                          </div>
                        </div>
                        <hr style="margin-top:30px;">
                        <div class="col-md-12">
                          <div class="form-box__single-group">
                              <button type="submit" class="btn btn--box btn--radius btn--small btn--black btn--black-hover-green btn--uppercase font--bold">Update Photo</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div><!-- :::::::::: End My Account Section :::::::::: -->
        </div>
      </div>
    </div>
  </main> <!-- ::::::  End  Main Container Section  ::::::  -->

@endsection