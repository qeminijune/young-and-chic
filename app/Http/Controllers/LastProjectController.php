<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LastProjectController extends Controller
{
    public function index() {
        return view("job.last-project");
    }
}
