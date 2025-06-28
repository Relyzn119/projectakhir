<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [CourseController::class, 'index'])->name('home');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');


Route::middleware(['auth'])->group(function () {


    Route::get('/dashboard', [CourseController::class, 'userDashboard'])->name('dashboard');

    Route::post('/checkout/{id}', [TransactionController::class, 'checkout'])->name('checkout');
    Route::get('/my-transactions', [TransactionController::class, 'userTransactions'])->name('transactions.user');

});



Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


    Route::get('/courses', [AdminController::class, 'listCourses'])->name('admin.courses');
    Route::get('/courses/create', [AdminController::class, 'createCourse'])->name('admin.courses.create');
    Route::post('/courses', [AdminController::class, 'storeCourse'])->name('admin.courses.store');
    Route::get('/courses/{id}/edit', [AdminController::class, 'editCourse'])->name('admin.courses.edit');
    Route::put('/courses/{id}', [AdminController::class, 'updateCourse'])->name('admin.courses.update');
    Route::delete('/courses/{id}', [AdminController::class, 'deleteCourse'])->name('admin.courses.delete');

    Route::get('/transactions', [AdminController::class, 'transactionReport'])->name('admin.transactions');

});
