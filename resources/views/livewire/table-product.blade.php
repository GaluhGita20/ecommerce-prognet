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
            <td colspan="1">
              <div id="half-stars-example">
                <div class="rating-group">                      
                  <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                  <input class="rating__input rating__input--none" name="rating2" <?php if($product->product_rate>=0 && $product->product_rate<0.5): ?>
                    checked="checked"
                  <?php endif ?>id="rating2-0" value="0" type="radio" >
                  <label aria-label="0.5 stars" class="rating__label rating__label--half" for="rating2-05"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                  <input class="rating__input" name="rating2" <?php if($product->product_rate>=0.5 && $product->product_rate<1): ?>
                    checked="checked"
                  <?php endif ?> id="rating2-05" value="0.5" type="radio">
                  <label aria-label="1 star" class="rating__label" for="rating2-10"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                  <input class="rating__input" name="rating2" <?php if($product->product_rate>=1 && $product->product_rate<1.5): ?>
                    checked="checked"
                  <?php endif ?> id="rating2-10" value="1" type="radio">
                  <label aria-label="1.5 stars" class="rating__label rating__label--half" for="rating2-15"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                  <input class="rating__input" name="rating2" <?php if($product->product_rate>=1.5 && $product->product_rate<2): ?>
                    checked="checked"
                  <?php endif ?> id="rating2-15" value="1.5" type="radio">
                  <label aria-label="2 stars" class="rating__label" for="rating2-20"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                  <input class="rating__input" name="rating2" <?php if($product->product_rate>=2 && $product->product_rate<2.5): ?>
                    checked="checked"
                  <?php endif ?> id="rating2-20" value="2" type="radio">
                  <label aria-label="2.5 stars" class="rating__label rating__label--half" for="rating2-25"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                  <input class="rating__input" name="rating2" <?php if($product->product_rate>=2.5 && $product->product_rate<3): ?>
                    checked="checked"
                  <?php endif ?> id="rating2-25" value="2.5" type="radio">
                  <label aria-label="3 stars" class="rating__label" for="rating2-30"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                  <input class="rating__input" name="rating2" <?php if($product->product_rate>=3 && $product->product_rate<3.5): ?>
                    checked="checked"
                  <?php endif ?> id="rating2-30" value="3" type="radio">
                  <label aria-label="3.5 stars" class="rating__label rating__label--half" for="rating2-35"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                  <input class="rating__input" name="rating2" <?php if($product->product_rate>=3.5 && $product->product_rate<4): ?>
                    checked="checked"
                  <?php endif ?> id="rating2-35" value="3.5" type="radio">
                  <label aria-label="4 stars" class="rating__label" for="rating2-40"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                  <input class="rating__input" name="rating2" <?php if($product->product_rate>=4 && $product->product_rate<4.5): ?>
                    checked="checked"
                  <?php endif ?> id="rating2-40" value="4" type="radio">
                  <label aria-label="4.5 stars" class="rating__label rating__label--half" for="rating2-45"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                  <input class="rating__input" name="rating2" <?php if($product->product_rate>=4.5 && $product->product_rate<5): ?>
                    checked="checked"
                  <?php endif ?>id="rating2-45" value="4.5" type="radio">
                  <label aria-label="5 stars" class="rating__label" for="rating2-50"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                  <input class="rating__input" name="rating2" <?php if($product->product_rate==5): ?>
                    checked="checked"
                  <?php endif ?> id="rating2-50" value="5" type="radio" style="pointer-events:none"> 
                </div>
              </div>
              </td>
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