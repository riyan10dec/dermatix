<?php namespace App\Modules\Users\Controllers;

use App\Modules\Main\Controllers\BaseAdminController;
use App\Modules\Users\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Teepluss\Theme\Facades\Theme;
use Input, Redirect;

class AdminUserController extends BaseAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->theme = Theme::uses('admin')->layout('auth');
    }

    public function login()
    {
        $this->setTitle('Login');
        if (Auth::check())
        {
            return Redirect::intended('admin');
        }
        return $this->theme->scope('login')->render();
    }

    public function doLogin()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'login'    => 'required', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // determine if user try to log with email or username
            $credentials = ['login' => Input::get('login'), 'password' => Input::get('password')];
            if (str_contains($credentials['login'], '@')) {
                $credentials['email'] = $credentials['login'];
            } else {
                $credentials['username'] = $credentials['login'];
            }
            unset($credentials['login']);
            if (Auth::attempt($credentials, true)) {
                $user = User::find(Auth::user()->id);
                $user->last_login = date('Y-m-d H:i:s', time());
                $user->save();
                return Redirect::intended('admin');
            }

            return Redirect::back()->with('error', 'Login Failed :(');
        }
    }

    public function logout()
    {
        if(Auth::logout()){
            return Redirect::route('admin.users.login');
        }
    }
}