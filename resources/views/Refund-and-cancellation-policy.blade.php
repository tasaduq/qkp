@extends('layouts.front')

@section('content')
     
    <!-- sharih-compliance section -->

    <!-- <section class="sharih-compliance-section">
        <div class="container">
            <div class="row">
              <div class="col-sm-12 text-danger temp-lh">Content goes here..</div>
            </div>
        </div>
    </section> -->

<section class="about-us-section terms-section py-5 bg_white">
  <div class="container">
      <div class="row about-us-content">
          <div class="col-sm-12 order-sm-6 order-2">
              <h2 class="mb-4">Refund, Cancellation and Payment Terms</h2>
              <p class="mb-4">Thanks for choosing Qurbani Kiston Pay!</p>
              <ul class="pl-4">
                <li class="mb-3">If you are not satisfied with the purchase, you can get your money back no questions asked. You are eligible for a full refund within 14 working days of your purchase.</li>
                <li class="mb-3">After the 14-day period the customer will no longer be eligible for a full refund. We encourage our customers to thoroughly research before making a purchase. </li>
                <li class="mb-3">If the customer fails to make the payment via bank transfer or pickup within 48 hours at the time of booking, the booking will be cancelled.</li>
                <li class="mb-3">If the customer chooses to cancel the booking of their animal after the 14-Day period QKP shall deduct 30% of the <strong>total</strong> paid amount till date by the customer. The customer will receive their amount post deduction within 30 working days.</li>
                <li class="mb-3">The customer shall have 7 days to make the installment payment after the due date after which the pending installment shall be merged with your next month’s installment with a 2.5% penalty on the pending installment.</li>
                <li>If the customer fails to pay two consecutive installments, the order will automatically be cancelled. A 30% deduction shall be made on the <strong>total</strong> paid amount by the customer and shall be refunded within 30 working days.</li>
             </ul>
          </div>
      </div>
  </div>
</section>
    
        <!-- sharih-compliance section end -->
        @include('supplier')
        @include('footer')
        
          {{-- <script src="/js/jquery-3.5.1.min.js"></script>
          <script src="/js/popper.min.js"></script>
          <script src="/js/bootstrap.min.js"></script>
          <script src="/js/slick.js"></script> --}}
          <script>
             $('.navbar-nav .nav-link').click(function(){
                $('.navbar-nav .nav-link').removeClass('active');
                $(this).addClass('active');
             });
       </script>
       @endsection