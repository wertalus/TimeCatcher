<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\NewTheme;
use App\Livewire\ShowThemes;
use App\Livewire\TimeCatcher;
use App\Livewire\CreateTheme;
use App\Livewire\MainDashboardView;
use App\Livewire\NdtBooking;
use App\Livewire\AddNewDepartment;
use App\Livewire\AddNewComponent;
use App\Livewire\ScheduleController;
use App\Livewire\AddNewCellProduction;
use App\Livewire\Todolist;

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
Route::get('/create-theme/{theme_name?}', CreateTheme::class)->name('new-theme')->middleware('auth');
Route::get('/themes-list', ShowThemes::class)->name('theme-list')->middleware('auth');
Route::get('/time-catcher/{id}', TimeCatcher::class)->name('counter')->middleware('auth');
Route::get('/home2', MainDashboardView::class)->name('home2')->middleware('auth');
Route::get('/NDT', NdtBooking::class)->name('NDT')->middleware('auth');
Route::get('/new_department', AddNewDepartment::class)->name('add_new_department')->middleware('auth');
Route::get('/new_component', AddNewComponent::class)->name('add_new_component')->middleware('auth');
Route::get('/calendar', NewTheme::class)->name('calendar')->middleware('auth');
Route::get('/events', [ScheduleController::class,'getEvents'])->middleware('auth');
Route::get('/new_cell', AddNewCellProduction::class)->name('add_new_cell')->middleware('auth');
Route::get('/todo', Todolist::class)->name('todo')->middleware('auth');

//Route::get('/create-theme/{theme_name?}', NewTheme::class)->name('new-theme2');


