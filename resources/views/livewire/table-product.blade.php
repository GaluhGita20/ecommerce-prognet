<div class="col-lg-12">
  <div class="card">
    <div class="card-search" style="padding-top:1.5rem; padding-right: 1.875rem; padding-bottom: 1.25 rem; padding-left:1.875rem; position: relative; align-items: center;">
      <div class="form-group">
        <input type="text" wire:model="searchProduct" class="form-control"  placeholder="Search data product">
      </div>
    </div>
    <div class="card-header">
        <h4 class="card-title">Table Product</h4>
        <a href="{{route('admin.add.product')}}"><div class="btn btn-primary">+ Add Data Product</div></a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-responsive-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Product</th>
              <th>Price</th>
              <th>Product Rate</th>
              <th>Stock</th>
              <th>Weight</th>
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
            <td colspan="1"><?php echo rupiah($product->price) ?></td>
            <td colspan="1">{{$product->product_rate}}</td>
            <td colspan="1">{{$product->stock}}</td>
            <td colspan="1">{{$product->weight}}</td>
            <td>
              <div class="d-flex">
                <a href="{{route('admin.detail.product',$product->id)}}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-file"></i></a>
                <a href="{{route('admin.edit.product',$product->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                <div class="sweetalert">
                  <form action="{{ route('admin.delete.product',$product->id) }}" method="POST">
                    @csrf
                    <button type="submit" onclick="return confirm('Yakin Ingin Mengapus Data?')" class="btn btn-danger shadow btn-xs sharp sweet-success-cancel"><i class="fa fa-trash"></i></button>                 
                  </form>
                </div>
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