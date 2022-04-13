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
            <li class="breadcrumb-item"><a href="{{Route('admin.product.index')}}">Product</a></li>
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
                <h4 class="card-title">Detail Data Product</h4>
              </div>
              <div class="card-body">
                <div class="basic-form">
                  <form>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Id Product</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$product->id}}" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Product</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$product->product_name}}" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Price</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo rupiah($product->price); ?>" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Product Rate</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$product->product_rate}}" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Berat Product (gram)</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$product->weight}}" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Deskripsi Product</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" rows="5" id="description" name="description" disabled>{{$product->desc}}</textarea>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-sm-6 col-xxl-4">
            <div class="widget-stat card">
              <div class="card-body p-4">
                <div class="media ai-icon">
                  <span class="mr-3 bgl-primary text-primary">
                    <!-- <i class="ti-user"></i> -->
                    <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                      <line x1="12" y1="1" x2="12" y2="23"></line>
                      <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                  </span>
                  <div class="media-body">
                    <p class="mb-1">Harga</p>
                    <h4 class="mb-0"><?php echo rupiah($product->price); ?></h4>
                    <span class="badge badge-primary"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-sm-6 col-xxl-4">
            <div class="widget-stat card">
              <div class="card-body p-4">
                <div class="media ai-icon">
                  <span class="mr-3 bgl-warning text-warning">
                    <svg id="icon-orders" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                      <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                      <polyline points="14 2 14 8 20 8"></polyline>
                      <line x1="16" y1="13" x2="8" y2="13"></line>
                      <line x1="16" y1="17" x2="8" y2="17"></line>
                      <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                  </span>
                  <div class="media-body">
                    <p class="mb-1">Pembelian Product</p>
                    <h4 class="mb-0">Rp.0,00 </h4>
                    <span class="badge badge-warning">(0)</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-sm-6 col-xxl-4">
            <div class="widget-stat card">
              <div class="card-body  p-4">
                <div class="media ai-icon">
                  <span class="mr-3 bgl-danger text-danger">
                    <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
                      <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                      <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                      <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                    </svg>
                  </span>
                  <div class="media-body">
                    <p class="mb-1">Penjualan Product</p>
                    <h4 class="mb-0">Rp.0,00</h4>
                    <span class="badge badge-danger"> (0)</span>    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <livewire:chart-transaksi-product :nasabah="$product->id"/>

          <!-- Baris keempat -->
          <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                  <h4 class="card-title">List Gambar Product</h4>
                  <a data-toggle="modal" data-target="#addImageProductModal"><div class="btn btn-primary">+ Add Image Product</div></a>
              </div>
              <div class="card-body">
                <div class="table-responsive recentOrderTable">
                  <table class="table verticle-middle table-responsive-md">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if($product->product_images->count()==0)
                        <tr class="text-center">
                          <td colspan="10">Theres no image product found on  database</td>
                        </tr>     
                      @else
                      @foreach($product->product_images as $img)
                      <tr>
                        <td scope="row">{{$loop->index+1}}</td>
                        <td colspan="1">{{$img->image_name}}</td>
                        <td><img src="{{ URL::asset('asset/product/'.$product->id.'/'. $img->image_name) }}"alt="{{ $img->img_name }}" width="200px" height="150px" style="border-radius:0px;"></td>
                        <td>{{$img->created_at}}</td>
                        <td>
                          <div class="d-flex">
                            <a href="" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-file"></i></a>
                            <a href="" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                            <div class="sweetalert" style="line-height:0px;">
                              <form action="{{ route('admin.delete.imageproduct',$img->id) }}" method="POST">
                                @csrf
                                <button type="submit" onclick="return confirm('Yakin Ingin Mengapus Data?')" class="btn btn-danger shadow btn-xs sharp sweet-success-cancel"><i class="fa fa-trash"></i></button>                 
                              </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Baris kelima -->
          <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                  <h4 class="card-title">List Category Product</h4>
                  <a data-toggle="modal" data-target="#addCategoryProductModal"><div class="btn btn-primary">+ Add Category Product</div></a>
              </div>
              <div class="card-body">
                <div class="table-responsive recentOrderTable">
                  <table class="table verticle-middle table-responsive-md">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nama Category</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if($product->product_category_details->count()==0)
                        <tr class="text-center">
                          <td colspan="10">Theres no category product found on  database</td>
                        </tr>    
                      @else
                      @foreach($product->product_category_details as $cp)
                      <tr>
                        <td scope="row">{{$loop->index+1}}</td>
                        <td colspan="1">
                          @foreach($categories as $c)
                          @if($c->id == $cp->category_id)
                            {{$c->category_name}}
                          @endif
                          @endforeach
                        </td>
                        <td>{{$cp->created_at}}</td>
                        <td>
                          <div class="d-flex">
                            <a href="" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-file"></i></a>
                            <a href="" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                            <div class="sweetalert" style="line-height:0px;">
                              <form action="{{ route('admin.delete.categoryProduct',$cp->id) }}" method="POST">
                                @csrf
                                <button type="submit" onclick="return confirm('Yakin Ingin Mengapus Data?')" class="btn btn-danger shadow btn-xs sharp sweet-success-cancel"><i class="fa fa-trash"></i></button>                 
                              </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Baris keenam -->
          <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                  <h4 class="card-title">10 List Transaksi Penjualan Product Terakhir</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive recentOrderTable">
                  <table class="table verticle-middle table-responsive-md">
                    <thead>
                        <tr>
                            <th scope="col">Id Transaksi</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                          <td colspan="10">Theres no transaction found on  database</td>
                        </tr>           
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="addImageProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Image Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="{{Route('admin.save.imageProduct', $product->id)}}" method="POST"  enctype="multipart/form-data">
          @csrf
            <div class="modal-body">     
              <section>
                <div class="row">
                  <div class="col-lg-12 mb-2">
                    <div class="form-group">
                        <label class="text-label">Name Product*</label>
                        <input type="text" name="id_product" id="id_product" class="form-control" value="{{$product->product_name}}" disabled>
                    </div>
                  </div>
                  <div class="col-lg-12 mb-3">
                      <label for="gambar">Image</label>
                      <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                  </div>
                </div>  
              </section>      
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="addCategoryProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Category Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="{{Route('admin.save.categoryProduct', $product->id)}}" method="POST"  enctype="multipart/form-data">
          @csrf
            <div class="modal-body">     
              <section>
                <div class="row">
                  <div class="col-lg-12 mb-2">
                    <div class="form-group">
                        <label class="text-label">Category Product*</label>
                        <div class="dropdown bootstrap-select form-control dropup">
                          <select name="category" id="category" class="form-control" tabindex="-98" required>
                            <option selected value="" disabled>Pilih Category Product</option>
                            @foreach($categories as $c)
                              <option value="{{$c->id}}">{{$c->category_name}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                  </div>
                </div>  
              </section>      
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
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


    