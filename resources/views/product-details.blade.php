@extends('layouts.front')

@section('content')
      

      <!-- Products details section -->
      <section class="products-details-section">
         <div class="container">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item"><a href="#">Animals</a></li>
               <li class="breadcrumb-item active">Brahman Bull</li>
           </ol>
            <div class="row">
               <div class="col-sm-6 text-center left-section">
                  <div class="product-preview">
                     <div class="item">
                        <img class="img-fluid" src="/images/product-details.png" alt="">
                     </div>
                     <div class="item">
                        <img class="img-fluid" src="/images/product-details.png" alt="">
                     </div>
                     <div class="item">
                        <img class="img-fluid" src="/images/product-details.png" alt="">
                     </div>
                     <div class="item">
                        <img class="img-fluid" src="/images/product-details.png" alt="">
                     </div>
                     <div class="item">
                        <img class="img-fluid" src="/images/product-details.png" alt="">
                     </div>
                     <div class="item">
                        <img class="img-fluid" src="/images/product-details.png" alt="">
                     </div>
                  </div>
                  <div class="product_arrow_prev">
                     <span><i class="icon-qkp-caret-left"></i></span>
                  </div>
                  <div class="product_arrow_next">
                     <span><i class="icon-qkp-caret-right"></i></span>
                  </div>
                  <div class="slider slider-nav">
                     <div class="slide-img">
                        <img class="img-fluid thumbnail" src="/images/product-thumbnail.png" alt="">
                     </div>
                     <div class="slide-img">
                        <img class="img-fluid thumbnail" src="/images/product-thumbnail.png" alt="">
                     </div>
                     <div class="slide-img">
                        <img class="img-fluid thumbnail" src="/images/product-thumbnail.png" alt="">
                     </div>
                     <div class="slide-img">
                        <img class="img-fluid thumbnail" src="/images/product-thumbnail.png" alt="">
                     </div>
                     <div class="slide-img">
                        <img class="img-fluid thumbnail" src="/images/product-thumbnail.png" alt="">
                     </div>
                     <div class="slide-img">
                        <img class="img-fluid thumbnail" src="/images/product-thumbnail.png" alt="">
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 right-section">
                  <h2>Brahman Bull</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod elit, sed do eiusmod tempor indolor sit amet, consectetur adipiscing elit, sed do eiusmod elit, sed do eiusmod tempor idolor sit amet, consectetur adipiscing elit, sed do eiusmod elit, sed do eiusmod tempor icididungna aliqua. Quis ipsum suspenravida. commodo viverra maecenas accumsan lacus vel facilisis. </p>
                  <div class="row details">
                     <div class="col-xs-12 col-md-10 col-lg-8">
                        <ul>
                           <li>
                              <label class="control-label">
                                 <div class="attribute">Category</div>
                                 <span>:</span>Brahman Bull
                              </label>
                           </li>
                           <li>
                              <label class="control-label">
                                 <div class="attribute">Weight</div>
                                 <span>:</span>200 KG
                              </label>
                           </li>
                           <li>
                              <label class="control-label">
                                 <div class="attribute">Height</div>
                                 <span>:</span>6.2 Ft
                              </label>
                           </li>
                           <li>
                              <label class="control-label">
                                 <div class="attribute">Color</div>
                                 <span>:</span>Black & White
                              </label>
                           </li>
                           <li>
                              <label class="control-label">
                                 <div class="attribute">Plan</div>
                                 <span>:</span>
                                 <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                       <option>06 Months</option>
                                       <option>08 Months</option>
                                       <option>12 Months</option>
                                       <option>14 Months</option>
                                       <option>24 Months</option>
                                    </select>
                                 </div>
                              </label>
                           </li>
                        </ul>
                     </div>
                     <div class="col-xs-12 col-md-6 col-lg-4">
                        <div class="actual-price">
                           <p class="mb-1">Actual price</p>
                           <h4 class="amount">RS.175,000/-</h4>
                        </div>
                        <div class="advance">
                           <p class="mb-1">Advance</p>
                           <h4 class="amount">RS.25,000/-</h4>
                        </div>
                        <div class="EMI">
                           <p class="mb-1">EMI</p>
                           <h4 class="amount">RS.13,363/-</h4>
                        </div>
                     </div>
                  </div>
                  <button class="btn default-btn w-100 login" type="submit">Book your Animal</button>
               </div>
            </div>
         </div>
      </section>
      <!-- Products details end -->


      <!-- More Relevant Animals Slider -->
      <section class="section-slider">
         <div class="container text-center slick">
         <h2>More Relevant Animals</h2>
         <div class="animal-product">
            <div class="item">
               <div class="product-img"><a href="/product/test"><img class="img-fluid" src="/images/Layer 8.png" alt=""></a></div>
               <div class="title">
                  <span class="name">Achai Bull</span>
                  <div class="prize">
                     <span>Actual Price <strong>175,000/-</strong></span>
                     <span>Monthly Installment <strong>14,583/-</strong></span>
                     <!-- <span class="cart"><i class="icon-qkp-shopping-cart"></i></span> -->
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="product-img"><a href="/product/test"><img class="img-fluid" src="/images/Layer 8.png" alt=""></a></div>
               <div class="title">
                  <span class="name">Achai Bull</span>
                  <div class="prize">
                     <span>Actual Price <strong>175,000/-</strong></span>
                     <span>Monthly Installment <strong>14,583/-</strong></span>
                     <!-- <span class="cart"><i class="icon-qkp-shopping-cart"></i></span> -->
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="product-img"><a href="/product/test"><img class="img-fluid" src="/images/Layer 8.png" alt=""></a></div>
               <div class="title">
                  <span class="name">Achai Bull</span>
                  <div class="prize">
                     <span>Actual Price <strong>175,000/-</strong></span>
                     <span>Monthly Installment <strong>14,583/-</strong></span>
                     <!-- <span class="cart"><i class="icon-qkp-shopping-cart"></i></span> -->
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="product-img"><a href="/product/test"><img class="img-fluid" src="/images/Layer 8.png" alt=""></a></div>
               <div class="title">
                  <span class="name">Achai Bull</span>
                  <div class="prize">
                     <span>Actual Price <strong>175,000/-</strong></span>
                     <span>Monthly Installment <strong>14,583/-</strong></span>
                     <!-- <span class="cart"><i class="icon-qkp-shopping-cart"></i></span> -->
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="product-img"><a href="/product/test"><img class="img-fluid" src="/images/Layer 8.png" alt=""></a></div>
               <div class="title">
                  <span class="name">Achai Bull</span>
                  <div class="prize">
                     <span>Actual Price <strong>175,000/-</strong></span>
                     <span>Monthly Installment <strong>14,583/-</strong></span>
                     <!-- <span class="cart"><i class="icon-qkp-shopping-cart"></i></span> -->
                  </div>
               </div>
            </div>
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