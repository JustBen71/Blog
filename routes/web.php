<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\TagController;
use App\Http\Requests\CategorieFormRequest;
use App\Http\Requests\TagFormRequest;
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

Route::get('/', function () {
    return view('accueil.index');
})->name('home');

Route::prefix('/articles')->name('articles.')->controller(ArticleController::class)->group( function() {
    Route::get('/new', 'create')->name('new');
    Route::get('/{article}', 'show')->where(['id' => '[0-9]+'])->name('show');
    Route::get('/edit/{article}','edit')->name('edit');
    Route::put('/edit/save/{article}', 'update')->name('update');
    Route::delete('/{article}', 'destroy')->name('delete');
    Route::post('/create', 'store')->name('store');
    Route::get('', 'index')->name('index');
});

Route::prefix('/tags')->name('tags.')->controller(TagController::class)->group( function() {
    Route::get('/new', 'create')->name('new');
    Route::get('/{tag}', 'show')->where(['id' => '[0-9]+'])->name('show');
    Route::get('/edit/{tag}','edit')->name('edit');
    Route::put('/edit/save/{tag}', 'update')->name('update');
    Route::delete('/{tag}', 'destroy')->name('delete');
    Route::post('/create', 'store')->name('store');
    Route::get('', 'index')->name('index');
});

Route::prefix('/categories')->name('categories.')->controller(CategorieController::class)->group( function() {
    Route::get('/new', 'create')->name('new');
    Route::get('/{categorie}', 'show')->where(['id' => '[0-9]+'])->name('show');
    Route::get('/edit/{categorie}','edit')->name('edit');
    Route::put('/edit/save/{categorie}', 'update')->name('update');
    Route::delete('/{categorie}', 'destroy')->name('delete');
    Route::post('/create', 'store')->name('store');
    Route::get('', 'index')->name('index');
});

Route::get('/register', [AuthController::class, 'create'])->name("register");
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name("login");
Route::post('/login', [AuthController::class, 'doLogin']);

Route::post('/logout', [AuthController::class, 'logout'])->name("logout");
