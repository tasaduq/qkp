@extends('layouts.front')

@section('content')
      

      <!-- Products details section -->
      <section class="products-details-section">
         <div class="container">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item"><a href="#">Animals</a></li>
               <li class="breadcrumb-item active">{{$product->name}}</li>
           </ol>
            <div class="row">
               <div class="col-sm-6 text-center left-section pb-5">
                  <div class="product-preview">
                     <?php
                     $imageid = array();
                     if ( strpos($product->images, ",") > -1){
                           $imageid = explode(",",$product->images);  
                           
                     }
                     else {
                        $imageid[0] = $product->images;
                     }
                    //  dd($imageid);
                     $images = \App\Models\Media::whereIn("id", $imageid)->get();
                     
                     $images = $images ? $images : array();
                     ?>
                     @foreach ($images as $image)
                        <div class="item">
                           <img class="img-fluid" src="{{$image->path}}" alt="">
                        </div>
                     @endforeach
                  </div>
                  <div class="product_arrow_prev">
                     <span><i class="icon-qkp-caret-left"></i></span>
                  </div>
                  <div class="product_arrow_next">
                     <span><i class="icon-qkp-caret-right"></i></span>
                  </div>
                  <div class="slider slider-nav">
                     @foreach ($images as $image)
                        <div class="item">
                           <img class="img-fluid" src="{{$image->path}}" alt="">
                        </div>
                     @endforeach
                  </div>
               </div>
               <div class="col-sm-6 right-section">

                  

                  <h2>{{$product->name}}</h2>
                  <p>{{$product->description}}</p>
                  <div class="row details">
                     <div class="col-xs-12 col-md-10 col-lg-8">
                        <ul>
                           <li>
                              <label class="control-label">
                                 <div class="attribute">Category</div>
                                 <?php
                                    $category_name = \App\Models\Categories::where("category_id",$product->category)->first();
                                    $category_name = $category_name ? $category_name->category_name : "N/A";
                                 ?>
                                 <span>:</span>{{$category_name}}
                              </label>
                           </li>
                           <li>
                              <label class="control-label">
                                 <div class="attribute">Weight</div>
                                 <span>:</span>{{$product->weight}} KG
                              </label>
                           </li>
                           <li>
                              <label class="control-label">
                                 <div class="attribute">Color</div>
                                 <span>:</span>{{$product->color}}
                              </label>
                           </li>
                           <li>
                              <label class="control-label">
                                 <div class="attribute">Plan</div>
                                 <span>:</span>
                                 <div class="form-group">
                                    <select class="form-control" id="product-emi-price-dropdown">
                                       @for ($i = Session::get("get_feasible_installments"); $i > 0; $i--)
                                          <option value="{{$i}}" price="{{number_format($product->price/$i)}}" >{{ $i<10?"0".$i:$i}} {{ $i==1?"Month":"Months"}}</option>    
                                       @endfor
                                       
                                       
                                    </select>
                                 </div>
                              </label>
                           </li>
                        </ul>
                     </div>
                     <div class="col-xs-12 col-md-6 col-lg-4">
                        <div class="actual-price">
                           <p class="mb-1">Actual price</p>
                           <h4 class="amount">RS.{{number_format($product->price)}}/-</h4>
                        </div>
                        <div class="advance">
                           <p class="mb-1">Advance</p>
                           <h4 class="amount">RS.{{number_format(ceil($product->price*0.3))}}/-</h4>
                        </div>
                        <div class="EMI">
                           <p class="mb-1">EMI</p>
                           <h4 class="amount" id="selected-emi-amount">RS.{{number_format($product->price/Session::get("get_feasible_installments"))}}/-</h4>
                        </div>
                     </div>
                  </div>
                  <button class="btn default-btn w-100 login add-to-cart-btn" product="{{$product->product_id}}" type="button">Book your Animal</button>
               </div>
            </div>
         </div>
      </section>
      <!-- Products details end -->


      <!-- More Relevant Animals Slider -->
      <section class="section-slider">
         <div class="container text-center slick">
         <h2>More Relevant Animals</h2>
         <?php 
         $products = \App\Models\Products::where("category",$product->category)
         ->where('product_id','!=',$product->product_id)
         ->get();
          $products = $products ? $products : array();
         ?>
         <div class="animal-product">
           
            @foreach ($products as $product)
          
            <div class="item">
               <?php

               if ( strpos($product->images, ",") > -1){
                  $imageid = explode(",",$product->images)[0];
               }
               else {
                  $imageid = $product->images;
               }
               
               $image = \App\Models\Media::find($imageid);
               $imagethumb = $image ? $image->thumb : $image->path;
            ?>
            

             <div class="product-img">
                <a href="/product/{{ $product->product_id }}">
                <img class="img-fluid" src="{{$imagethumb}}" alt=""></a></div>
               <div class="title">
                  <span class="name">{{ $product->name }}</span>
                  <div class="prize">
                     <span>Actual Price <strong>RS.{{ $product->price }}/-</strong></span>
                     <span>Monthly Installment <strong>RS.{{number_format($product->price/Session::get("get_feasible_installments"))}}/-</strong></span>
                     {{-- <span class="cart"><i class="icon-qkp-shopping-cart"></i></span> --}}
                  </div>
               </div>
            </div>
            @endforeach
            
         </div>
         <button class="btn default-btn my-2 px-4 my-sm-0 mr-3 login" type="submit">More Animals in Same Price</button>
         <div class="arrow_prev">
            <span><i class="icon-qkp-caret-left"></i></span>
         </div>
         <div class="arrow_next">
            <span><i class="icon-qkp-caret-right"></i></span>
         </div>
      </section>
      <!-- Slider End -->

      @include('supplier')
      @include('footer')



      <script src="/js/jquery-3.5.1.min.js"></script>
      <script src="/js/popper.min.js"></script>
      <script src="/js/bootstrap.min.js"></script>
      <script src="/js/slick.js"></script>
      <script>
         $('.product-preview').slick({
         slidesToShow: 1,
         slidesToScroll: 1,
         arrows: true,
         fade: false,
         focusOnSelect: true,
         prevArrow:'.product_arrow_prev',
         nextArrow:'.product_arrow_next',
         asNavFor: '.slider-nav',
         });
         
         $('.slider-nav').slick({
         slidesToShow: 5,
         slidesToScroll: 1,
         asNavFor: '.product-preview',
         dots: false,
         focusOnSelect: true,
         });
         
         
               $('.animal-product').slick({
               infinite: true,
               autoplay: true,
               arrows: true,
               slidesToShow: 4,
               slidesToScroll: 1,
               responsive: [
              {
                  breakpoint: 1200,
                  settings: {
                      slidesToShow: 2,
                      slidesToScroll: 1
                  }
              },
              {
                  breakpoint: 768,
                  settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                  }
              }
         
              ],
               prevArrow:'.arrow_prev',
               nextArrow:'.arrow_next',
               });

               $('.navbar-nav .nav-link').click(function(){
                  $('.navbar-nav .nav-link').removeClass('active');
               $(this).addClass('active');
               });
      </script>

@endsection