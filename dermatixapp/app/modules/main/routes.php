<?php

Route::group(
    array(
        'namespace' => 'App\Modules\Main\Controllers',
        'prefix'    => 'admin',
    ),
    function () {
        Route::resource('/', 'MainAdminController');
    }
);

Route::group(
    array(
        'namespace' => 'App\Modules\Main\Controllers',
    ),
    function () {
        Route::get('/', 'MainController@index');
        Route::get('identify-dermatix', 'MainController@identifyDermatix');
        Route::get('clinical-evidence', 'MainController@clinicalEvidence');
        Route::get('event', 'MainController@event');
        Route::get('upcoming-event', 'MainController@upcomingEvent');
        Route::get('press-conference', 'MainController@pressConference');
        Route::get('luka-bakar-mengintai', 'MainController@lukaBakar');
        Route::get('menu-atas', 'MainController@menuAtas');
        Route::get('search', 'MainController@search');
    }
);