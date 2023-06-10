<?php

use App\Models\Review;
use App\Models\Restaurant;
use App\Models\Discussion_Thread;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\DiscussionThreadController;
use App\Http\Controllers\ForumCategoryController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get("/register", [AuthController::class, 'register'])->name('register');
    Route::post("/register", [AuthController::class, 'actionRegister'])->name('register.handle');
    Route::get("/login", [AuthController::class, 'login'])->name('login');
    Route::post("/login", [AuthController::class, 'actionLogin'])->name('login.handle');
});

Route::middleware('auth')->group(function () {
    Route::post("/logout", [AuthController::class, 'logout'])->name('logout');

    Route::resource('restaurant', RestaurantController::class);
    Route::get('/search', [RestaurantController::class, 'search'])->name('restaurant.search');

    Route::resource('review', ReviewController::class);
    Route::resource('discussion', DiscussionThreadController::class);
    Route::get('discussion-search', [DiscussionThreadController::class, 'search'])->name('discussion.search');
    Route::resource('comment', CommentController::class);
    Route::resource('like', LikeController::class);
    Route::resource('category', ForumCategoryController::class);
    Route::get('trending/{categoryId}', [ForumCategoryController::class, 'index'])->name('category.myIndex');
    Route::post('/like/delete/{id}', [LikeController::class, 'destroy']);

    Route::middleware('IsAdmin')->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/restaurant', [AdminController::class, 'restaurantsIndex'])->name('admin.restaurant.index');
        Route::get('/restaurant/create', [RestaurantController::class, 'create'])->name('admin.restaurant.create');
        Route::get('/restaurant/store', [RestaurantController::class, 'store'])->name('admin.restaurant.store');
    });
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::get('/landingPage', function () {
//     return view('landingPage');
// });

Route::get('/test', [TestController::class, 'test']);

// require __DIR__ . '/auth.php';
