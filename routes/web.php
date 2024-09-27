<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Academy is Health!';
});

Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');

Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store');
