<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FeedbackController;
use \App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;

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


//Admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::resource('news', AdminNewsController::class);
    Route::resource('categories', AdminCategoriesController::class);
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
});


Route::post('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');