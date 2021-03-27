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
            <form action="" id="update-shipping-form">
              @csrf

              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Category</th>
                      <th scope="col" class="sort" data-sort="budget">City</th>
                      <th scope="col" class="sort" data-sort="budget">Shipping Cost</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                        @if(count($categories) > 0)
                          
                            @foreach($categories as $category)
                                @foreach($cities as $city)
                                <?php
                                
                                    $shipping = $category->shipping($city->id);
                                    // dd($shipping);  
                                ?>
                                    <tr>
                                        <td>
                                            {{ $category->category_name }}

                                            <input class="form-control" type="hidden" name="category_id[]" value="{{$category->category_id}}">
                                        </td>
                                        <td>
                                            {{ $city->name }}

                                            <input class="form-control" type="hidden" name="city_id[]" value="{{$city->id}}">

                                        </td>
                                        <td>
                                            <div class="col-md-9">
                                                <input class="form-control" type="hidden" name="shipping_id[]" value="{{$shipping ? $shipping->id : '0'}}">
                                                <input class="form-control" type="text" name="cost[]" value="{{$shipping ? $shipping->cost : '5000'}}">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach

                        @else
                          <tr><td colspan="7" class="text-center">No records found</td></tr>
                        @endif
                  </tbody>
                </table>
            </div>
                
            <!-- Card footer -->
            <div class="card-footer py-4">
              <div id="buttons-colors-component" class="text-right" role="tabpanel" aria-labelledby="buttons-colors-component-tab">
                <button type="button" class="btn btn-success" id="update-shipping-btn">Save</button>
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