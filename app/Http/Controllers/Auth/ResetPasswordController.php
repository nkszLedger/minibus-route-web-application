<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Mail\UserResetPassword;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    private function sendSuccessEmail($user)
    {
        Mail::to($user)->send(new UserResetPassword($user));
    }

    public function showResetForm(Request $request, $token)
    {
        /* Validate the token */
        $tokenData = DB::table('password_resets')
        ->where('token', $token)->first();

        /* Redirect the user back to the password 
            reset request form if the token is invalid */
        if (!$tokenData) 
        {    
            $message = 'Invalid token. Please contact Systems Admin';
            return view('auth.passwords.reset', 
                            compact(['message']));
        }
        else
        {
            return view('auth.passwords.reset', 
                    compact(['token']));
        }

    }

    public function reset(Request $request)
    {
        $inputs = [
            'password' => $request->get('password'),
            'confirm-password' => $request->get('confirm-password'),
        ];
    
        $rules = [
            'password' => [
                'required',
                'string',
                'required_with:confirm-password',
                'same:confirm-password',
                'min:8',             // must be at least 8 characters in length
                'max:20',           // must be at most 20 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'confirm-password' => 'required',
        ];
        
        $validator = Validator::make($inputs, $rules);

        if ($validator->fails()) 
        {
            $errors = $validator->errors()->first();

            return view('auth.passwords.reset')
                        ->withErrors($errors)
                        ->withInput();
        }
        else
        {
            $password = $request->get('password');
            
            /* Validate the token */
            $tokenData = DB::table('password_resets')
            ->where('token', $request->get('token'))->first();

            /* Redirect the user back to the password 
            reset request form if the token is invalid */
            if (!$tokenData) 
            {    
                $message = 'Invalid token';
                return view('auth.passwords.reset', 
                                compact(['message']));
            }

            $user = User::where('email', $tokenData->email)->first();

            /* Redirect the user back if the email is invalid */
            if (!$user) 
            {
                $message = 'Email not found';
                return view('auth.passwords.reset', 
                                compact(['message']));
            }

            /* Hash and update the new password */
            $update = array(
                'email_verified_at' => now(),
                'password' => Hash::make($password)
            );
            $user->update($update); 
            
            /* login the user immediately they change password successfully */
            /*Auth::login($user);*/
            
            /* Delete the token */
            DB::table('password_resets')->where('email', $user->email)
                                        ->delete();
            
            /* Send Email Reset Success Email */
            $this->sendSuccessEmail($user);
            
            $message = 'Great! Your password has been set. Please login';
            return view('auth.login', compact(['message']));

        }

    }
}
