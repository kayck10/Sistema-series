<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Mail\SeriesCreated;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|b
*/

Route::get('/cadastro', [CadastroController::class, 'create'])->name('cadastro.create');
Route::post('/cadastro/store', [CadastroController::class, 'store'])->name('cadastro.store');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login/store', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/series', [SeriesController::class, 'index'])->name('series.index');

Route::middleware(['auth'])->group(function () {


    Route::get('/series/create', [SeriesController::class, 'create'])->name('series.create');
    Route::post('series/store', [SeriesController::class, 'store'])->name('series.store');
    Route::delete('series/destroy/{series}', [SeriesController::class, 'delete'])->name('series.destroy');
    Route::get('/series/edit/{series}', [SeriesController::class, 'edit'])->name('series.edit');
    Route::put('/series/update/{series}', [SeriesController::class, 'update'])->name('series.update');

    Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

    Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
    Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');

    Route::get('/email', function () {
        return new SeriesCreated(
            'Série de teste',
            1,
            5,
            10,
        );
    });
});
