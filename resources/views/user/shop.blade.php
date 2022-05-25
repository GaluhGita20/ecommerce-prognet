<?php
  $title="Shop";
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

  @livewire('shop-product-general')

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

      
        $('body').on('click','.btnQuickView', function(e){
            e.preventDefault();
            var data = $(this).data();
            $('#modalQuickView #modal-product-nama').html(data.productNama);
            $('#modalQuickView #modal-product-image').attr('src', data.productImage);
            $('#modalQuickView #modal-product-price').html("Rp." + formatRupiah(data.productPricesell));
            if(data.productPricesell != data.productPrice){
            $('#modalQuickView #modal-product-price-sell').html("Rp." + formatRupiah(data.productPrice));
            }
            $('#modalQuickView #modal-product-desc').html(data.productDesc);
            $('#modalQuickView #modal-number').attr('value', data.productQty);
            $('#modalQuickView #modal-product-rate').attr('value', data.productRate);

            $('#modalQuickView').modal();
        });
    });
  </script>
  <script type="text/javascript">
    
    $(function(){

        $('body').on('click','.btnAddCart', function(e){
            e.preventDefault();
            var data = $(this).data();
            var myInputQtyCart = document.querySelector(".input_qty_product_cart");
            var myInputSubtotalCart = document.getElementById("output_subtotal_cart");
            myInputQtyCart.value =1;
            myInputSubtotalCart.value = "Rp." + formatRupiah(data.productPricesell);
            $('#modalAddCart #modal-product-nama').html(data.productNama);
            $('#modalAddCart #modal-product-image').attr('src', data.productImage);
            $('#modalAddCart #modal-product-price-sell').html("Rp." + formatRupiah(data.productPricesell));
            if(data.productPricesell != data.productPrice){
              $('#modalAddCart #modal-product-price').html("Rp." + formatRupiah(data.productPrice));
            }
            $('#modalAddCart .temp-qty-cart').attr('value', data.productQty);
            $('#modalAddCart .temp-price-cart').attr('value', data.productPricesell);
            $('#modalAddCart #output_subtotal_cart').attr('value', "Rp." + formatRupiah(data.productPricesell));
            $('#modalAddCart #subtotal_cart').attr('value', data.productPricesell);
            $('#modalAddCart #product_id').attr('value', data.productId);
            $('#modalAddCart').modal();
        });
    });
  </script>
  <script type="text/javascript">
    var myInputQtyCart = document.querySelector(".input_qty_product_cart");
    var maks_stock = document.querySelector(".temp-qty-cart");
    var msg = document.querySelector(".pesan-max-terpenuhi");
    var output_subtotal = document.getElementById("output_subtotal_cart");
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