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
                                <li><a class="active" href="#"><i class="icon-qkp-bull align-middle"></i>Bull</a></li>
                                <li><a href="#"><i class="icon-qkp-camel align-middle"></i>Camel</a></li>
                                <li><a href="#"><i class="icon-qkp-goat align-middle"></i>Goat</a></li>
                                <li><a href="#"><i class="icon-qkp-sheep align-middle"></i>Sheep</a></li>
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
    
                        
                    </div>
    
                    <h2 class="mobile"><a class="filter-by" href="#filter-section" data-toggle="collapse"><i class="fas fa-sliders-h"></i>Filter by</a></h2>
                   <div id="filter-section" class="collapse">
                        <div class="categories active">
                            <h6 class="pb-3 title">Categories</h6>
                            <ul>
                                <li><a class="active" href="#"><i class="icon-qkp-bull align-middle"></i>Bull</a></li>
                                <li><a href="#"><i class="icon-qkp-camel align-middle"></i>Camel</a></li>
                                <li><a href="#"><i class="icon-qkp-goat align-middle"></i>Goat</a></li>
                                <li><a href="#"><i class="icon-qkp-sheep align-middle"></i>Sheep</a></li>
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
    
                        
                    </div>
    
    
                </div>
                <div class="col-sm-9 right-section">
                    <h2>{{$category->category_name}}</h2>
                    
                    <p><strong>179,835 </strong>Animals Stocks are available</p>
                    <div class="row justify-content-center">

                            

                                

                        @foreach ($products as $product)
                        <div class="col-sm-4 col-md-6 col-lg-4">
                            <div class="animal-product">
                        <div class="item">
                            @if($product->featured)
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
                                
                            ?>
                            <div class="product-img"><a href="/product/{{$product->product_id}}"><img class="img-fluid" src="{{$image->thumb}}" alt="{{$product->name}}"></a></div>
                            <div class="title">
                            <span class="name">{{$product->name}}</span>
                            <div class="prize">
                                <span>Actual Price <strong>{{$product->price}}/-</strong></span>
                                <span>Monthly Installment <strong>14,583/-</strong></span>
                                 <!-- <span class="cart"><i class="icon-qkp-shopping-cart"></i></span> -->
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach



                    </div>
                </div>
            </div>
        </div>
    </section>
    
        <!-- products section end -->
        @include('supplier')
        @include('footer')
        
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
