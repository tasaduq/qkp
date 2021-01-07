@extends('layouts.front')

@section('content')
     
    <!-- Checkout section -->

<section class="checkout-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9 checkout-right-section">
               <h2>Installment Payment</h2>
               <div class="row payment-method-section mt-4">
                  <div class="col-sm-6">
                     <div class="payment-method installment-payment selected mb-2" payment-method="cash">
                        <a class="d-block p-4" href="#">
                           <div class="cash pr-3 d-inline-block">
                              <svg id="cash" enable-background="new 0 0 511.854 511.854" height="80" viewBox="0 0 511.854 511.854" width="80">
                                 <g>
                                    <g>
                                       <path d="M85.072,454.931c-1.859-1.861-4.439-2.93-7.069-2.93s-5.21,1.069-7.07,2.93c-1.86,1.861-2.93,4.44-2.93,7.07    s1.069,5.21,2.93,7.069c1.86,1.86,4.44,2.931,7.07,2.931s5.21-1.07,7.069-2.931c1.86-1.859,2.931-4.439,2.931-7.069    S86.933,456.791,85.072,454.931z"></path>
                                    </g>
                                 </g>
                                 <g>
                                    <g>
                                       <path d="M469.524,182.938c-1.86-1.861-4.43-2.93-7.07-2.93c-2.63,0-5.21,1.069-7.07,2.93c-1.859,1.86-2.93,4.44-2.93,7.07    s1.07,5.21,2.93,7.069c1.86,1.86,4.44,2.931,7.07,2.931c2.64,0,5.21-1.07,7.07-2.931c1.869-1.859,2.939-4.439,2.939-7.069    S471.393,184.798,469.524,182.938z"></path>
                                    </g>
                                 </g>
                                 <g>
                                    <g>
                                       <path d="M509.065,2.929C507.189,1.054,504.645,0,501.992,0L255.998,0.013c-5.522,0-9.999,4.478-9.999,10V38.61l-94.789,25.399    c-5.335,1.43-8.501,6.913-7.071,12.247l49.127,183.342l-42.499,42.499c-5.409-7.898-14.491-13.092-24.764-13.092H30.006    c-16.542,0-29.999,13.458-29.999,29.999v162.996C0.007,498.542,13.464,512,30.006,512h95.998c14.053,0,25.875-9.716,29.115-22.78    l11.89,10.369c9.179,8.004,20.939,12.412,33.118,12.412h301.867c5.522,0,10-4.478,10-10V10    C511.992,7.348,510.94,4.804,509.065,2.929z M136.002,482.001c0,5.513-4.486,10-10,10H30.005c-5.514,0-10-4.486-10-10V319.005    c0-5.514,4.486-10,10-10h37.999V424.2c0,5.522,4.478,10,10,10s10-4.478,10-10V309.005h37.999c5.514,0,10,4.486,10,10V482.001z     M166.045,80.739l79.954-21.424V96.37l-6.702,1.796c-2.563,0.687-4.746,2.362-6.072,4.659s-1.686,5.026-0.999,7.588    c3.843,14.341-4.698,29.134-19.039,32.977c-2.565,0.688-4.752,2.366-6.077,4.668c-1.325,2.301-1.682,5.035-0.989,7.599    l38.979,144.338h-20.07l-10.343-40.464c-0.329-1.288-0.905-2.475-1.676-3.507L166.045,80.739z M245.999,142.229v84.381    l-18.239-67.535C235.379,155.141,241.614,149.255,245.999,142.229z M389.663,492H200.125V492c-7.345,0-14.438-2.658-19.974-7.485    l-24.149-21.061V325.147l43.658-43.658l7.918,30.98c1.132,4.427,5.119,7.523,9.688,7.523l196.604,0.012c7.72,0,14,6.28,14,14    c0,7.72-6.28,14-14,14H313.13c-5.522,0-10,4.478-10,10c0,5.522,4.478,10,10,10h132.04c7.72,0,14,6.28,14,14c0,7.72-6.28,14-14,14    H313.13c-5.522,0-10,4.478-10,10c0,5.522,4.478,10,10,10h110.643c7.72,0,14,6.28,14,14c0,7.72-6.28,14-14,14H313.13    c-5.522,0-10,4.478-10,10c0,5.522,4.478,10,10,10h76.533c7.72,0,14,6.28,14,14C403.662,485.72,397.382,492,389.663,492z     M491.994,492h-0.001h-71.359c1.939-4.273,3.028-9.01,3.028-14s-1.089-9.727-3.028-14h3.139c18.747,0,33.999-15.252,33.999-33.999    c0-5.468-1.305-10.635-3.609-15.217c14.396-3.954,25.005-17.149,25.005-32.782c0-7.584-2.498-14.595-6.711-20.255V235.007    c0-5.522-4.478-10-10-10c-5.522,0-10,4.478-10,10v113.792c-2.35-0.515-4.787-0.795-7.289-0.795h-0.328    c1.939-4.273,3.028-9.01,3.028-14c0-18.748-15.252-33.999-33.999-33.999h-16.075c17.069-7.32,29.057-24.286,29.057-44.005    c0-26.389-21.468-47.858-47.857-47.858c-26.388,0-47.857,21.469-47.857,47.858c0,19.719,11.989,36.685,29.057,44.005h-54.663    V109.863c17.864-3.893,31.96-17.988,35.852-35.853h75.221c3.892,17.865,17.988,31.96,35.852,35.853v31.09c0,5.522,4.478,10,10,10    s10-4.478,10-10v-40.018c0-5.522-4.478-10-10-10c-14.847,0-26.924-12.079-26.924-26.925c0-5.522-4.478-10-10-10h-93.076    c-5.522,0-10,4.478-10,10c0,14.847-12.078,26.925-26.924,26.925c-5.522,0-10,4.478-10,10v199.069H266V20.011L491.994,20V492z     M378.996,283.858c-15.361,0-27.857-12.497-27.857-27.857s12.497-27.858,27.857-27.858S406.853,240.64,406.853,256    S394.357,283.858,378.996,283.858z"></path>
                                    </g>
                                 </g>
                                 <g> </g>
                                 <g> </g>
                                 <g> </g>
                                 <g> </g>
                                 <g> </g>
                                 <g> </g>
                                 <g> </g>
                                 <g> </g>
                                 <g> </g>
                                 <g> </g>
                                 <g> </g>
                                 <g> </g>
                                 <g> </g>
                                 <g> </g>
                                 <g> </g>
                              </svg>
                           </div>
                           <div class="d-inline-block pt-3 align-middle">
                              <h3>Cash Payment</h3>
                              <p>Request cash pickup by our rider</p>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="payment-method installment-payment mb-2" payment-method="bank-transfer">
                        <a class="d-block p-4" href="#">
                           <div class="bank pr-3 d-inline-block">
                              <svg id="bank" enable-background="new 0 0 511.854 511.854" height="80" viewBox="0 0 511.854 511.854" width="80">
                                 <g>
                                    <g>
                                       <path d="m480.927 190.854c16.542 0 30-13.458 30-30v-38.844c0-12.317-7.377-23.234-18.8-27.831l-224.952-91.98c-7.325-2.951-15.252-2.899-22.391-.042-.166.067 3.765-1.54-225.058 92.023-11.423 4.596-18.8 15.514-18.8 27.831v38.845c0 16.542 13.458 30 30 30h18v226h-18c-16.542 0-30 13.458-30 30v35c0 16.542 13.458 30 30 30h450c16.542 0 30-13.458 30-30v-35c0-16.542-13.458-30-30-30h-18v-226h18.001zm0 256c.019 35.801.1 35 0 35h-450v-35zm-402-30v-226h34v226zm64 0v-226h66v226zm96 0v-226h34v226zm64 0v-226h66v226zm96 0v-226h34v226zm-368-256c0-41.843-.045-38.826.105-38.887l224.895-91.957 224.895 91.957c.155.062.105-2.857.105 38.887-4.986 0-444.075 0-450 0z"></path>
                                    </g>
                                    <g>
                                       <path d="m255.927 64.854c-8.284 0-15 6.716-15 15v32c0 8.284 6.716 15 15 15s15-6.716 15-15v-32c0-8.284-6.716-15-15-15z"></path>
                                    </g>
                                 </g>
                              </svg>
                           </div>
                           <div class="d-inline-block pt-3 align-middle">
                              <h3>Bank Transfer</h3>
                              <p>Directly transfer into our account</p>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>

               <div class="billing py-5 cashpayment">
                  <p> One of our riders will contact you within the next 24 hours, to collect the mentioned upfront payment.</p>
                  <p> Please note, your instalment will be confirmed, once the payment has been received.</p>
                  <br>
                  <button class="btn default-btn float-right mb-4 request-installment-cash-collection" type="button" installmentid="{{$installment->id}}">Request Cash Collection</button>
                  
               </div>
               <div class="billing py-5 banktransfer" style="display:none">
                  <p> Please make the bank transfer in the following account.</p>

                  <div class="alert alert-secondary d-inline-block" role="alert">
                     <h3>Bank Details</h3>
                     <p class="mt-4"><label><strong>Bank :</strong></label> BANK NAME</p>
                     <p><label><strong>Account Title :</strong></label> QKP PVT LMT</p>
                     <p class="mb-0"><label><strong>Account Number :</strong></label> 1254 0081 01318501 5</p>
                  </div>
                  
                  <p> Once you have made the deposit/transfer you are to submit a picture/screenshot as proof of the payment.</p>
                  <p> Please note, your instalment will be confirmed, once the amount is reflected in our account.</p>
                  
                  <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                     <form id="upload-reciept-installment-form" class="pt-3">
                        @csrf
                        {{-- <div class="form-row mb-4 justify-content-between">
                           <div class="form-group col-md-6 pr-3">
                              <label for="name">Name:</label>
                              <input type="text" class="form-control" id="name">
                           </div>
                           <div class="form-group col-md-6">
                              <label for="email">Email Addrress:</label>
                              <input type="email" class="form-control" id="email">
                           </div>
                        </div> --}}
                        <div class="form-row mb-4 justify-content-between">
                           {{-- <div class="form-group col-md-6 pr-3">
                              <label for="city">Order ID:</label>
                              <input type="text" class="form-control" id="order">
                           </div> --}}
                           <div class="form-group col-md-6">
                              <label for="subject">Upload Payment Reciept:</label>
                           <input type="text" class="form-control">
                           <label class="upload_img default-btn position-absolute"> Browse
                              <input type="file" name="receipt">
                           </label>
                           </div>
                           <input type="hidden" name="installment" value="{{$installment->id}}">
                        </div>
                        <button class="btn default-btn float-right mb-4" id="upload-installment-reciept-submit" type="submit">Submit</button>
                     </form>
               </div>
                  
               </div>
               

            </div>



            <div class="col-sm-12 col-md-12 col-lg-3 cart-left-section">
               
               <div class="check-out" style="margin-top:63px;">
                  <div class="total">
                     <h6>{{$installment->order_product->product->name}}</h6>
                        <div class="pb-2 text-left">Instalment :<strong class="float-right">{{number_format($installment->amount)}}/-</strong></div>
                           {{-- <div class="pb-0 text-left">Delivery Fee to be calculated on checkout</div> --}}
                        </div>
                     <hr>
                           <div class="text-left">Sub Total :<strong class="float-right">{{number_format($installment->amount)}}/-</strong></div>
                     <hr>
                              <div class="text-left pt-2 pb-3">Sales Tax (13%) :<strong class="float-right">{{number_format($installment->amount*0.13)}}/-</strong></div>
                     <div class="grand-total text-center">
                        <p class="mb-0 pb-1">Total Upfront Payment After 13% Sales Tax</p>
                        <strong>{{number_format($installment->after_tax_amount)}}/-</strong>
                     </div>
                  </div>

            </div>
        </div>
    </div>
</section>




    <!-- cart section end -->
    @include('supplier')
    @include('footer')
    
      {{-- <script src="js/jquery-3.5.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/slick.js"></script> --}}
      <script>
         $('.navbar-nav .nav-link').click(function(){
                  $('.navbar-nav .nav-link').removeClass('active');
               $(this).addClass('active');
               });
      </script>
  
  @endsection