<?php

$var1 = ['except' => 'show'];
$var2 = ['only' => ['index', 'show', 'destroy']];

Route::resource('users', 'UserController', $var1);
Route::resource('news', 'NewsController', $var2);

$this->get('/', 'LoginController@showLoginForm')->name('login');
$this->post('/', 'LoginController@login');
$this->post('logout', 'LoginController@logout')->name('logout');
$this->post('news', 'NewsController@fetch')->name('fetch');

Route::get('current_user', 'UserController@getUser')->name('current_user');

