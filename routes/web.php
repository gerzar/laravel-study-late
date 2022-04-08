<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FeedbackController;
use \App\Http\Controllers\Fortify\FortifyController;

use \App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use \App\Http\Controllers\Admin\UsersController as AdminUsersController;
use \App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
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

Route::get('/', [NewsController::class, 'index'])->name('home');

Route::get('/about', fn()=> view(
        'static.about', [
        'title' => 'About',
        'subtitle' => 'What do you need to know about us'
    ]))->name('about');

//Route::get('/news', [NewsController::class, 'index'])->name('news.list');

Route::get('/news/{id}', [NewsController::class, 'single_news'])
    ->where('id', '\d+')
    ->name('news.show');

Route::get('/news/category/{category_id}', [NewsController::class, 'news_by_category'])
    ->where('category_id', '\d+')
    ->name('news.category.show');

Route::post('logout', [FortifyController::class, 'logout'])->name('fortify.logout');


//Admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'is_admin']], function() {
    Route::resource('news', AdminNewsController::class);
    Route::resource('users', AdminUsersController::class);
    Route::resource('categories', AdminCategoriesController::class);
    Route::resource('feedback', AdminFeedbackController::class);
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
});

Route::post('/feedback/new', [FeedbackController::class, 'new'])->name('feedback.new');
