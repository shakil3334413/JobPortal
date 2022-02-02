@extends('admin\layouts\app')
@section('admin-content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="d-inline p-2  text-dark" style="font-size: 26px;font-weight: bold">Applicant List</div>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li><a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm m-1">Home</a></li>
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
                        <th scope="col">Applicant</th>
                        <th scope="col">Job Title </th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($apply as $key=>$item)
                        <tr>
                            <td scope="row">{{ $key+1 }}</td>
                            <td>
                                @isset($item->user->name)
                                    {{ $item->user->name }}
                                @endisset
                            </td>
                            <td>
                                @isset($item->job->title)
                                    {{ $item->job->title }}
                                @endisset

                            </td>
                            <td style="display: flex">
                                <a href="{{route('applicant.view',$item->id)}}" class="btn btn-sm btn-primary m-1"><i class="fas fa-eye"></i> View</a>
                            </td>
                          </tr>

                          @empty
                         <tr>
                             <td>No Data</td>
                         </tr>
                      @endforelse
                    </tbody>
                  </table>
                  {{$apply->links()}}
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
