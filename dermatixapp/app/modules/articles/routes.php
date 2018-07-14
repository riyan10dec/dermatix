<?php
Route::bind('article', function ($value) {
    return App\Modules\Articles\Models\Article::where('id', $value)
        ->firstOrFail();
});
Route::group(
    array(
        'namespace' => 'App\Modules\Articles\Controllers',
        'prefix'    => 'admin',
    ),
    function () {
        Route::get('articles/{id}/delete', 'ArticleAdminController@destroy');
        Route::resource('articles', 'ArticleAdminController');
    }
);
Route::group(
    array(
        'namespace' => 'App\Modules\Articles\Controllers',
    ),
    function () {
        Route::get('talk-about-scar', 'ArticleController@index');
        Route::get('article-scar', 'ArticleController@articleScar');
        Route::get('article/{slug}', 'ArticleController@article');
    }
);