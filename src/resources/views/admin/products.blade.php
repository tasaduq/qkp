@extends('layouts.admin')

@section('content')

    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Products</h6>
              {{-- <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tables</li>
                </ol>
              </nav> --}}
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="/admin/add_product" class="btn btn-sm btn-neutral">Add New Product</a>
              <a href="#" class="btn btn-sm btn-neutral product-filters-btn">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Product Listing</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th data-sort=""><div class="custom-control custom-checkbox">
                      
                    </div></th>
                    <th scope="col" class="sort" data-sort="name">Product Name</th>
                    <th scope="col" class="sort" data-sort="budget">Product Description</th>
                    <th scope="col" class="sort" data-sort="status">Category</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                
                <tbody class="list">

                  @forelse($products as $product)

                  <tr>
                    <td class="">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input productCheckbox" name="products[]" id="customCheck{{$product->product_id}}" value="{{$product->product_id}}">
                        <label class="custom-control-label" for="customCheck{{$product->product_id}}"></label>
                      </div>
                    </td>
                    <th scope="row">
                      <div class="media align-items-center">
                        <!-- <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="../admin/img/theme/bootstrap.jpg">
                        </a> -->
                        <div class="media-body">
                          <span class="name mb-0 text-sm">{{$product->name}}</span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                      {{substr($product->description, 0, 15)."..."}}
                    </td>
                    <td>
                      <?php
                        $category_name = \App\Models\Categories::where("category_id",$product->category)->first();
                        $category_name = $category_name ? $category_name->category_name : "N/A";
                      ?>
                      {{$category_name}}
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        @if($product->active)
                        <i class="bg-success"></i>
                        <span class="status">Active</span>
                        @else
                        <i class="bg-gray"></i>
                        <span class="status">Inactive</span>
                        @endif
                      </span>
                    </td>
                    {{--<td>
                      <div class="avatar-group">
                         <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="../admin/img/theme/team-1.jpg">
                        </a> 
                      </div>
                    </td> --}}
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="<?php echo route('editproduct',$product->product_id); ?>" type="button" title="Edit">Edit</a>
                          <a class="dropdown-item" href="<?php echo route('cloneproduct',$product->product_id); ?>" type="button" title="Clone">Clone</a>
                          <a class="dropdown-item" href="<?php echo route('deleteproduct',$product->product_id); ?>" onclick="return confirm('Are you sure?')" type="button" title="Delete">Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @empty
                    <span class="no-products">There are no products in this category</span>    
                  @endforelse
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              @include('admin.pagination.default', ['paginator' => $products])
              
              <div class="row">
                <div id="buttons-colors-component" class="text-left col-md-5" role="tabpanel" aria-labelledby="buttons-colors-component-tab">
                  <div class="form-group row">
                    <div class="col-md-5">
                      <select class="form-control" id="bulk-status">
                        <option value="">Select Status</option>
                        <option value="1">Enable</option>
                        <option value="0">Disable</option>
                      </select>
                    </div>
                    <div for="example-text-input" class="col-md-7">
                      <button type="button" class="btn btn-primary apply-bulk-product-status">Apply</button> 
                      {{-- <button type="button" class="btn btn-danger bulk-product-delete">Delete</button> --}}
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    
<!-- Modal -->
<div class="modal fade" id="productFiltersModal" tabindex="-1" role="dialog" aria-labelledby="productFiltersModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productFiltersModalLabel">Filters</h5>
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
                          <label class="form-control-label">Product Name</label>
                      </div>
                      <div class="col-md-10">
                          <input type="text" class="form-control" name="name" placeholder="Customer Name" value="{{ trim($productName) != '' ? $productName : '' }}" />
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
                          {{-- <option value="">Select Status</option> --}}
                          <option value="1">Enable</option>
                          <option value="0">Disabled</option>
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

      
  @endsection