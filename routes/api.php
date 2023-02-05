<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Application
    Route::post('applications/media', 'ApplicationApiController@storeMedia')->name('applications.storeMedia');
    Route::apiResource('applications', 'ApplicationApiController');

    // Ward
    Route::apiResource('wards', 'WardApiController');
});
