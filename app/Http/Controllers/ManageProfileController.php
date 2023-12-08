<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageProfileController extends Controller
{
    public function index() {
        return view("job.mn-profile");
    }
}
