@extends('layouts.front')

@section('content')
<?php
$get_feasible_installments = Session::get("get_feasible_installments");
?>

<!-- Banner section -->

  <section class="section-banner">
   <div class="banner-slider">
      <div class="slide-img img-1"></div>
      <div class="slide-img img-2"></div>
      <div class="slide-img img-3"></div>
      <div class="slide-img img-4"></div>
      <div class="slide-img img-5"></div>
      <div class="slide-img img-6"></div>
      <div class="slide-img img-7"></div>
   </div>
   <div class="container text-center center">
      <div class="content" id="content">
         <div class="row">
            <div class="col-md-12">
               <h2 class="text-purple search-title">Search</h2>
               {{-- <p class="text-black">Search for the finest animals on Shariah compliant installments</p> --}}
               <form action="#" id="home_search_form" method="GET">
               
                {{-- @csrf  --}}
                
               <div class="button-group row">
                
               
               @foreach ($categories as $category)

                  <div class="col-sm-3">
                  <input type="hidden" name="category" value="{{ $category->category_id }}">    
                  <button type="button" class="category_method_active btn rounded-pill btn-outline-primary btnactive {{$loop->first ? "active" : ""}}" selected_category="{{ $category->category_id }}">
                     <span>
                           <i class="{{ $category->icon }}"></i>
                     </span>{{ $category->category_name }}</button>
                  </div>
                @endforeach
                
                  {{-- <div class="col-sm-3">
                     <button type="button" class="btn rounded-pill btn-outline-primary"><span>
                        <i class="icon-qkp-goat"></i>
                        </span>Goat</button>
                  </div>
                  <div class="col-sm-3">
                     <button type="button" class="btn rounded-pill btn-outline-primary"><span>
                        <i class="icon-qkp-camel"></i>
                        </span>Camel</button>
                  </div>
                  <div class="col-sm-3">
                     <button type="button" class="btn rounded-pill btn-outline-primary"><span>
                        <i class="icon-qkp-sheep"></i>
                        </span>Sheep</button>
                  </div> --}}
               </div>
               <div class="row mt-3">
                  <div class="col-sm-12">
                     <div class="range-slider">
                        <div class="slidecontainer my-2">
                           <i class="icon-qkp-bull range-before-img"></i>
                           {{-- <input type="range" min="1" max="100" value="50" class="slider" id="myRange"> --}}
                           {{-- <p>
                              <label for="amount">Price range:</label>
                              <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                            </p>
                             
                            <div id="slider-range"></div> --}}

                            {{-- <div id="slider" class="store-slider"></div> --}}
                            
                            <div class="filter-section">
                              {{-- <div class="h5">По цене</div> --}}
                              <div class="slider-wrapper">
                                <div id="slider" class="store-slider"></div>
                              </div>
                              <div class="row filter-row">
                                <div class="col-6">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      {{-- <div class="input-group-text">от</div> --}}
                                    </div>
                                    <input type="hidden" class="form-control price-input" id="price_from">
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      {{-- <div class="input-group-text">до</div> --}}
                                    </div>
                                    <input type="hidden" class="form-control price-input" id="price_to">
                                  </div>
                                </div>
                              </div>
                            </div>

                            
                           <i class="icon-qkp-bull range-after-img"></i>
                        </div>

                     </div>
                  </div>
               </div>
               <div class="row d-flex filter">
                  <div class="col-sm-6">
                    <div class="select-container mb-2">
                        <span>Weight</span>
                    <select class="form-control " name="weight" class="weight_c" id="weight_ci" data-toggle="dropdown">
                     <option value="0">Select Weight</option>
                        <?php 
                            // $num=10;
                            // $i=1;
                            // while ($i<=40)
                            // {
                            // $total=$num*$i;
                            // $secondvlaue = $total+$total;
                           //  $data = array('10,20', '30,40', '50,60', '70,80', '90,100', '110,120', '130,140', '150,160', '170,180', '190,200', '210,220', '230,240', '250,260', '270,280', '290,300', '310,320', '330,340', '350,360', '370,380', '390,400');
                            $data = array('10-20', '20-30','30-40','40-50', '50-60','60-70', '70-80', '80-90', '90-100', '100-110', '110-120', '120-130', '130-140', '140-150', '150-160', '160-170', '170-180', '180-190', '190-200', '200-210', '210-220', '220-230', '230-240', '250-260', '270-280', '290-300', '310-320', '330-340', '350-360', '370-380', '390-400');
                            foreach($data as $value){
                           //  $weightdata = str_replace(",", " -  ", $value);
                           //  $weightvalue = $value;
                            
                           ?>
                            {{-- <option value="{{$total }}">{{$total }} - {{$secondvlaue }} Kg</option> --}}
                            <option value="{{$value}}"> {{ $value }} Kg</option>
                            <?php 
                            // $i++;
                            } 
                            ?>
                           </select>
                        </div>
                  </div>
                  <div class="col-sm-5">
                     <div class="select-container mb-2">
                        <span>Color</span>
                        <select class="form-control" name="product_color"  id="product_color" class="product_c" data-toggle="dropdown">
                           
                                <option value="0">Select Color</option>
                                
                            <?php  foreach($productcolor as $product){ ?>
                           <option value="{{ $product->color }}">{{ $product->color }}</option>
                          <?php   }  ?>     
                           </select>
                     </div>
                  </div>
                  <div class="col-sm-1">
                     {{-- <a href="javascript:void(0)" type="submit" class="search" id="search_category_btn"></a> --}}
                     <button id="send" type="submit" class="search"><i class="icon-qkp-search-c"></i></button>
                    </div>
               </div>
            </form>
            </div>
         </div>
      </div>
      {{-- <div class="content" id="content">
         <div class="row">
            <div class="col-md-12">
               <h2 class="text-white">Search</h2>
                <p>Search for the finest animals on Shariah compliant installments</p>
               <div class="row d-flex filter align-items-end mt-4">
                  <div class="col-sm-5 text-left">
                     <label class="mb-3 pl-3">Animal Category</label>
                     <div class="select-container">
                        <select class="form-control " data-toggle="dropdown">
                           <option value="1">Cow/Bull</option>
                           <option value="2">Goat</option>
                           <option value="3">Camel</option>
                           <option value="3">Sheep</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-3 text-left">
                     <label class="mb-3 pl-3">Price Range</label>
                     <div class="select-container">
                        <select class="form-control" data-toggle="dropdown">
                           <option value="1">25000 - 50000</option>
                           <option value="2">50000 - 75000</option>
                           <option value="3">75000 - 100000</option>
                           <option value="3">100000 - 125000</option>
                           <option value="3">125000 - 150000</option>
                           <option value="3">150000 - 175000</option>
                           <option value="3">175000 - 200000</option>
                           <option value="3">200000 - 225000</option>
                           <option value="3">225000 - 250000</option>
                           <option value="3">250000 - 275000</option>
                           <option value="3">275000 - 300000</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-3 text-left">
                     <label class="mb-3">Estimated Live Weight</label>
                     <input class="w-100 mt-4" type="range" min="1" max="100" value="50" class="slider" id="myRange">
                  </div>
                  <div class="col-sm-1">
                     <a href="#" type="submit" class="search"><i class="icon-qkp-search-c"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div> --}}
   </div>
   </div>
