<?php

  function rupiah ($angka) {
    $hasil = 'Rp. ' . number_format($angka, 0, ",", ".");
    return $hasil;
  }
	$temp_shipping=0;
?>  
  
  
    <form action="{{route('checkout_confirm')}}" method="POST" class="form-box">
      @csrf
      <div class="row">
      <!-- Start Client Shipping Address -->
      <div class="col-lg-7">
        <div class="section-content">
            <h5 class="section-content__title">Billing Details</h5>
        </div>
        <div class="row">
          <div class="col-md-12">
              <div class="form-box__single-group">
                  <label for="form-company-name">Name</label>
                  <input type="text" id="form-company-name" value="{{Auth::user()->name}}" readonly>
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-box__single-group">
                  <label for="form-country">* Country</label>
                  <select id="form-country" disabled>
                      <option value="select-country" selected>Indonesia</option>
                  </select>
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-box__single-group">
                  <label for="form-address-1">Address</label>
                  <input type="text" id="form-address-1" placeholder="House number and street name" name="address">
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-box__single-group">
                  <label for="form-country">* Province</label>
                  <select id="form-country" name="province" wire:model="input_province">
                      <option value="" selected>Select your province</option>
                      @foreach($provinces as $province)
                      <option value="{{$province->title}}">{{$province->title}}</option>
                      @endforeach
                  </select>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-box__single-group">
                  <label for="form-state">* Region / Regency</label>
                  <select id="form-state" name="regency" wire:model="input_region">
                  @if(is_null($input_province))
                      <option value="" selected>Input your province first</option>
                  @else
                      <!-- <option value="" selected>Select your region</option> -->
                      @foreach($regions as $region)
                      <option value="{{$region->title}}" 
                      >{{$region->title}}</option>
                      @endforeach
                  @endif
                  </select>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-box__single-group">
                  <label for="form-zipcode">* Zip/Postal Code</label>
                  <input type="text" id="form-zipcode" name="postal_code" value="">
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-box__single-group">
                  <label for="form-zipcode">* Courier</label>
                  <select id="form-state" name="courier_id" wire:model="input_courier">
                      <option value="" selected>Select your courier</option>
                      @foreach($couriers as $courier)
                      <option value="{{$courier->id}}">{{$courier->courier}}</option>
                      @endforeach
                  </select>
              </div>
          </div>
          
          <div class="col-md-12">
              <div class="form-box__single-group">
                  <label for="form-zipcode">* Shipping Service</label>
                  <select id="form-state" name="shipping_service" wire:model="input_service">
                      <option value="" selected>Select your courier</option>
                      @foreach($result as $dd)
                      <option value="{{$dd['description']}}">{{$dd['description']}}</option>
                      @endforeach
                  </select>
              </div>
          </div>
          @if(!is_null($input_service))
          <div class="col-md-6">
              <div class="form-box__single-group">
                  <label for="form-zipcode">* Shipping Cost</label>
                  <input type="text" id="input_biaya_shipping" value="<?php echo(rupiah($temp_biaya)) ?>">     
                  <input type="text" id="input_biaya_shipping" name="shipping_cost" value="{{$temp_biaya}}" hidden>                                                                                     
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-box__single-group">
                  <label for="form-zipcode">* Estimansi Tiba</label>
                  <input type="text" name="shipping_etd" value="{{$temp_etd}} Hari">   
                  <input type="number" name="total" value="{{$total_tagihan}}" hidden> 
                  <input type="number" name="weight" value="{{$total_weight}}" hidden>              

              </div>
          </div>
          @endif
          <div class="col-md-12">
              <div class="form-box__single-group">
                  <h6>Additional information</h6>
                  <label for="form-additional-info">Order notes</label>
                  <textarea  id="form-additional-info" rows="5" name="order_notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
              </div>
          </div>
        </div>
      </div> <!-- End Client Shipping Address -->
      
      <!-- Start Order Wrapper -->
      <div class="col-lg-5">
        <div class="your-order-section">
            <div class="section-content">
                <h5 class="section-content__title">Your order</h5>
            </div>
            <div class="your-order-box gray-bg m-t-40 m-b-30">
            <div class="your-order-product-info">
                <div class="your-order-top d-flex justify-content-between">
                    <h6 class="your-order-top-left font--bold">Product</h6>
                    <h6 class="your-order-top-right font--bold">Total</h6>
                </div>
                <ul class="your-order-middle">
                @foreach($carts as $cart)
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
                    <li class="d-flex justify-content-between">
                        <input type="text" name="products[]" value="{{$cart->product->id}}" hidden>
                        <input type="number" name="qty_carts[]" value="{{$cart->qty}}" hidden>
                        <span class="your-order-middle-left font--semi-bold">{{$cart->product->product_name}} X {{$cart->qty}}</span>
                        <span class="your-order-middle-right font--semi-bold">{{rupiah($harga_jual_product*$cart->qty)}}</span>
                    </li>
                @endforeach
                </ul>
                <div class="your-order-bottom d-flex justify-content-between">
                    <h6 class="your-order-bottom-left font--bold">Shipping</h6>
                    <span class="your-order-bottom-right font--semi-bold" id="input_biaya_nota">{{rupiah($temp_biaya)}}</span>
                </div>
                <div class="your-order-total d-flex justify-content-between">
                    <h5 class="your-order-total-left font--bold">Total</h5>
                    <h5 class="your-order-total-right font--bold">{{rupiah($total_tagihan)}}</h5>
                </div>

                <div class="payment-method">
                    <div class="payment-accordion element-mrg">
                        <div class="panel-group" id="accordion">
                            <div class="panel payment-accordion">
                                <div class="panel-heading" id="method-one">
                                    <h4 class="panel-title">
                                        <a class="collapsed d-flex justify-content-between align-items-center" data-toggle="collapse" data-parent="#accordion" href="#method1" aria-expanded="false">
                                            Direct bank transfer <i class="far fa-chevron-down"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="method1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel payment-accordion">
                                <div class="panel-heading" id="method-two">
                                    <h4 class="panel-title">
                                        <a class="collapsed d-flex justify-content-between align-items-center" data-toggle="collapse" data-parent="#accordion" href="#method2" aria-expanded="false">
                                            Check payments <i class="far fa-chevron-down"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="method2" class="panel-collapse collapse" >
                                    <div class="panel-body">
                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel payment-accordion">
                                <div class="panel-heading" id="method-three">
                                    <h4 class="panel-title">
                                        <a class="collapsed d-flex justify-content-between align-items-center" data-toggle="collapse" data-parent="#accordion" href="#method3" aria-expanded="false">
                                            Cash on delivery <i class="far fa-chevron-down"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="method3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="text-center">
            <button class="btn btn--small btn--radius btn--green btn--green-hover-black btn--uppercase font--bold" type="submit">PLACE ORDER</button>
            </div>
        </div>
      </div> <!-- End Order Wrapper -->
      </div>  
    </form>
    