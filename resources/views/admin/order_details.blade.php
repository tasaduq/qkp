@extends('layouts.admin')

<?php //print_r($order_details);die; ?>
@section('content')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-12">
              <h5 class="h2 text-white d-inline-block mb-0">Orders #{{ $order_details->order_number }} - {{ $order_details->status_name }}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">Details </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Upfront</label>
                        <input disabled id="input-address" class="form-control text-center" value="{{ number_format($order_details->upfront) }}/-" type="text">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Name</label>
                        <input disabled type="text" id="input-first-name" class="form-control" value="{{ $order_details->name }}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Phone</label>
                        <input disabled type="text" id="input-last-name" class="form-control" value="{{ $order_details->phone }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">City</label>
                        <input disabled type="text" id="input-username" class="form-control" value="{{ $order_details->city }}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input disabled type="email" id="input-email" class="form-control" value="{{ $order_details->email }}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input disabled id="input-address" class="form-control" value="{{ $order_details->address }}" type="text">
                      </div>
                    </div>
                    @if($order_details->status == 7)
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Note</label>
                        <form id="verify-order-form">
                            <meta name="csrf-token" content="{{csrf_token()}}">
                            <textarea id="verify-order-note" class="form-control"></textarea>
                          </form>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <a href="#" class="btn btn-secondary update-order-status" data-orderid="{{ $order_details->id }}" data-orderstate="reject">Reject</a>
                                      <a href="#" class="btn btn-primary update-order-status float-right" data-orderid="{{ $order_details->id }}" data-orderstate="approve">Approve</a>
                      </div>
                    </div>
                    @endif
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Payment History</h3>
                </div>
              </div>
            </div>
            @foreach($order_products as $key => $row)
            <hr class="my-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card-header border-0">
                      <h5 class="mb-0">{{ $row->name }} - <span class="status {{ strtolower(str_replace(' ', '-', $row->order_products_status_name)) }}">{{ $row->order_products_status_name }}</span></h5>
                    </div>
                </div>
                @if($row->installments)
                    <div class="col-xl-12">
                        <div class="table-responsive">
                          <!-- Projects table -->
                          <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">Due Date</th>
                                <th scope="col">Installment</th>
                                <th scope="col">Status</th>
                                <th class="text-right" scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($row->installments as $installments)
                                <tr>
                                    <td>{{ date('d-M-Y', strtotime($installments->due_date)) }}</td>
                                    <td>{{ number_format($installments->amount) }}/-</td>
                                    <td>
                                        <span class="status {{ strtolower(str_replace(' ', '-', $installments->name)) }}">{{ $installments->name }}</span>
                                    </td>
                                    <td align="right">
                                        @if($installments->status == 2)
                                            <a href="#" class="btn btn-success btn-sm verify-installment-payment" data-instid="{{ $installments->id }}" data-instnum="{{ $installments->instalment_number }}" data-ordernum="{{ $order_details->order_number }}">Verify</a>
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
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="verifyInstallmentModal" tabindex="-1" role="dialog" aria-labelledby="verifyInstallmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="verifyInstallmentModalLabel">Installment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div id="receiptImg"></div>
              <div class="form-group mb-0">
              <label class="form-control-label" for="input-address">Note (Optional)</label>
              <form id="verify-installment-form">
                <meta name="csrf-token" content="{{csrf_token()}}">
                <textarea id="verify-installment-note" class="form-control"></textarea>
              </form>
            </div>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-secondary update-installment-status" data-instid="" data-inststate="reject">Reject</a>
              <a href="#" class="btn btn-primary update-installment-status ml-auto" data-instid="" data-inststate="approve">Approve</a>
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