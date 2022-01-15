<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TagihanController;
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
});

//API route for register new user
Route::post('/register', [AuthController::class, 'register']);
//API route for login user
Route::post('/login', [AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);

    // API route for tagihan
    Route::prefix('/tagihan')->group(function () {
        Route::post('/tambah', [TagihanController::class, 'store']);
        Route::get('/tampil', [TagihanController::class, 'index']);
        Route::get('/tampil/{id}', [TagihanController::class, 'show']);
        Route::put('/ubah/{id}', [TagihanController::class, 'update']);
        Route::delete('/hapus/{id}', [TagihanController::class, 'destroy']);
    });
});
