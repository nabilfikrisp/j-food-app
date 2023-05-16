<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing-page');
})->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get("/register", [AuthController::class, 'register'])->name('register');
    Route::post("/register", [AuthController::class, 'actionRegister'])->name('register.handle');
    Route::get("/login", [AuthController::class, 'login'])->name('login');
    Route::post("/login", [AuthController::class, 'actionLogin'])->name('login.handle');
});

Route::middleware('auth')->group(function () {
    Route::post("/logout", [AuthController::class, 'logout'])->name('logout');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/landingPage', function () {
    return view('landingPage');
});

Route::get('/test', function () {
    return view('test');
});

// require __DIR__ . '/auth.php';
