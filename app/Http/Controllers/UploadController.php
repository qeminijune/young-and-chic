<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function index() {
        $works=Work::with("images", "user")->where("user_id",Auth::user()->id)->orderBy("created_at","desc")->get();
        return view("job.upload", compact("works"));
    }
}
