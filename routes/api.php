<?php

use App\Http\Controllers\Api\UploadController;
use App\Models\Sheet;
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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); // Won't implement because I want it to be a free API for learning

// Doesn't create some routes that are unnecessary
Route::apiResource('/characters', \App\Http\Controllers\Api\CharacterController::class);

Route::get('/characters/{character}/sheet', function (\App\Models\Character $character) { //default subresource URL is Father/{id}/Son
    return $character->sheets;
});

Route::patch('/sheets/{sheet}', function (Request $request, Sheet $sheet){
    if ($request->strength != null) {
        $sheet->update(['strength' => $request->strength]);
    }
    if ($request->dexterity != null) {
        $sheet->update(['dexterity' => $request->dexterity]);
    }
    if ($request->constitution != null) {
        $sheet->update(['constitution' => $request->constitution]);
    }
    if ($request->wisdom != null) {
        $sheet->update(['wisdom' => $request->wisdom]);
    }
    if ($request->charisma != null) {
        $sheet->update(['charisma' => $request->charisma]);
    }

    $sheet->save();

    return $sheet;
});

Route::controller(UploadController::class)->group(function () {
    Route::get('/upload','index')->name('upload.index');
    Route::post('/upload/store', 'store')->name('upload.store');
    Route::delete('/upload/destroy/{character}', 'destroy')->name('upload.destroy');
});
//AUTH with JWT
Route::post('/login', function (Request $request){
    // user = User::class
    /*
     * if (user exists) {
     *     create token and make action using our token
     * } else {
     *     Unauthorized
     * }
     *
     */
    // user->createToken('')
});
