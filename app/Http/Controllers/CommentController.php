<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Ratings;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($id)
    {
        $work = Work::where("id", $id)->with("user", "images", "comments", "comments.user")->first();
        $rating = Ratings::where("user_id", Auth::user()->id)->where("work_id", $id)->first();
        // dd($work->toArray());
        return view("job.comment", compact("work", "rating"));
    }
    public function create_comment(Request $request, $id)
    {
        $request->validate([
            "comment" => "required",
        ]);
        $comment = new Comments();
        $comment->comment = $request->input("comment");
        $comment->work_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return back();
    }
    public function create_rating(Request $request, $id)
    {
        // dd($request->input());
        $request->validate([
            "rating" => "required",
        ]);
        $rating = Ratings::where('work_id', $id)->where('user_id', Auth::user()->id);

        if ($rating->first() !== null) {
            $rating->update(['rating' => $request->input("rating")]);
        } else {
            $rate = new Ratings();
            $rate->work_id = $id;
            $rate->user_id = Auth::user()->id;
            $rate->rating = $request->input("rating");
            $rate->save();
        }
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required',
        ]);
        $comment = Comments::find($id);
        if(!$comment){
            return response()->json(['success' => false], 404); 
        }
        $comment->comment = $request->input('comment');
        $comment->update();
        return response()->json(['success' => true], 200);
    }

    public function destroy($id)
    {
        $comment = Comments::find($id);
        if(!$comment){
            return response()->json(['success' => false], 404); 
        }
        $comment->delete();
        return response()->json(['success' => true], 200);
    }
}
