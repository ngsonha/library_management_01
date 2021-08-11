<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\PublisherController;
use App\Models\Publisher;

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



Route::get('/admin', [AdminController::class, 'home'])->name('admin.home');

Auth::routes();
Route::middleware(['auth'])->group(function () {
	Route::get('/', 'ViewUserController@index');
	Route::resource('/homepage', ViewUserController::class);

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/author/export', [AuthorController::class, 'export'])->name('author.export');
Route::get('/publisher/export', [PublisherController::class, 'export'])->name('publisher.export');
Route::resources([
    'user' => 'Admin\UserController',
    'category' => 'Admin\CategoryController',
    'book' => 'Admin\BookController',
    'author' => 'Admin\AuthorController',
    'publisher' => 'Admin\PublisherController',
]);

Route::get('/detailauthor', function () {
    return view('layouts.user.detailauthor');
});
Route::get('/rental', function () {
    return view('layouts.user.rental');
});
Route::get('/contact', function () {
    return view('layouts.user.contact');
});
Route::get('/profile', function () {
    return view('layouts.user.profile');
});