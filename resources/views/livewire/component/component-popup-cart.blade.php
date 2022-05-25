

<!--  Start Popup Add Cart  -->
<div  id="offcanvas-add-cart__box" class="offcanvas offcanvas-cart offcanvas-add-cart">
    <div class="offcanvas__top">
        <span class="offcanvas__top-text"><i class="icon-shopping-cart"></i>Cart</span>
        <button class="offcanvas-close"><i class="fal fa-times"></i></button>
    </div>
    <!-- Start Add Cart Item Box-->
    <ul class="offcanvas-add-cart__menu" style="border-bottom: 2px solid #777;">
        @if($jmlh_cart ==0)
        <div style="border-top:2px solid #777;color:#777; padding:12px;">
            <h5>Cart anda kosong:(... <br><br>Silahkan menambahkan produk ke dalam keranjang Anda! <br><br>Jangan sampai ketinggalan promo menarik FreshMart yaaa...</h5>
        </div>
        @else
        @foreach($carts as $cart)
        <!-- Start Single Add Cart Item-->
        <li id="cartid{{$cart->id}}" class="offcanvas-add-cart__list pos-relative d-flex align-items-center justify-content-between ">
            <div class="offcanvas-add-cart__content d-flex align-items-start m-r-10">
                <div class="offcanvas-add-cart__img-box pos-relative">
                    <?php $i=0; ?>
                    @foreach($cart->product->product_images as $dd)
                    @if($i<=0)
                    <a href="{{route('shop.product.detail', $cart->product->slug)}}" class="offcanvas-add-cart__img-link img-responsive"><img src="../asset/product/{{$cart->product->id}}/{{$dd->image_name}}" alt="" class="add-cart__img" style="width:140px; height:120px;"></a>
                    <?php $i=$i+1; ?>
                    @endif
                    @endforeach
                    <span class="offcanvas-add-cart__item-count pos-absolute">{{$cart->qty}}x</span>
                </div>
                <div class="offcanvas-add-cart__detail">
                    <a href="{{route('shop.product.detail', $cart->product->slug)}}" class="offcanvas-add-cart__link">{{$cart->product->product_name}}</a>
                    <?php 
                    $temp = 0;
                    $discount_product =[];
                    $discount_product = $cart->product->discounts->where('status_aktif', '=',0)->last();
                    if(!is_null($discount_product)){
                        $temp = $discount_product->percentage/100;
                    $harga_jual_product = $cart->product->price - ($cart->product->price*$temp);

                    }else{
                        $harga_jual_product = $cart->product->price;
                    }
                    ?>
                    <span class="offcanvas-add-cart__price">{{rupiah($harga_jual_product*$cart->qty)}}</span>
                    <span class="offcanvas-add-cart__info">Weight: {{$cart->product->weight}} gram</span>
                </div>
            </div>
            <form action="{{Route('cart.delete', $cart->id)}}" method="POST">
                @csrf
                <button type="submit" class="offcanvas-add-cart__item-dismiss "><i class="fal fa-times"></i></button>
            </form>
        </li> <!-- Start Single Add Cart Item-->
        @endforeach
        @endif
    </ul> <!-- Start Add Cart Item Box-->
    <!-- Start Add Cart Checkout Box-->
    <div class="offcanvas-add-cart__checkout-box-bottom">
        <!-- Start offcanvas Add Cart Checkout Info-->
        <ul class="offcanvas-add-cart__checkout-info">
            <!-- Start Single Add Cart Checkout Info-->
            <li class="offcanvas-add-cart__checkout-list">
                <span class="offcanvas-add-cart__checkout-left-info">Total Item Product</span>
                <span class="offcanvas-add-cart__checkout-right-info">( {{$total_item}} )</span>
            </li> <!-- End Single Add Cart Checkout Info-->
            <!-- Start Single Add Cart Checkout Info-->
            <li class="offcanvas-add-cart__checkout-list">
                <span class="offcanvas-add-cart__checkout-left-info">Total Qty Product</span>
                <span class="offcanvas-add-cart__checkout-right-info">( {{$total_qty}} )</span>
            </li> <!-- End Single Add Cart Checkout Info-->
            <!-- Start Single Add Cart Checkout Info-->
            <li class="offcanvas-add-cart__checkout-list">
                <span class="offcanvas-add-cart__checkout-left-info">Total Berat</span>
                <span class="offcanvas-add-cart__checkout-right-info">( {{$total_weight}} gram )</span>
            </li> <!-- End Single Add Cart Checkout Info-->
            <!-- Start Single Add Cart Checkout Info-->
            <li class="offcanvas-add-cart__checkout-list">
                <span class="offcanvas-add-cart__checkout-left-info">Total</span>
                <span class="offcanvas-add-cart__checkout-right-info">{{rupiah($total_tagihan)}}</span>
            </li> <!-- End Single Add Cart Checkout Info-->
        </ul> <!-- End offcanvas Add Cart Checkout Info-->

        <div class="offcanvas-add-cart__btn-checkout">
            <a @if(is_null($carts)) href="javascript:void(0);" @else href="{{Route('checkout')}}" @endif class="btn btn--block btn--radius btn--box btn--black btn--black-hover-green btn--large btn--uppercase font--bold">Checkout</a>
        </div>
    </div> <!-- End Add Cart Checkout Box-->
</div> <!-- End Popup Add Cart -->
























