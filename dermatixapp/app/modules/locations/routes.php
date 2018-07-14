<?php

Route::bind('location', function ($value) {
    return App\Modules\Locations\Models\Location::where('id', $value)
        ->firstOrFail();
});

Route::group(
    array(
        'namespace' => 'App\Modules\Locations\Controllers',
        'prefix'    => 'admin',
    ),
    function () {
        Route::get('locations/{id}/delete', 'LocationAdminController@destroy');
        Route::resource('locations', 'LocationAdminController');
    }
);

Route::group(
    array(
        'namespace' => 'App\Modules\Locations\Controllers',
    ),
    function () {
        Route::resource('where-to-find', 'LocationController@whereToFind');
    }
);