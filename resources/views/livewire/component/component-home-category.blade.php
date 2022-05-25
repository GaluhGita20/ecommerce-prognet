    <!-- ::::::  Start  Product Style - Catagory Section  ::::::  -->
    <div class="product m-t-100">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <!-- Start Section Title -->
            <div class="section-content section-content--border m-b-35">
              <h5 class="section-content__title">Top categories</h5>
              <a href="shop-sidebar-grid-left.html" class="btn btn--icon-left btn--small btn--radius btn--transparent btn--border-green btn--border-green-hover-green font--regular text-capitalize">More categories <i class="fal fa-angle-right"></i></a>
            </div>  <!-- End Section Title -->
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="product__catagory">
              @foreach($categories as $category)
              <!-- Start Single catagory Product -->
              <div class="product__catagory--single">
                <!-- Start Product Content -->
                <div class="product__content product__content--catagory">
                  <a href="product-single-default.html" class="product__link">{{$category->category_name}}</a>
                  <span class="product__items--text">{{$category->product_category_details->count()}} Products</span>
                </div> <!-- End Product Content -->
                <!-- Start Product Image -->
                <div class="product__img-box product__img-box--catagory">
                  <a href="product-single-default.html" class="product__img--link">
                    <img class="product__img img-fluid" src="{{ URL::asset('asset/kategori/' . $category->gambar) }}" alt="">
                  </a>
                </div> <!-- End Product Image -->
              </div> <!-- End Single Default Product -->
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div> <!-- ::::::  End  Product Style - Catagory Section  ::::::  -->