<?php
  $title="Home";

  function rupiah ($angka) {
    $hasil = 'Rp. ' . number_format($angka, 0, ",", ".");
    return $hasil;
  }
?>  
@extends('layouts.template-user')

@section('content')
  <!-- :::::: Start Main Container Wrapper :::::: -->
  <main id="main-container" class="main-container">
    <div class="hero slider-dot-fix slider-dot slider-dot-fix slider-dot--center slider-dot-size--medium slider-dot-circle  slider-dot-style--fill slider-dot-style--fill-white-active-green dot-gap__X--10">
      <!-- Start Single Hero Slide -->
      <div class="hero-slider">
        <img src="/asset/home/hero-home-1.webp" alt="">
        <div class="hero__content">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                <div class="hero__content--inner">
                  <h6 class="title__hero title__hero--tiny text-uppercase">100% Healthy & Affordable</h6>
                  <h1 class="title__hero title__hero--xlarge font--regular text-uppercase">Organic <br>  Vegetables</h1>
                  <h4 class="title__hero title__hero--small font--regular">Small Changes Big Difference</h4>
                  <a href="#" class="btn btn--large btn--radius btn--black btn--black-hover-green font--bold text-uppercase">Shop now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Single Hero Slide -->
      <!-- Start Single Hero Slide -->
      <div class="hero-slider">
        <img src="/asset/home/hero-home-2.webp" alt="">
        <div class="hero__content">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                <div class="hero__content--inner">
                  <h6 class="title__hero title__hero--tiny text-uppercase">100% Healthy & Affordable</h6>
                  <h1 class="title__hero title__hero--xlarge font--regular text-uppercase">Organic <br>   fresh fruits</h1>
                  <h4 class="title__hero title__hero--small font--regular">Small Changes Big Difference</h4>
                  <a href="#" class="btn btn--large btn--radius btn--black btn--black-hover-green font--bold text-uppercase">Shop now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Single Hero Slide -->
    </div> <!-- ::::::  End Hero Section  ::::::  -->

    <!-- ::::::  Start banner Section  ::::::  -->
    <div class="banner m-t-30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="banner__box">
              <!-- Start Single Banner Item -->
              <div class="banner__box--single banner__box--single-text-style-1 pos-relative">
                  <a href="#" class="banner__link">
                      <img src="/asset/home/banner-box-1.webp" alt="" class="banner__img">
                  </a>
                  <div class="banner__content banner__content--center pos-absolute">
                      <h6 class="banner__title  font--regular letter-spacing--4  text-center m-b-10">Green Vegetable</h6>
                      <h2 class="banner__title banner__title--large font--medium letter-spacing--4  text-uppercase">100% ORGANIC</h2>
                      <h6 class="banner__title font--regular letter-spacing--4  text-center m-b-20">Healthy Nutrition</h6>
                      <div class="text-center">
                          <a href="#" class="btn btn--medium btn--radius btn--transparent btn--border-black btn--border-black-hover-green font--light text-uppercase">Buy Now</a>
                      </div>
                  </div>
              </div> <!-- End Single Banner Item -->
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="banner__box">
              <!-- Start Single Banner Item -->
              <div class="banner__box--single banner__box--single-text-style-1 pos-relative">
                <a href="#" class="banner__link">
                    <img src="/asset/home/banner-box-2.webp" alt="" class="banner__img">
                </a>
                <div class="banner__content banner__content--center pos-absolute">
                  <h6 class="banner__title letter-spacing--4 font--regular text-center m-b-10">Fresh herbs</h6>
                  <h2 class="banner__title banner__title--large letter-spacing--4 font--medium text-uppercase">SPINACH</h2>
                  <h6 class="banner__title letter-spacing--4 font--regular text-center m-b-20">Healthy Food</h6>
                  <div class="text-center">
                    <a href="#" class="btn btn--medium btn--radius btn--transparent btn--border-black btn--border-black-hover-green font--light text-uppercase">Buy Now</a>
                  </div>
                </div>
              </div> <!-- End Single Banner Item -->
            </div>
          </div>
        </div>
      </div>
    </div> <!-- ::::::  End banner Section  ::::::  -->

    @livewire('component-home-category')

    @livewire('component-home-top-product')

      <!-- ::::::  Start banner Section  ::::::  -->
    <div class="banner m-t-100 pos-relative">
      <div class="banner__bg">
        <img src="/asset/home/banner-product.webp" alt="">
      </div>
      <div class="banner__box banner__box--single-text-style-2">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="banner__content banner__content--center pos-absolute">
                <h6 class="banner__title  font--medium m-b-10">SPECIAL DISCOUNT</h6>
                <h1 class="banner__title banner__title--large font--regular text-capitalize">For all Grocery <br>
                    products</h1>
                <h6 class="banner__title font--medium m-b-40">Take now 20% off for all grocer product.</h6>
                <a href="product-single-default.html" class="btn btn--large btn--radius btn--black btn--black-hover-green font--bold text-uppercase">Shop now</a>
              </div> 
            </div>
          </div>
        </div>
      </div>    
    </div> <!-- ::::::  End banner Section  ::::::  -->

    @livewire('component-new-product')

    <!-- ::::::  Start Testimonial Section  ::::::  -->
    <div class="testimonial m-t-100 pos-relative">
      <div class="testimonial__bg">
        <img src="/asset/home/banner-info.webp" alt="">
      </div>
        <div class="testimonial__content pos-absolute absolute-center text-center">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="section-content__inner">
                  <h2>Yang Perlu Kalian Ketahui Mengenai FreshMart!</h2>
                </div>
                <div class="testimonial__slider default-slider">
                  <div class="testimonial__content--slider ">
                    <div class="testimonial__single">
                      <p class="testimonial__desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                  </div>
                  <div class="testimonial__content--slider ">
                      <div class="testimonial__single">
                          <p class="testimonial__desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                          <div class="testimonial__info">
                              <img class="testimonial__info--user" src="assets/img/testimonial/testimonial-home-1-img-2.png" alt="">
                              <h5 class="testimonial__info--desig m-t-20">Torvi / <span>C0O</span> </h5>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div> <!-- ::::::  End Testimonial Section  ::::::  -->
  </main>  <!-- :::::: End MainContainer Wrapper :::::: -->

  
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

