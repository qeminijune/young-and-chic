<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function index($id) {
        $works=Work::with("images", "user")->where("user_id",$id)->orderBy("created_at","desc")->get();
        $job=Job::where("user_id", $id)->where("status", "start")->first();
        $user=User::where("id", $id)->first();
        return view("job.upload", compact("works", "job", "user"));
    }
}
