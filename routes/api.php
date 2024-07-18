<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*
|--------------------------------------------------------------------------
| Rotas RESTful para Recurso de Notícias
|--------------------------------------------------------------------------
|
| Esta linha define rotas RESTful para gerenciar o recurso de notícias.
| Ao usar 'apiResource', o Laravel cria automaticamente as rotas padrão
| para operações CRUD (Create, Read, Update, Delete) no controller
| 'App\Http\Controllers\NewsController'.
|
|
| rotas RESTful: Route::apiResource('news', 'App\Http\Controllers\NewsController');
*/


// Get All News
// http://localhost:8989/api/news
Route::get('/news', [NewsController::class, 'index']);


// Create News
// http://localhost:8989/api/news
Route::post('/news', [NewsController::class, 'store']);

// Update News
// http://localhost:8989/api/news/{id}
Route::put('/news/{id}', [NewsController::class, 'update']);

// Delete News
// http://localhost:8989/api/news/{id}
Route::delete('/news/{id}', [NewsController::class, 'destroy']);

// Get News by ID
// http://localhost:8989/api/news/{id}
Route::get('/news/{id}', [NewsController::class, 'show']);
