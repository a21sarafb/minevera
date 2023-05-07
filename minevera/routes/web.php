<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\OAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Models\Ingredient;
use Illuminate\Http\Request;

Route::get('/auth/google', [OAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [OAuthController::class, 'handleGoogleCallback']);
Route::get('/registro', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/registro', 'Auth\RegisterController@register');
/*Route::get('/ingredients', function (Request $request) {
    $query = $request->input('query');
    $ingredients = Ingredient::where('name', 'like', '%'.$query.'%')->limit(5)->get();

    return $ingredients;
});*/
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::post('/buscar-recetas', [HomeController::class, 'buscarRecetas'])->name('buscarRecetas');
Route::get('/', [HomeController::class, 'index'])->name('home');

//Route::get('/minevera/public', [HomeController::class, 'index'])->name('home');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
Route::post('/buscar-recetas', [HomeController::class, 'buscarRecetas'])->name('buscarRecetas');
Route::get('/', function () {
    return view('home');
});
*/


