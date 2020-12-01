
@extends('layouts.front')

@section('content')
       
     <!-- About-us Section -->

     <section class="about-us-section py-5">
      <div class="container">
          <div class="row about-us-content">
              <div class="col-sm-6 order-sm-6 order-2">
                  <h2 class="mb-4">Behtereen Qurbani..Asaan Kiston Pay</h2>
                     <p>Qurbani Kiston Pay is Pakistan`s first and only platform for purchasing the finest qurbani animals, on easy Shariah compliant monthly installments!</p>
<p>We offer a variety of sacrificial animals which include bulls/cows, goats, sheep, camels, and specialty animals under multiple price ranges that are delivered right to your doorstep!</p>
<p>Our animals are cared for at our very own QKP Farms with utmost care under the supervision of thorough professionals. Our animals are given pure organic feed and have 24/7 medical care onsite.</p>
<p>You are just a few clicks away from Behtereen Qurbani..Asaan Kiston py!</p>
              </div>
              <div class="col-sm-6 order-1 order-sm-6 order-1">
                  <div class="image mb-4"> 
                      <img class="img-fluid image-shadow" src="/images/about-us.png" alt="img">
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- About-us Section end -->

<section class="our-mission-section py-5 bg_white">
 <div class="container">
    <div class="row justify-content-between">
       <div class="col-sm-12 text-center mb-5">
          <h2 class="pb-2">Mission, Vision and Values</h2>
       </div>
       <div class="col-sm-4 text-center px-4">
           <div class="box-icon py-4">
             <i class="fab fa-font-awesome-flag au-icon"></i>
           </div>
           <p>We are on a mission to help ease the financial pressures of our customers and provide the finest animal to sacrifice in the name of Allah</p>
       </div>
       <div class="col-sm-4 text-center px-4">
         <div class="box-icon py-4">
            <i class="fas fa-rocket au-icon"></i>
         </div>
         <p>Our vision is to make qurbani accessible to every Muslim and make the lives of our customers easier and make every Eid ul Azha even more joyous!</p>
     </div>
     <div class="col-sm-4 text-center px-4">
         <div class="box-icon py-4">
            <i class="fas fa-users au-icon"></i>
         </div>
         <p>Qurbani Kiston Pay was founded in the light of Islamic principles, and it reflects in the way we operate. Our team works like a family and we treat our customers the same way. </p>
     </div>
    </div>
 </div>
</section>
<!-- Our Mission Section end -->

@include('supplier')
@include('footer')



   <script src="/js/jquery-3.5.1.min.js"></script>
   <script src="/js/popper.min.js"></script>
   <script src="/js/bootstrap.min.js"></script>
   <script src="/js/slick.js"></script>

   @endsection
   