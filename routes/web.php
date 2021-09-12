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
Route::get('/api_view', [\App\Http\Controllers\Json::class, 'index']);
//Route::post('/all', [\App\Http\Controllers\Json::class, 'get'])
Route::group([], function () {
    Route::get('/manga_all/{limit}', [\App\Http\Controllers\Json::class, 'manga_all']);
    Route::get('/authors_all/{limit}', [\App\Http\Controllers\Json::class, 'authors_all']);
    Route::get('/manga/{id}', [\App\Http\Controllers\Json::class, 'manga_id']);
    Route::get('/authors/{id}', [\App\Http\Controllers\Json::class, 'authors_id']);
    Route::get('/manga/authors/{id}', [\App\Http\Controllers\Json::class, 'manga_authors']);
    Route::post('/manga/add', [\App\Http\Controllers\Json::class, 'manga_add'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
    Route::post('/manga/update', [\App\Http\Controllers\Json::class, 'manga_update'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
});

