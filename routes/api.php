<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AgeRatingController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\FavouriteController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/artist', [ArtistController::class, 'index']);
Route::get('/artist/{id}', [ArtistController::class, 'show']);
Route::get('/genre/{id}', [GenreController::class, 'show']);
Route::get('/genre', [GenreController::class, 'index']);
Route::get('/studio/{id}', [StudioController::class, 'show']);
Route::get('/studio', [StudioController::class, 'index']);
Route::get('/album/{id}', [AlbumController::class, 'show']);
Route::get('/album', [AlbumController::class, 'index']);
Route::get('/song/{id}', [SongController::class, 'show']);
Route::get('/song', [SongController::class, 'index']);
Route::get('/agerating/{id}', [AgeRatingController::class, 'show']);
Route::get('/agerating', [AgeRatingController::class, 'index']);
Route::get('/rating/{id}', [RatingController::class, 'show']);
Route::get('/rating', [RatingController::class, 'index']);
Route::get('/favourite/{id}', [FavouriteController::class, 'show']);
Route::get('/favourite', [FavouriteController::class, 'index']);




Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/user/{id}', [AuthController::class, 'show']);

    Route::post('/artist', [ArtistController::class, 'create']);
    Route::delete('/artist/{id}', [ArtistController::class, 'destroy']);

    Route::post('/genre', [GenreController::class, 'create']);
    Route::delete('/genre/{id}', [GenreController::class, 'destroy']);

    Route::post('/studio', [StudioController::class, 'create']);
    Route::delete('/studio/{id}', [StudioController::class, 'destroy']);

    Route::post('/album', [AlbumController::class, 'create']);
    Route::delete('/album/{id}', [AlbumController::class, 'destroy']);

    Route::post('/song', [SongController::class, 'create']);
    Route::delete('/song/{id}', [SongController::class, 'destroy']);

    Route::post('/agerating', [AgeRatingController::class, 'create']);
    Route::delete('/agerating/{id}', [AgeRatingController::class, 'destroy']);

    Route::post('/rating', [RatingController::class, 'create']);
    Route::delete('/rating/{id}', [RatingController::class, 'destroy']);

    Route::post('/favourite', [FavouriteController::class, 'create']);
    Route::delete('/favourite/{id}', [FavouriteController::class, 'destroy']);
});
