<?php

use App\Http\Controllers\FirebaseController;
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

Route::get('/users', [FirebaseController::class, 'index']);

Route::get('/users/create', [FirebaseController::class, 'create']);

Route::post('/users', [FirebaseController::class, 'store']);

Route::get('/users/update/{id}', [FirebaseController::class, 'edit']);

Route::put('/users/update/{id}', [FirebaseController::class, 'update']);

Route::delete('/users/{id}', [FirebaseController::class, 'destroy']);