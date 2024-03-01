<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Ratings;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    public function index($id)
    {
        // $startDate = '2024-02-01 00:00:00';
        // $endDate = '2024-02-29 23:59:59';

        // $results = Ratings::select('work_id', DB::raw('SUM(rating) AS count_rating'))
        //     ->whereBetween('created_at', [$startDate, $endDate])
        //     ->groupBy('work_id')
        //     ->orderByDesc('count_rating')
        //     ->orderBy('work_id')
        //     ->get();
        $works = Work::with("images", "user", "comments")->where("user_id", $id)->orderBy("created_at", "desc")->get();
        $job = Job::where("user_id", $id)->where("status", "start")->first();
        $user = User::where("id", $id)->first();
        $averageRating = Ratings::join('works', 'works.id', '=', 'ratings.work_id')
            ->where('works.user_id', $id)
            ->avg('ratings.rating');
        // dd($works->toArray());
        return view("job.upload", compact("works", "job", "user", "averageRating"));
    }
}
