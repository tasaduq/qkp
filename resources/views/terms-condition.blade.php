
@extends('layouts.front')

@section('content')
       
     <!-- About-us Section -->

     <section class="about-us-section">
      <div class="container">
          <div class="row about-us-content">
              <div class="col-sm-6 order-sm-6 order-2">
                  <h2 class="mb-4">Introduction</h2>
                     <p>These Website Standard Terms and Conditions written on this webpage shall manage your use of our website, Qurbani Kiston Py accessible at <strong><a href="#">qkponline.com</a></strong>.</p>
                     <p>These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.</p> 
                     <p>Minors or people below 18 years old are not allowed to use this Website.</p>
              </div>
              <div class="col-sm-6 order-1 order-sm-6 order-1">
                  <div class="image mb-4"> 
                      <img class="img-fluid" src="/images/about-us.png" alt="img">
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- About-us Section end -->

<section class="our-mission-section">
 <div class="container">
    <div class="row justify-content-between">
       <div class="col-sm-12 text-center">
          <h3 class="pb-2">Our Mission, Vision and Value.</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod elit, tempor.</p>
       </div>
       <div class="col-sm-3 text-center">
           <div class="box-icon py-4">
             <i class="fab fa-font-awesome-flag au-icon"></i>
           </div>
           <p>We are on a mission to help ease the financial pressures of our customers and provide the finest animal to sacrifice in the name of Allah</p>
       </div>
       <div class="col-sm-3 text-center">
         <div class="box-icon py-4">
            <i class="fas fa-rocket au-icon"></i>
         </div>
         <p>Our vision is to make qurbani accessible to every Muslim.</p>
     </div>
     <div class="col-sm-3 text-center">
         <div class="box-icon py-4">
            <i class="fas fa-users au-icon"></i>
         </div>
         <p>Ikhlaq- Adab- Emaan</p>
     </div>
    </div>
 </div>
</section>
<!-- Our Mission Section end -->

@include('footer')



   <script src="/js/jquery-3.5.1.min.js"></script>
   <script src="/js/popper.min.js"></script>
   <script src="/js/bootstrap.min.js"></script>
   <script src="/js/slick.js"></script>

   @endsection
   