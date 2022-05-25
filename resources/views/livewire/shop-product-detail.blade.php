<!-- :::::: Start Main Container Wrapper :::::: -->
<main id="main-container" class="main-container">

<!-- Start Product Details Gallery -->
<div class="product-details">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="product-gallery-box product-gallery-box--default m-b-60">
                  <?php $i=0; ?>
                  @if($product->product_images->count()==1)
                    @foreach($product->product_images as $dd)
                      @if($i<=0)
                      <div class="product-image--large product-image--large-horizontal">
                          <img class="img-fluid" id="img-zoom" src="../asset/product/{{$product->id}}/{{$dd->image_name}}" data-zoom-image="../asset/product/{{$product->id}}/{{$dd->image_name}}" alt="">
                      </div>
                      <?php $i=$i+1; ?>
                      @endif
                    @endforeach
                  @else
                    <?php $i=0; ?>
                    @foreach($product->product_images as $dd)
                      @if($i<=0)
                      <div class="product-image--large product-image--large-horizontal">
                          <img class="img-fluid" id="img-zoom" src="../asset/product/{{$product->id}}/{{$dd->image_name}}" data-zoom-image="../asset/product/{{$product->id}}/{{$dd->image_name}}" alt="">
                      </div>
                      <?php $i=$i+1; ?>
                      @endif
                    @endforeach  
                    <?php $i=0; ?>       
                    <div id="gallery-zoom" class="product-image--thumb product-image--thumb-horizontal pos-relative">
                     @foreach($product->product_images as $dd)
                      @if($i==0)
                      <a class="zoom-active" src="../asset/product/{{$product->id}}/{{$dd->image_name}}" data-zoom-image="../asset/product/{{$product->id}}/{{$dd->image_name}}" >
                              <img class="img-fluid" src="../asset/product/{{$product->id}}/{{$dd->image_name}}" alt="">
                      </a>
                      @else
                        <a src="../asset/product/{{$product->id}}/{{$dd->image_name}}" data-zoom-image="../asset/product/{{$product->id}}/{{$dd->image_name}}" >
                            <img class="img-fluid" src="../asset/product/{{$product->id}}/{{$dd->image_name}}" alt="">
                        </a>
                      @endif
                      <?php $i=$i+1; ?>
                      @endforeach
                    </div>
                  @endif
                  
                </div>
            </div>
            <div class="col-md-7">
                <div class="product-details-box m-b-60">
                    <h4 class="font--regular m-b-20">{{$product->product_name}}</h4>
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
                    <div class="product__price m-t-5">
                        <span class="product__price product__price--large">{{rupiah($harga_jual_product)}} @if($temp!=0) <del>{{rupiah($product->price)}}</del> @endif</span>
                        @if($temp!=0)
                        <span class="product__tag m-l-15 btn--tiny btn--green">-{{$discount_product->percentage}}%</span>
                        @endif
                    </div>

                    <div class="product__desc m-t-25 m-b-30">
                        <p>{{$product->desc}}</p>
                    </div>
                    <div class="product-var p-tb-30">
                        <div class="product__stock m-b-20">
                            <span class="product__stock--in"><i class="fas fa-check-circle"></i> {{$product->stock}} IN STOCK</span>
                        </div>
                        <div class="product-quantity product-var__item">
                            <ul class="product-modal-group">
                                <li><a href="#modalShippinginfo" data-toggle="modal"  class="link--gray link--icon-left"><i class="fal fa-truck-container"></i>Shipping</a></li>
                                <li><a href="#modalProductAsk" data-toggle="modal"  class="link--gray link--icon-left"><i class="fal fa-envelope"></i>Ask About This product</a></li>
                            </ul>
                        </div>
                        <div class="product-var__item">
                            <a data-product-id="{{$product->id}}" data-product-nama="{{$product->product_name}}" data-product-price="{{$product->price}}" data-product-pricesell="{{$harga_jual_product}}" 
                            <?php $i=0; ?>
                            @foreach($product->product_images as $dd)
                              @if($i<1)
                              data-product-image="../asset/product/{{$product->id}}/{{$dd->image_name}}"
                              <?php $i=$i+1; ?>
                              @endif
                            @endforeach data-product-qty="{{$product->stock}}" href="#modalAddCart" data-toggle="modal" data-dismiss="modal" class="btnAddCart btn btn--long btn--radius-tiny btn--green btn--green-hover-black btn--uppercase btn--weight m-r-20">Add to cart</a>
                            <a href="wishlist.html" class="btn btn--round btn--round-size-small btn--green btn--green-hover-black"><i class="fas fa-heart"></i></a>
                        </div>
                        <div class="product-var__item">
                            <span class="product-var__text">Guaranteed safe checkout </span>
                            <ul class="payment-icon m-t-5">
                                <li><img src="assets/img/icon/payment/paypal.svg" alt=""></li>
                                <li><img src="assets/img/icon/payment/amex.svg" alt=""></li>
                                <li><img src="assets/img/icon/payment/ipay.svg" alt=""></li>
                                <li><img src="assets/img/icon/payment/visa.svg" alt=""></li>
                                <li><img src="assets/img/icon/payment/shoify.svg" alt=""></li>
                                <li><img src="assets/img/icon/payment/mastercard.svg" alt=""></li>
                                <li><img src="assets/img/icon/payment/gpay.svg" alt=""></li>
                            </ul>
                        </div>
                        <div class="product-var__item d-flex align-items-center">
                            <span class="product-var__text">Share: </span>
                            <ul class="product-social m-l-20">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Product Details Gallery -->

