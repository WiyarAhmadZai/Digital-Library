<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Route as RouteFacade;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TestController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',  [BookController::class,'index'])->name('gethomedata');


Route::get('/user-dashboard', function () {
    return view('/user-dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/user-dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['admin'])->group(function () {
    });
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::group(['prefix'=> 'books/'], function () {
    Route::post('/store', [BookController::class, 'store'])->name('books.store');
    Route::get('/gatdata', [BookController::class, 'getDat'])->name('books.index');
});

Route::get('/test', [TestController::class,'index'])->name('test.home');
Route::post('/save', [TestController::class,'save'])->name('test.save');
Route::get('/getdata', [TestController::class,'getData'])->name('test.getData');
Route::get('delete/{id}', [TestController::class,'delete'])->name('test.delete');
Route::get('edit/{id}', [TestController::class,'edit'])->name('test.edit');
Route::put('update/{id}', [TestController::class,'update'])->name('test.update');


