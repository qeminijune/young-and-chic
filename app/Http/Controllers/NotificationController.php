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
    public function apply($id) {
        $job=Job::where("id",$id)->with("user")->first();
        $user=User::find($job->user->id);
        UserApply::create(["user_id"=>Auth::user()->id,"job_id"=>$id]);
        $user->notify(new ApplyNotification($job,Auth::user()));

        return back();
    }
}
