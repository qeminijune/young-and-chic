<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscoverMakeupController extends Controller
{
    public function index() {
        return view("job.discover-makeup");
    }
}