<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        $apply=Apply::with('user','job')->orderBy('id','DESC')->paginate(20);
        return view('admin.applicant.index',compact('apply'));
    }

    public function view($id)
    {
        $apply=Apply::with('user','job')->where('id',$id)->first();
        return view('admin.applicant.view',compact('apply'));
    }
}
