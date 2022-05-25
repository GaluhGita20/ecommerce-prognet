<div class="col-lg-12">
  <div class="card">
    <div class="card-search" style="padding-top:1.5rem; padding-right: 1.875rem; padding-bottom: 1.25 rem; padding-left:1.875rem; position: relative; align-items: center;">
      <div class="form-group">
        <select class="form-control" id="product" wire:model="searchProduct" name="product">
          <option value="all">All</option>
          <option value="0" selected>Belum direspond</option>
          <option value="1">Sudah direspond</option>
        </select>
      </div>
    </div>
    <div class="card-header">
        <h4 class="card-title">Table Respond</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-responsive-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>User</th>
              <th>Review</th>
              <th>Balasan</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @if($responds->count()== 0)
            <tr class="text-center">
              <td colspan="10">Theres no product transaction on  database</td>
            </tr>
          @endif
          @foreach($responds as $respond)
          <tr>
            <td colspan="1" style="text-center">{{$loop->index+1+($responds->currentPage()-1)*10 }}</td>
            <td colspan="1">{{$respond->product_review->user->name}}</td>
            <td colspan="1">{{$respond->product_review->content}}</td>
            <td colspan="1">
              {{$respond->content}}
            </td>
            <td colspan="1">
                @if($respond->is_finish == 1)
                <span class="badge light badge-success">Finish</span>
                @else
                <span class="badge light badge-danger">Notyet</span>
                @endif
            </td>
            <td>
              <div class="d-flex">
                <a href="{{route('admin.respond.detail',$respond->id)}}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-file"></i></a>
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