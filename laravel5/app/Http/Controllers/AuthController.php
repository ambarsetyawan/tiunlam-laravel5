<?php namespace tiunlam\Http\Controllers;

use tiunlam\Http\Requests;
use tiunlam\Http\Controllers\Controller;

use Request;
use Auth;
use Redirect;
use Validator;
use Hash;
use Lang;

use tiunlam\User;

class AuthController extends Controller {

	public function showlogin()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function simpan()
    {
        $rules = array(
            'nama'     => 'required|alpha_num|min:4',
            'username' => 'required|alpha_num|min:4',
            'email'    => 'required|email|unique:users',
            'password' => 'required|alphaNum|min:4',
            'password_confirmation' => 'required|same:password'
        );

        $validator = Validator::make(Request::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('register')
                ->withErrors($validator)
                ->withRequest(Request::except('password'));
        } else {

            $datauser = array(
                'nama'      => Request::get('nama'),
                'username'  => Request::get('username'),
                'email'     => Request::get('email'),
                'password'  => Hash::make(Request::get('password')),
            );
        }

            if (User::create($datauser)) {
                return Redirect::route('dashboard');
            }
            else {
                return Redirect::route('register');
            }
    }

    public function login()
    {
        $remember = (Request::get('remember')) ? true : false;

        $rules = array(
            'username' => 'required',
            'password' => 'required|alphaNum|min:4'
        );

        $validator = Validator::make(Request::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('login')
                ->withErrors($validator)
                ->withRequest(Request::except('password'));
        } else {

            $datauser = array(
                'username'  => Request::get('username'),
                'password'  => Request::get('password')
            );

            if (Auth::attempt($datauser, $remember)) {
                return Redirect::route('dashboard');
            }
            else {
                return Redirect::route('login')
                ->withErrors(array('password' => Lang::get('validation.login_gagal')))
                ->withRequest(Request::except('password'));
            }
        }
    }

    public function logout()
    {
    Auth::logout();
    return Redirect::route('homepage');
    }

}
