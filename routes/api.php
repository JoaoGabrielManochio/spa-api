<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1'], function () {

    Route::get('/ping', function () {
        return response()->json(['now' => date('Ymd H:i:s')]);
    });

    Route::group(['prefix' => 'city'], function () {
        Route::get('', 'CityController@getCities');
        Route::get('/{id}', 'CityController@getCity');
        Route::put('/{id}', 'CityController@updateCity');
        Route::delete('/{id}', 'CityController@deleteCity');
        Route::post('', 'CityController@storeCity');

    });

    Route::group(['prefix' => 'campaign'], function () {
        Route::get('', 'CampaignController@getCampaigns');
        Route::get('/{id}', 'CampaignController@getCampaign');
        Route::put('/{id}', 'CampaignController@updateCampaign');
        Route::delete('/{id}', 'CampaignController@deleteCampaign');
        Route::post('', 'CampaignController@storeCampaign');
    });

    Route::group(['prefix' => 'city-group'], function () {
        Route::get('', 'CityGroupController@getCityGroups');
        Route::get('/{id}', 'CityGroupController@getCityGroup');
        Route::put('/{id}', 'CityGroupController@updateCityGroup');
        Route::delete('/{id}', 'CityGroupController@deleteCityGroup');
        Route::post('', 'CityGroupController@storeCityGroup');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('', 'ProductController@getProducts');
        Route::get('/{id}', 'ProductController@getProduct');
        Route::put('/{id}', 'ProductController@updateProduct');
        Route::delete('/{id}', 'ProductController@deleteProduct');
        Route::post('', 'ProductController@storeProduct');
    });

    Route::group(['prefix' => 'discount'], function () {
        Route::get('', 'DiscountController@getDiscounts');
        Route::get('/{id}', 'DiscountController@getDiscount');
        Route::put('/{id}', 'DiscountController@updateDiscount');
        Route::delete('/{id}', 'DiscountController@deleteDiscount');
        Route::post('', 'DiscountController@storeDiscount');
    });
});
