<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class LastProjectController extends Controller
{
    public function index($id) {
        $jobs = Job::with('user')->select('jobs.*')->leftJoin('user_applies', 'jobs.id', '=', 'user_applies.job_id')
        ->where('jobs.status', '=', 'close')
        ->where(function ($query) use ($id) {
            $query->where('jobs.user_id', '=', $id)
                ->orWhere('user_applies.user_id', '=', $id);
        })
        ->where(function ($query) {
            $query->where('user_applies.status', '=', 'approve')
                ->orWhereNull('user_applies.status');
        })
        ->groupBy('jobs.id')
        ->get();
        return view("job.last-project",compact("jobs"));
    }
}
