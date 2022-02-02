@extends('admin.layouts.app')
@section('admin-content')
 <!-- Content Wrapper. Contains page content -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Applicant Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li><a href="{{route('applicant.index')}}" class="btn btn-primary btn-sm m-1"><i class="fas fa-backward"></i>Back</a></li>
              <li><a href="{{route('admin.dashboard')}}" class="btn btn-info btn-sm m-1"><i class="fas fa-home"></i>Home</a></li>

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Details</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" @isset($apply->job->thumbnail) src="{{asset($apply->job->thumbnail)}}" @endisset alt="@isset($apply->job->title) {{$apply->job->title}} @endisset">
                        <span class="username">
                          <p>
                              @isset($apply->job->title)
                                {{$apply->job->title}}
                              @endisset

                            </p>
                        </span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        @isset($apply->job->description)
                        {{$apply->job->description}}
                        @endisset
                      </p>
                    </div>
                    <!-- /.post -->
                  </div>
                  <div class="post">
                    <div class="user-block">
                     <p>Applicant Information</p>
                      <span class="username">
                        <p>
                            Applicant Name:
                            @isset($apply->user->name)
                           {{$apply->user->name}}
                            @endisset

                          </p>
                          <p>
                            Applicant Email:
                            @isset($apply->user->email)
                            {{$apply->user->email}}
                            @endisset

                          </p>
                          <p>
                            Applicant Name:
                            @isset($apply->user->phone)
                            {{$apply->user->phone}}
                            @endisset

                          </p>
                      </span>
                    </div>
                  </div>
                  <!-- /.post -->
                </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

