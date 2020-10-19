<?php

use Illuminate\Support\Facades\Route;

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');



Route::middleware(['auth:admin'])->prefix('admin')->group(function () {

    Route::get('/', 'admin\AdminController@showAdmin')->name('home');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');


});