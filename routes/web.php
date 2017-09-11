<?php

Route::get('/', 'ArticleController@showAll');
Route::get('/articles/{article}', 'ArticleController@show');

