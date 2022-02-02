<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = Job::with('jobtype')->orderBy('id', 'DESC')->where('status',1)->get();
        return view('home',compact('jobs'));
    }

    public function view($id)
    {
        $job=Job::find($id);
        return view('job',compact('job'));
    }
}
