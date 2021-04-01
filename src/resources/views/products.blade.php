@extends('layouts.front')

@section('content')
        
    <!-- products section -->

    <section class="products-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 left-section">
                    {{-- <span class="btn btn-primary collapsed" data-toggle="collapse" data-target="#filter-section-desktop" aria-expanded="false">Filter</span> --}}
                    <button style="background-color: #ffffffc9; width:100%; text-align:left; box-shadow:0 0 10px 0 #ccc;" class="btn py-2 hidden visible-xs collapsed" type="button" data-toggle="collapse" data-target="#filter-section-desktop" aria-expanded="false" aria-controls="collapseExample">
                        <h2 class="mb-0"><i class="fas fa-sliders-h"></i>Filter by <i onclick="myFunction(this)" class="fa fa-caret-down float-right"></i></h2>
                      </button>
                    <div id="filter-section-desktop" class="dont-collapse-sm collapse in" id="collapseExample" aria-expanded="false" style="height: 0px;">
                        <h2 class="hide-on-mobile"><i class="fas fa-sliders-h"></i>Filter by</h2>
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
                        {{-- <a href="javscript;"><button class="btn btn-success my-2 px-4 my-sm-0 ml-auto login" type="submit">SEARCH</button></a> --}}
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

            <div class="col-sm-9 right-section products-filter">
                @include('products-filter')
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
                   function myFunction(x) {
                    x.classList.toggle("fa-caret-up");
                    }
          </script>

@endsection
