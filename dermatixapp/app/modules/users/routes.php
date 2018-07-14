<?php
Route::group(
    array(
        'namespace' => 'App\Modules\Users\Controllers',
        'prefix'    => 'admin',
    ),
    function () {
        Route::get('users/login', ['as'=>'admin.users.login', 'uses'=>'AdminUserController@login']);
        Route::post('users/login', 'AdminUserController@doLogin');
        Route::get('users/logout',['as'=>'admin.users.logout', 'uses'=>'AdminUserController@logout']);
    }
);