<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserSettingsController;
use App\Http\Controllers\WordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about-us', function () {
    return view('about-us');
});
Route::get('/user-settings', [UserSettingsController::class, 'getUserSettingsPage'])
    ->name('settings')
    ->middleware(['auth']);
Route::post('user-settings', [UserSettingsController::class, 'updateSettings'])->middleware(['auth']);
    
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('/login', [LoginController::class, 'loginUser']);
Route::get('/logout', [LoginController::class, 'logoutUser']);

Route::get('/create-account', [CreateAccountController::class, 'index']);
Route::post('/create-account', [CreateAccountController::class, 'createAccount']);

Route::get('/home', [HomeController::class, 'index'])
    ->name('home')
    ->middleware(['auth']);

Route::get('/boards/{board_id}', [BoardController::class, 'getBoard']);
Route::delete('/boards/{board_id}/delete', [BoardController::class, 'deleteBoard']);
Route::put('/boards/{board_id}/edit', [BoardController::class, 'editBoard']);
Route::post('/boards/create', [BoardController::class, 'createBoard']);
Route::redirect('/guest', '/boards/1'); // default board

// fetched by React and returns json, do not need views
Route::get('/boards/{board_id}/tiles', [BoardController::class, 'getBoardTiles']);
Route::get('/users/{user_id}/boards', [BoardController::class, 'getUserBoards']);

Route::get('/words/{id}', [WordController::class, 'getWords']);
Route::get('/words/user/{id}', [WordController::class, 'getUserWords']);
Route::get('/create-word', [WordController::class, 'index'])
    ->middleware(['auth']);
Route::post('/create-word', [WordController::class, 'createWord'])
    ->middleware(['auth']);
