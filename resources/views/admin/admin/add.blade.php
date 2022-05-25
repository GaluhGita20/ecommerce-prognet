<?php
  $title="FreshMart - Diskon";
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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add</a></li>
          </ol>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success mt-2">
                {{ session()->get('success') }}
            </div>
        @endif
        <!-- row -->
        <form action="{{route('admin.save.managementAdmin')}}" method="POST">
            @csrf
            <div class="mb-1">
                <label for="role" class="form-label">Role Admin</label>
            </div>
            <select class="form-control" id="role" name="role">
                <option value="superadmin">Superadmin</option>
                <option value="office worker">Office worker</option>
                <option value="customer service">Customer service</option>
                <option value="manager">Manager</option>
            </select>
            <div class="mb-3 mt-2">
                <label for="product name" class="form-label">Name Admin</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3 mt-2">
                <label for="product name" class="form-label">Email Admin</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3 mt-2">
                <label for="product name" class="form-label">Password Admin</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
@endsection


    