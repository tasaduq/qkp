
                    
    <h2>{{$category->category_name}}</h2>
    
    <p><strong>{{$stock}} </strong>Animals Stocks are available</p>
    <div class="row justify-content-left">

        @forelse ($products as $product)
            <div class="col-sm-4 col-md-6 col-lg-4">
                <div class="animal-product">
                
                @if(!$product->sold_out)
                    <a href="/product/{{$product->product_id}}">
                @endif    

            <div class="item">
                <div class="demo">Demo</div>
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
                @if(!$product->sold_out)
                    </a>
                @endif    
                
            </div>
            </div>
        </div>
        
            
        @empty
        <span class="no-products">There are no products in this category</span>    
        @endforelse


    