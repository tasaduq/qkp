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
                  <div class="row w-100">
                     <div class="col-md-6 p-0 bg-white" id="cow">
                        <img class="img-fluid" src="{{$category->path}}">
                     </div><!--img-->
                     <div class="col-md-6 d-flex align-items-center bg-theme text-white text-center">
                        <div class="m-auto py-3">
                           <h1 class="text-white mb-5">{{$category->category_name}}</h1>
                           {{-- <p>{{$category->description}}</p> --}}
                           <a href="/products?c={{$category->category_id}}"><button class="btn btn-outline-success">Explore</button></a>
                        </div>
                     </div><!--text-->
                  </div><!--row-->
                  <?php
               }
               else{
                  ?>
                   <div class="row w-100">
                     <div class="col-md-6 d-flex align-items-center bg-theme text-white text-center order-sm-6 order-2">
                        <div class="m-auto py-3">
                           <h1 class="text-white mb-5">{{$category->category_name}}</h1>
                           {{-- <p>{{$category->description}}</p> --}}
                           <a href="/products?c={{$category->category_id}}"><button class="btn btn-outline-success">Explore</button></a>
                        </div>
                     </div><!--text-->
                     <div class="col-md-6 p-0 bg-white order-1 order-sm-6 order-1" id="camel">
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



 @include('supplier')
 @include('footer')
 
 {{-- <script src="/js/jquery-3.5.1.min.js"></script>
 <script src="/js/popper.min.js"></script>
 <script src="/js/bootstrap.min.js"></script> --}}


 @endsection