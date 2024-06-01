<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\UserApply;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JoinTeamController extends Controller
{

    public function index($id)
    {
        foreach (Auth::user()->unreadNotifications as $notification) {
           if($notification['data']['job']['id'] == $id){
               $notification->markAsRead();
           }
        }
        $job = Job::with("user", "userApply.user")->where("id", $id)->first();
        $selfApply = UserApply::where("job_id", $id)->where("user_id", Auth::user()->id)->first();
        $apply=collect($job->userApply)->where("status", "wait");
        $approves=collect($job->userApply)->where("status", "approve");
        // dd($approves->toArray());
        return view("job.join-team", compact("job", "selfApply", "apply", "approves"));
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
