<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LandingController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
//     Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
// });
//  Route::post('/dashboard', [App\Http\Controllers\AdminController::class, 'index']);
// Route::middleware(['auth', 'admin.check'])->prefix('admin')->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// }); Class [Admin] not defined, bye-bye error

Route::middleware([
    Authenticate::class,
    AdminMiddleware::class,
])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});


Route::get('/tes-admin', [AdminController::class, 'dashboard']);
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::middleware(['auth'])->group(function () {
    Route::post('/checkout/{id}', [TransactionController::class, 'checkout'])->name('checkout');
});
Route::middleware(['auth'])->get('/dashboard', [CourseController::class, 'userDashboard'])->name('dashboard');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::get('/', [LandingController::class, 'index'])->name('landing');


require __DIR__ . '/auth.php';
