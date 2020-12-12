@extends('layouts.front')

@section('content')

    <!-- profile section -->
    <section class="profile-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 profile-left-section">
                    <p>Welcome <span class="name">{{Auth::user()->name}}</span></p>
                    <div class="profile-categories">
                        <h6>Categories</h6>
                        <ul>
                            <li><a href="#">My Profile Settings</a></li>
                            <li class="active"><a  href="#">Installment Schedule</a></li>
                            <li><a href="/logout">Logout</a></li>
                        </ul>
                        {{-- <h6>Announcement</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqerra maecenas accumsan lacus vel facilisis. </p> --}}
                    </div>
                </div>
                <div class="col-sm-9 profile-right-section">
                    <h2>Order Installments Schedule</h2>
                    <p><strong>03 </strong>Animal in Your List</p>

                    @forelse ($orders as $order)
                        

                      #{{ $order->order_number }} - {{ $order->payment_method ? "Bank Transfer" : "Cash" }} - {{ $order->status ? "Completed" : "Pending" }}  - {{ date_format($order->created_at,"d-m-Y") }} 

                      @foreach ($order->products as $orderedProduct)
                        <div class="accordion" id="installment-schedule">
                          <a data-toggle="collapse" href="#tablecollapse{{$orderedProduct->id}}" role="button" aria-controls="collapse1">
                            <div class="row schedule pb-3">
                            <div class="col-sm-4">
                                <div class="animal-picture text-center">
                                  
                                    <img class="img-fluid" src="{{$orderedProduct->product->images()[0]->thumb}}">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <h2>{{$orderedProduct->product->name}}</h2>
                                <i class="fas fa-chevron-down fa-pull-right"></i>
                                <div class="row pro-prize">
                                    <div class="col-sm-6 text-right">
                                        <div class="prize">
                                            <span>Paid Amount <strong>{{$orderedProduct->product->price_formatted()}}/-</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                      <div class="prize">
                                        <span>Remaining Amount <strong>175,000/-</strong></span>
                                      </div>
                                  </div>
                                </div>
                                <div class="row inline-buttons text-right">
                                    <div class="col-sm-12">
                                        <button class="btn btn-warning mb-1 cancel-order-animal" orderanimalid="{{$orderedProduct->id}}">Cancel Order</button>
                                        <button class="btn btn-success mb-1 lumsum-order-animal" orderanimalid="{{$orderedProduct->id}}">Make Lump Sum Payment</button>
                                    </div>
                                </div>                   
                            </div>
                        </div><!--schdule row-->
                        </a>
                        <div id="tablecollapse{{$orderedProduct->id}}" class="collapse">
                        <table  class="table table-responsive-sm text-left">
                          <thead class="thead-dark">
                            <tr>
                              <th>Month</th>
                              <th>Due Date</th>
                              <th>Installment</th>
                              <th>Status</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($orderedProduct->installments as $installment)
                            
                            <tr>
                              <td>N/A</td>
                              {{-- <td>{{$installment->created_at}}</td> --}}
                              <td>N/A</td>
                              <td>{{number_format($installment->amount)}}/-</td>
                              <td>{{$installment->status ? "Paid" : "Unpaid" }}</td>
                              {{-- pending status needed --}}
                              <td class="text-right pr-0"><button class="btn tbl-btn default-btn paid">Pay Now</button></td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      </div>
                      @endforeach
                         
                      @empty
                      You have not yet placed any orders.
                      @endforelse
                   </div>
                </div>
            </div>
        </div>
    </section>
    
    
    
    
        <!-- profile section end -->
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