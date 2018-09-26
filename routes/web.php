<?php


Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::post('/property-listing/search', 'DashboardController@search')->name('property-listing.search');

    Route::get('/property-listing', 'PropertyListingController@listView')->name('property-listing.listView');
    Route::get('/property-listing/create', 'PropertyListingController@createView')->name('property-listing.createView');
    Route::post('/property-listing', 'PropertyListingController@createAction')->name('property-listing.store');
    Route::get('/property-listing/{property_listing}/edit', 'PropertyListingController@editView')->name('property-listing.editView');
    Route::put('/property-listing/{property_listing}', 'PropertyListingController@updateAction')->name('property-listing.update');
    Route::get('/property-listing/{property_listing}/delete', 'PropertyListingController@delete')->name('property-listing.delete');


});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

