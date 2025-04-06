<?php

use App\Http\Controllers\AdminController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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



Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
Route::get('/admin/all/posts',[AdminController::class,'allPosts'])->name('admin.all.posts');
Route::get('/admin/posts/create',[AdminController::class,'createPost'])->name('admin.posts.create');
Route::post('/admin/posts/store',[AdminController::class,'storePost'])->name('admin.posts.store');

Route::get('/admin/posts/{id}/edit', [AdminController::class, 'editPost'])->name('admin.posts.edit');
Route::put('/admin/posts/{id}', [AdminController::class, 'updatePost'])->name('admin.posts.update');
Route::delete('/admin/posts/{id}', [AdminController::class, 'destroyPost'])->name('admin.posts.destroy');

Route::get('/admin/all/categories',[AdminController::class,'allCategories'])->name('admin.all.categories');
Route::get('/admin/category/create',[AdminController::class,'createCategory'])->name('admin.category.create');
// 'store' ni 'update' ga o'zgartiring va 'PUT' usulidan foydalaning
Route::put('/admin/category/{id}', [AdminController::class, 'updateCategory'])->name('admin.categories.update');
Route::get('/admin/category/{id}/edit', [AdminController::class, 'editCategory'])->name('admin.category.edit');
Route::delete('/admin/category/{id}/delete', [AdminController::class, 'deleteCategory'])->name('admin.category.delete');

Route::get('admin/tests',[AdminController::class,'testsIndex'])->name('admin.all.tests');
Route::get('admin/tests/create',[AdminController::class,'createTest'])->name('admin.create.tests');
Route::post('admin/tests/store',[AdminController::class,'storeTest'])->name('admin.tests.store');
Route::get('admin/tests/{id}/edit',[AdminController::class,'editTest'])->name('admin.tests.edit');
Route::put('admin/tests/{id}',[AdminController::class,'updateTest'])->name('admin.tests.update');
Route::delete('admin/tests/{id}',[AdminController::class,'deleteTest'])->name('admin.tests.delete');
