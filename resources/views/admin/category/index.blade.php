@extends('layouts.master')
@section('page_title','Category')
@section('category_select','active')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Category List </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
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
                              {{-- <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" id="student_search" name="search" class="form-control" placeholder="Live Search">
                                </div>
                              </div> --}}
                              <div class="col-md-3 d-flex justify-content-end align-item-center">
                                <a href="{{ route('category.create') }}" class="btn btn-primary"> <i class="fas fa-plus"></i> Create Category</a>
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
                                          @if($categories->count() > 0)
                                            @foreach ($categories as $key=>$category)
                                        
                                            <tr>
                                              <td>{{ ++$key }}</td>
                                              <td>{{ $category->name }}</td>
                                              <td>
                                                @if ($category->status == 1)
                                                <span class="badge-success btn-xs">Open</span>
                                                @else
                                                <span class="badge-secondary btn-xs">Close</span>
                                                @endif
                                              </td>
                                        
                                              <td class="d-flex">
                              
                                                <a href="{{ route('category.edit',$category->id) }}" class="btn  btn-outline-primary btn-sm   mr-1"> <i class="fas fa-edit"></i> </a>
                                                <a href="{{ route('category.show',$category->id) }}" class="btn  btn-outline-warning btn-sm mr-1"> <i class="fas fa-eye"></i> </a>

                                                <a href="javascript:void(0)" data-form_id="category_delete_{{ $category->id }}" class="btn  btn-outline-danger btn-sm  mr-1 category_delete "> <i class="fas fa-trash"></i> </a>
                                                <form id="category_delete_{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}" method="POST" >
                                                  @csrf
                                                  @method('delete')
                                                </form>
                                              </td>
                                            </tr>
                                            @endforeach
                                          
                                          @else
                                            <td colspan="4">
                                              <h5 class="text-center">No Text Found</h5>
                                            </td>
                                          @endif 
                                        </tbody>
                                      </table>
                                      {{-- <div class="d-flex justify-content-center">
                                        {!! $categories->links() !!}
                                    </div>  --}}
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
  

      $('.category_delete').on('click',function(){
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