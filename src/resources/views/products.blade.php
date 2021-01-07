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
                            <h6 class="pb-3 title">Categories</h6>
                            <ul>

                                
                                @foreach ($categories as $cat) 

                            <li><a class="category_method_active {{\Request::has("c") ? ( \Request::get('c') == $cat->category_id ? "active" : ""  ) : '' }}" href="#" selected_category="{{ $cat->category_id }}"><i class="{{ $cat->icon }} align-middle"></i>{{ $cat->category_name }}</a></li>

                                @endforeach
                
                            
                            </ul>
                        </div>
    
                        <div class="price-range">
                            <h6 class="pb-3 title">Price Range</h6>
                            {{-- <input class="w-100" type="range" min="1" max="100" value="50" class="slider" id="myRange"> --}}
                             
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
                        </div>
    
                        <div class="by-weight">
                            <h6 class="pb-3 title">By Weight</h6>
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
                        <div class="by-weight">
                            <h6 class="pb-3 title">By Color</h6>
                            <select class="form-control" name="product_color"  id="product_color" class="product_c" data-toggle="dropdown">
                                <option value="0">Select Color</option>
                                <?php  foreach($productcolor as $product){ ?>
                               <option value="{{ $product->color }}">{{ $product->color }}</option>
                              <?php   }  ?>     
                               </select>
                        </div>
                        <form id="home_search_form">
                        <a href="javscript;"><button class="btn btn-success my-2 px-4 my-sm-0 ml-auto login" type="submit">SEARCH</button></a>
                        </form>
                        
                    </div>
    
                    {{-- <h2 class="mobile"><a class="filter-by" href="#filter-section" data-toggle="collapse"><i class="fas fa-sliders-h"></i>Filter by</a></h2>
                   <div id="filter-section" class="collapse">
                        <div class="categories active">
                            <h6 class="pb-3 title">Categories</h6>
                            <ul>
                                <li><a class="active" href="#"><i class="icon-qkp-bull align-middle"></i>Bull</a></li>
                                <li><a href="#"><i class="icon-qkp-goat align-middle"></i>Goat</a></li>
                                <li><a href="#"><i class="icon-qkp-camel align-middle"></i>Camel</a></li>
                                <li><a href="#"><i class="icon-qkp-sheep align-middle"></i>Sheep</a></li>
                            </ul>
                        </div>
    
                        <div class="price-range">
                            <h6 class="pb-3 title">Price Range</h6>
                            <input class="w-100" type="range" min="1" max="100" value="50" class="slider" id="myRange">
                        </div>
    
                        <div class="by-weight">
                            <h6 class="pb-3 title">By Weight</h6>
                            
                        </div>
    
                        
                    </div> --}}
    
    
                </div>
                <div class="col-sm-9 right-section">
                    
                    <h2>{{$category->category_name}}</h2>
                    
                    <p><strong>{{$stock}} </strong>Animals Stocks are available</p>
                    <div class="row justify-content-left">

                        @forelse ($products as $product)
                        <div class="col-sm-4 col-md-6 col-lg-4">
                            <div class="animal-product">
                            <a href="/product/{{$product->product_id}}">
                        <div class="item">
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
                                
                            ?>
                            <div class="animal-image"><img class="img-fluid" src="{{$image->thumb}}" alt="{{$product->name}}"></div>
                            <div class="title">
                            <span class="name">{{$product->name}}</span>
                            <div class="prize">
                                <span>Full Price <strong>{{$product->price}}/-</strong></span>
                                <span>Monthly Instalment <strong>{{number_format( $product->least_installment() )}}/-</strong></span>
                                 <!-- <span class="cart"><i class="icon-qkp-shopping-cart"></i></span> -->
                            </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                    
                @empty
                <span class="no-products">There are no products in this category</span>    
                @endforelse


                    </div>
                </div>
            </div>
        </div>
    </section>
    
        <!-- products section end -->
        @include('supplier')
        @include('footer')
        
          {{-- <script src="/js/jquery-3.5.1.min.js"></script>
          <script src="/js/popper.min.js"></script>
          <script src="/js/bootstrap.min.js"></script>
          <script src="/js/slick.js"></script> --}}
          <script>
              $('.navbar-nav .nav-link').click(function(){
                      $('.navbar-nav .nav-link').removeClass('active');
                   $(this).addClass('active');
                   });
          </script>

@endsection
