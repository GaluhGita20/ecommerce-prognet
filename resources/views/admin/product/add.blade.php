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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Product</a></li>
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
              <form action="{{route('admin.save.product')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="product name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product" name="product">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="nominal_transaksi" name="price">
                    <p>Rp.<label class="text-label" id="real_nominal_transaksi">0</label>,00</p>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="mb-3">
                    <label for="product rate" class="form-label">Product Rate</label>
                    <div class="rating" >
                        <input type="radio" name="star" id="star1" value="5" ><label for="star1"></label>
                        <input type="radio" name="star" id="star2" value="4" ><label for="star2"></label>
                        <input type="radio" name="star" id="star3" value="3" ><label for="star3"></label>
                        <input type="radio" name="star" id="star4" value="2" ><label for="star4"></label>
                        <input type="radio" name="star" id="star5" value="1" ><label for="star5"></label>
                  </div>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock">
                </div>
                <div class="mb-3">
                    <label for="weight" class="form-label">Weight</label>
                    <input type="number" class="form-control" id="weight" name="weight">
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

    <script type="text/javascript">
      var rupiah = document.getElementById("nominal_transaksi");
      const nominalReal = document.getElementById("real_nominal_transaksi");
      rupiah.addEventListener("input", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        // nominalReal.innerHTML = this.value;
        nominalReal.innerHTML = formatRupiah(this.value);
        
      });

      /* Fungsi formatRupiah */
      function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
          split = number_string.split(","),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
          separator = sisa ? "." : "";
          rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
      }
    </script>
@endsection


    