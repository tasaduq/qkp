@extends('layouts.admin')

@section('content')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Category</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
        <a href="{{ route('category') }}" class="btn btn-primary" style="margin-bottom: 25px;" title="Cancel"><i class="fa fa-reply"></i></a>
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Edit Details</h3>
            </div>
            
            <!-- Category Edit Form -->
            <form action="{{ route('updateCategory') }}" method="post">
            @csrf
            <div class="card-body border-0">
              <div class="row">
                <div class="col-lg-7">
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Category Name</label>
                    <div class="col-md-9">
                      <input class="form-control" type="text" placeholder="Enter Category Name" id="category_name" name="category_name" value="{{ $aCategory->category_name }}">
                    </div>
                  </div>
                  

                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Category Description</label>
                    <div class="col-md-9">
                      <textarea class="form-control" name="description" id="description" placeholder="Enter Category Discription" rows="4">{{ $aCategory->description }}</textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-3 col-form-label form-control-label">Category Status</label>
                    <div class="col-md-9">
                    <div id="toggles-component" class="tab-pane tab-example-result" role="tabpanel" aria-labelledby="toggles-component-tab">
                      <label class="custom-toggle">
                        <input type="checkbox" name="is_active" id="is_active" checked="{{ $aCategory->is_active  == '1' ? 'checked' : '' }}" >
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
                <input type='hidden' name="id" value="{{ $aCategory->category_id }}">
                <input type="submit" class="btn btn-success" id="up-category-btn" value="Update Category">
                {{-- <button type="button" class="btn btn-danger">Danger</button> --}}
                {{-- <button type="button" class="btn btn-warning">Warning</button> --}}
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      
    
    @endsection