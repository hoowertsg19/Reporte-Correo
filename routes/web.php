<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\ReportCitizenController;
use App\Http\Controllers\DashboardController; // Agrega este use

Route::get('/', function () {
    return view('welcome');
});

// Reemplaza la ruta anterior de dashboard por la nueva
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('cities', CityController::class);
    Route::resource('citizens', CitizenController::class);

    // dashboard de reportes
    Route::get('report', [ReportCitizenController::class, 'index'])
         ->name('report.dashboard');
    // envío de mail
    Route::post('report/send', [ReportCitizenController::class, 'send_report'])
         ->name('report.send');
});

require __DIR__.'/auth.php';
