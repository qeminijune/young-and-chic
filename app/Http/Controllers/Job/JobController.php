<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kreait\Laravel\Firebase\Facades\Firebase;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::with(["userApply"=>function($q){$q->where("user_id", Auth::user()->id);}])->whereDoesntHave('apply')->where("status", "start");
        if ($request->input("filter")) {
            $jobs = $jobs->where("participants", $request->input("filter"));
        }
        if ($request->input("search")) {
            $jobs->where(function ($query) use ($request) {
                $query->where('description', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('full_description', 'like', '%' . $request->input('search') . '%');
            });
        }
        $jobs = $jobs->paginate(18);
        // dd(Auth::user()->unreadNotifications->toArray());
        return view("job.job-show", compact("jobs"));
    }

    public function create(Request $request)
    {
        dd($request->input(), $request->file());
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'participant' => 'required|max:255',
            'type' => 'required|max:255',
            'employment' => 'required|max:255',
            'description' => 'required|max:255',
            'full_description' => 'required|max:255',
        ]);
        // dd($request->input());
        $imageName = time() . '.' . $request->image->extension();
        // $request->image->storeAs('images', $imageName);
        $uploadImage = fopen($request->file('image'), 'r');
        Firebase::storage()->getBucket()->upload($uploadImage, ["name" => $imageName]);
        $job = new Job();
        $job->participants = $request->input("participant");
        $job->image = $imageName;
        $job->type = $request->input("type");
        $job->employment = $request->input("employment");
        $job->description = $request->input("description");
        $job->full_description = $request->input("full_description");
        $job->user_id = Auth::user()->id;
        $job->save();

        return redirect()->route("jointeam", $job->id)->with('success', 'Post job successful.');
    }
}
