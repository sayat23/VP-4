<?php

Route::get('/','ProductController@index');
Route::get('/product/viewProduct/{id}','ProductController@viewProduct')->name('product.view');
Route::get('/product/categoryProducts/{id}','ProductController@categoryProducts')->name('product.categoryProducts');
Route::get('/product/createProduct','ProductController@createProduct');
Route::post('/product/store','ProductController@store')->name('product.store');

Auth::routes();
Route::group(['middleware' => ['auth', 'adminOnly']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/adminCategoryList', 'CategoryController@adminCategoryList')->name('product.adminCategoryList');
    Route::get('/create', 'CategoryController@create')->name('category.create');
    Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::get('/delete/{id}', 'CategoryController@delete')->name('category.delete');
    Route::post('/store', 'CategoryController@store')->name('category.store');
    Route::post('/update/{id}', 'CategoryController@update')->name('category.update');
});

Route::group(['prefix' => 'product', 'middleware' => ['auth', 'adminOnly']], function () {
    Route::get('/orderList', 'ProductController@orderList')->name('orderList');
    Route::get('/adminProductList', 'ProductController@adminProductList')->name('product.adminProductList');
    Route::get('/create', 'ProductController@create')->name('product.create');
    Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::get('/delete/{id}', 'ProductController@delete')->name('product.delete');
    Route::post('/store', 'ProductController@store')->name('product.store');
    Route::post('/update/{id}', 'ProductController@update')->name('product.update');

});