</section>
<!--Animals slider section -->

<section class="section-slider">
   <div class="container text-center slick">
      <h2>New arrivals</h2>
      <div class="animals-slider">


         @foreach ($featured_products as $product)
            @if (!$product->sold_out)
               <a href="/product/{{$product->product_id}}">
            @endif
               <div class="item">
                  {{-- <div class="demo">Demo</div> --}}
                  @if($product->sold_out)
                     <div class="sold-out">Sold Out</div>
                  @elseif($product->featured)
                     <div class="featured">Featured</div>
                  @endif
                  
                  <div class="animal-image">
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
                     
                     <img class="img-fluid" src="{{$imagethumb}}" alt="">
                  </div>
                  <div class="title">
                     <span class="name">{{$product->name}}</span>
                     <span class="prize">{{number_format($product->price)}}/- {{$get_feasible_installments > 0 ? "Full Price" : "Price" }}</span> <br>
                     @if( $get_feasible_installments > 0 )
                        <span class="prize">{{number_format( $product->least_installment() )}}/- Per Month</span>
                     @endif
                  </div>
               </div>
               @if (!$product->sold_out)
               </a>
               @endif
         @endforeach
         

          



            <!-- <div class="item">
               <a href="#"><img class="img-fluid" src="Assets/images/Layer 8.png" alt=""></a>
               <div class="title">
                  <span class="name">Kharani Animal</span>
                  <span class="prize">3,500/- Per Month</span>
               </div>
            </div>
            <div class="item">
               <a href="#"><img class="img-fluid" src="Assets/images/Layer 8.png" alt=""></a>
               <div class="title">
                  <span class="name">Kharani Animal</span>
                  <span class="prize">3,500/- Per Month</span>
               </div>
            </div>
            <div class="item">
               <a href="#"><img class="img-fluid" src="Assets/images/Layer 8.png" alt=""></a>
               <div class="title">
                  <span class="name">Kharani Animal</span>
                  <span class="prize">3,500/- Per Month</span>
               </div>
            </div>
            <div class="item">
               <a href="#"><img class="img-fluid" src="Assets/images/Layer 8.png" alt=""></a>
               <div class="title">
                  <span class="name">Kharani Animal</span>
                  <span class="prize">3,500/- Per Month</span>
               </div>
            </div> -->
         </div>
      <div class="arrow_prev">
         <span><i class="icon-qkp-caret-left"></i></span>
      </div>
      <div class="arrow_next">
         <span><i class="icon-qkp-caret-right"></i></span>
      </div>
