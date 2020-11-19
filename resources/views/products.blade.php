@extends('layouts.front')

@section('content')
        
    <!-- products section -->

    <section class="products-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 left-section">
    
                    <div id="filter-section-desktop" class="desktop">
                        <h2><i class="fas fa-sliders-h"></i>Filter by</h2>
                        <div class="categories">
                            <h6 class="pb-3">Categories</h6>
                            <ul>
                                <li><a class="active" href="#"><i class="fas fa-horse"></i>Bull</a></li>
                                <li><a href="#"><i class="fas fa-horse"></i>Camel</a></li>
                                <li><a href="#"><i class="fas fa-horse"></i>Goat</a></li>
                                <li><a href="#"><i class="fas fa-horse"></i>Sheep</a></li>
                            </ul>
                        </div>
    
                        <div class="price-range">
                            <h6 class="pb-3 title">Price Range</h6>
                            <input class="w-100" type="range" min="1" max="100" value="50" class="slider" id="myRange">
                        </div>
    
                        <div class="by-weight">
                            <h6 class="pb-3 title">By Weight</h6>
                            <input class="w-100" type="range" min="1" max="100" value="50" class="slider" id="myRange">
                        </div>
    
                        <div class="by-color">
                        <h6 class="pb-3 title">By Color</h6>
                        <div class="form-check pb-2">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label pl-2" for="defaultCheck1">
                              Black and white
                            </label>
                          </div>
                          <div class="form-check pb-2">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label pl-2" for="defaultCheck2">
                              Brown and white
                            </label>
                          </div>
                          <div class="form-check pb-2">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                            <label class="form-check-label pl-2" for="defaultCheck3">
                              Black only
                            </label>
                          </div>
                          <div class="form-check pb-2">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                            <label class="form-check-label pl-2" for="defaultCheck4">
                              White only
                            </label>
                          </div>
                          <div class="form-check pb-2">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                            <label class="form-check-label pl-2" for="defaultCheck5">
                              Brown only
                            </label>
                          </div>
                          
                    </div>
                    </div>
    
                    <h2 class="mobile"><a class="filter-by" href="#filter-section" data-toggle="collapse"><i class="fas fa-sliders-h"></i>Filter by</a></h2>
                   <div id="filter-section" class="collapse">
                        <div class="categories active">
                            <h6 class="pb-3 title">Categories</h6>
                            <ul>
                                <li><a href="#" class="active"><i class="fas fa-horse"></i>Bull</a></li>
                                <li><a href="#"><i class="fas fa-horse"></i>Camel</a></li>
                                <li><a href="#"><i class="fas fa-horse"></i>Goat</a></li>
                                <li><a href="#"><i class="fas fa-horse"></i>Sheep</a></li>
                            </ul>
                        </div>
    
                        <div class="price-range">
                            <h6 class="pb-3 title">Price Range</h6>
                            <input class="w-100" type="range" min="1" max="100" value="50" class="slider" id="myRange">
                        </div>
    
                        <div class="by-weight">
                            <h6 class="pb-3 title">By Weight</h6>
                            <input class="w-100" type="range" min="1" max="100" value="50" class="slider" id="myRange">
                        </div>
    
                        <div class="by-color">
                        <h6 class="pb-3 title">By Color</h6>
                        <div class="form-check pb-2">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label pl-2" for="defaultCheck1">
                              Black and white
                            </label>
                          </div>
                          <div class="form-check pb-2">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label pl-2" for="defaultCheck2">
                              Brown and white
                            </label>
                          </div>
                          <div class="form-check pb-2">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                            <label class="form-check-label pl-2" for="defaultCheck3">
                              Black only
                            </label>
                          </div>
                          <div class="form-check pb-2">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                            <label class="form-check-label pl-2" for="defaultCheck4">
                              White only
                            </label>
                          </div>
                          <div class="form-check pb-2">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                            <label class="form-check-label pl-2" for="defaultCheck5">
                              Brown only
                            </label>
                          </div>
                          
                    </div>
                    </div>
    
    
                </div>
                <div class="col-sm-9 right-section">
                    <h2>Bulls</h2>
                    <p><strong>179,835 </strong>Animals Stocks are available</p>
                    <div class="row justify-content-center">
                        <div class="col-sm-4 col-md-6 col-lg-4">
                            <div class="animal-product">
                                <div class="item">
                                    <div class="featured">Featured</div>
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
                        </div>
                        <div class="col-sm-4 col-md-6 col-lg-4">
                            <div class="animal-product">
                                <div class="item">
                                    <div class="featured">Featured</div>
                                    <div class="product-img"><a href="/product/test"><img class="img-fluid" src="/images/Layer 8.png" alt=""></a></div>
                                    <div class="title">
                                    <span class="name">Achai Bull</span>
                                    <div class="prize">
                                        <span>Actual Price <strong>175,000/-</strong></span>
                                        <span>Monthly Installment <strong>14,583/-</strong></span>
                                        <!-- <span class="cart active"><i class="icon-qkp-shopping-cart"></i></span> -->
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-6 col-lg-4">
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
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-6 col-lg-4">
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
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-6 col-lg-4">
                            <div class="animal-product">
                                <div class="item">
                                    <div class="sold-out">Sold Out</div>
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
                        </div>
                        <div class="col-sm-4 col-md-6 col-lg-4">
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
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-6 col-lg-4">
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
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-6 col-lg-4">
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
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-6 col-lg-4">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
        <!-- products section end -->
    
          
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
              $('.navbar-nav .nav-link').click(function(){
                      $('.navbar-nav .nav-link').removeClass('active');
                   $(this).addClass('active');
                   });
          </script>

@endsection
