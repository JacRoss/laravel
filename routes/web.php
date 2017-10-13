<?php

Route::get('/', 'ArticleController@showAll');


Route::group(['prefix' => 'articles'], function () {
    Route::get('destroy', 'ArticleController@destroyForm');
    Route::post('destroy', 'ArticleController@destroy');
    Route::get('weekly', 'ArticleController@showWeekly');
    Route::get('{article}', 'ArticleController@show');
});


Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'UserController@showAll');
    Route::get('/{user}', 'UserController@show');
    Route::post('/{user}', 'UserController@subscribeOnRole');
});