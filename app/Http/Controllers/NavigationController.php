<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NavigationController extends Controller
{
    public function goBack(Request $request)
    {
        //dd($request->session()->all());
        // Get the existing stack of visited URLs
        $visitedPages = $request->session()->get('links', []);

        Log::info("innit:",$visitedPages);
        // pop the go back URL from the stack
        array_pop($visitedPages);

        Log::info("before:",$visitedPages);
        // Pop the current URL from the stack
        array_pop($visitedPages);

        Log::info("middle:",$visitedPages);

        // Get the URL to redirect to
        $previousUrl = array_pop($visitedPages);

        Log::info("after:",$visitedPages);
        // dd($previousUrl);


        // Update the session with the new stack
        $request->session()->put('links', $visitedPages);

        // Redirect to the previous URL
        return redirect($previousUrl ?? '/');
    }
}
