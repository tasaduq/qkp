@extends('layouts.admin')

@section('content')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Products</h6>
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
              <h3 class="mb-0">Product Details</h3>
            </div>
            <!-- Product Form -->
            <form action="" id="add-product-form">
              @csrf
            <div class="card-body border-0">
              <div class="row">
                <div class="col-lg-7">
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Product Name</label>
                    <div class="col-md-9">
                      <input class="form-control" type="text" placeholder="Enter Product Name" name="name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Product Category</label>
                    <div class="col-md-9">
                      <select class="form-control" id="product-category" name="category">
                        <option selected disabled>Select Category</option>
                        @foreach ($categories as $category)
                          <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Add Images</label>
                    <div class="col-md-9">
                      
                      <button type="button" class="btn btn-info btn-lg media-modal-btn" data-toggle="modal" data-target="#media-modal" >Select Images</button>                   
                      {{-- <div id="dropzone-multiple-component" class="tab-pane tab-example-result fade show active" role="tabpanel" aria-labelledby="dropzone-multiple-component-tab">
                        <div class="dropzone dropzone-multiple dz-clickable" data-toggle="dropzone" data-dropzone-multiple="" data-dropzone-url="http://">
                        <div class="dz-default dz-message"><span>Drop files here to upload</span></div></div>
                      </div> --}}
                      <div class="added-product-images">

                      </div>
                      
                        
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Current Weight</label>
                    <div class="col-md-9">
                      <input class="form-control" type="text" placeholder="Enter Current Weight" name="current_weight">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Estimated Weight</label>
                    <div class="col-md-9">
                      <input class="form-control" type="text" placeholder="Enter Estimated Weight" name="weight">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Color</label>
                    <div class="col-md-9">
                      <input class="form-control" type="text" placeholder="Enter Color" name="color">
                    </div>
                  </div>
                  <div class="form-group row">
                      <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Price</label>
                    <div class="col-md-9">
                      <input class="form-control" type="number" placeholder="Enter Price" name="price">
                    </div>
                  </div>
                  <div class="form-group row">
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
                  </div>
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Featured</label>
                    <div class="col-md-9">
                    <div id="toggles-component" class="tab-pane tab-example-result" role="tabpanel" aria-labelledby="toggles-component-tab">
                      <label class="custom-toggle">
                        <input type="checkbox" name="featured">
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
                <button type="button" class="btn btn-success" id="add-product-btn">Submit</button>
                {{-- <button type="button" class="btn btn-danger">Danger</button> --}}
                {{-- <button type="button" class="btn btn-warning">Warning</button> --}}
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="media-modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xxl">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="">Upload Media Files</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
      <div class="row mt-5 justify-content-left images-container">

        
         {{-- <div class="col-sm-2 my-3">
            <div class="animal-image">
               <img class="img-fluid" src="/admin/img/brand/farm1.png">
               <input class="custom-checkbox" type="checkbox">
            </div>
         </div>
          --}}
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary add-product-images">Add</button> <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

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