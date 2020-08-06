<?php

namespace App\Console\Commands;

use App\User;
use Laravel\Passport\Client;
use Illuminate\Console\Command;
use Illuminate\Foundation\Auth\ResetsPasswords;

class RemoveNonVerifiedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:non-verified-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove all non verified users ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $all_non_verified_users = 
                User::where('email_verified_at', null)->get();

        foreach($all_non_verified_users as $user)
        {
            $oauth_client = Client::where('user_id', $user->id);
            $oauth_client->delete();
            ResetsPasswords::where('user_id', $user->id)->delete();
            $user->forceDelete();
        }

    }
}
