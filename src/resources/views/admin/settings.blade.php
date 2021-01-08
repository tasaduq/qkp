@extends('layouts.admin')

@section('content')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Settings</h6>
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
              {{-- <h3 class="mb-0">Update Sttings</h3> --}}
            </div>
            <!-- Product Form -->
            <form action="" id="update-settings-form">
              @csrf

            <div class="card-body border-0">
              <div class="row">
                <div class="col-lg-7">
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Eid Date</label>
                    <div class="col-md-9">
                      <input class="form-control" type="date" name="eid_date" value="{{$settings->eid_date}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Enable Tax</label>
                    <div class="col-md-9">
                      <input class="form-control" type="hidden"  name="enable_tax" {{$settings->enable_tax ? "checked=checked" : ""}}>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Tax value (%)</label>
                    <div class="col-md-9">
                      <input class="form-control" type="text" name="tax_value" value="{{$settings->tax_value}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Overdue Penalty (%)</label>
                    <div class="col-md-9">
                      <input class="form-control" type="text" name="overdue_penalty" value="{{$settings->overdue_penalty}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Bank Name</label>
                    <div class="col-md-9">
                      <input class="form-control" type="text" name="bank_name" value="{{$settings->bank_name}}">
                    </div>
                  </div>
                  <div class="form-group row">
                      <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Account Title </label>
                    <div class="col-md-9">
                      <input class="form-control" type="text" name="account_title" value="{{$settings->account_title}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Account Number </label>
                    <div class="col-md-9">
                      <input class="form-control" type="text" name="account_number" value="{{$settings->account_number}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Regular Advance (%) </label>
                    <div class="col-md-9">
                      <input class="form-control" type="text" name="regular_advance" value="{{$settings->regular_advance}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Final Advance (%)</label>
                    <div class="col-md-9">
                      <input class="form-control" type="text" name="final_advance" value="{{$settings->final_advance}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-9">
                      <span id="settings-error"></span>
                    </div>
                  </div>
                  {{-- <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Product Description</label>
                    <div class="col-md-9">
                      <textarea class="form-control" name="description" placeholder="Enter Product Discription" rows="4"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Product Status</label>
                    <div class="col-md-9">
                    <div id="toggles-component" class="tab-pane tab-example-result" role="tabpanel" aria-labelledby="toggles-component-tab">
                      <label class="custom-toggle">
                        <input type="checkbox" name="active">
                        <span class="custom-toggle-slider rounded-circle"></span>
                      </label>
                    </div>
                    </div>
                  </div> --}}
                </div>
              </div>
            </div>

            
            <!-- Card footer -->
            <div class="card-footer py-4">
              <div id="buttons-colors-component" class="text-right" role="tabpanel" aria-labelledby="buttons-colors-component-tab">
                <button type="button" class="btn btn-success" id="update-settings-btn">Save Settings</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Trigger the modal with a button -->


 <style>
    .animal-image {
        height: 175px;
        overflow: hidden;
    }
    .modal-xxl{max-width:90% !important;}
    .animal-image {
    height: 175px;
    overflow: hidden;position:relative;
}
.custom-checkbox{position:absolute; width:100%; height:100%; top:0; left:0;appearance:none;}
input[type=checkbox]:checked{ border:5px solid #721c86;}
input[type=checkbox]:checked::before {
    content: "\2713";
    color: #73ae2c;
    width: 20px;
    height: 20px;
    line-height: 20px;
    background: #fff;
    text-align: center;
    font-weight: bold;
    font-size: 17px;
    display: inline-block;
    margin: 8px 0px 0px 10px;
    box-shadow: 0 0 10px 0 #000000bf;
}
</style>

    @endsection