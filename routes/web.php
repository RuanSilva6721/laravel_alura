<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UsersController;
use App\Mail\SeriesCreated;
use App\Middleware\Autenticador;
use App\Models\Episode;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return redirect('/series');
})->middleware('Autenticador');

Route::resource('/series', SeriesController::class)
    ->except(['show']);


Route::middleware('Autenticador')->group(function(){
    Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

    Route::get('season/{season}/episodes', [EpisodesController::class, 'index'])-> name('episodes.index');
    Route::post('season/{season}/episodes', [EpisodesController::class, 'update'])-> name('episodes.update');




});

    //login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('loginStore');
    //user
    route::get('/register', [UsersController::class, 'create'])->name('users.create');
    route::post('/register', [UsersController::class, 'store'])->name('users.store');
    route::get('/registerDestroy', [UsersController::class, 'destroy'])->name('users.logout');


Route::get('/email', function() {
    return new SeriesCreated(
        $nomeSerie = 'Série Teste',
        $nome = 'Ruan'

    );
});

