<?php

Route::get('/', 'ArticleController@showAll');
Route::get('/articles/destroy', 'ArticleController@destroyForm');
Route::post('/articles/destroy', 'ArticleController@destroy');
Route::get('/articles/weekly', 'ArticleController@showWeekly');
Route::get('/articles/{article}', 'ArticleController@show');


