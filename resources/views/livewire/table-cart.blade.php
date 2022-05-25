<!-- Start Cart Table -->
<div class="table-content table-responsive cart-table-content m-t-30">
  <table>
      <thead class="gray-bg" >
          <tr>
              <th>Image</th>
              <th>Product Name</th>
              <th>Until Price</th>
              <th>Qty</th>
              <th>Subtotal</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
        @if($carts->count() == 0)
        <tr class="text-center">
          <td colspan="10">Theres no cart found on  database</td>
        </tr>
        @else
        @foreach($carts as $cart)
        <tr>
            <td class="product-thumbnail">
            <?php $i=0; ?>
              @foreach($cart->product->product_images as $dd)
              @if($i<=0)
                <a href="#"><img class="img-fluid" src="asset/product/{{$cart->product->id}}/{{$dd->image_name}}" alt=""></a>
                <?php $i=$i+1; ?>
              @endif
              @endforeach
            </td>
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
            <td class="product-name"><a href="#">{{$cart->product->product_name}}</a></td>
            <td class="product-price-cart"><span class="amount">{{rupiah($harga_jual_product)}}</span></td>
            <td class="product-quantities">
                    {{$cart->qty}}
            </td>
            <td class="product-subtotal">{{rupiah($cart->qty*$harga_jual_product)}}</td>
            <div class="sweetalert">
            <?php $i=0; ?>
              <form action="{{Route('cart.delete', $cart->id)}}" method="POST">
                @csrf
                <td class="product-remove">
                  <a class="btnUpdateCart" data-qty-cart="{{$cart->qty}}" data-product-id="{{$cart->product->id}}" data-product-nama="{{$cart->product->product_name}}" data-product-price="{{$cart->product->price}}" data-product-pricesell="{{$harga_jual_product}}" 
                  @foreach($cart->product->product_images as $dd)
                    @if($i<1)
                    data-product-image="/asset/product/{{$cart->product->id}}/{{$dd->image_name}}"
                    <?php $i=$i+1; ?>
                    @endif
                  @endforeach data-product-qty="{{$cart->product->stock}}" ><i class="fa fa-pencil-alt"></i></a>
                  <button type="submit" onclick="return confirm('Yakin Ingin Mengdelete Cart dengan ID ini?')" ><i class="fa fa-times"></i></button>
                </td>
              </form>
            </div>
        </tr>
        @endforeach
        @endif
      </tbody>
  </table>
</div>  <!-- End Cart Table -->
<!-- Start Cart Table Button -->
<div class="cart-table-button m-t-10">
  <div class="cart-table-button--left">
      <a href="#" class="btn btn--box btn--large btn--radius btn--green btn--green-hover-black btn--uppercase font--bold m-t-20">CONTINUE SHOPPING</a>
  </div>
  <div class="sweetalert">
    <form action="{{Route('cart.clear')}}" method="POST">
      @csrf
      <div class="cart-table-button--right">
        <a href="{{Route('checkout')}}" class="btn btn--box btn--large btn--radius btn--green btn--green-hover-black btn--uppercase font--bold m-t-20 m-r-20">Checkout</a>  
        <button type="submit" onclick="return confirm('Yakin Ingin cleat data semua shopping cart user?')"  class="btn btn--box btn--large btn--radius btn--black btn--black-hover-green btn--uppercase font--bold m-t-20">Clear Shopping Cart</button>      
      </div>
    </form> 
  </div>  
</div>  <!-- End Cart Table Button -->

