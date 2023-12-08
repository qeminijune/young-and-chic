<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    public function usertype(Request $request) {
        // dd($request->input());
        $user = User::where("id", Auth::user()->id)->update(["type_user"=>$request->input("type")]);
        return redirect("/jobshow");
    }

    public function index() {
        return view("auth.user_type");
    }
}
