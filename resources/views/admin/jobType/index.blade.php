@extends('admin\layouts\app')
@section('admin-content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="d-inline p-2  text-dark" style="font-size: 26px;font-weight: bold">Job Type</div>
                <div class="d-inline p-2 text-white">
                    <a href="{{route('job-type.create')}}" class="btn btn-md btn-info"><i class="fas fa-edit"></i>Create</a>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Job Type</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12 col-x-12 col-sm-12">
                <table id="datatable" class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($jobtypes as $key=>$item)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $item->title }}
                            <td style="display: flex">
                                <a href="{{ route('job-type.edit',$item->id) }}" class="btn btn-sm btn-success m-1"><i class="fas fa-edit"></i>Edit</a>
                                <form  style="direction: inline" action="{{ route('job-type.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger m-1"><i class="fas fa-trash"></i>DELETE</button>
                                </form>
                            </td>
                          </tr>

                          @empty
                         <tr>
                             <td>No Data</td>
                         </tr>
                      @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
