@extends('layouts.front')

@section('content')

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
               <h2 class="text-black search-title">Search</h2>
               {{-- <p class="text-black">Search for the finest animals on Shariah compliant installments</p> --}}
               <div class="button-group row">
                  <div class="col-sm-3">
                     <button type="button" class="btn rounded-pill btn-outline-primary"><span>
                           <i class="icon-qkp-bull"></i>
                        </span>Bull / Cow</button>
                  </div>
                  <div class="col-sm-3">
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
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="range-slider">
                        <div class="slidecontainer my-2">
                           <i class="icon-qkp-bull range-before-img"></i>
                           <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                           <i class="icon-qkp-bull range-after-img"></i>
                        </div>

                     </div>
                  </div>
               </div>
               <div class="row d-flex filter">
                  <div class="col-sm-6">
                     <div class="select-container mb-2">
                        <span>Weight</span>
                        <select class="form-control " data-toggle="dropdown">
                           <option value="1">200Kg</option>
                           <option value="2">300Kg</option>
                           <option value="3">400Kg</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-5">
                     <div class="select-container mb-2">
                        <span>Color</span>
                        <select class="form-control " data-toggle="dropdown">
                           <option value="1">White</option>
                           <option value="2">Black</option>
                           <option value="3">Brown</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-1">
                     <a href="#" type="submit" class="search"><i class="icon-qkp-search-c"></i></a>
                  </div>
               </div>
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
      <h2>New arrivals at our farm</h2>
      <div class="animals-slider">


         @foreach ($featured_products as $product)
            <a href="/product/{{$product->product_id}}">
               <div class="item">
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
                     <span class="prize">{{number_format($product->price/Session::get("get_feasible_installments"))}}/- Per Month</span>
                  </div>
               </div>
            </a>
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
                  <p class="text-center"><em>"I was always a bit skeptical about online qurbani websites, but I decided to do my research and talked to their customer service. They are very professional and seem to know what they are doing. The convenience of paying in installments just made everything better"</em></p>
               </div>
               <div class="client d-block"><h6><em>- Abdul Khaliq</em></h6></div>
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
                  <p class="text-center"><em>"My husband was worried about qurbani last year, but Qurbani Kistoon Pay resolved our financial woes. We not only selected the animal of our choice but the ability to pay in easy monthly installments made our choice just so much better! And on top of that the animal will be delivered right at the doorstep."</em></p>
               </div>
               <div class="client d-block"><h6><em>- Nazia Batool</em></h6></div>
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
                  <p class="text-center"><em>"One of my friends told me about Qurbani Kiston Pay so I decided to visit their website. They turned out to be highly competitive and groundbreaking. No other platform offers such a diverse selection of sacrificial animals or monthly shariah compliant installment facility. My Eid ul Azha will be hassle free."</em></p>
               </div>
               <div class="client d-block"><h6><em>- Khalid Sultan</em></h6></div>
            </div>
         </div>
      </div>
</section>

<!--Clients slider section end -->


@include('supplier')

@include('footer')


<script src="{{asset('/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/slick.js')}}"></script>
<script>

   //      $(document).ready(function(){
   //      setTimeout(()=>{$("#modal").modal('show')},6000);
   //  });

   $(document).ready(function () {
      $(".toggleSearch").click(function () {
         $("#content").toggle(500);
      });
   });


   $('.banner-slider').slick({
      infinite: true,
      slidesToShow: 1,
      autoplay: true,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      autoplaySpeed: 6000,
      speed: 500,
      fade: true,
      cssEase: 'linear'
   });


   $('.animals-slider').slick({
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
      prevArrow: '.arrow_prev',
      nextArrow: '.arrow_next',
   });


   $('.client-slider').slick({
      infinite: true,
      slidesToShow: 1,
      autoplay: true,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
   });

   $('.button.btn.rounded-pill.btn-outline-primary').on('click', function () {
      $('.button.btn.rounded-pill.btn-outline-primary').toggleClass('active');
   });

   
</script>
@endsection