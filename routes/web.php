<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/news', [NewsController::class, 'index'])
	->name('news');

Route::get('/newsbycategory/{id}', [NewsController::class, 'news_by_category'])
    ->where('id', '\d+')
    ->name('newsbycategory');


Route::get('/news_categories', [NewsController::class, 'categories'])
	->name('news.categories');

Route::get('/news/{id}', [NewsController::class, 'show'])
	->where('id', '\d+')
	->name('news.show');

