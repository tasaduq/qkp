@extends('layouts.front')

@section('content')
      
<?php
$category_name = \App\Models\Categories::where("category_id",$product->category)->first();
$category_name = $category_name ? $category_name->category_name : "N/A";
$get_feasible_installments = Session::get("get_feasible_installments");
?>
      <!-- Products details section -->
      <section class="products-details-section">
         <div class="container">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="/">Home</a></li>
               <li class="breadcrumb-item"><a href="/mandi">Mandi</a></li>
               <li class="breadcrumb-item"><a href="/products?c={{$product->category}}">{{$category_name}}</a></li>
               <li class="breadcrumb-item active">{{$product->name}}</li>
           </ol>
            <div class="row">
               <div class="col-md-6 text-center left-section">
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
                        <div class="item d-flex justify-content-center align-items-center">
                           <img class="img-fluid" src="{{$image->path}}" alt="">
                        </div>
                     @endforeach
                  </div>
                  
                  @if( count($images) > 1 )
                  <div class="product_arrow_prev">
                     <span><i class="icon-qkp-caret-left"></i></span>
                  </div>
                  <div class="product_arrow_next">
                     <span><i class="icon-qkp-caret-right"></i></span>
                  </div>
                  <div class="slider slider-nav my-3">
                     @foreach ($images as $image)
                        <div class="item thumbnail">
                           <img class="img-fluid" src="{{$image->path}}" alt="">
                        </div>
                     @endforeach
                  </div>
                  @endif
               </div>

               <div class="col-md-6 right-section">

                  <h2>{{$product->name}}</h2>
                  <p>{{$product->description}}</p>


                 


                  @if($get_feasible_installments > 0)
                  <div class="order-type mt-5 mb-4">
                     <a class="active mr-2 px-3 payment-schedule" type="instalment" href="#">Kiston Pay</a>
                     <a class="px-3 payment-schedule" type="full" href="#">Pay Full Amount</a>
                  </div>
                  @else
                  <div class="order-type mt-5 mb-4" style="display:none;">
                     <a class="mr-2 px-3 payment-schedule" type="instalment" href="#">Kiston Pay</a>
                     <a class="active px-3 payment-schedule" type="full" href="#">Pay Full Amount</a>
                  </div>
                  @endif

                  @if (!$product->sold_out)
                  @if($get_feasible_installments > 0)
                  <div class="row details instalment-payment-schedule">
                     <div class="col-lg-12">
                        <ul class="mb-0">
                           <li>
                              <label class="control-label">
                                 <div class="attribute">Category</div>
                                 <span>:</span>{{$category_name}}
                              </label>
                           </li>
                           <li>
                              <label class="control-label">
                                 <div class="attribute">Current Weight</div>
                                 <span>:</span>{{$product->current_weight}} KG
                              </label>
                           </li>
                           <li>
                              <label class="control-label" data-toggle="tooltip" title="This is an estimated weight and may vary">
                                 <div class="attribute">Weight at Delivery</div>
                                 <span>:</span>{{$product->weight}} KG <em>Approx.</em>
                              </label>
                           </li>
                           <li>
                              <label class="control-label">
                                 <div class="attribute">Color</div>
                                 <span>:</span>{{$product->color}}
                              </label>
                           </li>
                           <li class="pb-0">
                              <label class="control-label">
                                 <div class="attribute">Plan</div>
                                 <span>:</span>
                                 <div class="form-group">
                                    <select class="form-control" id="product-emi-price-dropdown">
                                       
                                       @for ($i = $get_feasible_installments; $i > 0; $i--)
                                    <option value="{{$i}}" price="{{$product->installment_formatted($i)}}" installment="{{$i == 1 ? $product->final_advance() : $product->regular_advance()}}" >{{ $i<10?"0".$i:$i}} {{ $i==1?"Month":"Months"}}</option>    
                                       @endfor
                                       
                                       
                                    </select>
                                 </div>
                              </label>
                           </li>
                        </ul>
                     </div>
                     <div class="col-lg-12 pb-4 pricing-wrap">
                        <div class="row">
                           <div class="actual-price col-sm-4 line-height-normal">
                              <p class="mb-1">Full price</p>
                              <h4 class="amount"  id="product-price" price="{{$product->price}}" >RS.{{$product->price_formatted()}}/-</h4>
                           </div>
                           <div class="advance col-sm-4 line-height-normal">
                              <p class="mb-1">Advance</p>
                              <h4 class="amount"  id="selected-installment-amount">RS.{{$product->advance_formatted($get_feasible_installments)}}/-</h4>
                           </div>
                           <div class="EMI col-sm-4 line-height-normal">
                              <p class="mb-1">Instalment</p>
                              <h4 class="amount" id="selected-emi-amount">RS.{{$product->lowest_installment()}}/-</h4>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
                  <div class="row details full-payment-schedule" style="display:{{ $get_feasible_installments == "0" ? "block" : "none" }};">
                     <div class="col-lg-12">
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
                                 <div class="attribute">Current Weight</div>
                                 <span>:</span>{{$product->current_weight}} KG
                              </label>
                           </li>
                           @if( $get_feasible_installments > 0 )
                           <li>
                              <label class="control-label" data-toggle="tooltip" title="This is an estimated weight and may vary">
                                 <div class="attribute">Weight at Delivery</div>
                                 <span>:</span>{{$product->weight}} KG <em>Approx.</em>
                              </label>
                           </li>
                           @endif
                           <li>
                              <label class="control-label">
                                 <div class="attribute">Color</div>
                                 <span>:</span>{{$product->color}}
                              </label>
                           </li>
                           <li>
                              <label class="control-label">
                                 <div class="attribute">Full Price</div>
                                 <span>:</span>
                                 <div class="form-group">
                                    <h4 class="amount"  id="product-price" price="{{$product->price}}" >RS.{{$product->price_formatted()}}/-</h4>
                                 </div>
                              </label>
                           </li>
                        </ul>
                     </div>
                    
                  </div>
                  <div class="row cart-buttons">
                     @if( $product->check_in_cart() == "true" )
                        <div clas="alreadyadded">Added to your cart</div>
                     @else
                     <div class="col-sm-6"><button class="btn font-md default-btn py-3 w-100 login add-to-cart-btn addcart" product="{{$product->product_id}}" redirect="no" type="button">Add to Cart</button></div>
                     <div class="col-sm-6"><button class="btn font-md default-btn py-3 w-100 login add-to-cart-btn book-buy" product="{{$product->product_id}}" redirect="yes" type="button"> {{$get_feasible_installments > 0 ? 'Book your Animal' : 'Buy Animal' }}  </button></div>
                     @endif
                  </div>
                  @else 
                     <p>Sold out</p>
                  @endif

               </div>
            </div>
         </div>
      </section>
      <!-- Products details end -->

      <?php 
      $products = $product->getRelated();
       $products = $products ? $products : array();
      //  dd($products)
      ?>

      @if(count($products) > 0)
      <!-- More Relevant Animals Slider -->
      <section class="section-slider" style="display:block;">
         <div class="container text-center slick">
         <h2>More Relevant Animals</h2>
         <div class="animal-product">
           
            @foreach ($products as $product)
          
            <div class="item">
               {{-- <div class="demo">Demo</div> --}}
               @if($product->sold_out)
                     <div class="sold-out">Sold Out</div>
                  @elseif($product->featured)
                     <div class="featured">Featured</div>
                  @endif
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
            

             <div class="animal-image">
               @if (!$product->sold_out)
               <a href="/product/{{$product->product_id}}">
               @endif
                <img class="img-fluid" src="{{$imagethumb}}" alt="">
                @if (!$product->sold_out)
               </a>
               @endif
            </div>
               <div class="title">
                  <span class="name">{{ $product->name }}</span>
                  <div class="prize">
                     <span class="prize">{{number_format($product->price)}}/- {{$get_feasible_installments > 0 ? "Full Price" : "Price" }} </span> <br>
                     @if( $get_feasible_installments > 0 )
                        <span class="prize">{{number_format( $product->least_installment() )}}/- Per Month</span>
                        {{-- <span class="cart"><i class="icon-qkp-shopping-cart"></i></span> --}}
                     @endif
                  </div>
               </div>
            </div>
            @endforeach
            
         </div>
         {{-- <button class="btn default-btn my-2 px-4 my-sm-0 mr-3 login" type="submit">More Animals in Same Price</button> --}}
         <div class="arrow_prev">
            <span><i class="icon-qkp-caret-left"></i></span>
         </div>
         <div class="arrow_next">
            <span><i class="icon-qkp-caret-right"></i></span>
         </div>
      </section>
      <!-- Slider End -->
      @endif
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