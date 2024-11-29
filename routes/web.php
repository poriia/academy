<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\TicketReplyController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Academy is Health!';
});
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/auth/logged-in', [AuthController::class, 'logged_in'])->name('auth.logged-in');

    Route::middleware(['auth'])->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('user.index');

        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

        Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
        Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/{user}', [UserController::class, 'update'])->name('user.update');

        Route::post('/user/delete/{user}', [UserController::class, 'destroy'])->name('user.delete');


        Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.index');

        Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
        Route::post('/ticket/store', [TicketController::class, 'store'])->name('ticket.store');
        Route::get('/ticket/{ticket}', [TicketController::class, 'show'])->name('ticket.show');

        Route::post('/reply/store', [TicketReplyController::class, 'store'])->name('reply.store');

        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');

        Route::resource('/courses', CourseController::class);
        Route::resource('/categories', CourseController::class);
    });
});
