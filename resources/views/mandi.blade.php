@extends('layouts.front')

@section('content')
   <!-- mandi section -->

   <section class="mandi-section">
    <div class="container">
       <div class="row justify-content-center">
          <div class="col-sm-12 text-center">
             <h1 class="heading">Our Mandi</h1>
          </div>

         
          
         <?php
            foreach ($categories as $key => $category) {
               
               if($key%2 == 0 ){
                  ?>
                  <div class="row for-desktop w-100">
                     <div class="col-md-6 pr-md-0 bg-white" id="cow">
                        <img class="img-fluid" src="{{$category->path}}">
                     </div><!--img-->
                     <div class="col-md-6 d-flex align-items-center bg-theme text-white text-center">
                        <div class="m-auto py-3">
                           <h1 class="text-white">{{$category->category_name}}</h1>
                           <p>{{$category->description}}</p>
                           <a href="/products?c={{$category->category_id}}"><button class="btn btn-outline-success">Explore</button></a>
                        </div>
                     </div><!--text-->
                  </div><!--row-->
                  <?php
               }
               else{
                  ?>
                   <div class="row for-desktop w-100">
                     <div class="col-md-6 d-flex align-items-center bg-theme text-white text-center">
                        <div class="m-auto py-3">
                           <h1 class="text-white">{{$category->category_name}}</h1>
                           <p>{{$category->description}}</p>
                           <a href="/category"{{$category->category_id}}><button class="btn btn-outline-success">Explore</button></a>
                        </div>
                     </div><!--text-->
                     <div class="col-md-6 pl-md-0 bg-white" id="camel">
                        <img class="img-fluid" src="{{$category->path}}">
                     </div><!--img-->
                  </div><!--row desktop-->
                  <?php
               }
            }
         ?>
          


       </div>
    </div>
 </section>

 <!-- mandi section end -->



 <!-- footer -->
 <section class="footer-section">
    <div class="container">
       <div class="row justify-content-around text-center">
          <div class="col-sm-2 text-left">
             <img src="/images/footerlogo.png" alt="">
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
 <script src="/js/jquery-3.5.1.min.js"></script>
 <script src="/js/popper.min.js"></script>
 <script src="/js/bootstrap.min.js"></script>
 <script src="/js/slick.js"></script>


 @endsection