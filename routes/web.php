<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Academy is Health!';
});

Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');

Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.user.store');

Route::get('/admin/user/{user}', [UserController::class, 'show'])->name('admin.user.show');
Route::get('/admin/user/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
Route::post('/admin/user/update/{user}', [UserController::class, 'update'])->name('admin.user.update');

Route::post('/admin/user/delete/{user}', [UserController::class, 'destroy'])->name('admin.user.delete');
