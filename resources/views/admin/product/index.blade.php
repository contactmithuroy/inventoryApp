@extends('layouts.master')
@section('page_title','Product')
@section('product_select','active')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Product List </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Product</li>
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
                            <div class="row d-flex justify-content-end align-item-center">

                              <div class="col-md-3 d-flex justify-content-end align-item-center">
                                <a href="{{ route('product.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Create Product</a>
                              {{-- </div> --}}
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="card card-primary">
                                <div class="row">
                                    <div class="col-12 col-lg-8 col-md-8 offset-lg-2 offset-md-2">
                                      <table class="table table-bordered datatable" width="100%">
                                        <thead>
                                          <tr>
                                            <th style="width: 10px">Id</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th style="width: 40px">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @if($products->count() > 0)
                                            @foreach ($products as $key=>$product)
                                            {{-- key as a array key and we know array always start 0 index. so ++key for serial --}}
                                            <tr>
                                              <td>{{ ++$key }}</td> 
                                              <td>{{ $product->name }}</td>
                                              <td>
                                                @if ($product->status == 1)
                                                <span class="badge-success btn-xs">Open</span>
                                                @else
                                                <span class="badge-secondary btn-xs">Close</span>
                                                @endif
                                              </td>
                                        
                                              <td class="d-flex">
                              
                                                <a href="{{ route('product.edit',$product->id) }}" class="btn  btn-outline-primary btn-sm   mr-1"> <i class="fas fa-edit"></i> </a>
                                                <a href="{{ route('product.show',$product->id) }}" class="btn  btn-outline-warning btn-sm mr-1"> <i class="fas fa-eye"></i> </a>

                                                <a href="javascript:void(0)" data-form_id="product_delete_{{ $product->id }}" class="btn  btn-outline-danger btn-sm  mr-1 product_delete ">
                                                   <i class="fas fa-trash"></i> 
                                                </a>
                                                <form id="product_delete_{{ $product->id }}" action="{{ route('product.destroy',$product->id) }}" method="POST" >
                                                  @csrf
                                                  @method('delete')
                                                </form>

                                              </td>
                                            </tr>
                                            @endforeach
                                          
                                          @else
                                            <td colspan="4">
                                              <h5 class="text-center">No Data Found</h5>
                                            </td>
                                          @endif 
                                        </tbody>
                                      </table>
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
@section('script')
  <script>
    $( document ).ready(function() {
  

      $('.product_delete').on('click',function(){
        let form_id = $(this).data('form_id');
        Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $('#'+form_id).submit();
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })
      });

    });
    
    </script>   
@endsection