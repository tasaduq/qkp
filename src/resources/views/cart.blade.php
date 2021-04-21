@extends('layouts.front')

@section('content')
     
     
    <!-- Cart section -->




<section class="cart-section">
    <div class="container">
      <ol class="breadcrumb pt-0">
         <li class="breadcrumb-item"><a href="/">Home</a></li>
         <li class="breadcrumb-item"><a href="/mandi">Mandi</a></li>
         <li class="breadcrumb-item active">Cart</li>
     </ol>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9 cart-right-section">
               <h2>My Shopping Cart</h2>
               <p><strong>{{count($cart) < 10 ? "0".count($cart) : count($cart)  }} </strong>Animal in Your List</p>
               @if(count($cart) == 0)
                  There is nothing in your cart, please browse our products and add something to cart to proceed.
               @endif

                  @foreach ($products as $product)
                  <div class="cart">
                     <div class="row pb-3 align-items-center">
                        <div class="col-sm-3">
                           <div class="animal-picture text-center">
                              <?php
                                 if ( strpos($product->images, ",") > -1){
                                    $imageid = explode(",",$product->images)[0];
                                 }
                                 else {
                                    $imageid = $product->images;
                                 }
                                 $image = \App\Models\Media::find($imageid);
                                 $imagethumb = $image ? $image->thumb : $image->path;


                                 $installment = $cart[$product->product_id]["installment"];

                              ?>
                              <img class="img-fluid" src="{{$imagethumb}}">
                           </div>
                        </div>
                        <div class="col-sm-9">
                           <h2>{{$product->name}}</h2>
                           <div class="row animals_attribute">
                              <div class="col-sm-6 label">Estimated Live Weight : <strong>{{$product->weight}}KG</strong></div>
                              <div class="col-sm-6 label">Color : <strong>{{$product->color}}</strong></div>
                              <div class="col-sm-6 label">Full Price : <strong>RS.{{number_format($product->price)}}/-</strong></div>
                              
                           <div class="col-sm-6 label">Installment Plan : <strong>{{$installment < 10 ? "0".$installment : $installment }} {{$installment == 1 ?  "Month":"Months" }}</strong></div>
                              <div class="col-sm-6 label">Advance({{ $installment == "1" ? \SETTINGS::get("final_advance")."%" : \SETTINGS::get("regular_advance")."%" }}) : <strong>{{number_format(ceil($product->advance($installment)))}}/-</strong></div>
                              <div class="col-sm-6 label">Monthly Installment : <strong>{{number_format(ceil($product->installment($installment)))}}/-</strong></div>
                           </div>
                           <div class="delete_item">
                           <button class="btn default-btn remove-from-cart-btn" productid="{{$product->product_id}}"><span class="fas fa-trash-alt"></span></button>
                           </div>
                           <!-- <div class="row grand-total">
                              <div class="col-sm-6">
                                 <div>Advance(30%)<strong> : 52,500/-</strong></div>
                              </div>
                              <div class="col-sm-6">
                                 <div>Monthly Installment<strong> : 14,583/-</strong></div>
                              </div>
                           </div> -->
                        </div>
                     </div><!--schdule row-->
                  </div>    
                  @endforeach
                  
            </div>
            @if(count($cart) > 0)
            <div class="col-sm-12 col-md-12 col-lg-3 cart-left-section">
               @include("sections.cart-right-section")
            </div>
            @endif
                     
        </div>
    </div>
</section>




    <!-- cart section end -->
    @include('supplier')
    @include('footer')

@endsection