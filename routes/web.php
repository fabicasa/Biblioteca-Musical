<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::post('/search', [HomeController::class, 'search'])->name('home.search');
Route::get('/hola',[ArtistaController::class, 'prueba']);
Route::get('/guardar',[ArtistaController::class, 'guardarDatos']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get ('/artistas',[ArtistaController::class,'index']);
Route::get('/artistas/create',[ArtistaController::class,'create']);
Route::post('/artistas',[ArtistaController::class,'store'])->name('artistaStore');
Route::get('/artistas/{id}',[ArtistaController::class,'edit']);
Route::post('/artistas/{id}',[ArtistaController::class,'update'])->name ('artistaUpdate');
Route::post('/artistas/{id}/delete',[ArtistaController::class,'delete'])->name('artistaDelete');
Route::resource('albumes', AlbumController::class);
Route::resource('canciones', CancionController::class);
Route::resource('artistas', ArtistaController::class);
