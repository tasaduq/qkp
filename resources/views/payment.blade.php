@extends('layouts.front')

@section('content')
     
    <!-- Checkout section -->




<section class="checkout-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9 checkout-right-section">
               <h2>Thank You John!</h2>
               <p>We have received your order. Your order will be confirmed once our rider picks up the payment</p>
               
               <div class="alert alert-secondary d-inline-block" role="alert">
                  <h3>Bank Details</h3>
                  <p class="mt-4"><label><strong>Bank :</strong></label> Bank AL Habib</p>
                  <p><label><strong>Account Title :</strong></label> John</p>
                  <p class="mb-0"><label><strong>Account Number :</strong></label> 1254 0081 01318501 5</p>
                </div>
               <p>Make your payment directly into our bank. Your order will not be confirmed until the fund have cleared in our Account.</p>   
               <p>Please upload your payment receipt here, and your payment is traked from your order ID </p>
               <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                     <form class="pt-3">
                        <div class="form-row mb-4 justify-content-between">
                           <div class="form-group col-md-6 pr-3">
                              <label for="name">Name:</label>
                              <input type="text" class="form-control" id="name">
                           </div>
                           <div class="form-group col-md-6">
                              <label for="email">Email Addrress:</label>
                              <input type="email" class="form-control" id="email">
                           </div>
                        </div>
                        <div class="form-row mb-4 justify-content-between">
                           <div class="form-group col-md-6 pr-3">
                              <label for="city">Order ID:</label>
                              <input type="text" class="form-control" id="order">
                           </div>
                           <div class="form-group col-md-6">
                              <label for="subject">Upload Payment Reciept:</label>
                           <input type="text" class="form-control">
                           <label class="upload_img default-btn position-absolute"> Browser
                              <input type="file">
                           </label>
                           </div>
                        </div>
                        <button class="btn default-btn float-right mb-4" type="submit">Submit</button>
                     </form>
               </div>
               

               

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