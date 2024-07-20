<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;


/*
|--------------------------------------------------------------------------
| Rotas RESTful para API de Notícias
|--------------------------------------------------------------------------
|
| Este arquivo define rotas RESTful para gerenciar o as notícias.
| Possui rotas padrão para operações CRUD
| (Create, Read, Update, Delete) no controller
| 'app\Http\Controllers\NewsController'.
|
| Possui rotas com autenticação JWT
| (Login, Register, Me, Logout, Refresh) no controller
| 'app\Http\Controllers\AuthController.php'.
*/


/**
 * ------------------------------------------------------------------------
 * Rotas de Autenticação
 * ------------------------------------------------------------------------
 * As rotas de autenticação permitem o registro e login de usuários.
 * Uma vez autenticado, o usuário pode acessar as rotas protegidas.
 */
Route::group(['prefix' => 'auth'], function ($router) {
    // Login user
    // http://localhost:8989/api/auth/login
    Route::post('login', [AuthController::class, 'login']);

    // Register user
    // http://localhost:8989/api/auth/register
    Route::post('register', [AuthController::class, 'register']);
});

/**
 * -------------------------------------------------------------------------
 * Rotas Protegidas por Autenticação
 * -------------------------------------------------------------------------
 * Essas rotas estão dentro de um grupo de middleware auth:api,
 * que garante que apenas usuários autenticados possam acessá-las.
 */
Route::middleware(['auth:api'])->group(function () {
    // Get the authenticated User
    // http://localhost:8989/api/me
    Route::post('me', [AuthController::class, 'me']);

    // logout user
    // http://localhost:8989/api/logout
    Route::post('logout', [AuthController::class, 'logout']);

    // Refresh a token
    // http://localhost:8989/api/refresh
    Route::post('refresh', [AuthController::class, 'refresh']);

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
});
