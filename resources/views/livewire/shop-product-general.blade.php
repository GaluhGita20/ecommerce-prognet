<?php
  function rupiah ($angka) {
    $hasil = 'Rp. ' . number_format($angka, 0, ",", ".");
    return $hasil;
  }
?>


<!-- :::::: Start Main Container Wrapper :::::: -->
<main id="main-container" class="main-container">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <!-- Start Leftside - Sidebar Widget -->
            <div class="col-lg-3">
                <div class="sidebar">
                    <!-- Start Single Sidebar Widget - Filter [Catagory] -->
                    <div class="sidebar__widget">
                        <div class="sidebar__box">
                            <h5 class="sidebar__title">PRODUCT CATEGORIES</h5>
                        </div>
                        <ul class="sidebar__menu">
                            <li ><a class="accordion__title" href="#">General</a></li>  
                            @foreach($categories as $dd ) 
                            <li ><a href="#">{{$dd->category_name}}</a></li>
                            @endforeach   
                        </ul>
                    </div>  <!-- End SSingle Sidebar Widget - Filter [Catagory] -->

                    <!-- Start Single Sidebar Widget - Filter [Price] -->
                    <div class="sidebar__widget">
                        <div class="sidebar__box">
                            <h5 class="sidebar__title">FILTER BY Price (Rp.)</h5>
                        </div>
                        <div class="sidebar__price-filter ">
                            <div id="slider-range" class="price-filter-range"></div>
                            <div class="slider__price-filter-input d-flex justify-content-between">
                                <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" />
                                <input type="number" min=0 max="10000" oninput="validity.valid||(value='1000');" id="max_price" class="price-range-field" />
                            </div>
                        </div>
                    </div>  <!-- Start Single Sidebar Widget - Filter [Price] -->

                    <!-- ::::::  Start Sidebar Banner Widget  ::::::  -->
                    <div class="sidebar__widget">
                        <div class="row">
                            <div class="col-12">
                                <div class="sidebar__banner">
                                    <a href="product-single-default.html" class="banner__link text-center">
                                        <img class="img-fluid" src="../asset/landing/shop-sidebar.webp" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- ::::::  End Sidebar Banner Widget  ::::::  -->

                    <!-- ::::::  Start Sidebar Widget - Top Product   ::::::  -->
                    <div class="sidebar__widget">
                        <div class="sidebar__box">
                            <h5 class="sidebar__title">TOP RATED PRODUCTS</h5>
                        </div>
                        <ul class="sidebar__post-product list-space--medium ">
                            <li  class="d-flex align-items-center">
                                <a href="product-single-default.html" class="sidebar__product-img img-responsive">
                                    <img class="product__img img-fluid" src="assets/img/product/size-small/product-home-1-img-1.jpg" alt="">
                                </a>
                                <div class="product__content">
                                    <a href="product-single-default.html" class="product__link">Fresh Eggs</a>
                                    <ul class="product__review">
                                        <li class="product__review--fill"><i class="icon-star"></i></li>
                                        <li class="product__review--fill"><i class="icon-star"></i></li>
                                        <li class="product__review--fill"><i class="icon-star"></i></li>
                                        <li class="product__review--fill"><i class="icon-star"></i></li>
                                        <li class="product__review--blank"><i class="icon-star"></i></li>
                                    </ul>
                                    <div class="product__price">
                                        <span class="product__price">$10.00</span>
                                    </div>
                                </div> 
                            </li>
                            <li  class="d-flex align-items-center">
                                <a href="product-single-default.html" class="sidebar__product-img img-responsive">
                                    <img class="product__img img-fluid" src="assets/img/product/size-small/product-home-1-img-2.jpg" alt="">
                                </a>
                            <!-- Start Product Content -->
                            <div class="product__content">
                                <a href="product-single-default.html" class="product__link">Fresh Fruits</a>
                                <ul class="product__review">
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                </ul>
                                <div class="product__price">
                                    <span class="product__price">$17.00</span>
                                </div>
                            </div> <!-- End Product Content -->
                            </li>
                            <li  class="d-flex align-items-center">
                                    <a href="product-single-default.html" class="sidebar__product-img img-responsive">
                                        <img class="product__img img-fluid" src="assets/img/product/size-small/product-home-1-img-3.jpg" alt="">
                                    </a>
                                <!-- Start Product Content -->
                                <div class="product__content">
                                    <a href="product-single-default.html" class="product__link">Natural Juice</a>
                                    <ul class="product__review">
                                        <li class="product__review--fill"><i class="icon-star"></i></li>
                                        <li class="product__review--fill"><i class="icon-star"></i></li>
                                        <li class="product__review--fill"><i class="icon-star"></i></li>
                                        <li class="product__review--fill"><i class="icon-star"></i></li>
                                        <li class="product__review--blank"><i class="icon-star"></i></li>
                                    </ul>
                                    <div class="product__price">
                                        <span class="product__price">$25.00</span>
                                    </div>
                                </div> <!-- End Product Content -->
                            </li>
                        </ul>
                    </div> <!-- ::::::  End Sidebar Widget - Top Product  ::::::  -->
                </div>
            </div> <!-- End Left Sidebar Widget -->

            <!-- Start Rightside - Product Type View -->
            <div class="col-lg-9">
                <div class="img-responsive">
                    <img src="../asset/landing/banner-shop.webp" alt="">
                </div>
                <!-- ::::::  Start Sort Box Section  ::::::  -->
                <div class="sort-box m-tb-40">
                    <!-- Start Sort Left Side -->
                    <div class="sort-box-item">
                        <div class="sort-box__tab">
                            <ul class="sort-box__tab-list nav">
                                <li><a class="sort-nav-link active" data-toggle="tab" href="#sort-grid"><i class="fas fa-th"></i>  </a></li>
                                <li><a class="sort-nav-link" data-toggle="tab" href="#sort-list"><i class="fas fa-list-ul"></i></a></li>
                            </ul>
                        </div>
                    </div> <!-- Start Sort Left Side -->

                    <div class="sort-box-item d-flex align-items-center flex-warp">
                        <span>Sort By:</span>
                        <div class="sort-box__option">
                            <label class="select-sort__arrow">
                                <select name="select-sort" class="select-sort">
                                    <option value="1">Relevance</option>
                                    <option value="2">Name, A to Z</option>
                                    <option value="3"> Name, Z to A </option>
                                    <option value="4"> Price, low to high</option>
                                    <option value="5">Price, high to low</option>
                                </select>
                            </label>
                        </div>
                    </div>

                    <div class="sort-box-item">
                        <span>Showing 1 - {{$products->count()}} of {{$jmlh_product->count()}} result</span>
                    </div>
                </div> <!-- ::::::  Start Sort Box Section  ::::::  -->

                <div class="product-tab-area">
                    <div class="tab-content tab-animate-zoom">
                        <div class="tab-pane show active shop-grid" id="sort-grid">
                            <div class="row">
                              @foreach($products as $product)
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
                                <div class="col-md-4 col-12">
                                    <!-- Start Single Default Product -->
                                    <div class="product__box product__default--single text-center">
                                        <!-- Start Product Image -->
                                        <div class="product__img-box  pos-relative">
                                            <a @if(Auth::guest()) href="{{route('belanja.product.detail', $product->slug)}}" @else href="{{route('shop.product.detail', $product->slug)}}" @endif class="product__img--link">
                                              <?php $i=0; ?>
                                                <img class="product__img img-fluid" style="width:268px; height:268px;"  @foreach($product->product_images as $dd)
                                                  @if($i<1)
                                                  src="asset/product/{{$product->id}}/{{$dd->image_name}}"
                                                  <?php $i=$i+1; ?>
                                                  @endif
                                                @endforeach alt="">
                                            </a>
                                            <!-- Start Procuct Label -->
                                            <span class="product__label product__label--sale-dis">
                                              @if($harga_jual_product != $product->price)
                                              -{{$discount_product->percentage}}%
                                              @endif
                                            </span>
                                            <!-- End Procuct Label -->
                                            <!-- Start Product Action Link-->
                                            <ul class="product__action--link pos-absolute">
                                                <li><a class="btnAddCart" data-product-id="{{$product->id}}" data-product-nama="{{$product->product_name}}" data-product-price="{{$product->price}}" data-product-pricesell="{{$harga_jual_product}}" 
                                                <?php $i=0; ?>
                                                @foreach($product->product_images as $dd)
                                                  @if($i<1)
                                                  data-product-image="../asset/product/{{$product->id}}/{{$dd->image_name}}"
                                                  <?php $i=$i+1; ?>
                                                  @endif
                                                @endforeach data-product-qty="{{$product->stock}}"><i class="icon-shopping-cart"></i></a></li>
                                                <li><a href=""><i class="icon-sliders"></i></a></li>
                                                <li><a href=""><i class="icon-heart"></i></a></li>
                                                <li><a class="btnQuickView" data-product-nama="{{$product->product_name}}" data-product-price="{{$product->price}}" data-product-pricesell="{{$harga_jual_product}}" 
                                                <?php $i=0; ?>
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
                                            <a href="{{route('shop.product.detail', $product->slug)}}"class="product__link">{{$product->product_name}}</a>
                                            <div class="product__price m-t-5">
                                            <span class="product__price"><?php echo rupiah($harga_jual_product) ?> 
                                            @if($temp!=0)
                                            <del><?php echo rupiah($product->price) ?> </del>
                                            @endif
                                            </div>
                                        </div> <!-- End Product Content -->
                                    </div> <!-- End Single Default Product -->
                                </div>
                              @endforeach
                            </div>
                        </div>
                        <div class="tab-pane shop-list" id="sort-list">
                            <div class="row">
                                <!-- Start Single List Product -->
                                <div class="col-12">
                                    <div class="product__box product__box--list">
                                        <!-- Start Product Image -->
                                        <div class="product__img-box  pos-relative text-center">
                                            <a href="product-single-default.html" class="product__img--link">
                                                <img class="product__img img-fluid" src="assets/img/product/size-normal/product-home-1-img-5.jpg" alt="">
                                            </a>
                                            <!-- Start Procuct Label -->
                                                <span class="product__label product__label--sale-dis">-31%</span>
                                            <!-- End Procuct Label -->
                                        </div> <!-- End Product Image -->
                                        <!-- Start Product Content -->
                                        <div class="product__content">
                                            <ul class="product__review">
                                                <li class="product__review--fill"><i class="icon-star"></i></li>
                                                <li class="product__review--fill"><i class="icon-star"></i></li>
                                                <li class="product__review--fill"><i class="icon-star"></i></li>
                                                <li class="product__review--fill"><i class="icon-star"></i></li>
                                                <li class="product__review--blank"><i class="icon-star"></i></li>
                                            </ul>
                                            <a href="product-single-default.html" class="product__link"><h5 class="font--regular">Best Red Meat</h5></a>
                                            <div class="product__price m-t-5">
                                                <span class="product__price">$55.00 <del>$80.00</del></span>
                                            </div>
                                            <div class="product__desc">
                                                <p>
                                                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.
                                                </p>
                                            </div>
                                            <!-- Start Product Action Link-->
                                            <ul class="product__action--link-list m-t-30">
                                                <li><a href="#modalAddCart" data-toggle="modal" class="btn--black btn--black-hover-green">Add to cart</a></li>
                                                <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                                                <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                            </ul> <!-- End Product Action Link -->
                                        </div> <!-- End Product Content -->
                                    </div> 
                                </div> <!-- End Single List Product -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="page-pagination">
                    <ul class="page-pagination__list">
                        <li class="page-pagination__item"><a class="page-pagination__link"  href="#">Prev</a>
                        <li class="page-pagination__item"><a class="page-pagination__link active"  href="#">1</a></li>
                        <li class="page-pagination__item"><a class="page-pagination__link"  href="#">2</a></li>
                        <li class="page-pagination__item"><a class="page-pagination__link"  href="#">Next</a>
                        </li>
                      </ul>
                </div> -->
                <style>
          nav .flex.justify-between.flex-1{
            display:none;
          }
          .w-5.h-5{
            width:50px;
          }
          </style>
        {{$products->render()}}

            </div>  <!-- Start Rightside - Product Type View -->
            
        </div>
    </div>
</main>  <!-- :::::: End MainContainer Wrapper :::::: -->