<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
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

//admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
   Route::resource('categories', AdminCategoryController::class);
   Route::resource('news', AdminNewsController::class);
});

//news
Route::get('/news', [NewsController::class, 'index'])
	->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])
	->where('id', '\d+')
	->name('news.show');

//Feedback

Route::get('/feedback', [FeedbackController::class, 'index'])
    ->name('feedback');
Route::post('/feedback', [FeedbackController::class, 'store'])
    ->name('feedback.store');
