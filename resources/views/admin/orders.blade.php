@extends('layouts.admin')

<?php //print_r($data->toArray());die;?>
@section('content')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-7">
              <h5 class="h2 text-white d-inline-block mb-0">Orders</h5>
            </div>
            <div class="col-lg-5 text-right">
              <a href="#" class="btn btn-neutral btn-sm order-filters-btn">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <form method="post" action="{{ route('update_orders_sts') }}">
                    @csrf
            <div class="card-header border-0">
              <div class="row">
                <div class="col-md-3">
                  <select class="form-control" name="status_update">
                    <option value="0">Select Status</option>
                    @foreach($OrderStatus as $os)
                        <option value="{{ $os->id }}">{{ $os->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </div>
            @if (session('success'))
                  <div class="alert alert-success ml-3 mr-3">
                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                      {{ session('success') }}
                  </div>
              @endif

               @if($errors->any())
                  <div class="alert alert-danger ml-3 mr-3">
                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                      <ul class="mb-0">
                      @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                      </ul>
                  </div>
              @endif
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th data-sort="">Select</th>
                    <th scope="col" class="sort" data-sort="name">Order #</th>
                    <th scope="col" class="sort" data-sort="budget">Customer Name</th>
                    <th scope="col" class="sort" data-sort="budget">Payment Method</th>
                    <th scope="col" class="sort" data-sort="status">Upfront Amount</th>
                    <th scope="col" class="sort" data-sort="status">Created On</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                    @if(count($data) > 0)
                        @foreach($data as $row)
                            <tr>
                                <td>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="selectedOrderIds[]" class="custom-control-input" id="customCheck-{{ $row->id }}" value="{{ $row->id }}">
                                    <label class="custom-control-label" for="customCheck-{{ $row->id }}"></label>
                                  </div>
                                </td>
                                <td>#{{ $row->order_number }}</td>
                                <td>{{ $row->name }}</td>
                                <td>
                                    @if($row->payment_method == 0)
                                    Cash
                                    @elseif($row->payment_method == 1)
                                    Bank Transfer
                                    @else
                                    Other
                                    @endif
                                </td>
                                <td>{{ number_format($row->upfront) }}/-</td>
                                <td>{{ date('d-M-Y', strtotime($row->created_at)) }}</td>
                                <td><span class="status {{ strtolower(str_replace(' ', '-', $row->status_name)) }}">{{ $row->status_name }}</span></td>
                                <td>
                                    <a href="{{ route('order_detail', $row->id) }}" class="btn btn-info btn-sm">View</a>
                                    @if($row->status == 1)
                                        <a href="#" class="btn btn-success btn-sm verify-order-payment" data-orderid="{{ $row->id }}" data-ordernum="{{ $row->order_number }}">Verify</a>
                                    @endif

                                    @if($row->status == 8)
                                        <a href="#" class="btn btn-danger btn-sm verify-order-cancellation" data-orderid="{{ $row->id }}" data-ordernum="{{ $row->order_number }}">Verify</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="7" class="text-center">No records found</td></tr>
                    @endif
                </tbody>
              </table>
            </div>
            </form>
            <!-- Card footer -->
            <div class="card-footer py-4">
              @include('admin.pagination.default', ['paginator' => $data])
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="verifyOrderModal" tabindex="-1" role="dialog" aria-labelledby="verifyOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="verifyOrderModalLabel">Order</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div id="receiptImg"></div>
              <div class="form-group mb-0">
              <label class="form-control-label" for="input-address">Note (Optional)</label>
              <form id="verify-order-form">
                <meta name="csrf-token" content="{{csrf_token()}}">
                <textarea id="verify-order-note" class="form-control"></textarea>
              </form>
            </div>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-secondary update-order-status" data-orderid="" data-orderstate="reject">Reject</a>
              <a href="#" class="btn btn-primary update-order-status ml-auto" data-orderid="" data-orderstate="approve">Approve</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="verifyOrderCancellationModal" tabindex="-1" role="dialog" aria-labelledby="verifyOrderCancellationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="verifyOrderCancellationModalLabel">Order</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group mb-0">
              <label class="form-control-label" for="input-address">Note (Optional)</label>
              <form id="verify-order-form">
                <meta name="csrf-token" content="{{csrf_token()}}">
                <textarea id="verify-order-cancellation-note" class="form-control"></textarea>
              </form>
            </div>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-secondary update-order-cancellation-status" data-orderid="" data-orderstate="reject">Reject</a>
              <a href="#" class="btn btn-primary update-order-cancellation-status ml-auto" data-orderid="" data-orderstate="approve">Approve</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="orderFiltersModal" tabindex="-1" role="dialog" aria-labelledby="orderFiltersModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="orderFiltersModalLabel">Filters</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pt-0">
                <form method="get">
                  <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-control-label">Order #</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="order" value="{{ trim($selectedOrder) != '' && trim($selectedOrder) > 0 ? $selectedOrder : '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-control-label">Customer Name</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" placeholder="Customer Name" value="{{ trim($customerName) != '' ? $customerName : '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-control-label">Date From</label>
                            </div>
                            <div class="col-md-10">
                                <input type="date" class="form-control" name="date_from" value="{{ trim($dateFrom) != '' ? $dateFrom : '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-control-label">Date To</label>
                            </div>
                            <div class="col-md-10">
                                <input type="date" class="form-control" name="date_to" value="{{ trim($dateTo) != '' ? $dateTo : '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-control-label">Status</label>
                            </div>
                            <div class="col-md-10">
                              <select class="form-control" name="status">
                                <option value="0">Select Status</option>
                                @foreach($OrderStatus as $os)
                                    <option {{ $selectedStatus == $os->id ? 'selected="selected"' : '' }} value="{{ $os->id }}">{{ $os->name }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary w-100">Search</button>
                    </div>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">QKP TECH PVT LTD</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
      
    
  @endsection