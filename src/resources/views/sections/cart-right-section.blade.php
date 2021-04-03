<?php

$checkoutpage =  ( \Request::is("checkout") || \Request::is("shipping-cart-update") )? true : false;
$cartpage =  \Request::is("cart") ? true : false;

?>



    <h2>Cart Total Amount</h2>
    <p>Calculation of Total Amount</p>
     <div class="check-out">
       <?php
          $total = 0;
       ?>
       @foreach ($products as $product)
        <div class="total">
        <h6>{{$product->name}}</h6>
        <?php

          $installment = $cart[$product->product_id]["installment"];
          $total += $product->advance($installment);
          if($checkoutpage)
            $total += $product->calculated_city_shipping($shipping_city); 
            $shipping_fee = $product->calculated_city_shipping($shipping_city);

          $product_advance = $product->advance_formatted($installment);
          
        ?>
           <div class="pb-2 text-left">Advance({{ $installment == 1 ? \SETTINGS::get("regular_advance")."%" : \SETTINGS::get("regular_advance")."%"}}) :<strong class="float-right">{{$product_advance}}/-</strong></div>

            @if($cartpage)
            <div class="pb-0 text-left">Delivery Fee to be calculated on checkout</div>
            @else
            <div class="pb-2 text-left">Delivery Fee :<strong class="float-right checkout-shipping">Rs. {{number_format($shipping_fee)}}/-</strong></div>
            @endif
        </div>
        <hr>
       @endforeach
        <div class="text-left">Sub Total :<strong class="float-right">{{number_format($total)}}/-</strong></div>
        <hr>
        <?php 
        
        $total_tax = ceil($total*SETTINGS::calculate('tax_value'));
        $total_after_tax = $total + $total_tax;
        ?>
        @if(\SETTINGS::get("enable_tax"))
        <div class="text-left pt-2 pb-3">Sales Tax ({{\SETTINGS::get("tax_value")}}%) :<strong class="float-right">{{number_format($total_tax)}}/-</strong></div>
        <div class="grand-total text-center">
           <p class="mb-0 pb-1">Total Upfront Payment After {{\SETTINGS::get("tax_value")}}% Sales Tax</p>
           <strong>{{number_format($total_after_tax)}}/-</strong>
        </div>
        @else
        
        <div class="grand-total text-center">
           <p class="mb-0 pb-1">Total Upfront Payment </p>
           <strong>{{number_format($total)}}/-</strong>
        </div>
        @endif

        @if($cartpage)
        <div class="check-user-login">
          <a href="#" class="btn default-btn w-100 checkout-btn">Go to Checkout</a>
        </div>
        @endif
     </div>


