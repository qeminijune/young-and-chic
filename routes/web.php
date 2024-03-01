<?php

use App\Http\Controllers\AllEventController;
use App\Http\Controllers\Auth\AuthUserController;
use App\Http\Controllers\BookmarksController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DiscoverController;
use App\Http\Controllers\DiscoverMakeupController;
use App\Http\Controllers\Event\EventController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HashTagController;
use App\Http\Controllers\Job\JobController;
use App\Http\Controllers\JoinTeamController;
use App\Http\Controllers\LastProjectController;
use App\Http\Controllers\ManageProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaveJobsController;
use App\Http\Controllers\TeammateController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\WorkController;
use App\Http\Middleware\CheckTypeUser;
use App\Models\Ratings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $rating = Ratings::with("user", "work", "work.images")->select('ratings.work_id', 'works.user_id', DB::raw('AVG(ratings.rating) as rating'))
        ->join('works', 'works.id', '=', 'ratings.work_id')
        ->whereYear('ratings.created_at', now()->year)
        ->whereMonth('ratings.created_at', now()->month)
        ->groupBy('works.user_id')
        ->orderByDesc('rating')
        ->first();
    // dd($rating->toArray());
    return view('welcome', compact("rating"));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    CheckTypeUser::class
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/jobshow', [JobController::class, "index"])->name('jobshow');
    Route::post('/jobshow', [JobController::class, "store"])->name('jobshow.store');
    Route::get('/event', [EventController::class, "index"])->name('event');
    Route::get('/upload/{id}', [UploadController::class, "index"])->name('upload');
    Route::get('/jointeam/{id}', [JoinTeamController::class, "index"])->name('jointeam');
    Route::post('/jointeam/{id}/close', [JoinTeamController::class, "close"])->name('jointeam.close');
    Route::get('/lastproject/{id}', [LastProjectController::class, "index"])->name('lastproject');
    Route::get('/profile', [ProfileController::class, "index"])->name('profile');
    Route::get('/teammate', [TeammateController::class, "index"])->name('teammate');
    Route::get('/manage', [ManageProfileController::class, "index"])->name('mn.profile');
    Route::post('/manage/profile', [ManageProfileController::class,"update"])->name('mn.profile.update');
    Route::get('/comment/{id}', [CommentController::class, "index"])->name('comment');
    Route::post('/comment/{id}', [CommentController::class, "create_comment"])->name('comment.create');
    Route::post('/rating/{id}', [CommentController::class, "create_rating"])->name('rating.create');
    Route::post('/work', [WorkController::class, "store"])->name('work.store');
    Route::get('/apply/{id}', [NotificationController::class, "apply"])->name('apply');
    Route::post('/apply/{id}', [NotificationController::class, "approve"])->name('approve');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    // CheckTypeUser::class
])->group(function () {
    Route::get('/auth/usertype', [AuthUserController::class, "index"])->name('usertype.show');
    Route::post('/auth/usertype', [AuthUserController::class, "usertype"])->name('usertype');
});


route::get('auth/google', [GoogleController::class, 'googlepage']);
route::get('/auth/google/callback', [GoogleController::class, 'googlecallback']);

Route::get('images/{filename}', function ($filename) {

    $path = storage_path('app/images/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


// Route::get('/jobshow', [JobController::class, "index"])->name('jobshow');
