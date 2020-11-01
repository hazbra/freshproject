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

Route::get('/welcome', function () {
    return ['foo' => 'bar'];
});

Route::get('/test', function (){
    $name = request('name');

   return view('test', [
       'name' => $name
   ]);
});

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/contact', 'ContactController@show');
Route::post('/contact','ContactController@store');

Route::get('/payments/create', 'PaymentsController@create')->middleware('auth');
Route::post('/payments','PaymentsController@store')->middleware('auth');
Route::get('notifications','UserNotificationsController@show')->middleware('auth');

Route::get('/about', function (){
    return view('about', [
        'articles' => App\Article::take(3)->latest()->get()
    ]);
});

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::put('/articles/{article}', 'ArticlesController@update');

Route::get('conversations', 'ConversationsController@index');
Route::get('conversations/{conversation}', 'ConversationsController@show');

Route::post('best-replies/{reply}', 'ConversationBestReplyController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
