<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/autok',[AutoController::class,'index']);
Route::post('/autok',[AutoController::class,'store']);
Route::delete('/autok/{auto_id}',[AutoController::class,'destroy']);
Route::get('/autok/kategoria/{kategoria_id}',[AutoController::class,'show']);