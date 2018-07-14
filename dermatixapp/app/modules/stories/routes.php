<?php
Route::bind('story', function ($value) {
    return App\Modules\Stories\Models\Story::where('id', $value)
        ->firstOrFail();
});
Route::group(
    array(
        'namespace' => 'App\Modules\Stories\Controllers',
        'prefix'    => 'admin',
    ),
    function () {
        Route::get('stories/{id}/delete', 'StoryAdminController@destroy');
        Route::resource('stories', 'StoryAdminController');
    }
);

Route::group(
    array(
        'namespace' => 'App\Modules\Stories\Controllers',
    ),
    function () {
        Route::get('scar-stories', 'StoryController@scarStories');
        Route::get('story/{slug}', 'StoryController@story');
        Route::post('testi-user', 'StoryController@store');
    }
);
