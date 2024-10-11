<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth','namespace' => 'App\Http\Controllers\Todo'], function () {

    Route::get('/', 'TodoController@index')->name('todo.index');
    Route::get('/create', 'TodoController@create')->name('todo.create');
    Route::post('/', 'TodoController@store')->name('todo.store');
    Route::get('/{id}/edit', 'TodoController@edit')->name('todo.edit');
    Route::patch('/{id}', 'TodoController@update')->name('todo.update');
    Route::delete('/{id}', 'TodoController@destroy')->name('todo.destroy');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
