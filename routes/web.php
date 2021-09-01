<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/name/{aaaa}', function (string $aaaa) {
    return "Hello, {$aaaa}";
});


Route::get('/sum/{a}/{b}', function (int $a, int $b) {
    $c = $a + $b;
    return "{$a}+{$b}={$c}";
});

