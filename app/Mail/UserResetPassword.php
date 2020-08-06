<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The user instance.
     *
     * @var user
     */
    protected $user;

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
        $subject = 'Minibus Taxi Reg System: Password Reset Successful';
        $userfullname = $this->user->name.' '. $this->user->surname;
        $link = config('app.url');
        $title = 'Thank you for signing up with Minibus Web Admin! 
        Your password has been set. Please click below to dive into your account';
        $button_text = 'Login';

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
