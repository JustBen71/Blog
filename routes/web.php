<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\TagController;
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

Route::prefix('/')->name('accueil.')->controller(AccueilController::class)->group( function() {
    Route::get('', 'index')->name('home');
});

Route::prefix('/articles')->name('articles.')->controller(ArticleController::class)->group( function() {
    Route::post('/create', 'store')->name('store')->middleware("auth");
    Route::get('/new', 'create')->name('new')->middleware("auth");
    Route::get('/{article}', 'show')->where(['id' => '[0-9]+'])->name('show');
    Route::get('/show/all', 'showByUser')->name('showByUser')->middleware('auth');
    Route::get('/edit/{article}','edit')->name('edit')->middleware("auth");
    Route::put('/edit/save/{article}', 'update')->name('update')->middleware("auth");
    Route::delete('/{article}', 'destroy')->name('delete')->middleware("auth");
    Route::get('', 'index')->name('index');
});

Route::prefix('/tags')->name('tags.')->controller(TagController::class)->group( function() {
    Route::get('/new', 'create')->name('new')->middleware("auth");
    Route::get('/{tag}', 'show')->where(['id' => '[0-9]+'])->name('show');
    Route::get('/edit/{tag}','edit')->name('edit')->middleware("auth");
    Route::put('/edit/save/{tag}', 'update')->name('update')->middleware("auth");
    Route::delete('/{tag}', 'destroy')->name('delete')->middleware("auth");
    Route::post('/create', 'store')->name('store')->middleware("auth");
    Route::get('', 'index')->name('index');
});

Route::prefix('/categories')->name('categories.')->controller(CategorieController::class)->group( function() {
    Route::get('/new', 'create')->name('new')->middleware("auth");
    Route::get('/{categorie}', 'show')->where(['id' => '[0-9]+'])->name('show');
    Route::get('/edit/{categorie}','edit')->name('edit')->middleware("auth");
    Route::put('/edit/save/{categorie}', 'update')->name('update')->middleware("auth");
    Route::delete('/{categorie}', 'destroy')->name('delete')->middleware("auth");
    Route::post('/create', 'store')->name('store')->middleware("auth");
    Route::get('', 'index')->name('index');
});

Route::get('/register', [AuthController::class, 'create'])->name("register");
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name("login");
Route::post('/login', [AuthController::class, 'doLogin']);

Route::get('/auth', [AuthController::class, 'show'])->name("auth.show");
Route::put('/auth', [AuthController::class, 'update'])->name("auth.update");

Route::post('/logout', [AuthController::class, 'logout'])->name("logout");
