<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::with('jobtype')->orderBy('id', 'DESC')->paginate(20);
        return view('admin.job.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $jobtypes = JobType::orderBy('id', 'DESC')->get();
        return view('admin.job.form',compact('jobtypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string'],
            'job_types_id' => ['required'],
            'description' => ['required', 'string'],
            'thumbnail' => 'mimes:jpg,png,jpeg,bmp',
        ]);

        Job::create([
            'title' =>$request->title,
            'job_types_id'=>$request->job_types_id,
            'description'=>$request->description,
            'thumbnail'=>$this->imageUpload($request, 'thumbnail', 'uploads/thumbnail') ?? '',
        ]);

        return redirect()->route('job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('admin.job.view',compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $jobtypes = JobType::orderBy('id', 'DESC')->get();
        return view('admin.job.form',compact('jobtypes','job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $this->validate($request, [
            'title' => ['required', 'string'],
            'job_types_id' => ['required'],
            'description' => ['required', 'string'],
            'thumbnail' => 'mimes:jpg,png,jpeg,bmp',
        ]);

        $packageIcon = '';
        if ($request->hasFile('thumbnail')) {
            if (!empty($job->thumbnail) && file_exists($job->thumbnail)) {
                unlink($job->thumbnail);
            }
            $packageIcon = $this->imageUpload($request, 'thumbnail', 'uploads/thumbnail');
        }else{
            $packageIcon = $job->thumbnail;
        }

       $job->update([
            'title' =>$request->title,
            'job_types_id'=>$request->job_types_id,
            'description'=>$request->description,
            'thumbnail'=>$packageIcon,
        ]);

        return redirect()->route('job.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return back();
    }


    public function status($id)
    {
        $job=Job::find($id);

        if($job->status==1){
            $job->update([
              'status'=>0,
            ]);
        }else{
            $job->update([
                'status'=>1,
            ]);
        }
        return back();
    }
}
