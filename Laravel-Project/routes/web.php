<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserRoleController;
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

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/packages', function() {
    return view('packages');
})->name('packages');

Route::get('/aboutus', function() {
    return view('aboutus');
})->name('aboutus');

Route::get('/latestnews', function() {
    return view('latestNews');
})->name('latestNews');

Route::get('/faq', function() {
    return view('faq');
})->name('faq');

Route::get('/admindashboard', function() {
    return view('admindashboard');
})->name('admindashboard');

Route::get('/user_roles', [UserRoleController::class, 'update']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/user', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/article', [ArticleController::class, 'index']);
Route::post('/article', [ArticleController::class, 'store']);
// Route::get('/faq', [FaqController::class, 'index']);
// Route::post('/faq', [FaqController::class, 'store']);
Route::get('/order', [OrderController::class, 'index']);
Route::post('/order', [OrderController::class, 'store']);
Route::get('/review', [ReviewController::class, 'index']);
Route::post('/review', [ReviewController::class, 'store']);
Route::get('/role', [RoleController::class, 'index']);
Route::post('/role', [RoleController::class, 'store']);
Route::get('/submit', [SubmitController::class, 'index']);
Route::post('/submit', [SubmitController::class, 'store']);


