<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminTagController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('main');
Route::get('/oauth/github/callback', GitHubController::class)->name('oauth.github.callback');

Route::get('/page', [PageController::class, 'index'])->name('page');
Route::get('/page/{id}', [PageController::class, 'show'])->name('page.show');
Route::post('/page/comment/{id}', [PageController::class, 'addComment'])->name('page.add.comment');

Route::get('/comments', CommentController::class)->name('comments');

Route::get('/post', [PostController::class, 'index']);
Route::get('/author/{id}', [PostController::class, 'authorPosts'])->name('post.authorPosts');
Route::get('/category/{id}', [PostController::class, 'categoryPosts'])->name('post.categoryPosts');
Route::get('/author/{authorId}/category/{categoryId}', [PostController::class, 'authorCategoryPosts'])->name('post.authorCategoryPosts');
Route::get('/author/{authorId}/category/{categoryId}/tag/{tagId}', [PostController::class, 'authorCategoryTagPosts'])->name('post.authorCategoryTagPosts');
Route::get('/tag/{id}', [PostController::class, 'tagPosts'])->name('post.tagPosts');

Route::middleware(['guest'])->group(function () {
    Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/auth/login', [AuthController::class, 'handleLogin'])->name('auth.handle.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/admin', [AdminPanelController::class, 'index'])->name('admin.panel');

    Route::get('/admin/post', [AdminPostController::class, 'index'])->name('admin.post');
    Route::get('/admin/post/{id}', [AdminPostController::class, 'show'])->name('admin.post.show');
    Route::post('/admin/post/comment/{id}', [AdminPostController::class, 'addComment'])->name('admin.post.add.comment');
    Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('admin.post.create');
    Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('admin.post.store');
    Route::get('/admin/post/{id}/edit', [AdminPostController::class, 'edit'])->name('admin.post.edit');
    Route::post('/admin/post/{id}/update', [AdminPostController::class, 'update'])->name('admin.post.update');
    Route::get('/admin/post/{id}/delete', [AdminPostController::class, 'destroy'])->name('admin.post.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/admin', [AdminPanelController::class, 'index'])->name('admin.panel');

    Route::get('/admin/category', [AdminCategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/category/{id}', [AdminCategoryController::class, 'show'])->name('admin.category.show');
    Route::post('/admin/category/comment/{id}', [AdminCategoryController::class, 'addComment'])->name('admin.category.add.comment');
    Route::get('/admin/category/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/category/store', [AdminCategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/category/{id}/update', [AdminCategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/admin/category/{id}/delete', [AdminCategoryController::class, 'destroy'])->name('admin.category.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/admin', [AdminPanelController::class, 'index'])->name('admin.panel');

    Route::get('/admin/tag', [AdminTagController::class, 'index'])->name('admin.tag');
    Route::get('/admin/tag/{id}', [AdminTagController::class, 'show'])->name('admin.tag.show');
    Route::post('/admin/tag/comment/{id}', [AdminTagController::class, 'addComment'])->name('admin.tag.add.comment');
    Route::get('/admin/tag/create', [AdminTagController::class, 'create'])->name('admin.tag.create');
    Route::post('/admin/tag/store', [AdminTagController::class, 'store'])->name('admin.tag.store');
    Route::get('/admin/tag/{id}/edit', [AdminTagController::class, 'edit'])->name('admin.tag.edit');
    Route::post('/admin/tag/{id}/update', [AdminTagController::class, 'update'])->name('admin.tag.update');
    Route::get('/admin/tag/{id}/delete', [AdminTagController::class, 'destroy'])->name('admin.tag.destroy');
});
