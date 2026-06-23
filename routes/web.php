<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\Admin\DeveloperController as AdminDeveloperController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Client\DashboardController as ClientDashboard;
use App\Http\Controllers\Developer\ProfileController as DeveloperProfileController;
use App\Http\Controllers\ProfileController;

// Rutas públicas
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/proyectos', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/equipo', [DeveloperController::class, 'index'])->name('developers.index');
Route::get('/equipo/{developer}', [DeveloperController::class, 'show'])->name('developers.show');
Route::post('/contacto', [HomeController::class, 'contacto'])->name('contacto.enviar');

// Dashboard Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Panel Cliente
Route::middleware(['auth', 'verified'])->prefix('cliente')->name('client.')->group(function () {
    Route::get('/dashboard', [ClientDashboard::class, 'index'])->name('dashboard');
    Route::post('/proyectos', [ClientDashboard::class, 'store'])->name('projects.store');
});

// Panel Developer
Route::middleware(['auth', 'verified'])->prefix('developer')->name('developer.')->group(function () {
    Route::get('/perfil', [DeveloperProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [DeveloperProfileController::class, 'update'])->name('profile.update');
});

// Panel Admin
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('developers', AdminDeveloperController::class);
    Route::resource('orders', AdminOrderController::class);
});

require __DIR__ . '/auth.php';
