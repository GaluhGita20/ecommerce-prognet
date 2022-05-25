<?php
  $title="Cart";

  function rupiah ($angka) {
    $hasil = 'Rp. ' . number_format($angka, 0, ",", ".");
    return $hasil;
  }
?>  
@extends('layouts.template-user')

@section('content')

  <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
  <div class="page-breadcrumb" style="background: url('/asset/home/banner-product.webp'); background-size:cover; width:100%; height:100%; object-fit: fill;">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <ul class="page-breadcrumb__menu">
                      <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                      <li class="page-breadcrumb__nav active">{{$title}}</li>
                  </ul>
              </div>
          </div>
      </div>
  </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

  <!-- ::::::  Start  Main Container Section  ::::::  -->
  <main id="main-container" class="main-container">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="section-content">
                      <h5 class="section-content__title">Your cart items</h5>
                  </div>
                  @if($carts->count()>0)
                  @livewire('table-cart')
                  @else
                  <div class="empty-cart m-t-40 text-center">
                      <div class="empty-cart-icon title--large"><i class="fal fa-shopping-cart"></i></div>
                      <h3 class="title title--normal title--thin m-tb-30">There are no more items in your cart</h3>
                      <a href="{{route('shop.general')}}" class="btn btn--box btn--large btn--radius btn--green btn--green-hover-black btn--uppercase font--semi-bold m-t-20">CONTINUE SHOPPING</a>
                  </div>
                  @endif
              </div>
          </div>
      </div>
  </main> <!-- ::::::  End  Main Container Section  ::::::  -->

  @livewire('quick-update-cart')

@endsection

@section('scriptjs')
  <script type="text/javascript">
    function formatRupiah(angka){
			var 	bilangan = angka;
		
      var	reverse = bilangan.toString().split('').reverse().join(''),
        ribuan 	= reverse.match(/\d{1,3}/g);
        ribuan	= ribuan.join('.').split('').reverse().join('');
      return ribuan;
		}
  </script>

  <script type="text/javascript">

        function deleteCart(id){
          $.ajax({
            url: "/cart-delete/"+id,
            type: "DELETE",  
            data:{
              _token : $("input[name=_token]").val()
            },      
            success: function(response){
              $("#cartid"+id).remove();
            }
          });
        }
          

  </script>

  
  <script type="text/javascript">
    
    $(function(){

        $('body').on('click','.btnUpdateCart', function(e){
            e.preventDefault();
            var data = $(this).data();
            var myInputQtyCart = document.querySelector(".input_qty_product_update_cart");
            var myInputSubtotalCart = document.getElementById("output_subtotal_update_cart");
            myInputQtyCart.value = data.qtyCart;
            myInputSubtotalCart.value = "Rp. " + formatRupiah(data.qtyCart*data.productPricesell)
            $('#modalUpdateCart #modal-product-nama').html(data.productNama);
            $('#modalUpdateCart #modal-product-image').attr('src', data.productImage);
            $('#modalUpdateCart #modal-product-price-sell').html("Rp." + formatRupiah(data.productPricesell));
            if(data.productPricesell != data.productPrice){
              $('#modalUpdateCart #modal-product-price').html("Rp." + formatRupiah(data.productPrice));
            }
            $('#modalUpdateCart .temp-qty-cart').attr('value', data.productQty);
            $('#modalUpdateCart .temp-price-cart').attr('value', data.productPricesell);
            $('#modalUpdateCart #output_subtotal_cart').attr('value', "Rp." + formatRupiah(data.productPricesell));
            $('#modalUpdateCart #subtotal_cart').attr('value', data.productPricesell);
            $('#modalUpdateCart #product_id').attr('value', data.productId);
            $('#modalUpdateCart').modal();
        });
    });
  </script>

  <script type="text/javascript">
    var myInputQtyCart = document.querySelector(".input_qty_product_update_cart");
    var maks_stock = document.querySelector(".temp-qty-cart");
    var msg = document.querySelector(".pesan-max-terpenuhi");
    var output_subtotal = document.getElementById("output_subtotal_update_cart");
    var final_subtotal = document.getElementById("subtotal_cart");
    var temp_price = document.querySelector(".temp-price-cart");
    myInputQtyCart.addEventListener("input", myFunction);

    
    function myFunction(){
      output_subtotal.value = "Rp." + formatRupiah(parseInt(myInputQtyCart.value)*parseInt(temp_price.value));
      final_subtotal.value = parseInt(myInputQtyCart.value)*parseInt(temp_price.value);
      if(parseInt(maks_stock.value)==0){
        msg.innerHTML = "";
      }else {
        if(parseInt(myInputQtyCart.value) > parseInt(maks_stock.value)){
          msg.innerHTML = "Stok melebih batas yaitu " + maks_stock.value;
        }else{
          msg.innerHTML = "";
        }
      }     
    };

    function nambahQty(){
      msg.innerHTML = "";
      let x = parseInt(myInputQtyCart.value);
      if(parseInt(myInputQtyCart.value) >= parseInt(maks_stock.value)){
        myInputQtyCart.value = maks_stock.value;
      }else{
        myInputQtyCart.value = x+1;
      }
      output_subtotal.value = "Rp." + formatRupiah(parseInt(myInputQtyCart.value)*parseInt(temp_price.value));
      final_subtotal.value = parseInt(myInputQtyCart.value)*parseInt(temp_price.value);
    };
    
    function kurangQty(){
      msg.innerHTML = "";
      let y = parseInt(myInputQtyCart.value);
      if(myInputQtyCart.value <= 1){
        myInputQtyCart.value = 1;
      }else{
        myInputQtyCart.value = y-1;
      }
      output_subtotal.value = "Rp." + formatRupiah(parseInt(myInputQtyCart.value)*parseInt(temp_price.value));
      final_subtotal.value = parseInt(myInputQtyCart.value)*parseInt(temp_price.value);
    };
  </script>



@endsection
