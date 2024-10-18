<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\TicketReplyController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Academy is Health!';
});

Route::get('/admin/auth/login', [AuthController::class, 'login'])->name('admin.auth.login');
Route::post('/admin/auth/logged-in', [AuthController::class, 'logged_in'])->name('admin.auth.logged-in');


Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');

Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.user.store');

Route::get('/admin/user/{user}', [UserController::class, 'show'])->name('admin.user.show');
Route::get('/admin/user/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
Route::post('/admin/user/update/{user}', [UserController::class, 'update'])->name('admin.user.update');

Route::post('/admin/user/delete/{user}', [UserController::class, 'destroy'])->name('admin.user.delete');



Route::get('/admin/ticket', [TicketController::class, 'index'])->name('admin.ticket.index');

Route::get('/admin/ticket/create', [TicketController::class, 'create'])->name('admin.ticket.create');
Route::post('/admin/ticket/store', [TicketController::class, 'store'])->name('admin.ticket.store');
Route::get('/admin/ticket/{ticket}', [TicketController::class, 'show'])->name('admin.ticket.show');

Route::post('/admin/reply/store', [TicketReplyController::class, 'store'])->name('admin.reply.store');