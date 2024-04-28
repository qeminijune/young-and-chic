<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kreait\Laravel\Firebase\Facades\Firebase;

class WorkController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->file());

        $request->validate([
            "images" => "required",
            "images.*" => 'image|max:2048',
        ]);
        $work = new Work();
        if ($request->input("detail")) {
            $work->detail = $request->input("detail");
        }
        $work->user_id = Auth::user()->id;
        $work->save();
        foreach ($request->file('images') as $index => $imagefile) {
            $image = new Image();
            $imageName = time() . "-" . $index . '.' . $imagefile->extension();
            // $path = $imagefile->storeAs('images', $imageName);
            $uploadImage = fopen($imagefile, 'r');
            Firebase::storage()->getBucket()->upload($uploadImage, ["name" => $imageName]);
            $image->url = '/images/' . $imageName;
            $image->work_id = $work->id;
            $image->save();
        }

        return back();
    }
}
