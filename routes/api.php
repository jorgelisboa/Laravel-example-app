<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Doesn't create some routes that are unnecessary
Route::apiResource('/characters', \App\Http\Controllers\Api\CharacterController::class);

Route::get('/characters/{character}/sheet', function (\App\Models\Character $character) { //default subresource URL is Father/{id}/Son
    return $character->sheets;
});

Route::patch('/sheets/{sheet}', function (Request $request, \App\Models\Sheet $sheet){
    $sheet->charisma = $request->charisma;
    $sheet->save();

    return $sheet;
});
