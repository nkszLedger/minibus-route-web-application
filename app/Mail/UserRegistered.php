<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistered extends Mailable
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
        //Get the token just created above
        $token = DB::table('password_resets')
        ->where('email', $this->user->email)->first();
        $userfullname = $this->user->name.' '. $this->user->surname;
        $link = config('app.url').'/password/reset/'.$token->token;
             
        return $this->from(env('MAIL_FROM_ADDRESS'))
                    ->subject('Minibus Sys User Registration')
                    ->view('emails.email_welcome', 
                        compact(['link',
                                'userfullname']) )
                    ->with('user', $this->user);
    }
}
