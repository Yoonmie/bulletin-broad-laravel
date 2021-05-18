<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



// Route::get('/user',[UserController::class, 'index'])->name('user');//urllink,controllername, classname->routename
// Route::post('/user/confirm',[UserController::class, 'confirm']);
// Route::post('/user',[UserController::class, 'store'])->name('userstore');


Route::resource('user', UserController::class);
Route::post('/user/confirm',[UserController::class, 'confirm']);
Route::post('/show/{user}',[UserController::class, 'usershow'])->name('user.usershow');
Route::get('/show/password/{user}',[UserController::class, 'changepassword'])->name('user.change');
Route::put('/show/password/{user}',[UserController::class, 'updatepassword'])->name('user.pwupdate');
Route::get('/usersearch',[UserController::class, 'search'])->name('usersearch');



// Route::resource('login', LoginController::class);
Route::get('/logins',[LoginController::class, 'index'])->name('login');
Route::post('/logins',[LoginController::class, 'store']);

Route::resource('post', PostController::class);
Route::post('/post/confirm',[PostController::class, 'confirm']);
Route::post('/post/{post}',[PostController::class, 'showpostupdate'])->name('post.showpostupdate');
Route::get('/search',[PostController::class, 'search'])->name('posts.search');
// Route::get('/import-form', [PostController::class, 'importForm']);
// Route::post('/import' ,[PostController::class, 'import'])->name('post.import');
Route::get('/excel', [PostController::class, 'importExportView']);
Route::get('/export', [PostController::class, 'export'])->name('export');
Route::post('/import', [PostController::class, 'import'])->name('import');


// // Route::get('/function')
// Route::get('/upload', function () {
//     return view('posts/import-form');
// });

Auth::routes();
// Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
