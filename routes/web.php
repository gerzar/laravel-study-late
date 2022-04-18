<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FeedbackController;
use \App\Http\Controllers\Fortify\FortifyController;
use \App\Http\Controllers\Auth\SocialController;

use \App\Http\Controllers\SubscribesController;


use \App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use \App\Http\Controllers\Admin\UsersController as AdminUsersController;
use \App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use \App\Http\Controllers\Admin\ParseController as AdminParseController;
use \App\Http\Controllers\Admin\ResourcesController as AdminResourcesController;



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
        'subtitle' => 'What do you need to know about us',
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
    Route::resource('resources', AdminResourcesController::class);

    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/parse', [AdminParseController::class, '__invoke']);
});

Route::post('/feedback/new', [FeedbackController::class, 'new'])->name('feedback.new');

//oAuth routes
Route::group(['middleware' => 'guest'], function() {
    Route::get('/auth/{network}/redirect', [SocialController::class, 'index'])
        ->where('network', '\w+')
        ->name('auth.redirect');
    Route::get('/auth/{network}/callback', [SocialController::class, 'callback'])
        ->where('network', '\w+')
        ->name('auth.callback');
});



/*Subscribing routes*/

Route::post('/subscribe/subscribe/{category_id}', [SubscribesController::class, 'subscribe'])->name('subscribe');
Route::delete('/subscribe/unsubscribe/{category_id}', [SubscribesController::class, 'unsubscribe'])
    ->middleware('auth')
    ->name('unsubscribe');

Route::get('/feed', [NewsController::class, 'feed'])->name('feed');
