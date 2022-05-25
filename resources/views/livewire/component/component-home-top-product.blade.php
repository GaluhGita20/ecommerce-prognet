  
    <!-- ::::::  Start  Product Style - Default Section  ::::::  -->
    <div class="product m-t-100">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <!-- Start Section Title -->
            <div class="section-content section-content--border m-b-35">
              <h5 class="section-content__title">Top Products</h5>
              <ul class="tablist tablist--style-blue tablist--style-gap-20 nav">
                <li><a class="nav-link active" data-toggle="tab" href="#fruits">Buah Buahan</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#milk">Susu</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#fish">Daging</a></li>
              </ul>
            </div>  <!-- End Section Title -->
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="tab-content tab-animate-zoom">
              <!-- Start Single Tab Item -->
              <div class="tab-pane show active" id="fruits">
                <div class="default-slider default-slider--hover-bg-red product-default-slider">
                  <div class="product-default-slider-4grid-1rows gap__col--30 gap__row--40">
                  <?php $a_product=0; ?>
                  @foreach($products as $product)
                  @foreach($product->product_category_details as $dd)
                    @if($a_product<=3 && $dd->category_id == 7)
                    <!-- Start Single Default Product -->
                    <div class="product__box product__default--single text-center">
                      <!-- Start Product Image -->
                      <div class="product__img-box  pos-relative">
                          <a href="{{route('shop.product.detail', $product->slug)}}" class="product__img--link">
                          <?php $i=0; ?>
                            <img class="product__img img-fluid" style="width:268px; height:268px;" @foreach($product->product_images as $dd)
                              @if($i<1)
                              src="asset/product/{{$product->id}}/{{$dd->image_name}}"
                              <?php $i=$i+1; ?>
                              @endif
                            @endforeach alt="">
                          </a>
                          <!-- Start Procuct Label -->
                          <!-- <span class="product__label product__label--sale-dis">-34%</span> -->
                          <!-- End Procuct Label -->
                          <!-- Start Product Action Link-->
                          <?php 
                          $temp = 0;
                          $discount_product= [];
                          $discount_product = $product->discounts->where('status_aktif', '=',0)->last();
                          if(!is_null($discount_product)){
                              $temp = $discount_product->percentage/100;
                              $harga_jual_product = $product->price - ($product->price*$temp);

                          }else{
                            $harga_jual_product=$product->price;
                          }
                          ?>

                          <ul class="product__action--link pos-absolute">
                            <?php $i=0; ?>
                            <li><a class="btnAddCart" data-product-id="{{$product->id}}" data-product-nama="{{$product->product_name}}" data-product-price="{{$product->price}}" data-product-pricesell="{{$harga_jual_product}}" 
                            @foreach($product->product_images as $dd)
                              @if($i<1)
                              data-product-image="asset/product/{{$product->id}}/{{$dd->image_name}}"
                              <?php $i=$i+1; ?>
                              @endif
                            @endforeach data-product-qty="{{$product->stock}}"><i class="icon-shopping-cart"></i></a></li>
                            <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                            <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                            <?php $i=0; ?>
                            <li><a class="btnQuickView" data-product-nama="{{$product->product_name}}" data-product-price="{{$product->price}}" data-product-pricesell="{{$harga_jual_product}}" 
                            @foreach($product->product_images as $dd)
                              @if($i<1)
                              data-product-image="asset/product/{{$product->id}}/{{$dd->image_name}}"
                              <?php $i=$i+1; ?>
                              @endif
                            @endforeach data-product-desc="{{$product->desc}}" data-product-qty="{{$product->stock}}" data-product-rate="{{$product->product_rate}}"><i class="icon-eye"></i></a></li>
                          </ul> <!-- End Product Action Link -->
                      </div> <!-- End Product Image -->
                      <!-- Start Product Content -->
                      <div class="product__content m-t-20">
                        <ul class="product__review">
                          @if($product->product_rate <=0.99)
                          <li class="product__review--fill"><i class="fas fa-star-half"></i></li>
                          @elseif($product->product_rate <=1.49)
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                          @elseif($product->product_rate <=1.99)
                            <li class="product__review--fill"><i class="fas fa-star"></i></li>
                            <li class="product__review--fill"><i class="fas fa-star-half"></i></li>
                          @elseif($product->product_rate <=2.49)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          @elseif($product->product_rate <=2.99)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star-half"></i></li>
                          @elseif($product->product_rate <=3.49)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          @elseif($product->product_rate <=3.99)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star-half"></i></li>
                          @elseif($product->product_rate <=4.49)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          @elseif($product->product_rate <=4.99)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--blank"><i class="icon-star"></i></li>
                          @else
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          @endif
                        </ul>
                        <a href="{{route('shop.product.detail', $product->slug)}}" class="product__link">{{$product->product_name}}</a>

                        <div class="product__price m-t-5">
                            <span class="product__price"><?php echo rupiah($harga_jual_product) ?> 
                            @if($temp!=0)
                            <del><?php echo rupiah($product->price) ?> </del>
                            @endif
                          </span>
                        </div>
                      </div> <!-- End Product Content -->
                    </div> <!-- End Single Default Product -->
                    <?php $a_product=$a_product+1; ?>
                  @endif
                  @endforeach
                  @endforeach
                  </div>
                </div>
              </div>  <!-- End Single Tab Item -->

              <!-- Start Single Tab Item -->
              <div class="tab-pane" id="milk">
                <div class="default-slider default-slider--hover-bg-red product-default-slider">
                  <div class="product-default-slider-4grid-1rows gap__col--30 gap__row--40">
                  <?php $a_product=0; ?>
                  @foreach($products as $product)
                  @foreach($product->product_category_details as $dd)
                    @if($a_product<=3 && $dd->category_id == 4)
                    <!-- Start Single Default Product -->
                    <div class="product__box product__default--single text-center">
                      <!-- Start Product Image -->
                      <div class="product__img-box  pos-relative">
                          <a href="#" class="product__img--link">
                          <?php $i=0; ?>
                            <img class="product__img img-fluid" style="width:268px; height:268px;" @foreach($product->product_images as $dd)
                              @if($i<1)
                              src="asset/product/{{$product->id}}/{{$dd->image_name}}"
                              <?php $i=$i+1; ?>
                              @endif
                            @endforeach alt="">
                          </a>
                          <!-- Start Procuct Label -->
                          <!-- <span class="product__label product__label--sale-dis">-34%</span> -->
                          <!-- End Procuct Label -->
                          <!-- Start Product Action Link-->
                          <?php 
                          $temp = 0;
                          $discount_product= [];
                          $discount_product = $product->discounts->where('status_aktif', '=',0)->last();
                          if(!is_null($discount_product)){
                              $temp = $discount_product->percentage/100;
                              $harga_jual_product = $product->price - ($product->price*$temp);

                          }else{
                            $harga_jual_product=$product->price;
                          }
                          ?>

                          <ul class="product__action--link pos-absolute">
                            <?php $i=0; ?>
                            <li><a class="btnAddCart" data-product-id="{{$product->id}}" data-product-nama="{{$product->product_name}}" data-product-price="{{$product->price}}" data-product-pricesell="{{$harga_jual_product}}" 
                            @foreach($product->product_images as $dd)
                              @if($i<1)
                              data-product-image="asset/product/{{$product->id}}/{{$dd->image_name}}"
                              <?php $i=$i+1; ?>
                              @endif
                            @endforeach data-product-qty="{{$product->stock}}"><i class="icon-shopping-cart"></i></a></li>
                            <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                            <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                            <?php $i=0; ?>
                            <li><a class="btnQuickView" data-product-nama="{{$product->product_name}}" data-product-price="{{$product->price}}" data-product-pricesell="{{$harga_jual_product}}" 
                            @foreach($product->product_images as $dd)
                              @if($i<1)
                              data-product-image="asset/product/{{$product->id}}/{{$dd->image_name}}"
                              <?php $i=$i+1; ?>
                              @endif
                            @endforeach data-product-desc="{{$product->desc}}" data-product-qty="{{$product->stock}}" data-product-rate="{{$product->product_rate}}"><i class="icon-eye"></i></a></li>
                          </ul> <!-- End Product Action Link -->
                      </div> <!-- End Product Image -->
                      <!-- Start Product Content -->
                      <div class="product__content m-t-20">
                        <ul class="product__review">
                          @if($product->product_rate <=0.99)
                          <li class="product__review--fill"><i class="fas fa-star-half"></i></li>
                          @elseif($product->product_rate <=1.49)
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                          @elseif($product->product_rate <=1.99)
                            <li class="product__review--fill"><i class="fas fa-star"></i></li>
                            <li class="product__review--fill"><i class="fas fa-star-half"></i></li>
                          @elseif($product->product_rate <=2.49)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          @elseif($product->product_rate <=2.99)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star-half"></i></li>
                          @elseif($product->product_rate <=3.49)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          @elseif($product->product_rate <=3.99)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star-half"></i></li>
                          @elseif($product->product_rate <=4.49)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          @elseif($product->product_rate <=4.99)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--blank"><i class="icon-star"></i></li>
                          @else
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          @endif
                        </ul>
                        <a href="product-single-default.html" class="product__link">{{$product->product_name}}</a>

                        <div class="product__price m-t-5">
                            <span class="product__price"><?php echo rupiah($harga_jual_product) ?> 
                            @if($temp!=0)
                            <del><?php echo rupiah($product->price) ?> </del>
                            @endif
                          </span>
                        </div>
                      </div> <!-- End Product Content -->
                    </div> <!-- End Single Default Product -->
                    <?php $a_product=$a_product+1; ?>
                  @endif
                  @endforeach
                  @endforeach
                  </div>
                </div>
              </div>  <!-- End Single Tab Item -->

              <!-- Start Single Tab Item -->
              <div class="tab-pane" id="fish">
                <div class="default-slider default-slider--hover-bg-red product-default-slider">
                  <div class="product-default-slider-4grid-1rows gap__col--30 gap__row--40">
                  <?php $a_product=0; ?>
                  @foreach($products as $product)
                  @foreach($product->product_category_details as $dd)
                    @if($a_product<=3 && $dd->category_id == 6)
                    <!-- Start Single Default Product -->
                    <div class="product__box product__default--single text-center">
                      <!-- Start Product Image -->
                      <div class="product__img-box  pos-relative">
                          <a href="#" class="product__img--link">
                          <?php $i=0; ?>
                            <img class="product__img img-fluid" style="width:268px; height:268px;" @foreach($product->product_images as $dd)
                              @if($i<1)
                              src="asset/product/{{$product->id}}/{{$dd->image_name}}"
                              <?php $i=$i+1; ?>
                              @endif
                            @endforeach alt="">
                          </a>
                          <!-- Start Procuct Label -->
                          <!-- <span class="product__label product__label--sale-dis">-34%</span> -->
                          <!-- End Procuct Label -->
                          <!-- Start Product Action Link-->
                          <?php 
                          $temp = 0;
                          $discount_product= [];
                          $discount_product = $product->discounts->where('status_aktif', '=',0)->last();
                          if(!is_null($discount_product)){
                              $temp = $discount_product->percentage/100;
                              $harga_jual_product = $product->price - ($product->price*$temp);

                          }else{
                            $harga_jual_product=$product->price;
                          }
                          ?>

                          <ul class="product__action--link pos-absolute">
                            <?php $i=0; ?>
                            <li><a class="btnAddCart" data-product-id="{{$product->id}}" data-product-nama="{{$product->product_name}}" data-product-price="{{$product->price}}" data-product-pricesell="{{$harga_jual_product}}" 
                            @foreach($product->product_images as $dd)
                              @if($i<1)
                              data-product-image="asset/product/{{$product->id}}/{{$dd->image_name}}"
                              <?php $i=$i+1; ?>
                              @endif
                            @endforeach data-product-qty="{{$product->stock}}"><i class="icon-shopping-cart"></i></a></li>
                            <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                            <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                            <?php $i=0; ?>
                            <li><a class="btnQuickView" data-product-nama="{{$product->product_name}}" data-product-price="{{$product->price}}" data-product-pricesell="{{$harga_jual_product}}" 
                            @foreach($product->product_images as $dd)
                              @if($i<1)
                              data-product-image="asset/product/{{$product->id}}/{{$dd->image_name}}"
                              <?php $i=$i+1; ?>
                              @endif
                            @endforeach data-product-desc="{{$product->desc}}" data-product-qty="{{$product->stock}}" data-product-rate="{{$product->product_rate}}"><i class="icon-eye"></i></a></li>
                          </ul> <!-- End Product Action Link -->
                      </div> <!-- End Product Image -->
                      <!-- Start Product Content -->
                      <div class="product__content m-t-20">
                        <ul class="product__review">
                          @if($product->product_rate <=0.99)
                          <li class="product__review--fill"><i class="fas fa-star-half"></i></li>
                          @elseif($product->product_rate <=1.49)
                            <li class="product__review--fill"><i class="icon-star"></i></li>
                          @elseif($product->product_rate <=1.99)
                            <li class="product__review--fill"><i class="fas fa-star"></i></li>
                            <li class="product__review--fill"><i class="fas fa-star-half"></i></li>
                          @elseif($product->product_rate <=2.49)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          @elseif($product->product_rate <=2.99)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star-half"></i></li>
                          @elseif($product->product_rate <=3.49)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          @elseif($product->product_rate <=3.99)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star-half"></i></li>
                          @elseif($product->product_rate <=4.49)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          @elseif($product->product_rate <=4.99)
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--blank"><i class="icon-star"></i></li>
                          @else
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          <li class="product__review--fill"><i class="fas fa-star"></i></li>
                          @endif
                        </ul>
                        <a href="product-single-default.html" class="product__link">{{$product->product_name}}</a>

                        <div class="product__price m-t-5">
                            <span class="product__price"><?php echo rupiah($harga_jual_product) ?> 
                            @if($temp!=0)
                            <del><?php echo rupiah($product->price) ?> </del>
                            @endif
                          </span>
                        </div>
                      </div> <!-- End Product Content -->
                    </div> <!-- End Single Default Product -->
                    <?php $a_product=$a_product+1; ?>
                  @endif
                  @endforeach
                  @endforeach
                  </div>
                </div>
              </div>  <!-- End Single Tab Item -->
            </div>
          </div>
        </div>
      </div>
    </div> <!-- ::::::  End  Product Style - Default Section  ::::::  -->

    


  
  
	