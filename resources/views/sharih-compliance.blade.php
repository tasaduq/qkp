@extends('layouts.front')

@section('content')
     
    <!-- sharih-compliance section -->

    <section class="sharih-compliance-section">
        <div class="container">
            <div class="row">
              <div class="col-sm-12 text-danger temp-lh">Content goes here..</div>
            </div>
        </div>
    </section>
    
        <!-- sharih-compliance section end -->
    
          
          <!-- footer -->
          <section class="footer-section">
             <div class="container">
                <div class="row justify-content-around text-center">
                   <div class="col-sm-2 text-left">
                      <img src="Assets/images/footerlogo.png" alt="">
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
          <!-- footer end -->
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