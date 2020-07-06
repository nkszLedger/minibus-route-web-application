<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\User;
use App\Mail\UserForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    private function sendResetEmail($user)
    {
        Mail::to($user)->send(new UserForgotPassword($user));
    }

    private static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make(
            [
                'email' => $request->get('email'),
            ],
            [
                'email' => 'required',
            ]
        );  

        if ($validator->fails()) 
        {
            $errors = $validator->errors()->first();
            return view('auth.passwords.email', 
                        compact(['errors']));
        }
        if( count(User::where('email', 
            $request->get('email'))->get()) == 0)
        {
            $message = 'User email does not exist';
            return view('auth.passwords.email', 
                        compact(['message']));
        }
        
        /* Create Password Reset Token */
        DB::table('password_resets')->insert([
            'email' => $request->get('email'),
            'token' => $this->quickRandom(60),
            'created_at' => now()
        ]);

        $user = User::where('email', $request->get('email'))->first();

        /* Send email to user */
        $this->sendResetEmail($user);

        $message = 'Great! Please check your email to set your password';
        return view('auth.login', compact(['message']));

    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }
}
