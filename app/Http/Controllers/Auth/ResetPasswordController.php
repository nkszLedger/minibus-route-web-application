<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm(Request $request, $token)
    {
        //dd($token);
        return view('auth.passwords.reset', 
                    compact(['token']));
    }

    public function reset(Request $request)
    {
        $inputs = [
            'password' => $request->get('password'),
            'token' => $request->get('token'),
        ];
    
        $rules = [
            'token'    => 'required|unique:password_resets,token',
            'password' => [
                'required',
                'string',
                'min:8',             // must be at least 8 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ];
        
        $validator = Validator::make($inputs, $rules);

        if ($validator->fails()) 
        {
            $errors = $validator->errors()->first();
            return back()->withErrors($errors)
                        ->withInput();
        }
        else
        {
            $message = 'Great! Your password has been set. Please login';
            return view('login', compact(['success'=> $message]));
        }

    }
}
