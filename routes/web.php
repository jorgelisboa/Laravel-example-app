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
    return to_route('characters.index');
});

//Ao criar um grupo de rotas, não é necessário dizer qual classe realiza a action chamada
/*Route::controller(CharactersController::class)->group(function () {
    Route::get('/character','index')->name('character.index');
    Route::get('/character/create',  'create')->name('character.create');
    Route::post('/character/store', 'store')->name('character.store');
    Route::delete('/character/destroy/{character}', 'destroy')->name('character.destroy');
    Route::get('/character/{character}/edit', 'edit')->name('character.edit');
});*/

Route::resource('/characters', CharactersController::class);
