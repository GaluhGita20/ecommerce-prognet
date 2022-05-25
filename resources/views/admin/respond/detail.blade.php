<?php
  $title="FreshMart - Product";
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Respond</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail</a></li>
          </ol>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success mt-2">
                {{ session()->get('success') }}
            </div>
        @endif
        <!-- row -->
        <div class="row">
          <div class="col-xl-12 col-xxl-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Detail Respond Admin</h4>
              </div>
              <div class="card-body">
              <form action="{{route('admin.save.respond')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="product name" class="form-label">Review User</label>
                    <textarea class="form-control" id="" name="content" rows="3" disabled style="background: #ebe8e8;">{{$respond->product_review->content}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="product name" class="form-label">Respond Admin</label>
                    <textarea class="form-control" id="" name="respond" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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


    