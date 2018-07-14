<?php
/**
 * Register routes filter classes
 */
Route::filter('admin.user.auth', 'App\Modules\Users\Filters\AdminUsersFilter@auth');
/**
 * Route filter admin side
 */
Route::when('admin',   'admin.user.auth');
Route::when('admin/*',   'admin.user.auth');

Route::get('/scarpersonality', function() {
  return Redirect::to('/scarpersonality/');
});
Route::get('/scarpersonality/saveform', function() {
  return Redirect::to('/scarpersonality/saveform');
});

Route::get('/scarpersonality/sharefb', function() {
  return Redirect::to('/scarpersonality/sharefb');
});
