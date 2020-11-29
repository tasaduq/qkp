@extends('layouts.admin')

@section('content')

    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Products</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tables</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="/admin/add_product" class="btn btn-sm btn-neutral">Add New Product</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
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
              <h3 class="mb-0">Light table</h3>
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
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2"></label>
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
                        <span class="status">Unactive</span>
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
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
              <div class="row">
                <div id="buttons-colors-component" class="text-left col-md-3" role="tabpanel" aria-labelledby="buttons-colors-component-tab">
                  <div class="form-group row">
                    <div class="col-md-9">
                      <select class="form-control" id="exampleFormControlSelect1">
                        <option selected disabled>Select Category</option>
                        <option>Cow/Bull</option>
                        <option>Goat</option>
                      </select>
                    </div>
                    <div for="example-text-input" class="col-md-3">
                      <button type="button" class="btn btn-primary">Apply</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    
  @endsection