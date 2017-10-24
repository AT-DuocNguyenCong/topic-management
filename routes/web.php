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
Route::get('/', 'HomeController@index')->name('home.index');
Route::group(['as' => 'user.'], function() {

   Route::resource('/fields', 'FieldController');
   Route::resource('/topics', 'TopicController');
});

Route::group(['namespace'=>'Admin', 'prefix'=>'admin', 'middleware'=>'adminLogin'], function() {
    Route::get('/', 'HomeController@index')->name('admin.index');
    Route::resource('/user', 'UserController');
    Route::resource('/levels', 'LevelController');
    Route::resource('/fields', 'FieldController');
    Route::resource('/academicsrank', 'AcademicRankController');
    Route::resource('/topics', 'TopicController');
    Route::put('/user/{id}/role', 'UserController@updateRole')->name('user.updateRole');
    Route::put('/topics/{id}/status', 'TopicController@adminUpdateStatus')->name('topics.updateStatus');
    Route::get('/pending/topics', 'TopicController@topicsPending')->name('topics.pending');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/profile', 'UserController');
Route::resource('profile.academicsrank', 'AcademicRankController', ['only' => ['create', 'store']]);
Route::resource('/usertopics', 'TopicController');

Auth::routes();