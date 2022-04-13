<?php
  $title="PROGNET - TRANSAKSI SIMPANAN";
?>

@extends('layouts.template-admin')
@section('content')
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
  <div class="container-fluid">
    <div class="page-titles">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{Route('admin.home')}}">Home</a></li>
      </ol>
    </div>
    <div class="row " style="width:100%; margin-left:auto; margin-right:auto">
      <div class="col-xl-4 col-lg-6 col-sm-6 col-xxl-4">
        <div class="widget-stat card">
          <div class="card-body p-4">
            <div class="media ai-icon">
              <span class="mr-3 bgl-primary text-primary">
                <i class="la la-users"></i>
              </span>
              <div class="media-body">
                <p class="mb-1">Total Nasabah</p>
                <h4 class="mb-0">155</h4>
                <span class="badge badge-primary"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-sm-6 col-xxl-4">
        <div class="widget-stat card">
          <div class="card-body p-4">
            <div class="media ai-icon">
              <span class="mr-3 bgl-warning text-warning">
                <svg id="icon-orders" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                  <polyline points="14 2 14 8 20 8"></polyline>
                  <line x1="16" y1="13" x2="8" y2="13"></line>
                  <line x1="16" y1="17" x2="8" y2="17"></line>
                  <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
              </span>
              <div class="media-body">
                <p class="mb-1">Jumlah Transaksi</p>
                <h4 class="mb-0">14</h4>
                <span class="badge badge-warning"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-sm-6 col-xxl-4">
        <div class="widget-stat card">
          <div class="card-body  p-4">
            <div class="media ai-icon">
              <span class="mr-3 bgl-danger text-danger">
                <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
                  <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                  <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                  <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                </svg>
              </span>
              <div class="media-body">
                <p class="mb-1">Bunga Terakhir Tercatat</p>

                <h4 class="mb-0">-20</h4>
                <!-- <span class="badge badge-danger">+a%</span> -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--**********************************
    Content body end
***********************************-->
@endsection

    