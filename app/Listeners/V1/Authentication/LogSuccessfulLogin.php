<?php

namespace App\Listeners\V1\Authentication;

use App\Models\LoginAttempt;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;

        // Record autentication attempt
        LoginAttempt::create([
            'user_id' => $user->id,
            'status' => LoginAttempt::STATUS[1]
        ]);
    }
}
