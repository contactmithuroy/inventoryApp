@extends('layouts.master')
@section('page_title','Size')
@section('size_select','active')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Size List </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Size</li>
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
                                <a href="{{ route('size.create') }}" class="btn btn-primary"> Create Size</a>
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
                                            <th>Size Name</th>
                                            <th>Status</th>
                                            <th style="width: 40px">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @if($sizes->count() > 0)
                                            @foreach ($sizes as $key=>$size)
                                        
                                            <tr>
                                              <td>{{ ++$key }}</td>
                                              <td>{{ $size->name }}</td>
                                              <td>
                                                @if ($size->status == 1)
                                                <span class="badge-success btn-xs">Open</span>
                                                @else
                                                <span class="badge-secondary btn-xs">Close</span>
                                                @endif
                                              </td>
                                        
                                              <td class="d-flex">
                              
                                                <a href="{{ route('size.edit',$size->id) }}" class="btn  btn-outline-primary btn-sm   mr-1"> <i class="fas fa-edit"></i> </a>
                                                <a href="{{ route('size.show',$size->id) }}" class="btn  btn-outline-warning btn-sm mr-1"> <i class="fas fa-eye"></i> </a>

                                                <a href="javascript:void(0)" data-form_id="size_delete_{{ $size->id }}" class="btn  btn-outline-danger btn-sm  mr-1 size_delete ">
                                                   <i class="fas fa-trash"></i> 
                                                </a>
                                                <form id="size_delete_{{ $size->id }}" action="{{ route('size.destroy',$size->id) }}" method="POST" >
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
  

      $('.size_delete').on('click',function(){
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







