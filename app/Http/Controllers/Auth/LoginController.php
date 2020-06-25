<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectPath = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) 
        {
            $user = Auth::user();
            if($user->roles->pluck( 'name' )->contains('Data Capturer') )
            {
                return redirect()->intended('employees');
            }
            else
            {
                return redirect()->intended('users');
            }
        }
        else
        {
            $message = 'Incorrect password or email address';

            return back()->withErrors(['message' => $message ])
                            ->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout($request);

        return view('welcome');
    }

}
