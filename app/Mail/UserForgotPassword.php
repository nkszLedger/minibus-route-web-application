<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The user instance.
     *
     * @var user
     */
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = DB::table('password_resets')
        ->where('email', $this->user->email)->first();

        $subject = 'Minibus Taxi Reg System: Password Reset';
        $userfullname = $this->user->name.' '.$this->user->surname;
        $link = config('app.url').'/password/reset/'.$token->token;
        $title = 'You have requested for a password reset. Please contact us 
        if you did not initiate this action. Please click below to set your password.';
        $button_text = 'Reset';

        //env('MAIL_FROM_ADDRESS') hardcode until .env starts working!!!!
        $mail_from_address = "ptrms@csir.co.za"; 

        return $this->from($mail_from_address)
                    ->subject($subject)
                    ->view('emails.email_notification',
                        compact(['link', 'title', 
                                'userfullname', 'button_text']) )
                    ->with('user', $this->user);
    }
}
