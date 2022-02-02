@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="{{asset($job->thumbnail)}}" alt="{{$job->title}}">
                            <span class="username">
                                <p p>{{$job->title}}</p>
                            </span>
                            <span class="description">{{$job->created_at->diffForHumans()}}</span>
                        </div>
                        <p>{{$job->description}}</p>
                        <p>
                            <a href="{{url('apply',$job->id)}}" class="btn btn-sm btn-primary m-1"><i class="fas fa-thumbs-up"></i> Apply</a>
                          </p>
                        </div>
                        <!-- /.post -->
                    </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
