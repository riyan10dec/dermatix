<?php
Route::bind('banner', function ($value) {
    return App\Modules\Banners\Models\Banner::where('id', $value)
        ->firstOrFail();
});
Route::group(
    array(
        'namespace' => 'App\Modules\Banners\Controllers',
        'prefix'    => 'admin',
    ),
    function () {
        Route::post('banners/{id}/delete', 'BannerAdminController@destroy');
        Route::resource('banners', 'BannerAdminController');
    }
);