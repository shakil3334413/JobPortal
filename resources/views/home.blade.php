@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($jobs as $job)
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="{{asset($job->thumbnail)}}" alt="{{$job->title}}">
                            <span class="username">
                                <a href="{{url('job/details',$job->id)}}">{{$job->title}}</a>
                            </span>
                            <span class="description">{{$job->created_at->diffForHumans()}}</span>
                        </div>
                        <p>{{ Str::limit($job->description, 150) }}</p>
                        </div>
                        <!-- /.post -->
                    </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
