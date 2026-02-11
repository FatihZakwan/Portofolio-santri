<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProjectController;

// Halaman Utama (Landing Page)
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Dashboard (Bawaan Breeze/Auth)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes (Bawaan Breeze/Auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==========================================
// PROJECT ROUTES (Perbaikan Utama)
// ==========================================

// 1. Halaman Kategori & Filter (Programming, DKV, Game, Media)
// Menangani URL seperti: /projects?main=Programming&cat=Web%20Development
Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');

// 2. Halaman Upload Karya (Form)
// Mengatasi error: Route [project.create] not defined
Route::get('/add-project', [ProjectController::class, 'create'])->name('project.create');

// 3. Proses Simpan Data (Action Form)
Route::post('/add-project', [ProjectController::class, 'store'])->name('project.store');

// 4. Halaman Detail Project
// Agar link di kartu project bisa dibuka
Route::get('/detail-project/{id}', [ProjectController::class, 'show'])->name('project.detail');