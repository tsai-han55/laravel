<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return 123;
});

Route::get('/page1', function () {
    return 'page1';
});

Route::get('/page2', function () {
    return 'page2';
});

 Route::get('/user/auth/login', 
             'App\Http\Controllers\UserAuthController@Login');

 Route::get('/user/auth/search/{user_id}', 
  'App\Http\Controllers\UserAuthController@search');

 Route::group(['prefix' => 'user'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::get(
            'login', 
            'App\Http\Controllers\UserAuthController@Login'
        );
//         Route::get(
//             'search/{user_id}', 
//  'App\Http\Controllers\UserAuthController@search'
//         );
        Route::get(
            'signup', 
            'App\Http\Controllers\UserAuthController@signupPage'
        );

        Route::post(
        'signup', 
        'App\Http\Controllers\UserAuthController@signupProcess');

        Route::get(
            'signin',
            'App\Http\Controllers\UserAuthController@SignInPage'
        );
        Route::post(
            'signin',
            'App\Http\Controllers\UserAuthController@SignInProcess'
        );
        Route::get(
            'signout',
            'App\Http\Controllers\UserAuthController@SignOut'
        );
        Route::get(
            'signout',
            'App\Http\Controllers\UserAuthController@SignOut'
        );
    });
    
    
});
Route::group(['prefix' => 'merchandise'], function () {
    Route::get(
        'create',
        'App\Http\Controllers\MerchandiseController@MerchandiseCreateProcess'
    );
    
    Route::get(
        '{merchandise_id}/edit',
        'App\Http\Controllers\MerchandiseController@MerchandiseEditPage'
    );
    Route::post(
        '{merchandise_id}/edit',
        'App\Http\Controllers\MerchandiseController@MerchandiseEditProcess'
    );
});
