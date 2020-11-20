@extends('layouts.front')

@section('content')
     
     
    <!-- Cart section -->




<section class="cart-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9 cart-right-section">
               <h2>My Shoping Cart</h2>
               <p><strong>03 </strong>Animal in Your List</p>
                  <div class="cart">
                     <div class="row pb-3">
                        <div class="col-sm-4">
                           <div class="animal-picture text-center">
                              <img class="img-fluid" src="/images/Layer 8.png">
                           </div>
                        </div>
                        <div class="col-sm-8">
                           <h2>Achai Bull</h2>
                           <div class="row animals_attribute">
                              <div class="col-sm-6 label">Estimated Weight : <strong>200KG</strong></div>
                              <div class="col-sm-6 label">Color : <strong>Black & White</strong></div>
                              <div class="col-sm-6 label">Actual Price : <strong>175,000/-</strong></div>
                              <div class="col-sm-6 label">Plan : <strong>6 Months</strong></div>
                              <div class="col-sm-6 label">Advance(30%) : <strong>52,500/-</strong></div>
                              <div class="col-sm-6 label">Monthly Installment : <strong>14,583/-</strong></div>
                           </div>
                           <div class="delete_item">
                           <button class="btn default-btn"><span class="fas fa-trash-alt"></span></button>
                           </div>
                           <!-- <div class="row grand-total">
                              <div class="col-sm-6">
                                 <div>Advance(30%)<strong> : 52,500/-</strong></div>
                              </div>
                              <div class="col-sm-6">
                                 <div>Monthly Installment<strong> : 14,583/-</strong></div>
                              </div>
                           </div> -->
                        </div>
                     </div><!--schdule row-->
                  </div>
            </div>



         <div class="col-sm-12 col-md-12 col-lg-3 cart-left-section">
               <h2>Cart Total Amount</h2>
               <p>Calculation of Total Amount</p>
                <div class="check-out">
                   <div class="total">
                      <div class="pb-3"><strong>Product Total</strong><span class="spacer">:</span>350,000/-</div>
                      <div><strong>Shipping</strong><span class="spacer">:</span>5,000/-</div>
                   </div>
                   <hr>
                   <div><strong>Total Amount</strong><span class="spacer">:</span>355,000/-</div>
                   <hr>
                   <div class="grand-total text-center">
                      <p class="mb-0 pb-1">Expected shipping Delivery</p>
                      <strong>Thu.,12.3.-Mon.,16.03</strong>
                   </div>
                   <a href="/checkout" class="btn default-btn w-100">Go to Checkout</a>
                </div>
         </div>
            
        </div>
    </div>
</section>




    <!-- cart section end -->

      
      <!-- footer -->
      <section class="footer-section">
         <div class="container">
            <div class="row justify-content-around text-center">
               <div class="col-sm-2 text-left">
                  <img src="/images/footerlogo.png" alt="">
               </div>
               <div class="col-sm-6 copyright">
                  <span>© Copyrights 2020 QurbaniKistoonPay. All Rights Reserved</span>
                  <span>Careers - Privacy Policy - Terms & Conditions</span>
               </div>
               <div class="col-sm-3 social-icon">
                  <div class="text-right">
                     <a href="#">
                        <i class="icon-qkp-facebook"></i>
                     </a>
                     <a href="#">
                        <i class="icon-qkp-twitter"></i>
                     </a>
                     <a href="#">
                        <i class="icon-qkp-youtube-play"></i>
                     </a>
                     <a href="#">
                        <i class="icon-qkp-instagram"></i>
                     </a>
                     <a href="#">
                        <i class="icon-qkp-snapchat"></i>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>

@endsection