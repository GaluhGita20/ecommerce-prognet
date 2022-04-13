<div class="col-lg-12">
  <div class="card">
    <div class="card-search" style="padding-top:1.5rem; padding-right: 1.875rem; padding-bottom: 1.25 rem; padding-left:1.875rem; position: relative; align-items: center;">
      <div class="form-group">
        <input type="text" wire:model="searchProduct" class="form-control"  placeholder="Search data product">
      </div>
    </div>
    <div class="card-header">
        <h4 class="card-title">Table Diskon</h4>
        <a href="{{route('admin.add.diskon')}}"><div class="btn btn-primary">+ Add Data Diskon</div></a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-responsive-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Product</th>
              <th>Persentage</th>
              <th>Start</th>
              <th>End</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @if($products->count()== 0)
            <tr class="text-center">
              <td colspan="10">Theres no product found on  database</td>
            </tr>
          @endif
          @foreach($products as $product)
          <tr>
            <td scope="row">{{$loop->index+1+($products->currentPage()-1)*5}}</td>
            <td colspan="1">{{$product->product_name}}</td>
            <td colspan="1">{{$product->percentage}}</td>
            <td colspan="1">{{$product->start}}</td>
            <td colspan="1">{{$product->end}}</td>
            <td>
              <div>
                <a type="button" class="btn btn-primary" href="{{route('admin.detail.diskon',$product->id)}}">Detail</a>
                <a type="button" class="btn btn-warning" href="{{route('admin.edit.diskon',$product->id)}}">Edit</a>
                <form action="{{ route('admin.delete.diskon',$product->id) }}" method="post">
                  @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </td>
          </tr>
          @endforeach
          </tbody>
        </table>
        <style>
          nav .flex.justify-between.flex-1{
            display:none;
          }
          .w-5.h-5{
            width:50px;
          }
          </style>
        {{$products->links()}}
      </div>
    </div>
  </div>
</div>

<?php
  $title="PROGNET - TRANSAKSI SIMPANAN";

  function rupiah ($angka) {
    $hasil = 'Rp ' . number_format($angka, 0, ",", ".");
    return $hasil;
  }
?>