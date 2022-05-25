<!-- Start Modal Add cart -->
<div class="modal fade" id="modalUpdateCart" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
  <div class="modal-content">
    <form @if(Auth::guest())   @else action="{{route('cart.update')}}" method="POST" @endif  > 
    @csrf
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col text-right">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"> <i class="fal fa-times"></i></span>
              </button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="product-gallery-box m-b-60">
                <div class="modal-product-image--large">
                  <!-- Image Product -->
                  <img id="modal-product-image" class="img-fluid" src="" alt="">
                </div>
              </div>
            </div>
            <div class="col-md-6 modal__border">    
              <div class="product-details-box">
                <!-- Nama Product -->
                <h5 id="modal-product-nama"></h5>
                <div class="product__price">
                    <del><span class="product__price-del" id="modal-product-price"></span></del>
                    <!-- Harga Product -->
                    <span class="product__price-reg" id="modal-product-price-sell"></span>
                </div>
                <div class="product-var p-t-30">
                  <div class="product-quantity product-var__item d-flex align-items-center flex-wrap">
                    <span class="product-var__text">Quantity: </span>
                    <form class="modal-quantity-scale m-l-20">
                      <div class="value-button" id="modal-decrease" onclick="kurangQty()">-</div>
                      <input name="qty_product" type="number" class="input_qty_product_update_cart" id="modal-number">
                      <input name="input_subtotal_cart" type="number" id="subtotal_cart" value="" hidden>
                      <input name="input_id_productcart" type="number" id="product_id" value="" hidden>
                      <div class="value-button" id="modal-increase" onclick="nambahQty()">+</div>
                    </form>
                    <span class="pesan-max-terpenuhi"></span>
                    <input type="number" class="temp-qty-cart" value="" hidden>
                    <input name="price_product" type="number" class="temp-price-cart" value="" hidden>
                  </div>
                </div>
                <div class="product-var p-t-30">
                  <div class="product-quantity product-var__item d-flex align-items-center flex-wrap">
                    <span class="product-var__text">Sub Total: </span>
                    <form class="modal-quantity-scale m-l-20">
                      <input type="text" id="output_subtotal_update_cart" value="">
                    </form>
                  </div>
                </div>
              </div>        
              </ul>
              <!-- <div class="link--green link--icon-left"><i class="fal fa-check-square"></i>Added to cart successfully!</div> -->
              <div class="modal__product-cart-buttons m-tb-15">
                  <a href="{{route('cart.index')}}" class="btn btn--box  btn--tiny btn--green btn--green-hover-black btn--uppercase">View Cart</a>
                  <button @if(Auth::guest()) data-dismiss="modal" data-target="#modalLoginDulu" data-toggle="modal" @else type="submit" @endif  class="btn btn--box  btn--tiny btn--green btn--green-hover-black btn--uppercaset">Update Cart</button>
              </div>
            </div>           
          </div>
        </div>
      </div>
    </form>
  </div>
  </div>
</div> <!-- End Modal Add cart -->



<!-- Start Modal Add cart -->
<!-- <div class="modal fade" id="modalAddCart" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <div class="container-fluid">
        <div class="row">
          <div class="col text-right">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"> <i class="fal fa-times"></i></span>
            </button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7">
              <div class="row">
                  <div class="col-md-4">
                      <div class="modal__product-img">
                          <img class="img-fluid" src="assets/img/product/size-normal/product-home-1-img-1.jpg" alt="">
                      </div>
                  </div>
                  <div class="col-md-8">
                      <div class="link--green link--icon-left"><i class="fal fa-check-square"></i>Added to cart successfully!</div>
                      <div class="modal__product-cart-buttons m-tb-15">
                          <a href="cart.html" class="btn btn--box  btn--tiny btn--green btn--green-hover-black btn--uppercase">View Cart</a>
                          <a href="checkout.html" class="btn btn--box  btn--tiny btn--green btn--green-hover-black btn--uppercaset">Checkout</a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-5 modal__border">
            <ul class="modal__product-shipping-info">
              <li class="link--icon-left"><i class="icon-shopping-cart"></i> There Are 5 Items In Your Cart.</li>
              <li>TOTAL PRICE: <span>$187.00</span></li>
              <li><a href="#" class="btn text-underline color-green" data-dismiss="modal">CONTINUE SHOPPING</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div> -->
 <!-- End Modal Add cart -->

