<?php
  $title="FreshMart - Edit Diskon";
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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Admin</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
          </ol>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success mt-2">
                {{ session()->get('success') }}
            </div>
        @endif
        <!-- row -->
        <form action="{{route('admin.saveEdit.diskon',$diskon->id)}}" method="POST">
            @csrf
            <div class="mb-1">
                <label for="product name" class="form-label">Product Name</label>
            </div>
            <select class="form-control" id="product" name="product">
                @foreach($product as $p)
                    <option value={{$p->id}}> {{$p->product_name}}</option>
                @endforeach
            </select>
            <div class="mb-3 mt-2">
                <label for="product name" class="form-label">Persentage</label>
                <input type="number" class="form-control" id="persen" name="persen" value={{$diskon->percentage}}>
            </div>
            <div class="mb-3">
                <label for="product name" class="form-label">Start</label>
                <input type="date" class="form-control" id="start" name="start" value={{$diskon->start}}>
            </div>
            <div class="mb-3">
                <label for="product name" class="form-label">End</label>
                <input type="date" class="form-control" id="end" name="end" value={{$diskon->end}}>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
@endsection


    