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
    {{-- <section class="py-5 bg_white">
 <div class="container">
 <h1 class="mb-5">Shariah Compliance</h1>
      <p>Qurbani Kiston Pay respects all sects of Islam and hopes that our endeavor brings harmony among all
Muslims and spreads happiness.</p>
      <p>Our payment plans are in light of Shariah principles and have been authenticated by relevant religious
authorities. Click on the link below if you wish to read the fatwa.</p>
      

</div>
</section> --}}

<section class="about-us-section py-5 bg_white">
  <div class="container">
      <div class="row about-us-content">
          <div class="col-sm-8 order-sm-6 order-2">
              <h2 class="mb-4">Shariah Compliance</h2>
              <p class="mb-4">Qurbani Kiston Pay respects all sects of Islam and hopes that our endeavor brings harmony among all
                Muslims and spreads happiness.</p>
                <p class="mb-4">We have ensured that all our business practices are in line with Islamic principles and that our
                    customers have the peace of mind, that their purchase of the finest qurbani animals on installments,
                    does not go against any Shariah principle.</p>
                      <p>Our payment plans are in light of Shariah principles and have been authenticated by relevant religious
                authorities. Click on the link below if you wish to read the fatwa.</p>
          </div>
          <div class="col-sm-4 order-1 order-sm-6 order-1">
              <div class="image mb-4"> 
                  <img class="img-fluid image-shadow" src="/images/shariah.jpg" alt="img">
              </div>
          </div>
      </div>
  </div>
</section>
    
        <!-- sharih-compliance section end -->
        @include('supplier')
        @include('footer')
        
          <script src="/js/jquery-3.5.1.min.js"></script>
          <script src="/js/popper.min.js"></script>
          <script src="/js/bootstrap.min.js"></script>
          <script src="/js/slick.js"></script>
          <script>
             $('.navbar-nav .nav-link').click(function(){
                $('.navbar-nav .nav-link').removeClass('active');
                $(this).addClass('active');
             });
       </script>
       @endsection