<?php

use App\Http\Controllers\ArticleController;
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
