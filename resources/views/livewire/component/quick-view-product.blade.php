<!-- Start Modal Quickview cart -->
<div class="modal" id="modalQuickView" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
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
              <div class="col-md-6">
                <div class="product-gallery-box m-b-60">
                  <div class="modal-product-image--large">
                    <!-- Image Product -->
                    <img id="modal-product-image" class="img-fluid" src="" alt="">
                  </div>
                </div>
              </div>
                <div class="col-md-6">
                  <div class="product-details-box">
                    <!-- Nama Product -->
                    <h5 id="modal-product-nama"></h5>
                    <div class="product__price">
                        <del><span class="product__price-del" id="modal-product-price-sell"></span></del>
                        <!-- Harga Product -->
                        <span class="product__price-reg" id="modal-product-price"></span>
                    </div>
                      <!-- <input type="number" id="modal-product-rate" name="rating" value=""> -->
                      <div class="product__desc m-t-25 m-b-30">
                        <!-- Desc Product -->
                        <p id="modal-product-desc"></p>
                      </div>

                      <div class="product-var p-t-30">
                        <div class="product-quantity product-var__item d-flex align-items-center flex-wrap">
                          <span class="product-var__text">Quantity: </span>
                          <form class="modal-quantity-scale m-l-20">
                            <div class="value-button" id="modal-decrease" onclick="decreaseValueModal()">-</div>
                            <input type="number" id="modal-number" value="" disabled/>
                            <div class="value-button" id="modal-increase" onclick="increaseValueModal()">+</div>
                          </form>
                      </div>
                      </div>
                      
                      <div class="product-links">
                        <div class="product-social m-tb-30">
                          <span>SHARE THIS PRODUCT</span>
                          <ul class="product-social-link">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                          </ul>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- End Modal Quickview cart -->