
@extends('layouts.front')

@section('content')
    

      

     
    <!-- our-farms section -->

<section class="our-farms-section text-center">
    <div class="container">
       <h1>Our Farms</h1>
        <div class="desc pb-4">
            <p>Our farm is in the lush green plains of Sajawal. Our top of the line livestock infrastructure is sprea across acres with access to clean water and organic feed for your qurbani animals.<p>
<p>Our staff is specially trained and monitors all aspects of quality assurance. The animals are checked regularly by our medical teams and highest standards of cleanliness are maintained to ensure your finest qurbani animal reaches your doorstep safe and healthy.</p>
<p>So, do not hesitate to schedule a visit to our farm and see for yourself!</p>
            </p>
        </div>

      <h1>Farm Gallery</h1>
      <div class="row justify-content-center">
         <div class="col-sm-4">
            <div class="animal-image">
               <img src="images/farm1.png">
            </div>
         </div>
         <div class="col-sm-4">
            <div class="animal-image">
               <img src="images/farm3.png">
            </div>
         </div>
         <div class="col-sm-4">
            <div class="animal-image">
               <img src="images/farm2.png">
            </div>
         </div>
      </div>
      <div class="row py-4">
         <div class="col-sm-4">
            <div class="animal-image">
               <img src="images/farm3.png">
            </div>
         </div>
         <div class="col-sm-4">
            <div class="animal-image">
               <img src="images/farm2.png">
            </div>
         </div>
         <div class="col-sm-4">
            <div class="animal-image">
               <img src="images/farm1.png">
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-4">
            <div class="animal-image">
               <img src="images/farm2.png">
            </div>
         </div>
         <div class="col-sm-4">
            <div class="animal-image">
               <img src="images/farm1.png">
            </div>
         </div>
         <div class="col-sm-4">
            <div class="animal-image">
               <img src="images/farm3.png">
            </div>
         </div>
      </div>
    </div>
</section>

     
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
   </body>
</html>

@endsection