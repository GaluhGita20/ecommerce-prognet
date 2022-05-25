<?php
  $title="FreshMart - Edit Couriers";
?>

@extends('layouts.template-admin')
@section('content')
    <!--**********************************
        Content body start
    ***********************************-->
    <link rel="stylesheet" type="text/css" href="/css/admin/star.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="content-body">
      <div class="container-fluid">
        <div class="page-titles">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Couriers</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
          </ol>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success mt-2">
                {{ session()->get('success') }}
            </div>
        @endif
        <!-- row -->
        <form action="{{route('admin.save.couriers',$couriers->id)}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="product name" class="form-label">Couriers Name</label>
                <input type="text" class="form-control" id="couriers" name="couriers" value="{{$couriers->courier}}" readonly>
            </div>
            <a type="button" class="btn-primary" href="{{route('admin.couriers.index')}}">back</button>
        </form>
      </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
@endsection


    