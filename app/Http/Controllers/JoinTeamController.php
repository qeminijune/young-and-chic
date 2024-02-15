<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\UserApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JoinTeamController extends Controller
{

    public function index($id)
    {
        $job = Job::with("user", "userApply.user")->where("id", $id)->first();
        $apply = UserApply::where("job_id", $id)->where("user_id", Auth::user()->id)->first();
        // dd($job->toArray());
        return view("job.join-team", compact("job", "apply"));
    }

    public function close($id)
    {
        $job = Job::where("id", $id)->first();
        $job -> status="close";
        $job->update();
        // dd($job->toArray());
        return back();
    }
}
