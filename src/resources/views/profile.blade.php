@extends('layouts.front')

@section('content')

    <!-- profile section -->
    <section class="profile-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 profile-left-section">
                    <p class="mb-0">Welcome <span class="name">{{Auth::user()->name}}</span></p>
                    <div class="profile-categories">
                        <ul>
                            {{-- <li><a href="#">My Profile Settings</a></li> --}}
                            <li class="active"><a  href="#">Installment Schedule</a></li>
                            <li><a href="/logout">Logout</a></li>
                        </ul>
                        {{-- <h6>Announcement</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqerra maecenas accumsan lacus vel facilisis. </p> --}}
                    </div>
                </div>
                <div class="col-sm-9 profile-right-section">
                    <h2>Order Installments Schedule</h2>
                    {{-- <p><strong>03 </strong>Animal in Your List</p> --}}

                    @forelse ($orders as $order)
 <div class="installment-Schedule-wrap">                       
                      <div class="order-detail-wrap">
                        <strong>#{{ $order->order_number }}</strong> - {{ $order->payment_method ? "Bank Transfer" : "Cash" }} - {{ $order->get_status->name }}  - {{ date_format($order->created_at,"d-m-Y") }}   
                        
                        @if( $order->cancellable() )
                          <button data-toggle="tooltip" data-placement="top" title="Cancel Order" class="order-cancel-btn default-styling float-right" ordernumber="{{$order->order_number}}"><span class="icon-qkp-minus-circle"></span></button>
                        @endif

                        @if( $order->payable() )
                          <button data-toggle="tooltip" data-placement="top" title="Upload Your Receipt" class="order-pay-btn default-styling float-right" ordernumber="{{$order->order_number}}"><i class="fas fa-receipt"></i></button>
                        @endif
                      </div>
                      @foreach ($order->products as $orderedProduct)

                        @if ($orderedProduct->product == null)
                            @continue
                        @endif
                        
                        <div class="accordion" id="installment-schedule">
                          <a data-toggle="collapse" href="#tablecollapse{{$orderedProduct->id}}" role="button" aria-controls="collapse1">
                            <div class="row schedule">
                            <div class="col-sm-4">
                                <div class="animal-picture text-center">
                                  <?php $images = $orderedProduct->product->images(); ?>
                                    <img class="img-fluid" src="{{ empty($images) ? '' : $images[0]->thumb }}">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <h2>{{$orderedProduct->product->name}}</h2>
                                @if( $order_in_process = $order->in_process() )
                                  @if( $orderedProduct->in_process() )
                                  {{-- {{dd($orderedProduct)}} --}}
                                    @if( $orderedProduct->no_of_installments > 0 )
                                    <i class="fas fa-chevron-down fa-pull-right"></i>
                                    @endif
                                    <div class="row pro-prize">
                                        <div class="col-sm-6 text-right">
                                            <div class="prize">
                                              {{-- {{dd($orderedProduct)}} --}}
                                                <span>{{ $orderedProduct->is_confirmed() ? "Paid Amount :" : "To be Paid :"}} <strong>{{number_format($orderedProduct->paid_amount())}}/-</strong></span>
                                            </div>
                                        </div>
                                        @if( $orderedProduct->no_of_installments > 0 )
                                        <div class="col-sm-6 text-right">
                                          <div class="prize">
                                            <span>Remaining Amount <strong>{{number_format($orderedProduct->remaining_amount())}}/-</strong></span>
                                          </div>
                                      </div>
                                      @endif
                                    </div>
                                    <div class="row inline-buttons text-right">
                                        <div class="col-sm-12">
                                          @if( $orderedProduct->cancellable() && $order->products->count() > 1 )
                                            <button class="btn btn-warning mb-1 cancel-order-animal" orderanimalid="{{$orderedProduct->id}}">Cancel Animal</button>
                                          @endif
                                          @if( $orderedProduct->payable() )
                                            {{-- <button class="btn btn-success mb-1 lumsum-order-animal" orderanimalid="{{$orderedProduct->id}}">Make Lump Sum Payment</button> --}}
                                          @endif
                                        </div>
                                    </div>
                                  @else
                                  <div class="row">
                                    <div class="col-sm-6 text-left">
                                      <div class="prize">
                                        <span> Animal Cancelled </span>
                                      </div>
                                  </div>
                                </div>
                                  @endif
                                @else
                                <div class="row">
                                  <div class="col-sm-6 text-left">
                                    <div class="prize">
                                      <span> Order Cancelled </span>
                                    </div>
                                </div>
                              </div>
                                @endif             
                            </div>
                        </div><!--schdule row-->
                        </a>
                        @if( $orderedProduct->no_of_installments > 0 && $order->in_process() )
                            <div id="tablecollapse{{$orderedProduct->id}}" class="collapse mt-3">
                              <div class="table-responsive">
                                <table  class="table text-left mb-0">
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
                                    @foreach ($orderedProduct->installments_desc() as $installment)
                                    
                                    <tr>
                                      <td>{{ $installment->due_date_month() }}</td>
                                      {{-- <td>{{}}</td> --}}
                                    
                                      <td>{{$installment->get_due_date()}}</td>
                                      <td>{{number_format($installment->amount)}}/-</td>
                                      <td>{{$installment->get_status->name}}</td>
                                      {{-- pending status needed --}}
                                      <td class="text-right pr-0">
                                      @if($installment->payable())
                                        <button class="btn btn-success default-btn installment-pay-btn" installment="{{$installment->id}}">Pay Now</button>
                                        {{-- <button class="btn tbl-btn default-btn paid">Pay Now</button> --}}
                                      @else
                                        @if( $installment->get_status->id != "3")  
                                        <button class="btn tbl-btn default-btn paid" installment="{{$installment->id}}">Pay Now</button>
                                        @endif
                                      @endif
                                      </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                          </div>
                          @endif
                      </div>
                      @endforeach
 </div>                         
                      @empty
                      You have not yet placed any orders.
                      @endforelse
                   </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      Launch demo modal
    </button>
     --}}

<!-- Modal -->
<div class="modal fade" id="cancelOrderModal" tabindex="-1" role="dialog" aria-labelledby="cancelOrderModal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Cancel Order</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      Are you sure you want to cancel your order?
      <textarea id="note"></textarea>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      <button type="button" class="btn btn-primary">Yes</button>
    </div>
  </div>
</div>
</div>

    
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