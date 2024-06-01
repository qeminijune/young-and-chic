<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request) {
        $users = User::inRandomOrder();
        if($request->input("type_user")) {
            $users = $users->where("type_user",$request->input("type_user"));
        }
        $users = $users->get();
        return view("job.profile", compact("users"));
    }
}
