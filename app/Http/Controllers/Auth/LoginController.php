<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Presenters\UsersPresenter;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use JWTAuth;
use Symfony\Component\HttpKernel\Exception\HttpException;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';


    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'auth']);
    }


    public function login(Request $request, UsersPresenter $userPresenter)
    {
        $credentials = $request->only('login', 'password');

        $token = JWTAuth::attempt($credentials);

        if (! $token) {
            throw new HttpException(403, 'Некорректный логин или пароль');
        }

        return $this->response($userPresenter->auth(auth()->user()))
            ->header('Api-Token', $token);
    }


    public function auth(UsersPresenter $userPresenter)
    {
        return $this->response($userPresenter->auth(auth()->user()));
    }
}
