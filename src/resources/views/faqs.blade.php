
@extends('layouts.front')

@section('content')

<div class="terms-section bg_white">
<section class="py-5">
   <div class="container">
      <h1 class="mb-5">Frequently Asked Questions</h1>
      <div id="accordion">
  <div class="card mb-3">
    <div class="card-header p-0" id="heading1">
      <h5 class="mb-0">
        <span class="p-3 d-block" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
        How do you price your animals?
         </span>
      </h5>
    </div>

    <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion">
      <div class="card-body">
      We base our pricing based on the estimated “Alive” weight of the animal at time of delivery
which is in accordance with the market rates.
      </div>
    </div>
  </div>
  <div class="card mb-3">
    <div class="card-header p-0" id="heading2">
      <h5 class="mb-0">
         <span class="p-3 d-block" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
         Can I visit the animal I have booked?
         </span>
      </h5>
    </div>
    <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
      <div class="card-body">
      Yes, you can. All you have to do is request a visit to the farm through our “Request a visit”
section, and our team will guide you.
      </div>
    </div>
  </div>
  <div class="card mb-3">
    <div class="card-header p-0" id="heading3">
      <h5 class="mb-0">
         <span class="p-3 d-block" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
          What if my animal dies before delivery due to ailment or any other cause?
         </span>
      </h5>
    </div>
    <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
      <div class="card-body">
      We ensure the safety of your animal and take extreme care of its health. But in case the animal
dies, QKP will replace it for you free of charge.
      </div>
    </div>
  </div>
  <div class="card mb-3">
    <div class="card-header p-0" id="heading4">
      <h5 class="mb-0">
         <span class="p-3 d-block" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
         Will my animal be delivered at my doorstep?
         </span>
      </h5>
    </div>
    <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
      <div class="card-body">
      Yes, we will deliver the animal at your doorstep within two weeks before Eid ul Azha.
      </div>
    </div>
  </div>
  <div class="card mb-3">
    <div class="card-header p-0" id="heading5">
      <h5 class="mb-0">
         <span class="p-3 d-block" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
         Which cities are your services available in?
         </span>
      </h5>
    </div>
    <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
      <div class="card-body">
      We are currently only serving in Karachi and Hyderabad but will Insha Allah soon be expanding
across Pakistan.
      </div>
    </div>
  </div>
  <div class="card mb-3">
    <div class="card-header p-0" id="heading6">
      <h5 class="mb-0">
         <span class="p-3 d-block" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
         What happens if I miss my Installment?
         </span>
      </h5>
    </div>
    <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion">
      <div class="card-body">
      You have <Strong>7 days</strong> to pay after the due date. After that your installment will be combined with
the next month’s installment with a penalty. If you fail to make the second payment within the
due date the booking will be cancelled. Please refer to our “<a href="Refund-and-cancellation-policy"><Strong>Refund and cancellation policy</strong></a>”
page for more information.
      </div>
    </div>
  </div>
  <div class="card mb-3">
    <div class="card-header p-0" id="heading7">
      <h5 class="mb-0">
         <span class="p-3 d-block" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
         Where can I see my due payments?
         </span>
      </h5>
    </div>
    <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion">
      <div class="card-body">
      You can keep track of your payments in your account page.
      </div>
    </div>
  </div>
  <div class="card mb-3">
    <div class="card-header p-0" id="heading8">
      <h5 class="mb-0">
         <span class="p-3 d-block" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse8" aria-expanded="true" aria-controls="collapse8">
         Can I make a lumpsum payment?
         </span>
      </h5>
    </div>
    <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion">
      <div class="card-body">
      Yes, you have the option of making a lumpsum payment.
      </div>
    </div>
  </div>
  <div class="card mb-3">
    <div class="card-header p-0" id="heading9">
      <h5 class="mb-0">
         <span class="p-3 d-block" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse9" aria-expanded="true" aria-controls="collapse9">
         What payment options do I have?
         </span>
      </h5>
    </div>
    <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordion">
      <div class="card-body">
      You can pay via direct bank transfer into our account or request a pickup of payment from the
desired location.
      </div>
    </div>
  </div>
</div>
   </div>
</section>



   <!-- footer -->
   @include('supplier')

@include('footer')
</div>
   <!-- footer end -->


{{-- 
   <script src="/js/jquery-3.5.1.min.js"></script>
   <script src="/js/popper.min.js"></script>
   <script src="/js/bootstrap.min.js"></script>
   <script src="/js/slick.js"></script> --}}

   @endsection
   