<?php


/**
 * Front Office Routes
 * 
 * @namespace { FO }
 */
Route::namespace('FO')->group(function () {
    
    Route::get('/', 'HomeController')->name('home');

    Route::get('/signup', 'SignupController@index')->name('signup');

    Route::post('/signup', 'SignupController@post')->name('signup.post');
    
    Route::post('/login', 'LoginController@login')->name('login');
    
    Route::post('/logout', 'LoginController@logout')->name('logout');

});


/**
 * Back Office Routes
 * 
 * @namespace { BO }
 */
Route::namespace('BO')->group(function () {

    /**
     * Account Routes
     * 
     * @name prefix { account. }
     * @URI prefix { /account }
     */
    Route::name('accounts.')->prefix('accounts')->group(function () {

        /**
         * @param string {account} maped to id_hashed
         */
        Route::get('/{account}', 'AccountController@index')->name('index');               
        Route::get('/{account}/settings', 'AccountController@setting')->name('settings');               
        Route::put('/{account}/settings', 'AccountController@update')->name('update');               

    });

    Route::resource('accounts.projects', 'ProjectController')->only(['index', 'show', 'store', 'edit', 'update', 'destroy']);
    Route::resource('accounts.projects.stages', 'StageController')->only(['store', 'update', 'destroy']);
    Route::resource('accounts.projects.stages.issues', 'IssueController')->only(['store', 'update', 'destroy']);
    Route::resource('accounts.posts', 'PostController');

});

