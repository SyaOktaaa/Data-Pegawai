<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\TabelUserController;
use App\Http\Controllers\TabelSupervisorController;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('admin/dashboard', [PostController::class, 'index']);
     
        // Route::get('admin/posts', [PostController::class, 'index']);
        Route::get('admin/posts/create', [PostController::class, 'create']);
        Route::post('admin/posts/store', [PostController::class, 'store']);
        Route::delete('admin/posts/destroy/{id}', [PostController::class, 'destroy']);
        Route::get('admin/posts/show/{id}', [PostController::class, 'show']);
        Route::get('admin/posts/edit/{id}', [PostController::class, 'edit']);
        Route::put('admin/posts/update/{id}', [PostController::class, 'update']);
        Route::get('admin/posts/pegawai', [PostController::class, 'pegawai']);
        Route::get('admin/posts/tabel', [TabelUserController::class, 'tabel']);
        Route::get('admin/posts/tabel/createuser', [TabelUserController::class, 'createuser']);
        Route::post('admin/posts/tabel/storeuser', [TabelUserController::class, 'storeuser']);
        Route::get('admin/posts/tabel/edituser/{id}', [TabelUserController::class, 'edituser']);
        Route::put('admin/posts/tabel/updateuser/{id}', [TabelUserController::class, 'updateuser']);
        Route::delete('admin/posts/tabel/destroyuser/{id}', [TabelUserController::class, 'destroyuser']);
        });
    
    Route::middleware(['auth', 'supervisor'])->group(function () {
        Route::get('supervisor/dashboard', [SupervisorController::class, 'index']);
        Route::get('supervisor/show/{id}', [SupervisorController::class, 'show']);
        Route::get('supervisor/pegawai', [SupervisorController::class, 'pegawai']);
        Route::get('supervisor/tabel', [TabelSupervisorController::class, 'tabel']);
        Route::get('admin/tabel/createuser', [TabelUserController::class, 'createuser']);
        Route::post('admin/tabel/storeuser', [TabelUserController::class, 'storeuser']);
        Route::get('admin/tabel/edituser/{id}', [TabelUserController::class, 'edituser']);
        Route::put('admin/tabel/updateuser/{id}', [TabelUserController::class, 'updateuser']);
        Route::delete('admin/tabel/destroyuser/{id}', [TabelUserController::class, 'destroyuser']);
    });
    

});



require __DIR__.'/auth.php';

// Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth','admin']);
