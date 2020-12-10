@extends('layouts.front')

@section('content')
     
    <!-- Checkout section -->




<section class="checkout-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9 checkout-right-section">
               <h2>Thank You John!</h2>
               <p>Your Order has been recieved with <Strong>order#123</a></p>
                  
               
               

               

            </div>



            {{-- <div class="col-sm-12 col-md-12 col-lg-3 cart-left-section">
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

                  $total += ceil($product->price*0.3);
                  $total += $shipping_fee;
                  $product_advance = ceil($product->price*0.3)
                ?>
                   <div class="pb-2 text-left">Advance(30%) :<strong class="float-right">{{number_format($product_advance)}}/-</strong></div>
                   <div class="pb-2 text-left">Shipping :<strong class="float-right">{{number_format($shipping_fee)}}/-</strong></div>
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
                   <a href="/checkout" class="btn default-btn w-100">Go to Checkout</a>
                </div>
         </div> --}}
            
        </div>
    </div>
</section>




    <!-- cart section end -->
    @include('supplier')
    @include('footer')
    
      <script src="js/jquery-3.5.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/slick.js"></script>
      <script>
         $('.navbar-nav .nav-link').click(function(){
                  $('.navbar-nav .nav-link').removeClass('active');
               $(this).addClass('active');
               });
      </script>
  
  @endsection