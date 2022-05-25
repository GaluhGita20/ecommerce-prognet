<div class="col-lg-12">
  <div class="card">
    <div class="card-search" style="padding-top:1.5rem; padding-right: 1.875rem; padding-bottom: 1.25 rem; padding-left:1.875rem; position: relative; align-items: center;">
      <div class="form-group">
        <input type="text" wire:model="searchProduct" class="form-control"  placeholder="Search data product">
      </div>
    </div>
    <div class="card-header">
        <h4 class="card-title">Table Category Master</h4>
        <a href="{{route('admin.add.category')}}"><div class="btn btn-primary">+ Add Data Category</div></a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-responsive-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Category Name</th>
              <th>Gambar</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @if($categories->count()== 0)
            <tr class="text-center">
              <td colspan="10">Theres no category found on  database</td>
            </tr>
          @endif
          @foreach($categories as $category)
          <tr>
            <td scope="row">{{$loop->index+1+($categories->currentPage()-1)*5}}</td>
            <td colspan="1">{{$category->category_name}}</td>
            <td><img src="{{ URL::asset('asset/kategori/' . $category->gambar) }}"alt="{{ $category->gambar }}" width="100px" height="auto"></td>
            <td>
              <div class="d-flex">
                <a href="{{route('admin.detail.category',$category->id)}}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-file"></i></a>
                <a href="{{route('admin.edit.category',$category->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                <div class="sweetalert">
                  <form action="{{ route('admin.delete.category',$category->id) }}" method="POST">
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
        {{$categories->links()}}
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