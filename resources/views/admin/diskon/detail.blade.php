<?php
  $title="FreshMart - Details Diskon";
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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Diskon</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Details</a></li>
          </ol>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success mt-2">
                {{ session()->get('success') }}
            </div>
        @endif
        <!-- row -->
            @csrf
            <div class="mb-1">
                <label for="product name" class="form-label">Product Name</label>
            </div>
            <select class="form-control" id="product" name="product" disabled style="background: #ebe8e8;">
                @foreach($product as $p)
                    <option value="{{$p->id}}" readonly style="background: #ebe8e8;" >{{$p->product_name}}</option>
                @endforeach
            </select>
            <div class="mb-3 mt-2">
                <label for="product name" class="form-label">Persentage</label>
                <input type="number" class="form-control" id="persen" name="persen" value="{{$diskon->percentage}}" readonly style="background: #ebe8e8;">
            </div>
            <div class="mb-3">
                <label for="product name" class="form-label">Start</label>
                <input type="text" class="form-control" id="start" name="start" value="{{$diskon->start}}" readonly style="background: #ebe8e8;">
            </div>
            <div class="mb-3">
                <label for="product name" class="form-label">End</label>
                <input type="text" class="form-control" id="end" name="end" value="{{$diskon->end}}" readonly style="background: #ebe8e8;">
            </div>
            <a type="button" class="btn btn-primary" style="margin-top:20px;" href="{{route('admin.diskon.index')}}">back</a>
        </form>
      </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
@endsection


    