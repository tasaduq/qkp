@extends('layouts.admin')

@section('content')

    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Product</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
        <a href="{{ route('products') }}" class="btn btn-primary" style="margin-bottom: 25px;" title="Cancel"><i class="fa fa-reply"></i></a>
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Edit Details</h3>
            </div>
            
            <!-- Product Edit Form -->
            <form action="{{ route('updateproduct') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body border-0">
              <div class="row">
                <div class="col-lg-7">
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Product Name</label>
                    <div class="col-md-9">
                      <input class="form-control" type="text" placeholder="Enter Product Name" id="name" name="name" value="{{ $aProduct->name }}">
                    </div>
                  </div>
                  

                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Product Description</label>
                    <div class="col-md-9">
                      <textarea class="form-control" name="description" id="description" placeholder="Enter Category Discription" rows="4">{{ $aProduct->description }}</textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Product Category</label>
                    <div class="col-md-9">
                    <select name="category" class="browser-default custom-select">
                    <option >Select Category</option>
                    @foreach($acategory as $key => $value)
                    <option {{ $value->category_id == $aProduct->category ? 'selected' :'' }}  value="{{ $value->category_id }}">{{ $value->category_name }}</option>
                    @endforeach
                    </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Product Color</label>
                    <div class="col-md-9">
                    <input class="form-control" type="text" placeholder="Product color" id="color" name="color" value="{{ $aProduct->color }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Product Weight</label>
                    <div class="col-md-9">
                    <input class="form-control" type="number" placeholder="Product Weight" id="weight" name="weight" value="{{ $aProduct->weight }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Product price</label>
                    <div class="col-md-9">
                    <input class="form-control" type="number" placeholder="Product price" id="price" name="price" value="{{ $aProduct->price }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Product Image</label>
                    <div class="col-md-9">
                    <input type="file" name="images" id="images" />
                    <input type='hidden' name="imgname" value="{{ $aProduct->images }}">
                    <div class="" style="float: right;">
                       
                    </div>
                </div>
                    
                  </div>

                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Product Status</label>
                    <div class="col-md-9">
                    <div id="toggles-component" class="tab-pane tab-example-result" role="tabpanel" aria-labelledby="toggles-component-tab">
                      <label class="custom-toggle">
                        <input {{ $aProduct->active  == 1 ? 'checked':''}} type="checkbox" name="active" id="active" >
                        <span class="custom-toggle-slider rounded-circle"></span>
                      </label>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <!-- Card footer -->
            <div class="card-footer py-4">
              <div id="buttons-colors-component" class="text-right" role="tabpanel" aria-labelledby="buttons-colors-component-tab">
                {{-- <button type="button" class="btn btn-default">Default</button> --}}
                {{-- <button type="button" class="btn btn-primary">Primary</button> --}}
                {{-- <button type="button" class="btn btn-secondary">Secondary</button> --}}
                {{-- <button type="button" class="btn btn-info">Info</button> --}}
                <input type='hidden' name="id" value="{{ $aProduct->product_id }}">
                <input type="submit" value="Update Product" class="btn btn-success">
                {{-- <button type="button" class="btn btn-danger">Danger</button> --}}
                {{-- <button type="button" class="btn btn-warning">Warning</button> --}}
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      
    
    @endsection