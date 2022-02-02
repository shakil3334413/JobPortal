@extends('admin\layouts\app')
@section('admin-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @isset($jobType)
                <h1 class="m-0 text-dark">Edit Job Type</h1>
                @else
                <h1 class="m-0 text-dark">Create Job Type</h1>
                @endisset
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <div class="d-inline p-2 text-white">
                        <a href="{{route('job-type.index')}}" class="btn btn-md btn-info">All Job Type</a>
                    </div>
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
            <div class="col-md-12 col-xs-12 col-sm-12">
                <form action="{{ isset($jobType) ? route('job-type.update',$jobType->id) : route('job-type.store') }}" method="POST">
                    @csrf @isset($jobType) @method('PUT') @endisset
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input id="title" type="text" placeholder="Enter Your Title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $jobType->title ?? old('title') }}" />
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                @isset($jobType)
                                <input type="submit" class="btn btn-info" value="Update" />
                                @else
                                <input type="submit" class="btn btn-info" value="Create" />
                                @endisset
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection