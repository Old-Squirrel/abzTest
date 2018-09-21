<?php


Route::get('/','HomeController@index');

Route::get('/home','HomeController@index');

Route::get('/part/one/employee', 'PartOneEmployeeController@index')->name('part.one');

Route::group(['prefix' => '/part/two', 'middleware'=>['auth']], function(){
    Route::resource('/employee', 'PartTwoEmployeeController',['as' => 'part.two']);
});

Auth::routes();


