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

    if ($request->image_path != null) {
        $sheet->update(['char_photo_path' => $request->image_path]);
    }
    if ($request->strength) {
        $sheet->update(['strength' => $request->strength]);
    }
    if ($request->dexterity) {
        $sheet->update(['dexterity' => $request->dexterity]);
    }
    if ($request->constitution) {
        $sheet->update(['constitution' => $request->constitution]);
    }
    if ($request->wisdom) {
        $sheet->update(['wisdom' => $request->wisdom]);
    }
    if ($request->charisma) {
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
