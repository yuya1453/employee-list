<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware'=> 'auth'], function(){
    // Route::get('/home', [HomeController::class, 'index'])->name('home');


    #user
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/search', [UserController::class, 'search'])->name('user.search');
});


