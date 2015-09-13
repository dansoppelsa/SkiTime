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

Route::post( 'users' , 'UsersController@store' );

Route::get( 'verify-account/{verificationCode}' , 'UsersController@verifyAccount' );

/**
 * User Account Routes
 */
Route::group( [ 'prefix' => 'account' , 'before' => 'auth' ] , function()
{
    Route::get( '/' , 'AccountController@home' );
    Route::get( 'add-racer' , 'AccountController@addRacer' );
    Route::post( 'add-racer' , 'AccountController@postAddRacer' );
    Route::get( 'instructions' , 'AccountController@instructions' );
    Route::get('edit-racer/{id}', 'RacersController@edit');
    Route::post('edit-racer/{id}', 'RacersController@update');

    Route::get('delete-racer/{id}', 'RacersController@destroy');

    // TODO: Add "ownership" filter for racer records
    Route::group( [ 'prefix' => 'racer' ] , function()
    {
        Route::get( '{racerId}' , 'RacersController@show');

        Route::get( '{racerId}/add-race' , 'RacesController@create');
        Route::post( '{racerId}/add-race' , 'RacesController@store');

        Route::get( '{racerId}/race/{raceId}' , 'RacesController@show');
        Route::post( '{racerId}/race/{raceId}' , 'RacesController@update');
    });
});


Route::any('payment-completed', function()
{
  $paymentStatus = Input::get('payment_status');

  if($paymentStatus !== 'Completed')
    return false;

  $userID = Input::get('custom');
  $user = \Times\Users\User::find($userID);
  $user->markAsPaid();
});





