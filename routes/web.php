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
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PostController;



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
    Route::prefix('admin/')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::prefix('book/')->group(function () {
            Route::get('create', [BookController::class, 'create'])->name('admin.book.create');
            // Route::get('edit/{id}', [BookController::class, 'formEdit'])->name('books.edit');
            Route::post('store', [BookController::class, 'store'])->name('admin.book.store');
            Route::get('list', [BookController::class, 'bookList'])->name('admin.book.list');
            Route::get('books-data', [BookController::class, 'getBooksData'])->name('books.data');
            Route::delete('delete/{id}', [BookController::class, 'destroy'])->name('books.destroy');
            Route::get('books/{book}/edit', [BookController::class, 'formEdit'])->name('books.edit');
            Route::put('update/{id}', [BookController::class, 'BookUpdate'])->name('admin.book.update');
            Route::get('view/{id}', [BookController::class, 'bookView'])->name('admin.book.view');
            Route::post('/reviews', [BookController::class, 'reviewStore'])->name('reviews.store');
            Route::get('/edit/{id}', [BookController::class, 'reviewsEdit'])->name('reviews.edit');
            Route::delete('/review/delete/{id}', [BookController::class, 'reviewsDelete'])->name('reviews.destroy');
            Route::post('/review/update/{id}', [BookController::class, 'update'])->name('reviews.update');
        });
        Route::prefix('author/')->group(function () {
            Route::get('create', [AuthorController::class, 'create'])->name('admin.author.create');
            Route::post('store', [AuthorController::class, 'store'])->name('admin.author.store');
            Route::get('index', [AuthorController::class, 'index'])->name('admin.author.index');
            Route::get('list-data', [AuthorController::class, 'listData'])->name('admin.author.list-data');
            Route::get('edit/{id}', [AuthorController::class, 'edit'])->name('admin.author.edit');
            Route::put('update/{id}', [AuthorController::class, 'update'])->name('admin.author.update');
            Route::delete('delete/{id}', [AuthorController::class, 'destroy'])->name('admin.author.delete');
            Route::get('view/{id}', [AuthorController::class, 'authorView'])->name('admin.author.view');
        });
        Route::prefix('post/')->group(function () {
            Route::get('create', [PostController::class, 'create'])->name('admin.post.create');
            Route::post('store', [PostController::class, 'store'])->name('admin.post.store');
            Route::get('edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
            Route::put('update/{id}', [PostController::class, 'update'])->name('admin.post.update');
        });
    });

    Route::middleware('auth')->group(function () {
        Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

        // ✅ Add this line for delete support:
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    });






    Route::prefix('frontend/')->group(function () {
        Route::get('/contact', [FrondendRouteController::class, 'contact'])->name('frontend.contact.index');
        Route::get('/shoplist', [FrondendRouteController::class, 'shoplist'])->name('frontend.shoplist');
        Route::get('/shopdetails', [FrondendRouteController::class, 'shopdetails'])->name('frontend.shopdetails');
        Route::get('/shopdetails-data/{id}', [FrondendRouteController::class, 'shoplistData'])->name('frontend.shopDetailsData');
        Route::get('/shopcart', [FrondendRouteController::class, 'shopcart'])->name('frontend.shop.shopCart');
        Route::get('/blog', [FrondendRouteController::class, 'blog'])->name('frontend.blog.index');
        Route::get('/about', [FrondendRouteController::class, 'about'])->name('frontend.about.index');
        Route::get('/author', [FrondendRouteController::class, 'author'])->name('frontend.author.author');
        Route::get('/error', [FrondendRouteController::class, 'error'])->name('frontend.error.index');
        Route::get('/shop-list', [FrondendRouteController::class, 'shopList'])->name('frontend.shop-list');
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
