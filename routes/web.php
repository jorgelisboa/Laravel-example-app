<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharactersController;
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

Route::get('/character', [CharactersController::class, 'index']);

Route::get('/character/create', [CharactersController::class, 'create']);

Route::post('/character/save', [CharactersController::class, 'store']);
