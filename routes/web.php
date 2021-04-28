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


use App\Events\CommentApp;

Route::get('/logout', 'UserController@logout');
Route::get('/get_country', 'PostObjectController@get_country');
Route::get('/get_profile', 'UserController@get_profile');
Route::get('/get_inbox', 'ChatController@get_inbox');
Route::post('/delete_post', 'PostObjectController@delete_post');
Route::post('/my_posts', 'PostObjectController@my_posts');
Route::post('/fetch_messages', 'ChatController@fetch_messages');
Route::post('/send', 'ChatController@send');
Route::post('/add_comment', 'ChatController@add_comment');
Route::post('/get_comment', 'ChatController@get_comment');
Route::get('/getNotifications', 'ChatController@getNotifications');
Route::post('/updateChatSeen', 'ChatController@updateChatSeen');
Route::post('/updateCommmentSeen', 'ChatController@update_comment_status');
Route::post('/recent-post', 'PostObjectController@recent_post');
Route::post('/fetch-post', 'PostObjectController@fetch_post');
Route::post('/search-obj', 'PostObjectController@search_object');
Route::post('/post-object','PostObjectController@post_object');
Route::post('/update_profile','UserController@update_profile');

Route::get('/','UserController@index');
Route::get('{any}', 'UserController@index');
Route::post('/user-register','UserController@register');
Route::post('/user-login','UserController@login');

Auth::routes();

