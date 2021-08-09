@extends('layouts.master')
@section('page_title','Edit Category')
@section('category_select','active')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Edit Category </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
                <li class="breadcrumb-item active">Edit Category</li>
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
                                <a href="{{ route('category.index') }}" class="btn btn-primary"> Back To Category</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="card card-primary card-outline">
                                <div class="row">
                                    <div class="col-12 col-lg-6 col-md-8 offset-lg-3 offset-md-2">
                                        <!-- form start -->
                                        <form role="form" action="{{ route('category.update',$category->id) }}" id="update_category" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="row mt-5 ml-2 mr-2">
                                                <div class="col-md-8 offset-md-2">
                                                    <div class="form-group">
                                                        <label for="name">Category Name<span class="text-danger">*</span></label>
                                                        <input type="name" name="name" value="{{ $category->name }}" class="form-control" id="name" placeholder="Enter category name" >
                                                        @if ($errors->has('name'))
                                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
         
                                                <div class="col-md-8 offset-md-2">
                                                    <div class="form-check form-switch">
                                                        @if ($category->status == 1)
                                                        <input class="form-check-input" name="status"  type="checkbox" id="status" checked>
                                                        @else
                                                        <input class="form-check-input" name="status"  type="checkbox" id="status" >
                                                        @endif
                                                        <label class="form-check-label" for="status">Is show your home page?</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 offset-md-2 mt-3">
                                                    <input type="hidden" value="{{ $category->id }}" name="id">
                                                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                                                </div>
        
                                            </div>
                                            <!-- /.card-body -->               
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>    
        </div><!-- /.container-fluid -->
    </section>
      <!-- /.content -->
@endsection