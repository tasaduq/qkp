@extends('layouts.front')

@section('content')

<!-- Banner section -->

  <section class="section-banner">
   <div class="banner-slider">
      <div class="slide-img img-1"></div>
      <div class="slide-img img-2"></div>
      <div class="slide-img img-3"></div>
   </div>
   <div class="container text-center center">
      <div class="content" id="content">
         <div class="row">
            <div class="col-md-12">
               <h2 class="text-white">Search</h2>
               <p>Search the Finest Animal for Qurbani on Installment</p>
               <div class="button-group row">
                  <div class="col-sm-3">
                     <button type="button" class="btn rounded-pill btn-outline-primary active"><span>
                           <i class="icon-qkp-bull"></i>
                        </span>Bull</button>
                  </div>
                  <div class="col-sm-3">
                     <button type="button" class="btn rounded-pill btn-outline-primary"><span>
                        <i class="icon-qkp-camel"></i>
                        </span>Camel</button>
                  </div>
                  <div class="col-sm-3">
                     <button type="button" class="btn rounded-pill btn-outline-primary"><span>
                        <i class="icon-qkp-goat"></i>
                        </span>Goat</button>
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
   </div>
   </div>
</section>
<!--Animals slider section -->

<section class="section-slider">
   <div class="container text-center slick">
      <h2>Featured Animals</h2>
      <div class="animals-slider">
            <a href="/product/test">
               <div class="item">
                  <div class="animal-image">
                     <img class="img-fluid" src="/images/Layer 8.png" alt="">
                  </div>
                  <div class="title">
                     <span class="name">Kharani Animal</span>
                     <span class="prize">3,500/- Per Month</span>
                  </div>
               </div>
            </a>
            <a href="/product/test">
               <div class="item">
                  <div class="animal-image">
                     <img class="img-fluid" src="images/Layer 8.png" alt="">
                  </div>
                  <div class="title">
                     <span class="name">Kharani Animal</span>
                     <span class="prize">3,500/- Per Month</span>
                  </div>
               </div>
            </a>
            <a href="/product/test">
               <div class="item">
                  <div class="animal-image">
                     <img class="img-fluid" src="images/about-us.png" alt="">
                  </div>
                  <div class="title">
                     <span class="name">Kharani Animal</span>
                     <span class="prize">3,500/- Per Month</span>
                  </div>
               </div>
            </a>
            <a href="/product/test">
               <div class="item">
                  <div class="animal-image">
                     <img class="img-fluid" src="images/Layer 8.png" alt="">
                  </div>
                  <div class="title">
                     <span class="name">Kharani Animal</span>
                     <span class="prize">3,500/- Per Month</span>
                  </div>
               </div>
            </a>
            <a href="/product/test">
               <div class="item">
                  <div class="animal-image">
                     <img class="img-fluid" src="images/Layer 8.png" alt="">
                  </div>
                  <div class="title">
                     <span class="name">Kharani Animal</span>
                     <span class="prize">3,500/- Per Month</span>
                  </div>
               </div>
            </a>



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
      <h2>What our Premium users say about us</h2>
      <div class="client-slider">
         <div class="row d-inline-flex text-center client-content align-items-center">
            <div class="col-sm-3">
               <div class="client-image">
                  <img src="/images/client.png" alt="img">
               </div>
               <h6>Abdul Khaliq</h6>
            </div>
            <div class="col-sm-9 text-left">
               <div class="desc">
                  <p>Qurbani Kistoon Pay turned out to be the most reliable online qurbani partner. By providing monthly installment facility on the animal of my choice. I visited their farms, and they are taking exceptionally good care of the animals.</p>
               </div>
            </div>
         </div>
         <div class="row d-inline-flex text-center client-content align-items-center">
            <div class="col-sm-3">
               <div class="client-image">
                  <img src="/images/client.png" alt="img">
               </div>
               <h6>Nazia Batool</h6>
            </div>
            <div class="col-sm-9 text-left">
               <div class="desc">
                  <p>My husband was worried about qurbani last year, but Qurbani Kistoon Pay resolved our financial woes. We not only selected the animal of our choice but the ability to pay in easy monthly installments made our choice just so much better! And on top of that the animal will be delivered right at the doorstep. </p>
               </div>
            </div>
         </div>
         <div class="row d-inline-flex text-center client-content align-items-center">
            <div class="col-sm-3">
               <div class="client-image">
                  <img src="/images/client.png" alt="img">
               </div>
               <h6>Khalid Sultan</h6>
            </div>
            <div class="col-sm-9 text-left">
               <div class="desc">
                  <p>One of my friends told me about Qurbani Kiston Pay so I decided to visit their website. They turned out to be highly competitive and groundbreaking. No other platform offers such a diverse selection of sacrificial animals or monthly shariah compliant installment facility. My Eid ul Azha will be hassle free. </p>
               </div>
            </div>
         </div>
      </div>
</section>

<!--Clients slider section end -->

<!--Supplier section -->

<section class="supplier-section">
   <div class="container">
      <div class="row">
         <div class="col-sm-9 text-white align-self-center">
            <h2 class="text-white">Want to become a Supplier?</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
         </div>
         <div class="col-sm-3 d-flex align-items-center button">
            <button class="btn btn-outline-success my-2 px-4 my-sm-0 ml-auto login" type="submit">Get Started</button>
         </div>
      </div>
   </div>
</section>

<!--Supplier section end -->



<!-- footer -->
<section class="footer-section">
   <div class="container">
      <div class="row justify-content-around text-center align-items-center">
         <div class="col-sm-2 text-left">
            <div class="footerlogo">
                  <img src="/images/footerlogo.svg" alt="">
            </div>
         </div>
         <div class="col-sm-6 copyright">
            <span>© Copyrights 2020 QurbaniKistoonPay. All Rights Reserved</span>
            <span><a href="#"><strong>Privacy Policy</strong></a> - <a href="#"><strong>Terms & Conditions</strong></a></span>
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