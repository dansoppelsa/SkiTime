<?php

/**
 * Public Facing (Non-Auth) Routes
 */
Route::get( '/' , 'PublicSiteController@home' );
Route::get( 'contact-us', 'PublicSiteController@contactUs' );
Route::get( 'our-sponsors', 'PublicSiteController@ourSponsors' );
Route::get( 'sign-up', 'PublicSiteController@signUp' );
Route::get( 'ticket', 'PublicSiteController@ticket' );
Route::get( 'download', 'PublicSiteController@download' );


/**
 * Auth Routes
 */
Route::get( 'login', 'AuthController@login' );
Route::post( 'login', 'AuthController@postLogin' );
Route::get( 'logout', 'AuthController@logout' );


/**
 * User Account Routes
 */
Route::group( [ 'prefix' => 'account' , 'before' => 'auth' ] , function()
{
    Route::get( '/' , 'AccountController@home' );
    Route::get( 'add-racer' , 'AccountController@addRacer' );
    Route::post( 'add-racer' , 'AccountController@postAddRacer' );
    Route::get( 'instructions' , 'AccountController@instructions' );

    // TODO: Add "ownership" filter for racer records
    Route::group( [ 'prefix' => 'racer' ] , function()
    {
        Route::get( '{racerSlug}' , function($racerSlug){

        } );
    });
});