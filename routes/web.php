<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\NewTheme;
use App\Livewire\ShowThemes;
use App\Livewire\TimeCatcher;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome2');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/themes', [App\Http\Controllers\DashboardController::class, 'index'])->name('themes')->middleware('auth');
Route::get('/create-theme/{theme_name?}', [App\Http\Controllers\CreateTheme::class, 'index'])->name('new-theme')->middleware('auth');
Route::get('/themes-list', ShowThemes::class)->name('theme-list')->middleware('auth');
Route::get('/time-catcher/{id}', TimeCatcher::class)->name('counter')->middleware('auth');

//Route::get('/create-theme/{theme_name?}', NewTheme::class)->name('new-theme2');


