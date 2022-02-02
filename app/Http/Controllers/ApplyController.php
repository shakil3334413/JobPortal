<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use Illuminate\Http\Request;
use Auth;
class ApplyController extends Controller
{
    public function apply($id)
    {
        Apply::create([
            'user_id' =>Auth::user()->id,
            'job_id'=>$id
        ]);
        return back();
    }
}