<!-- Start Product Details Tab -->
<div class="product-details-tab-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-details-content">
                    <ul class="tablist tablist--style-black tablist--style-title tablist--style-gap-30 nav">
                        <li><a class="nav-link active" data-toggle="tab" href="#product-desc">Description</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#product-dis">Product Details</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#product-review">Reviews</a></li>
                    </ul>
                    <div class="product-details-tab-box">
                        <div class="tab-content">
                            <!-- Start Tab - Product Description -->
                            <div class="tab-pane show active" id="product-desc">
                                <div class="para__content">
                                    <p class="para__text">{{$product->desc}} </p>
                                </div>    
                            </div>  <!-- End Tab - Product Description -->

                            <!-- Start Tab - Product Details -->
                            <div class="tab-pane" id="product-dis">
                                <div class="product-dis__content">
                                    <a href="#" class="product-dis__img m-b-30"><img src="assets/img/logo/another-logo.jpg" alt=""></a>
                                    <div class="table-responsive-md">
                                        <table class="product-dis__list table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="product-dis__title">Weight</td>
                                                    <td class="product-dis__text">{{$product->weight}} g</td>
                                                </tr>
                                                <tr>
                                                    <td class="product-dis__title">Price Normal</td>
                                                    <td class="product-dis__text">{{$product->price}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="product-dis__title">Price Now</td>
                                                    <td class="product-dis__text">{{$harga_jual_product}}</td>
                                                </tr>
                                                <tr> 
                                                    <td class="product-dis__title">Category Product</td>
                                                    <td class="product-dis__text">
                                                      @foreach($product->product_category_details as $dd)
                                                        {{$dd->category->category_name}}
                                                      @endforeach
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>  <!-- End Tab - Product Details -->

                            <!-- Start Tab - Product Review -->
                            <div class="tab-pane " id="product-review">
                                <!-- Start - Review Comment -->
                                <ul class="comment">
                                    @foreach($product->product_reviews as $review)
                                    <!-- Start - Review Comment list-->
                                    <li class="comment__list">
                                        <div class="comment__wrapper">
                                            <div class="comment__img">
                                                <img src="/asset/users/{{$review->user->id}}/{{$review->user->profile_image}}" alt=""> 
                                            </div>
                                            <div class="comment__content">
                                                <div class="comment__content-top">
                                                    <div class="comment__content-left">
                                                        <h6 class="comment__name">{{$review->user->name}}</h6>
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
                                                    </div>   
                                                    <div class="comment__content-right">
                                                        <a href="#" class="link--gray link--icon-left m-b-5"><i class="fas fa-reply"></i>Reply</a>
                                                    </div>
                                                </div>
                                                
                                                <div class="para__content">
                                                    <p class="para__text">{{$review->content}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Start - Review Comment Reply-->
                                        <!-- <ul class="comment__reply">
                                            <li class="comment__reply-list">
                                                <div class="comment__wrapper">
                                                    <div class="comment__img">
                                                        <img src="assets/img/user/image-2.png" alt=""> 
                                                    </div>
                                                    <div class="comment__content">
                                                        <div class="comment__content-top">
                                                            <div class="comment__content-left">
                                                                <h6 class="comment__name">Oaklee Odom</h6>
                                                            </div>   
                                                            <div class="comment__content-right">
                                                                <a href="#" class="link--gray link--icon-left m-b-5"><i class="fas fa-reply"></i>Reply</a>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="para__content">
                                                            <p class="para__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, voluptatem maiores animi dolor nulla magnam ea! Dignissimos aspernatur cumque nam quod sint provident modi alias culpa, inventore deserunt accusantium amet earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo enim dolores quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe repellat. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>  -->
                                        <!-- End - Review Comment Reply-->
                                    </li> <!-- End - Review Comment list-->
                                    @endforeach
                                </ul>  <!-- End - Review Comment -->
                            </div>  <!-- Start Tab - Product Review -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  <!-- End Product Details Tab -->

<!-- ::::::  Start  Product Style - Default Section  ::::::  -->
<div class="product m-t-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                 <!-- Start Section Title -->
                <div class="section-content section-content--border m-b-35">
                    <h5 class="section-content__title">Related Product
                    </h5>
                    <a href="shop-sidebar-grid-left.html" class="btn btn--icon-left btn--small btn--radius btn--transparent btn--border-green btn--border-green-hover-green font--regular text-capitalize">More Products<i class="fal fa-angle-right"></i></a>
                </div>  <!-- End Section Title -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="default-slider default-slider--hover-bg-red product-default-slider">
                    <div class="product-default-slider-4grid-1rows gap__col--30 gap__row--40">

                        <!-- Start Single Default Product -->
                        <div class="product__box product__default--single text-center">
                            <!-- Start Product Image -->
                            <div class="product__img-box  pos-relative">
                                <a href="product-single-default.html" class="product__img--link">
                                    <img class="product__img img-fluid" src="assets/img/product/size-normal/product-home-1-img-1.jpg" alt="">
                                </a>
                                <!-- Start Procuct Label -->
                                <span class="product__label product__label--sale-dis">-34%</span>
                                <!-- End Procuct Label -->
                                <!-- Start Product Action Link-->
                                <ul class="product__action--link pos-absolute">
                                    <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                                    <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                                    <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                    <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                                </ul> <!-- End Product Action Link -->
                            </div> <!-- End Product Image -->
                            <!-- Start Product Content -->
                            <div class="product__content m-t-20">
                                <ul class="product__review">
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                </ul>
                                <a href="product-single-default.html" class="product__link">Fresh green vegetable</a>
                                <div class="product__price m-t-5">
                                    <span class="product__price">$19.00 <del>$29.00</del></span>
                                </div>
                            </div> <!-- End Product Content -->
                        </div> <!-- End Single Default Product -->
                        
                        <!-- Start Single Default Product -->
                        <div class="product__box product__default--single text-center">
                            <!-- Start Product Image -->
                            <div class="product__img-box  pos-relative">
                                <a href="product-single-default.html" class="product__img--link">
                                    <img class="product__img img-fluid" src="assets/img/product/size-normal/product-home-1-img-2.jpg" alt="">
                                </a>
                                <!-- Start Product Action Link-->
                                <ul class="product__action--link pos-absolute">
                                    <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                                    <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                                    <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                    <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                                </ul> <!-- End Product Action Link -->
                            </div> <!-- End Product Image -->
                            <!-- Start Product Content -->
                            <div class="product__content m-t-20">
                                <ul class="product__review">
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                </ul>
                                <a href="product-single-default.html" class="product__link">Fresh river fish</a>
                                <div class="product__price m-t-5">
                                    <span class="product__price">$25.00</span>
                                </div>
                            </div> <!-- End Product Content -->
                        </div> <!-- End Single Default Product -->
                        
                        <!-- Start Single Default Product -->
                        <div class="product__box product__default--single text-center">
                            <!-- Start Product Image -->
                            <div class="product__img-box  pos-relative">
                                <a href="product-single-default.html" class="product__img--link">
                                    <img class="product__img img-fluid" src="assets/img/product/size-normal/product-home-1-img-3.jpg" alt="">
                                </a>
                                <!-- Start Procuct Label -->
                                <span class="product__label product__label--sale-dis">-10%</span>
                                <!-- End Procuct Label -->
                                <!-- Start Product Countdown -->
                                <div class="product__counter-box">
                                    <div class="product__counter-item" data-countdown="2023/09/27"></div>
                                </div> <!-- End Product Countdown -->
                                <!-- Start Product Action Link-->
                                <ul class="product__action--link pos-absolute">
                                    <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                                    <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                                    <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                    <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                                </ul> <!-- End Product Action Link -->
                            </div> <!-- End Product Image -->
                            <!-- Start Product Content -->
                            <div class="product__content m-t-20">
                                <ul class="product__review">
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                </ul>
                                <a href="product-single-default.html" class="product__link">Fresh pomegranate</a>
                                <div class="product__price m-t-5">
                                    <span class="product__price">$19.00 <del>$21.00</del></span>
                                </div>
                            </div> <!-- End Product Content -->
                        </div> <!-- End Single Default Product -->
                        
                        <!-- Start Single Default Product -->
                        <div class="product__box product__default--single text-center">
                            <!-- Start Product Image -->
                            <div class="product__img-box  pos-relative">
                                <a href="product-single-default.html" class="product__img--link">
                                    <img class="product__img img-fluid" src="assets/img/product/size-normal/product-home-1-img-4.jpg" alt="">
                                </a>
                                <!-- Start Product Action Link-->
                                <ul class="product__action--link pos-absolute">
                                    <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                                    <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                                    <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                    <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                                </ul> <!-- End Product Action Link -->
                            </div> <!-- End Product Image -->
                            <!-- Start Product Content -->
                            <div class="product__content m-t-20">
                                <ul class="product__review">
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                </ul>
                                <a href="product-single-default.html" class="product__link">Cabbage vegetables</a>
                                <div class="product__price m-t-5">
                                    <span class="product__price">$50.00</span>
                                </div>
                            </div> <!-- End Product Content -->
                        </div> <!-- End Single Default Product -->
                        
                        <!-- Start Single Default Product -->
                        <div class="product__box product__default--single text-center">
                            <!-- Start Product Image -->
                            <div class="product__img-box  pos-relative">
                                <a href="product-single-default.html" class="product__img--link">
                                    <img class="product__img img-fluid" src="assets/img/product/size-normal/product-home-1-img-5.jpg" alt="">
                                </a>
                                <!-- Start Procuct Label -->
                                <span class="product__label product__label--sale-dis">-31%</span>
                                <!-- End Procuct Label -->
                                <!-- Start Product Action Link-->
                                <ul class="product__action--link pos-absolute">
                                    <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                                    <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                                    <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                    <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                                </ul> <!-- End Product Action Link -->
                            </div> <!-- End Product Image -->
                            <!-- Start Product Content -->
                            <div class="product__content m-t-20">
                                <ul class="product__review">
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                </ul>
                                <a href="product-single-default.html" class="product__link">Best red meat</a>
                                <div class="product__price m-t-5">
                                    <span class="product__price">$55.00 <del>$80.00</del></span>
                                </div>
                            </div> <!-- End Product Content -->
                        </div> <!-- End Single Default Product -->
                        
                        <!-- Start Single Default Product -->
                        <div class="product__box product__default--single text-center">
                            <!-- Start Product Image -->
                            <div class="product__img-box  pos-relative">
                                <a href="product-single-default.html" class="product__img--link">
                                    <img class="product__img img-fluid" src="assets/img/product/size-normal/product-home-1-img-6.jpg" alt="">
                                </a>
                                <!-- Start Procuct Label -->
                                <span class="product__label product__label--sale-dis">-34%</span>
                                <!-- End Procuct Label -->
                                <!-- Start Product Action Link-->
                                <ul class="product__action--link pos-absolute">
                                    <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                                    <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                                    <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                    <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                                </ul> <!-- End Product Action Link -->
                            </div> <!-- End Product Image -->
                            <!-- Start Product Content -->
                            <div class="product__content m-t-20">
                                <ul class="product__review">
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                </ul>
                                <a href="product-single-default.html" class="product__link">Fresh green apple</a>
                                <div class="product__price m-t-5">
                                    <span class="product__price">$19.00 <del>$29.00</del></span>
                                </div>
                            </div> <!-- End Product Content -->
                        </div> <!-- End Single Default Product -->
                        
                        <!-- Start Single Default Product -->
                        <div class="product__box product__default--single text-center">
                            <!-- Start Product Image -->
                            <div class="product__img-box  pos-relative">
                                <a href="product-single-default.html" class="product__img--link">
                                    <img class="product__img img-fluid" src="assets/img/product/size-normal/product-home-1-img-7.jpg" alt="">
                                </a>
                                <!-- Start Procuct Label -->
                                <span class="product__label product__label--sale-dis">-34%</span>
                                <!-- End Procuct Label -->
                                <!-- Start Product Action Link-->
                                <ul class="product__action--link pos-absolute">
                                    <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                                    <li><a href=""><i class="icon-sliders"></i></a></li>
                                    <li><a href=""><i class="icon-heart"></i></a></li>
                                    <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                                </ul> <!-- End Product Action Link -->
                            </div> <!-- End Product Image -->
                            <!-- Start Product Content -->
                            <div class="product__content m-t-20">
                                <ul class="product__review">
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                </ul>
                                <a href="product-single-default.html" class="product__link">Juice fresh orange</a>
                                <div class="product__price m-t-5">
                                    <span class="product__price">$19.00 <del>$29.00</del></span>
                                </div>
                            </div> <!-- End Product Content -->
                        </div> <!-- End Single Default Product -->
                        
                        <!-- Start Single Default Product -->
                        <div class="product__box product__default--single text-center">
                            <!-- Start Product Image -->
                            <div class="product__img-box  pos-relative">
                                <a href="product-single-default.html" class="product__img--link">
                                    <img class="product__img img-fluid" src="assets/img/product/size-normal/product-home-1-img-8.jpg" alt="">
                                </a>
                                <!-- Start Procuct Label -->
                                <span class="product__label product__label--sale-dis">-35%</span>
                                <!-- End Procuct Label -->
                                <!-- Start Product Countdown -->
                                <div class="product__counter-box">
                                    <div class="product__counter-item" data-countdown="2021/03/01"></div>
                                </div> <!-- End Product Countdown -->
                                <!-- Start Product Action Link-->
                                <ul class="product__action--link pos-absolute">
                                    <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                                    <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                                    <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                    <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                                </ul> <!-- End Product Action Link -->
                            </div> <!-- End Product Image -->
                            <!-- Start Product Content -->
                            <div class="product__content m-t-20">
                                <ul class="product__review">
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                </ul>
                                <a href="product-single-default.html" class="product__link">Best ripe grapes</a>
                                <div class="product__price m-t-5">
                                    <span class="product__price">$39.00 <del>$60.00</del></span>
                                </div>
                            </div> <!-- End Product Content -->
                        </div> <!-- End Single Default Product -->

                        <!-- Start Single Default Product -->
                        <div class="product__box product__default--single text-center">
                            <!-- Start Product Image -->
                            <div class="product__img-box  pos-relative">
                                <a href="product-single-default.html" class="product__img--link">
                                    <img class="product__img img-fluid" src="assets/img/product/size-normal/product-home-1-img-9.jpg" alt="">
                                </a>
                                <!-- Start Procuct Label -->
                                <span class="product__label product__label--sale-out">Soldout</span>
                                <!-- End Procuct Label -->
                                <!-- Start Product Action Link-->
                                <ul class="product__action--link pos-absolute">
                                    <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                                    <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                                    <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                    <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                                </ul> <!-- End Product Action Link -->
                            </div> <!-- End Product Image -->
                            <!-- Start Product Content -->
                            <div class="product__content m-t-20">
                                <ul class="product__review">
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                </ul>
                                <a href="product-single-default.html" class="product__link">Cow fresh milk</a>
                                <div class="product__price m-t-5">
                                    <span class="product__price">$55.00 <del>$75.00</del></span>
                                </div>
                            </div> <!-- End Product Content -->
                        </div> <!-- End Single Default Product -->
                        
                        <!-- Start Single Default Product -->
                        <div class="product__box product__default--single text-center">
                            <!-- Start Product Image -->
                            <div class="product__img-box  pos-relative">
                                <a href="product-single-default.html" class="product__img--link">
                                    <img class="product__img img-fluid" src="assets/img/product/size-normal/product-home-1-img-10.jpg" alt="">
                                </a>
                                <!-- Start Procuct Label -->
                                <span class="product__label product__label--sale-out">Soldout</span>
                                <!-- End Procuct Label -->
                                <!-- Start Product Action Link-->
                                <ul class="product__action--link pos-absolute">
                                    <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                                    <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                                    <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                    <li><a href="#modalQuickView" data-toggle="modal"><i class="icon-eye"></i></a></li>
                                </ul> <!-- End Product Action Link -->
                            </div> <!-- End Product Image -->
                            <!-- Start Product Content -->
                            <div class="product__content m-t-20">
                                <ul class="product__review">
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                </ul>
                                <a href="product-single-default.html" class="product__link">Fresh Red Tomato</a>
                                <div class="product__price m-t-5">
                                    <span class="product__price">$10.00</span>
                                </div>
                            </div> <!-- End Product Content -->
                        </div> <!-- End Single Default Product -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ::::::  End  Product Style - Default Section  ::::::  -->

<!-- ::::::  Start  Company Logo Section  ::::::  -->
<div class="company-logo m-t-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="company-logo__area default-slider">
                    <!-- Start Single Company Logo Item -->
                    <div class="company-logo__item">
                        <a href="#" class="company-logo__link">
                            <img src="assets/img/company-logo/company-logo-1.png" alt="" class="company-logo__img">
                        </a>
                    </div> <!-- End Single Company Logo Item -->
                    <!-- Start Single Company Logo Item -->
                    <div class="company-logo__item">
                        <a href="#" class="company-logo__link">
                            <img src="assets/img/company-logo/company-logo-2.png" alt="" class="company-logo__img">
                        </a>
                    </div> <!-- End Single Company Logo Item -->
                    <!-- Start Single Company Logo Item -->
                    <div class="company-logo__item">
                        <a href="#" class="company-logo__link">
                            <img src="assets/img/company-logo/company-logo-3.png" alt="" class="company-logo__img">
                        </a>
                    </div> <!-- End Single Company Logo Item -->
                    <!-- Start Single Company Logo Item -->
                    <div class="company-logo__item">
                        <a href="#" class="company-logo__link">
                            <img src="assets/img/company-logo/company-logo-4.png" alt="" class="company-logo__img">
                        </a>
                    </div> <!-- End Single Company Logo Item -->
                    <!-- Start Single Company Logo Item -->
                    <div class="company-logo__item">
                        <a href="#" class="company-logo__link">
                            <img src="assets/img/company-logo/company-logo-5.png" alt="" class="company-logo__img">
                        </a>
                    </div> <!-- End Single Company Logo Item -->
                    <!-- Start Single Company Logo Item -->
                    <div class="company-logo__item">
                        <a href="#" class="company-logo__link">
                            <img src="assets/img/company-logo/company-logo-6.png" alt="" class="company-logo__img">
                        </a>
                    </div> <!-- End Single Company Logo Item -->
                    <!-- Start Single Company Logo Item -->
                    <div class="company-logo__item">
                        <a href="#" class="company-logo__link">
                            <img src="assets/img/company-logo/company-logo-7.png" alt="" class="company-logo__img">
                        </a>
                    </div> <!-- End Single Company Logo Item -->
                </div>
            </div>
        </div>
    </div>
</div> <!-- ::::::  End  Company Logo Section  ::::::  -->

</main>  <!-- :::::: End MainContainer Wrapper :::::: -->