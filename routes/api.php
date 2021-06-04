<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProjectController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [LoginController::class, 'login']);

Route::middleware(['jwt'])->group(function () {
    Route:Route::prefix('projects')->group(function () {
        Route::get('/', [ProjectController::class, 'getAll']);     
        Route::get('/{videoID}', [ProjectController::class, 'get']);     
        Route::put('/videos/{videoID}/{watch}', [ProjectController::class, 'watch']);     
        Route::get('/category/{categoryID?}', [ProjectController::class, 'getAll']);     
    });
});