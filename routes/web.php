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

Route::group(['middleware' => 'language'], function() {
        Route::get('/', 'HomeController@index')->name('home.index');
        Route::get('search', 'SearchController@search')->name('search.fields');
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
        Route::resource('/handlerequest', 'HandleRequestJoin');
        Route::get('/approve-request/{id}', 'HandleRequestJoin@approve')->name('request.approve');
        Route::get('/unapprove-request/{id}', 'HandleRequestJoin@unapprove')->name('request.unapprove');
        Route::put('/user/{id}/role', 'UserController@updateRole')->name('user.updateRole');
        Route::put('/topics/{id}/status', 'TopicController@adminUpdateStatus')->name('topics.updateStatus');
        Route::get('/pending/topics', 'TopicController@topicsPending')->name('topics.pending');
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/profile', 'UserController');
    Route::resource('profile.academicsrank', 'AcademicRankController', ['only' => ['create', 'store']]);
    Route::resource('/usertopics', 'TopicController');
    Route::get('/messages/{id}/show', 'UserController@showMessage')->name('messages.show');
    Route::get('/about', function() {
        return view('frontend.static_pages.about');
    })->name('about.us');
});

Route::post('/participates', 'UserController@topicParticipate')->name('topic.participates');
Route::get('/language/{lang}', 'LanguageController@show')
            ->middleware('language')->name('language')
            ->where('lang', 'vi|en');

Auth::routes();