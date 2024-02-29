<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManageProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view("job.mn-profile", compact("user"));
    }

    public function update(Request $request)
    {
        $request->validate([
            "image" => "nullable|image|max:4096",
            "bg" => "nullable|image|max:4096",
            "name" => "required",
            "email" => "required",
        ], [
            "image.image" => "The image must be an image.",
            "image.max" => "The image may not be greater than 2 MB.",
            "bg.image" => "The background must be an image.",
            "bg.max" => "The background may not be greater than 2 MB.",
            "name.required" => "The name field is required.",
            "email.required" => "The email field is required.",
        ]);
        //    dd($request->all());
        $user = User::find(auth()->user()->id);
        if ($request->hasFile("image")) {
            $user = auth()->user();
            $imageName = time() . "." . $request->image->extension();
            $request->image->storeAs("images", $imageName);
            $user->image = '/images/' . $imageName;
        }
        if ($request->hasFile("bg")) {
            $user = auth()->user();
            $imageName = time() . "." . $request->bg->extension();
            $request->bg->storeAs("images", $imageName);
            $user->bg = '/images/' . $imageName;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->address = $request->address;
        $user->birthday = $request->birthday;
        $user->update();
        return back()->with("success", "Profile updated successfully");
    }
}
