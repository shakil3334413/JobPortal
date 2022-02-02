<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class JobController extends Controller
{
    public function index()
    {
        $job = DB::table('jobs')
            ->join('job_types', 'job_types.id', '=', 'jobs.job_types_id')
            ->select('jobs.id','jobs.title as job_title','job_types.title as job_type','jobs.thumbnail')
            ->where('jobs.status',1)
            ->get();
        return response()->json($job);
    }


    public function view($id)
    {
        $job = DB::table('jobs')
            ->join('job_types', 'job_types.id', '=', 'jobs.job_types_id')
            ->select('jobs.id','jobs.title as job_title','job_types.title as job_type','jobs.thumbnail','jobs.description')
            ->where('jobs.id',$id)
            ->get();
        return response()->json($job);
    }
}


