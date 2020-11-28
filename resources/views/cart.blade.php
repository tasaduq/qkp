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
                     <div class="row pb-3 align-items-center">
                        <div class="col-sm-3">
                           <div class="animal-picture text-center">
                              <img class="img-fluid" src="/images/Layer 8.png">
                           </div>
                        </div>
                        <div class="col-sm-9">
                           <h2>Achai Bull</h2>
                           <div class="row animals_attribute">
                              <div class="col-sm-6 label">Estimated Live Weight : <strong>200KG</strong></div>
                              <div class="col-sm-6 label">Color : <strong>Black & White</strong></div>
                              <div class="col-sm-6 label">Actual Price : <strong>175,000/-</strong></div>
                              <div class="col-sm-6 label">Installment Plan : <strong>6 Months</strong></div>
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
                     <h6>Achai Bull</h6>
                      <div class="pb-2 text-left">Advance(30%) :<strong class="float-right">52,500/-</strong></div>
                      <div class="pb-2 text-left">Shipping :<strong class="float-right">5,000/-</strong></div>
                   </div>
                   <hr>
                   <div class="text-left">Sub Total :<strong class="float-right">57,500/-</strong></div>
                   <hr>
                   <div class="text-left pt-2 pb-3">Sales Tax (13%) :<strong class="float-right">7,475/-</strong></div>
                   <div class="grand-total text-center">
                      <p class="mb-0 pb-1">Total Upfront Payment After 13% Sales Tax</p>
                      <strong>64,975/-</strong>
                   </div>
                   <a href="/checkout" class="btn default-btn w-100">Go to Checkout</a>
                </div>
         </div>
            
        </div>
    </div>
</section>




    <!-- cart section end -->

    @include('footer')

@endsection