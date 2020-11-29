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
    <section class="py-5 bg_white">
 <div class="container">
 <h1 class="mb-5">Shariah Compliance</h1>
      <p>Qurbani Kiston Pay respects all sects of Islam and hopes that our endeavor brings harmony among all
Muslims and spreads happiness.</p>
      <p>Our payment plans are in light of Shariah principles and have been authenticated by relevant religious
authorities. Click on the link below if you wish to read the fatwa.</p>
      

</div>
</section>
    
        <!-- sharih-compliance section end -->
        @include('supplier')
        @include('footer')
        
          <script src="Assets/js/jquery-3.5.1.min.js"></script>
          <script src="Assets/js/popper.min.js"></script>
          <script src="Assets/js/bootstrap.min.js"></script>
          <script src="Assets/js/slick.js"></script>
          <script>
             $('.navbar-nav .nav-link').click(function(){
                $('.navbar-nav .nav-link').removeClass('active');
                $(this).addClass('active');
             });
       </script>
       @endsection