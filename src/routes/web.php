<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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


Route::get('/', [ContactController::class, 'index'] );
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/login', function () {
    return view('auth.login');
});
Route::middleware('auth')->group(function(){
    Route::get('/admin', [AuthController::class, 'admin']);
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});