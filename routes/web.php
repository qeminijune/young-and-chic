<?php

use App\Http\Controllers\AllEventController;
use App\Http\Controllers\Auth\AuthUserController;
use App\Http\Controllers\BookmarksController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Event\EventController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HashTagController;
use App\Http\Controllers\Job\JobController;
use App\Http\Controllers\ManageProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SaveJobsController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\WorkController;
use App\Http\Middleware\CheckTypeUser;
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
    return view('welcome');
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
    Route::get('/allevent', [AllEventController::class, "index"])->name('all.event');
    Route::get('/hashtag', [HashTagController::class, "index"])->name('hashtag');
    Route::get('/upload', [UploadController::class, "index"])->name('upload');
    Route::get('/manage', [ManageProfileController::class, "index"])->name('mn.profile');
    Route::get('/bookmarks', [BookmarksController::class, "index"])->name('bookmarks');
    Route::get('/savejobs', [SaveJobsController::class, "index"])->name('savejobs');
    Route::get('/comment', [CommentController::class, "index"])->name('comment');
    Route::post('/work', [WorkController::class, "store"])->name('work.store');
    Route::get('/apply/{id}', [NotificationController::class, "apply"])->name('apply');
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


route::get('auth/google',[GoogleController::class,'googlepage']);
route::get('/auth/google/callback',[GoogleController::class,'googlecallback']);

Route::get('images/{filename}', function ($filename)
{

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
