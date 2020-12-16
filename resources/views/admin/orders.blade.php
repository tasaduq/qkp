@extends('layouts.admin')

<?php //print_r($data->toArray());die;?>
@section('content')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-12">
              <h5 class="h2 text-white d-inline-block mb-0">Orders</h5>
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
            <div class="card-header border-0">
              <h3 class="mb-0">Order Listing</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th data-sort=""><div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1"></label>
                    </div></th>
                    <th scope="col" class="sort" data-sort="name">Order #</th>
                    <th scope="col" class="sort" data-sort="budget">Customer Name</th>
                    <th scope="col" class="sort" data-sort="status">Upfront Amount</th>
                    <th scope="col" class="sort" data-sort="status">Created On</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach($data as $row)
                        <tr>
                            <td class="">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                <label class="custom-control-label" for="customCheck2"></label>
                              </div>
                            </td>
                            <td>#{{ $row->order_number }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ number_format($row->upfront) }}/-</td>
                            <td>{{ date('d-M-Y', strtotime($row->created_at)) }}</td>
                            <td><span class="status {{ strtolower(str_replace(' ', '-', $row->status_name)) }}">{{ $row->status_name }}</span></td>
                            <td>
                                <a href="{{ route('order_detail', $row->id) }}" class="btn btn-info btn-xs">View</a>
                                @if($row->status == 7)
                                    <a href="#" class="btn btn-success btn-xs verify-order-payment" data-orderid="{{ $row->id }}" data-ordernum="{{ $row->order_number }}">Verify</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
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