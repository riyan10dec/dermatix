<?php namespace App\Modules\Users\Filters;

use Request, Auth, Response, Redirect;

class AdminUsersFilter {
    public function auth()
    {
        if ( ! Request::is('admin/users/*'))
        {
            if (! Auth::check()) {
                if (Request::ajax()) {
                    return Response::make('Unauthorized', 401);
                }
                return Redirect::guest(route('admin.users.login'));
            }
        }

    }
}