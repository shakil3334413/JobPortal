@extends('admin\layouts\app')
@section('admin-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @isset($job)
                <h1 class="m-0 text-dark">Edit Job</h1>
                @else
                <h1 class="m-0 text-dark">Create Job</h1>
                @endisset
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <div class="d-inline p-2 text-white">
                        <a href="{{route('job.index')}}" class="btn btn-md btn-success">All Job Type</a>
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
                <form action="{{ isset($job) ? route('job.update',$job->id) : route('job.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf @isset($job) @method('PUT') @endisset
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="title">Job Type</label>
                                    <select name="job_types_id" id="job_types_id" class="form-control @error('job_types_id') is-invalid @enderror ">
                                        <option value="">Select Your Option</option>
                                        @foreach ($jobtypes as $jobtype)
                                            <option value="{{$jobtype->id}}" @isset($job) {{$job->job_types_id == $jobtype->id ? 'selected' : ''}} @endisset>{{$jobtype->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('job_types_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input id="title" type="text" placeholder="Enter Your Title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $job->title ?? old('title') }}" />
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ $job->description ?? old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">Title
                                    <label for="thumbnail">Thumbnail</label>
                                    <input id="thumbnail" type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" />
                                    @error('thumbnail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @isset($job)
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
