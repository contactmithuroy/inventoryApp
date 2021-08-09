@extends('layouts.master')
@section('page_title','Add Product')
@section('product_select','active')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header"> 
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Create Product </h1>
              
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">product</a></li>
                <li class="breadcrumb-item active">Create Product</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class=" d-flex justify-content-end align-item-center ">
                                <a href="{{ route('product.index') }}" class="btn btn-primary"> Back To product</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        {{-- call from vue component --}}
                        
                        <product-component> </product-component>

                       <!--  <product-create></product-create> -->
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>    
        </div><!-- /.container-fluid -->
    </section>
      <!-- /.content -->
@endsection