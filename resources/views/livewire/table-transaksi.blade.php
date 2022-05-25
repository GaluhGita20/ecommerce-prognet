<div class="col-lg-12">
  <div class="card">
    <div class="card-search" style="padding-top:1.5rem; padding-right: 1.875rem; padding-bottom: 1.25 rem; padding-left:1.875rem; position: relative; align-items: center;">
      <div class="form-group">
        <select class="form-control" id="product" wire:model="searchProduct" name="product">
          <option value="all">All</option>
          <option value="unverified" selected>Unverified</option>
          <option value="verified">Verified</option>
          <option value="delivered">Delivery</option>
          <option value="success">Success</option>
          <option value="expired">Expired</option>
        </select>
      </div>
    </div>
    <div class="card-header">
        <h4 class="card-title">Table Transaction</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-responsive-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Costumer</th>
              <th>Lokasi</th>
              <th>Total</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @if($trxs->count()== 0)
            <tr class="text-center">
              <td colspan="10">Theres no product transaction on  database</td>
            </tr>
          @endif
          @foreach($trxs as $trx)
          <tr>
            <td colspan="1" style="text-center">{{ \Carbon\Carbon::parse($trx->created_at)->diffForHumans() }}</td>
            <td colspan="1">{{$trx->user->name}}</td>
            <td colspan="1">{{$trx->regency}} ( {{$trx->province}} )</td>
            <td colspan="1"><?php echo rupiah($trx->total) ?></td>
            <td colspan="1">{{$trx->status}}</td>
            <td>
              <div class="d-flex">
                <a href="{{route('admin.transaksi.detail',$trx->id)}}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-file"></i></a>
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
        {{$trxs->links()}}
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