</section>
<!--Animals slider section end -->

<!--Clients slider section -->

<section class="client-slider-section">
   <div class="container text-center">
      <h2>What our customers say</h2>
      <div class="client-slider">
         <div class="row d-inline-flex text-center client-content justify-content-center align-items-center">
            <!-- <div class="col-sm-3">
               <div class="client-image">
                  <img src="/images/client.png" alt="img">
               </div>
               <h6>Abdul Khaliq</h6>
            </div> -->
            <div class="col-sm-10">
               <div class="desc">
                  <p class="text-center"><em>"Mainay qurbani kiston pay jaisa platform nai dekha aj tak. Inki customer service bohat hi achi hai"</em></p>
               </div>
               <div class="client d-block"><h6><em>- Zulfiqar Sheikh</em></h6></div>
            </div>
         </div>
         <div class="row d-inline-flex text-center client-content justify-content-center align-items-center">
            <!-- <div class="col-sm-3">
               <div class="client-image">
                  <img src="/images/client.png" alt="img">
               </div>
               <h6>Nazia Batool</h6>
            </div> -->
            <div class="col-sm-10">
               <div class="desc">
                  <p class="text-center"><em>"Kiston ka ye tareeqay bohat hi faidaymand hai. Pooray saal choti qistein dekay qurbani py ghar py janwar milna aik boha achi service hai"</em></p>
               </div>
               <div class="client d-block"><h6><em>- Wajahat Ali</em></h6></div>
            </div>
         </div>
         <div class="row d-inline-flex text-center client-content justify-content-center align-items-center">
            <!-- <div class="col-sm-3">
               <div class="client-image">
                  <img src="/images/client.png" alt="img">
               </div>
               <h6>Khalid Sultan</h6>
            </div> -->
            <div class="col-sm-10">
               <div class="desc">
                  <p class="text-center"><em>"Qurbani Kiston Pay has exceptional customer support. I needed a qurbani animal which I couldn’t find in my price range. Their team went above and beyond to find it for me"</em></p>
               </div>
               <div class="client d-block"><h6><em>- Ashraf Ali</em></h6></div>
            </div>
         </div>
      </div>
</section>

<!--Clients slider section end -->


@include('supplier')

@include('footer')


{{-- <script src="{{asset('/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/slick.js')}}"></script> --}}

@endsection