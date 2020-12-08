<?php


$checkoutpage =  \Request::is("checkout") ? true : false;
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
          $total += $shipping_fee;
          $product_advance = $product->advance_formatted($installment);
          
        ?>
           <div class="pb-2 text-left">Advance({{ $installment == 1 ? "50%" : "30%" }}) :<strong class="float-right">{{$product_advance}}/-</strong></div>

            @if($cartpage)
            <div class="pb-2 text-left">Shipping :<strong class="float-right">Shipment to be calculated on checkout</strong></div>
            @else
            <div class="pb-2 text-left">Shipping :<strong class="float-right checkout-shipping">Rs. {{number_format($shipping_fee)}}/-</strong></div>
            @endif
        </div>
        <hr>
       @endforeach
        <div class="text-left">Sub Total :<strong class="float-right">{{number_format($total)}}/-</strong></div>
        <hr>
        <?php 
        
        $total_tax = ceil($total*0.13);
        $total_after_tax = $total + $total_tax;
        ?>
        <div class="text-left pt-2 pb-3">Sales Tax (13%) :<strong class="float-right">{{number_format($total_tax)}}/-</strong></div>
        <div class="grand-total text-center">
           <p class="mb-0 pb-1">Total Upfront Payment After 13% Sales Tax</p>
           <strong>{{number_format($total_after_tax)}}/-</strong>
        </div>

        @if($cartpage)
        <div class="check-user-login">
          <a href="#" class="btn default-btn w-100 checkout-btn">Go to Checkout</a>
        </div>
        @endif
     </div>


