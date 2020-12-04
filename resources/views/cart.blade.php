@extends('layouts.front')

@section('content')
     
     
    <!-- Cart section -->




<section class="cart-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9 cart-right-section">
               <h2>My Shopping Cart</h2>
               <p><strong>{{count($cart) < 10 ? "0".count($cart) : count($cart)  }} </strong>Animal in Your List</p>
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
                              
                           <div class="col-sm-6 label">Installment Plan : <strong>{{$cart[$product->product_id]["installment"] < 10 ? "0".$cart[$product->product_id]["installment"] : $cart[$product->product_id]["installment"] }} {{$cart[$product->product_id]["installment"] == 1 ?  "Month":"Months" }}</strong></div>
                              <div class="col-sm-6 label">Advance(30%) : <strong>{{number_format(ceil($product->price*0.3))}}/-</strong></div>
                              <div class="col-sm-6 label">Monthly Installment : <strong>{{number_format(ceil($product->price/$cart[$product->product_id]["installment"]))}}/-</strong></div>
                           </div>
                           <div class="delete_item">
                           <button class="btn default-btn"><span class="fas fa-trash-alt"></span></button>
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

         <div class="col-sm-12 col-md-12 col-lg-3 cart-left-section">
               <h2>Cart Total Amount</h2>
               <p>Calculation of Total Amount</p>
                <div class="check-out">
                  <?php
                     $total = 0;
                  ?>
                  @foreach ($products as $product)
                   <div class="total">
                   <h6>{{$product->name}}</h6>
                   <?php

                     $total += ceil($product->price*0.3);
                     $total += $shipping_fee;
                     $product_advance = ceil($product->price*0.3)
                   ?>
                      <div class="pb-2 text-left">Advance(30%) :<strong class="float-right">{{number_format($product_advance)}}/-</strong></div>
                      <div class="pb-2 text-left">Delivery Fee :<strong class="float-right">{{number_format($shipping_fee)}}/-</strong></div>
                   </div>
                   <hr>
                  @endforeach
                   <div class="text-left">Sub Total :<strong class="float-right">{{number_format($total)}}/-</strong></div>
                   <hr>
                   <?php 
                   
                   $total_tax = ceil($total*0.13);
                   $total_after_tax = $total + $total_tax;
                   ?>
                   <div class="text-left pt-2 pb-3">Sales Tax (13%) :<strong class="float-right">{{number_format($total_tax)}}/-</strong></div>
                   <div class="grand-total text-center">
                      <p class="mb-0 pb-1">Total Upfront Payment After 13% Sales Tax</p>
                      <strong>{{number_format($total_after_tax)}}/-</strong>
                   </div>
                   <a href="/checkout" class="btn default-btn w-100">Go to Checkout</a>
                </div>
         </div>
            
        </div>
    </div>
</section>




    <!-- cart section end -->
    @include('supplier')
    @include('footer')

@endsection