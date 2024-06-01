<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitedPages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Update the session with the new stack
        // $session->put('visited_pages', $visitedPages);

        if (request()->isMethod('GET')) {
            $session = $request->session();
            $currentUrl = $request->path();
            $session->getHandler()->write($session->getId(), serialize($session->all()));
            // Get the existing stack of visited URLs
            $visitedPages = $session->get('links', []);

            if ((empty($visitedPages) || end($visitedPages) !== $currentUrl)) {
                Log::info("middle:", ["เข้ามา"]);
                array_push($visitedPages,$currentUrl);
            }
            $session->put('links', $visitedPages);
            // $links = session()->has('links') ? session('links') : [];
            // $currentLink = request()->path(); // Getting current URI like 'category/books/'
            // if ((empty($links) || end($links) !== $currentLink)) {
            //     array_unshift($links, $currentLink); // Putting it in the beginning of links array
            // }
            // session(['links' => $links]);
            
            if ($request->path() == "/") {
                session(['links' => []]);
            }
            Log::info("middle:",$request->session()->get('links'));
        }
        return $next($request);
    }
}
