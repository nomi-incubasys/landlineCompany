<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('login','SessionsController@create');

Route::get('logout','SessionsController@destroy');

Route::resource('sessions','SessionsController');

Route::group(array('before' => 'admin'), function() {

    Route::get('/admin', function()
    {
        return View::make('layouts.admin');
    });
    
    Route::resource('users', 'UserController');
    
});

Route::group(array('before' => 'service'), function() {

    Route::get('/service', function()
    {
        return View::make('layouts.main');
    });
    
    Route::get('changestatus/{id}', 'ComplaintsController@approveComplaint');
    
    Route::get('usercomplaints', 'UserController@service');
    
});

Route::group(array('before' => 'customer'), function() {
    
    Route::get('/customer', function()
    {
        return View::make('layouts.client');
    });
      
    Route::resource('complaints', 'ComplaintsController');
    
});

Route::group(array('before' => 'checkAdmin'), function() {
    
    Route::get('/', 'SessionsController@create');
    
});