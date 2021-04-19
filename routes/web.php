<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('mail', [App\Http\Controllers\TestMailController::class, 'mailSend']);

//admin route
Route::get('/admin/login',[App\Http\Controllers\AdminController::class,'adminLogin'])->name('admin.login');
Route::get('/admin/register',[App\Http\Controllers\AdminController::class,'adminRegister'])->name('admin.register');
Route::get('/admin/dashboard',[App\Http\Controllers\AdminController::class,'adminDashboard'])->name('admin.dashboard');

//login/logout feature
Route::post('/admin/login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('admin.login');
Route::post('/admin/register',[ App\Http\Controllers\Auth\RegisterController::class,'register'])->name('admin.register');
Route::post('/admin/logout',[ App\Http\Controllers\Auth\LoginController::class,'logout'])->name('admin.logout');



Route::get('/admin/category',[ App\Http\Controllers\CategoryController::class,'categoryShow'])->name('category.index');
Route::post('/category/store',[ App\Http\Controllers\CategoryController::class,'categoryStore'])->name('category.store');
Route::get('/category/status-active/{id}',[ App\Http\Controllers\CategoryController::class,'categoryStatusActive'])->name('category.active.status');
Route::get('/category/status-inactive/{id}',[ App\Http\Controllers\CategoryController::class,'categoryStatusInactive'])->name('category.inactive.status');
Route::get('/category/delete/{id}',[ App\Http\Controllers\CategoryController::class,'categoryDelete'])->name('category.delete');
Route::get('/category/edit/{id}',[ App\Http\Controllers\CategoryController::class,'categoryEdit'])->name('category.edit');
Route::post('/category/update',[ App\Http\Controllers\CategoryController::class,'categoryUpdate'])->name('category.update');

Route::get('tag/index',[App\Http\Controllers\TagController::class,'index'])->name('tag.index');
Route::post('tag/store',[App\Http\Controllers\TagController::class,'tagStore'])->name('tag.store');
Route::get('/tag/status-active/{id}',[App\Http\Controllers\TagController::class,'statusActive'])->name('tag.active');
Route::get('/tag/status-inactive/{id}',[App\Http\Controllers\TagController::class,'statusInactive'])->name('tag.inactive');


Route::get('/post/index',[ App\Http\Controllers\PostController::class,'postIndex'])->name('post.index');
Route::get('post/create',[App\Http\Controllers\PostController::class,'postCreate'])->name('post.create');
Route::post('post/store',[App\Http\Controllers\PostController::class,'postStore'])->name('post.store');
Route::get('post/trash',[App\Http\Controllers\PostController::class,'postTrash'])->name('post.trash');
Route::get('post/trash/update/{id}',[App\Http\Controllers\PostController::class,'postTrashUpdate'])->name('post.trash.update');
Route::get('post/trash/delete/{id}',[App\Http\Controllers\PostController::class,'postTrashDelete'])->name('post.trash.delete');

//frontend
Route::get('blog',[App\Http\Controllers\BlogPageController::class,'blogPageShow'])->name('blog.show');
Route::post('blog',[App\Http\Controllers\BlogPageController::class,'blogSearch'])->name('blog.search');
Route::get('blog/category/{slug}',[App\Http\Controllers\BlogPageController::class,'blogSearchByCat'])->name('blog.search.cat');
Route::get('blog/tag/{slug}',[App\Http\Controllers\BlogPageController::class,'blogSearchByTag'])->name('blog.search.tag');
Route::get('blog/post/{slug}',[App\Http\Controllers\BlogPageController::class,'blogPostShow'])->name('blog.show.post');


//passwordChange
Route::get('admin/password',[App\Http\Controllers\ChangePassController::class,'passChange'])->name('pass.change');
Route::post('admin/password-update/',[App\Http\Controllers\ChangePassController::class,'passChangeUp'])->name('admin.password.update');
