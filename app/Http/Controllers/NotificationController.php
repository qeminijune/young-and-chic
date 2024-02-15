<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\UserApply;
use App\Notifications\ApplyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function apply($id)
    {
        $job = Job::where("id", $id)->with("user")->first();
        $user = User::find($job->user->id);
        UserApply::create(["user_id" => Auth::user()->id, "job_id" => $id, "status" => "wait"]);
        $user->notify(new ApplyNotification($job, Auth::user(), ""));

        return back();
    }

    public function approve($id, Request $request)
    {
        $job = UserApply::where("id", $id)->where("user_id", $request->user_id)->first();
        $job->status="approve";
        $job->save();
        $userapply = UserApply::where("id", $id)->where("user_id", $request->user_id)->with("user", "job")->first();
        $user = User::find($userapply->user->id);
        // dd($user->toArray());
        UserApply::create(["user_id" => Auth::user()->id, "job_id" => $id, "status" => "wait"]);
        $user->notify(new ApplyNotification($userapply->job, Auth::user(), "approve"));
        // dd($job->toArray());

        return back();
    }
}
