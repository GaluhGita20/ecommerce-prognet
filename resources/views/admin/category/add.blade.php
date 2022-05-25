<?php
  $title="FreshMart - Category";
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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Category</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add</a></li>
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
                <h4 class="card-title">Form Data Product</h4>
              </div>
              <div class="card-body">
                <form action="{{route('admin.save.category')}}" method="POST"  enctype="multipart/form-data" id="step-form-horizontal" >
                    @csrf
                    <div class="mb-3">
                        <label for="product name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="category" name="category">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="gambar">Image</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
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


    