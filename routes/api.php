<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1'], function () {

    Route::get('/ping', function () {
        return response()->json(['now' => date('Ymd H:i:s')]);
    });

    // Route::post('token', 'API\UserController@getToken');

    // Route::group(['middleware' => ['auth:api']], function () {
        Route::get('city', 'API\CityController@getCities');
        Route::get('doctors', 'API\DoctorController@index');
    // });
});
