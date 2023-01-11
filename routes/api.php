<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\FoodRecipeController;
use App\Http\Controllers\UserController;
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
Route::post('/register', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'loginUser']);

Route::resource('/food-recipe', FoodRecipeController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/favourite/user/{user_id}', [FavouriteController::class, 'userFavourites']);
    Route::post('/favourite/add/{recipe_id}', [FavouriteController::class, 'addToFavorite']);
    Route::get('/favourite/remove/{recipe_id}', [FavouriteController::class, 'removeFromFavorite']);
});

