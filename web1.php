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

//Views
Route::group(['middleware' => ['auth:web','xss']], function () {
    Route::post('/add-bucket', [BallBucketController::class, 'addBucket']);
    Route::post('/add-ball', [BallBucketController::class, 'addBall']);
    Route::post('/suggest-buckets', [BallBucketController::class, 'suggestBuckets']);
});



