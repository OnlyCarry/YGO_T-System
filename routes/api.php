<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function() {
    Route::post('saveUser', [Controller::class, 'saveUser']);
});

Route::post('/tokens/create', function (Request $request) {
    $token = $request->Users()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});

