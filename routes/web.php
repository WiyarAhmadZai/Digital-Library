<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Route as RouteFacade;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FrondendRouteController;
use App\Http\Controllers\TestController;



Route::middleware('Setlang')->group(function () {
    // Route::get('/',  [BookController::class,'index'])->name('gethomedata');

    route::get('Setlang/{lang}', function ($lang) {
        Session::put('lang', $lang);
        return redirect('/');
    });
});

Route::get('/', [FrondendRouteController::class, 'home']);



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

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {


    Route::middleware(['admin'])->group(function () {});
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::prefix('book/')->group(function () {
            Route::get('create', [BookController::class, 'create'])->name('admin.book.create');
            Route::post('store', [BookController::class, 'store'])->name('admin.book.store');
            Route::get('list', [BookController::class, 'bookList'])->name('admin.book.list');

            // This is the important AJAX data route
            Route::get('books-data', [BookController::class, 'getBooksData'])->name('books.data');


            Route::delete('delete/{id}', [BookController::class, 'destroy'])->name('books.destroy');
            Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
            // Add update/post routes as needed
        });
    });

    Route::prefix('frontend/')->group(function () {
        Route::get('/contact', [FrondendRouteController::class, 'contact'])->name('frontend.contact.index');
        route::get('/shoplist', [FrondendRouteController::class, 'shoplist'])->name('frontend.shoplist');
        route::get('/shopdetails', [FrondendRouteController::class, 'shopdetails'])->name('frontend.shopdetails');
        route::get('/shopcart', [FrondendRouteController::class, 'shopcart'])->name('frontend.shop.shopCart');
        route::get('/blog', [FrondendRouteController::class, 'blog'])->name('frontend.blog.index');
        route::get('/about', [FrondendRouteController::class, 'about'])->name('frontend.about.index');
        route::get('/author', [FrondendRouteController::class, 'author'])->name('frontend.author.author');
        route::get('/error', [FrondendRouteController::class, 'error'])->name('frontend.error.index');
    });
});
Route::prefix('book')->group(function () {
    Route::get('/getBooks', [BookController::class, 'getBooks'])->name('book.getBooks');
    Route::get('/getFeaturedBooks', [BookController::class, 'getFeaturedBooks'])->name('book.getFeaturedBooks');
});

Route::group(['prefix' => 'books/'], function () {
    Route::post('/store', [BookController::class, 'store'])->name('books.store');
    Route::get('/gatdata', [BookController::class, 'getDat'])->name('books.index');
});

Route::get('/test', [TestController::class, 'index'])->name('test.home');
Route::post('/save', [TestController::class, 'save'])->name('test.save');
Route::get('/getdata', [TestController::class, 'getData'])->name('test.getData');
Route::get('delete/{id}', [TestController::class, 'delete'])->name('test.delete');
Route::get('edit/{id}', [TestController::class, 'edit'])->name('test.edit');
Route::put('update/{id}', [TestController::class, 'update'])->name('test.update');
