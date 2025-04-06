<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/',[PageController::class,'index'])->name('page.index');
Route::get('/about',[PageController::class,'about'])->name('page.about');
Route::get('/tests',[PageController::class,'tests'])->name('page.tests');
Route::get('/posts',[PageController::class,'posts'])->name('page.posts');




Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Posts
    Route::get('/all/posts', [AdminController::class, 'allPosts'])->name('admin.all.posts');
    Route::get('/posts/create', [AdminController::class, 'createPost'])->name('admin.posts.create');
    Route::post('/posts/store', [AdminController::class, 'storePost'])->name('admin.posts.store');
    Route::get('/posts/{id}/edit', [AdminController::class, 'editPost'])->name('admin.posts.edit');
    Route::put('/posts/{id}', [AdminController::class, 'updatePost'])->name('admin.posts.update');
    Route::delete('/posts/{id}', [AdminController::class, 'destroyPost'])->name('admin.posts.destroy');

    // Categories
    Route::get('/all/categories', [AdminController::class, 'allCategories'])->name('admin.all.categories');
    Route::get('/category/create', [AdminController::class, 'createCategory'])->name('admin.category.create');
    Route::get('/category/{id}/edit', [AdminController::class, 'editCategory'])->name('admin.category.edit');
    Route::put('/category/{id}', [AdminController::class, 'updateCategory'])->name('admin.categories.update');
    Route::delete('/category/{id}/delete', [AdminController::class, 'deleteCategory'])->name('admin.category.delete');

    // Tests
    Route::get('/tests', [AdminController::class, 'testsIndex'])->name('admin.all.tests');
    Route::get('/tests/create', [AdminController::class, 'createTest'])->name('admin.create.tests');
    Route::post('/tests/store', [AdminController::class, 'storeTest'])->name('admin.tests.store');
    Route::get('/tests/{id}/edit', [AdminController::class, 'editTest'])->name('admin.tests.edit');
    Route::put('/tests/{id}', [AdminController::class, 'updateTest'])->name('admin.tests.update');
    Route::delete('/tests/{id}', [AdminController::class, 'deleteTest'])->name('admin.tests.delete');
});


Route::get('/login',[AuthController::class,'loginPage'])->name('Auth.loginpage');
Route::post('/login',[AuthController::class,'login'])->name('Auth.login');
Route::get('/register',[AuthController::class,'registerPage'])->name('Auth.registerpage');
Route::post('/register',[AuthController::class,'register'])->name('Auth.register');
Route::get('/logout',[AuthController::class,'logout'])->name('Auth.logout');

