<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use function Pest\Laravel\withoutMiddleware;

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

Route::get('/', [DashboardController::class, 'index'])->name("dashboard");

Route::group(['prefix' => 'idea/', 'as' => 'idea.',], function () {

    Route::group(['middleware' => ['auth']], function () {

        Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
    });
});

Route::resource('idea', IdeaController::class)->except('index', 'create', 'show')->middleware('auth');
Route::resource('idea', IdeaController::class)->only('show');
// Route::resource('idea.comments', IdeaController::class)->only('store')->middleware('auth');

// Route::get('/terms', [ProfileController::class , 'index']);

Route::get('/terms', function () {
    return view('terms');
});
