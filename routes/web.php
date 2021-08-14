<?php

use App\Http\Controllers\TimelineAddController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\TimelineStatusLikeController;
use App\Http\Controllers\UserEditController;
use App\Http\Controllers\UserFollowController;
use App\Http\Controllers\UserInformationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/profile/edit-user', UserEditController::class)->middleware(['auth'])->name('user.edit');
Route::post('/profile/edit-user', [UserEditController::class, "update"])->middleware(['auth']);
Route::post('/profile/change-email', [UserEditController::class, "update_email"])->middleware(['auth'])->name("user.edit-email");
Route::get('/profile/{user:username}', UserInformationController::class)->middleware(['auth'])->name('user.profile');
Route::post('/profile/{user:username}', UserFollowController::class)->middleware(['auth'])->name('user.follow');

Route::middleware("auth", "verified")->prefix("timeline")->group(function () {
  Route::get("/", TimelineController::class)->name("timeline");
  Route::post("/add-post", TimelineAddController::class)->name("timeline.add");
  Route::post("/{status:identifier}", TimelineStatusLikeController::class)->name("timeline.status_like");
});
require __DIR__ . '/auth.php';
