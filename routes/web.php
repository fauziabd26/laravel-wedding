<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\BrideController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeddingController;
use App\Http\Controllers\WishesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('/home', [HomeController::class, 'store']);

Route::get('/undangan/{name}', [HomeController::class, 'index'])->name('homeIndex');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::resource('/admin/dashboard', DashboardController::class)->except('index');
Route::resource('/admin/wedding', WeddingController::class)->only(['index', 'store', 'update']);
Route::resource('/admin/bride', BrideController::class)->only(['index', 'store', 'update', 'destroy']);
Route::resource('/admin/events', EventController::class)->only(['index', 'update', 'store', 'destroy']);
Route::resource('/admin/gallery', GalleryController::class)->only(['index', 'update']);
Route::get('/admin/wishes', [WishesController::class, 'index'])->name('wishes.index');
Route::put('/admin/wishes{id}', [WishesController::class, 'thank'])->name('thank');
Route::resource('/admin/gift', GiftController::class)->only(['index', 'update']);
Route::resource('/admin/user', UserController::class);
Route::resource('/admin/bank', BankController::class);
Route::resource('/admin/story', StoryController::class);

Auth::routes();
