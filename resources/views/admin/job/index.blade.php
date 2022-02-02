@extends('admin\layouts\app')
@section('admin-content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="d-inline p-2  text-dark" style="font-size: 26px;font-weight: bold">Job</div>
                <div class="d-inline p-2 text-white">
                    <a href="{{route('job.create')}}" class="btn btn-md btn-info"><i class="fas fa-edit"></i>Create</a>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Job</li>
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
                        <th scope="col">Job Type </th>
                        <th scope="col">Title </th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($jobs as $key=>$item)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>
                                @isset($item->jobtype->title)
                                    {{ $item->jobtype->title }}
                                @endisset
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>
                                @if($item->status==1)
                                    Active
                                @else
                                    DeActive
                                @endif
                            </td>
                            <td style="display: flex">
                                <a href="{{ route('job.edit',$item->id) }}" class="btn btn-sm btn-success m-1"><i class="fas fa-edit"></i>Edit</a>
                                <form  style="direction: inline" action="{{ route('job.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                   <button type="submit" class="btn btn-sm btn-danger m-1"><i class="fas fa-trash"></i>DELETE</button>
                                </form>
                                <a href="{{route('job.show',$item->id)}}" class="btn btn-sm btn-primary m-1"><i class="fas fa-eye"></i> View</a>
                                @if($item->status==1)
                                <a href="{{route('job.status',$item->id)}}" class="btn btn-info btn-sm m-1"><i class="fas fa-thumbs-down"></i></a>
                                @else
                                <a href="{{route('job.status',$item->id)}}" class="btn btn-info btn-sm m-1"><i class="fas fa-thumbs-up"></i></a>
                            @endif
                            </td>
                          </tr>

                          @empty
                         <tr>
                             <td>No Data</td>
                         </tr>
                      @endforelse
                    </tbody>
                  </table>
                  {{$jobs->links()}}
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
