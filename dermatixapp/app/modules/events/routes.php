<?php
Route::bind('event', function ($value) {
    return App\Modules\Events\Models\Event::where('id', $value)
        ->firstOrFail();
});
Route::group(
    array(
        'namespace' => 'App\Modules\Events\Controllers',
        'prefix'    => 'admin',
    ),
    function () {
        Route::get('events/{id}/delete', 'EventAdminController@destroy');
        Route::resource('events', 'EventAdminController');
    }
);

Route::group(
    array(
        'namespace' => 'App\Modules\Events\Controllers',
    ),
    function () {
        Route::get('news-event', 'EventController@index');
        Route::get('event/{slug}', 'EventController@event');
    }
);