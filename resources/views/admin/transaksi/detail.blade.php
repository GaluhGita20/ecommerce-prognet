<?php
  $title="FreshMart - Detail Product";

  function rupiah ($angka) {
    $hasil = 'Rp ' . number_format($angka, 0, ",", ".");
    return $hasil;
  }
?>

@extends('layouts.template-admin')
@section('content')
    <div class="content-body">
      <div class="container-fluid">
        <div class="page-titles">
          <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item"><a href="{{Route('admin.transaksi.index')}}">Transaction</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Product</a></li>
          </ol>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success mt-2">
                {{ session()->get('success') }}
            </div>
        @endif
        <!-- row -->
        <div class="row">
          <!-- Baris pertama -->
          <div class="col-xl-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Detail Data Transaction</h4>
              </div>
              <div class="card-body">
                <div class="basic-form">
                  <form>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Id Transaksi</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$trx->id}}" disabled style="background: #ebe8e8;">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">ID - Nama Customer</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$trx->user->id}} - {{$trx->user->name}}" disabled style="background: #ebe8e8;">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Lokasi</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$trx->regency}} ({{$trx->province}})" disabled style="background: #ebe8e8;">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Courier Service</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$trx->shipping_service}}" disabled style="background: #ebe8e8;">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Estimasi Tiba</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$trx->shipping_etd}}" disabled style="background: #ebe8e8;">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Shipping Cost</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{rupiah($trx->shipping_cost)}}" disabled style="background: #ebe8e8;">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Total</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{rupiah($trx->total)}}" disabled style="background: #ebe8e8;">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Status</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$trx->status}}" disabled style="background: #ebe8e8;">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          @if(!is_null($trx->proof_of_payment))
          <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Bukti Pembayaran User</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <img src="/asset/payment/{{$trx->proof_of_payment}}" alt="" style="width:100%;">
                  </div>
                  <div class="col-6">
                    <div class="text-center">
                    <h5 class="text-center">Update Status Transaksi</h5>
                      <hr>
                      <div class="row">
                          <div class="col-12" style="margin-top:50px;">
                            <div class="sweetalert">
                              @if($trx->status == "unverified")
                                <form action="{{ route('admin.transaksi.verifikasi',$trx->id) }}" method="POST">
                                @csrf
                                  <button type="submit" onclick="return confirm('Yakin mengverifikasi pembayaran User ini?')" class="btn btn--small btn--radius  btn-success btn--uppercase font--bold" style="width:100%;color:#00;">Pembayaran disetujui?</button>
                                </form>
                              @elseif($trx->status == "verified")
                                <form action="{{ route('admin.transaksi.delivery',$trx->id) }}" method="POST">
                                @csrf
                                  <button type="submit" onclick="return confirm('Yakin mengirim pesanan transaksi User ini?')" class="btn btn--small btn--radius  btn-success btn--uppercase font--bold" style="width:100%;color:#00;">Transaksi dikirim?</button>
                                </form>
                              @elseif($trx->status == "delivered")
                                <button type="submit" class="btn btn--small btn--radius  btn-dark btn--uppercase font--bold" style="width:100%;color:#00;">Transaksi berhasil?</button>
                              @elseif($trx->status == "success")
                                  <button type="submit" class="btn btn--small btn--radius  btn-dark btn--uppercase font--bold" style="width:100%;color:#00;">Transaksi telah success</button>
                              @endif
                            </div>
                          </div>
                      </div>
                    </div>              
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif

          <!-- Baris keempat -->
          <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                  <h4 class="card-title">List Detail Transaksi</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive recentOrderTable">
                  <table class="table verticle-middle table-responsive-md">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama Product</th> 
                            <th scope="col">Qty</th>
                            <th scope="col">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if($trx->transaction_details->count()==0)
                        <tr class="text-center">
                          <td colspan="10">Theres no transaction details found on  database</td>
                        </tr>     
                      @else
                      @foreach($trx->transaction_details as $dd)
                      <tr>
                        <td scope="row">{{$loop->index+1}}</td>
                        <td><img 
                        <?php $i=0; ?>
                        @foreach($dd->product->product_images as $gg)
                            @if($i<1)
                            src="/asset/product/{{$dd->product->id}}/{{$gg->image_name}}"
                            <?php $i=$i+1; ?>
                            @endif
                        @endforeach width="150px" height="150px" style="border-radius:0px;"></td>
                        <td colspan="1">{{$dd->product->product_name}}</td>
                        <td>{{$dd->qty}}</td>
                        <td>{{rupiah($dd->selling_price)}}</td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection


@section('scriptjs')
<script type="text/javascript">
    $(document).ready(function(){
        $("#inputImageProduct").modal('show');
    });
</script>
@endsection


    