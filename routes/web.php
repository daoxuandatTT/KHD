<?php
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
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('page.index');
});
Route::prefix('page')->group(function () {
    Route::get('/', 'PageController@index')->name('page.index');
    Route::get('/about', 'PageController@about')->name('page.about');
    Route::get('/cooking', 'PageController@cooking')->name('page.cooking');
    Route::get('/contact', 'PageController@contact')->name('page.contact');
    Route::get('/myPost', 'PageController@myPost')->name('page.myPost');
    Route::get('/share', 'PageController@showPostShare')->name('page.showPostShare');
    Route::post('/share', 'PageController@myPostShare')->name('page.myPostShare');
    Route::get('{id}/myProfile', 'PageController@myProfile')->name('page.myProfile');
    Route::get('{id}/editProfile', 'PageController@editProfile')->name('page.editProfile');
    Route::post('{id}/updateProfile', 'PageController@updateProfile')->name('page.updateProfile');
    Route::get('{id}/detail', 'PageController@showDetail')->name('page.showDetail');
    Route::get('{id}/editPassword', 'PageController@editPassword')->name('page.editPassword');
    Route::post('{id}/updatePassword', 'PageController@updatePassword')->name('page.updatePassword');
});
Route::prefix('post')->group(function () {
    Route::get('/', 'PostController@getAll')->name('post.list');
    Route::get('/create', 'PostController@create')->name('post.create');
    Route::post('{id}/store', 'PostController@store')->name('post.store');
    Route::get('{id}/edit', 'PostController@edit')->name('post.edit');
    Route::post('{id}/update', 'PostController@update')->name('post.update');
    Route::get('{id}/delete', 'PostController@delete')->name('post.delete');
    Route::post('search', 'PostController@search')->name('post.search');
});
Route::prefix('category')->group(function () {
    Route::get('/', 'CategoryController@getAll')->name('category.index');
    Route::get('/create', 'CategoryController@create')->name('category.create');
    Route::post('/store', 'CategoryController@store')->name('category.store');
    Route::get('{id}/edit', 'CategoryController@edit')->name('category.edit');
    Route::post('{id}/update', 'CategoryController@update')->name('category.update');
    Route::get('{id}/delete', 'CategoryController@delete')->name('category.delete');
});
Route::prefix('user')->group(function () {
    Route::get('/', 'UserController@getAll')->name('user.list');
    Route::get('/create', 'UserController@create')->name('user.create');
    Route::post('/store', 'UserController@store')->name('user.store');
    Route::get('{id}/edit', 'UserController@edit')->name('user.edit');
    Route::post('{id}/update', 'UserController@update')->name('user.update');
    Route::get('{id}/delete', 'UserController@delete')->name('user.delete');
});
Route::prefix('comment')->group(function () {
    Route::get('/', 'CommentController@getAll')->name('comment.list');
    Route::get('/create', 'CommentController@create')->name('comment.create');
    Route::post('{id}/store', 'CommentController@store')->name('comment.store');
    Route::get('{id}/edit', 'CommentController@edit')->name('comment.edit');
    Route::post('{id}/update', 'CommentController@update')->name('comment.update');
    Route::get('{id}/delete', 'CommentController@delete')->name('comment.delete');

});
Route::prefix('reply')->group(function () {
    Route::get('{{id}/store', 'RepliesController@store')->name('reply.store');

});


Auth::routes(['verify' =>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminForgotPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminForgotPasswordController@showResetForm')->name('admin.password.reset');
});
Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback', 'SocialController@Callback');


Route::resource('tag','TagController');
Route::get('{id}/delete','TagController@delete')->name('tag.delete');
Route::get('{id}/tag','PostController@postByTag')->name('tag.posts');
Route::resource('/replies','RepliesController');
Route::get('page/loadmore', 'LoadMoreController@index');
Route::post('page/loadmore/load_data', 'LoadMoreController@load_data')->name('loadmore.load_data');
