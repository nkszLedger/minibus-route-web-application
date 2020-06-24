<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make([ 
            'email' => 'required|email|unique:users'
        ]);

        if ($validator->fails()) 
        { 
            $errors = $validator->errors()->first();
            return back()->withErrors($errors)
                        ->withInput();
        }
        else
        {
            if( $user = User::where('email', $request->input('email') )->first() )
            {
                $token = app(Illuminate\Auth\Passwords\PasswordBroker::class)->createToken($user);

                DB::table(config('password_resets'))->insert([
                    'email' => $user->email, 
                    'token' => $token
                ]);

                Mail::q([
                    'to'      => $user->email,
                    'subject' => 'Your Password Reset Link',
                    'view'    => config('auth.passwords.users.email'),
                    'view_data' => [
                        'token' => $token, 
                        'user'  => $user
                    ]
                ]);
            }
        }
        
        /* Send email to user */

    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }
}
