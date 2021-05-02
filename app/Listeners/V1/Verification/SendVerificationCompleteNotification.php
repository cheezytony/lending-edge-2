<?php

namespace App\Listeners\V1\Verification;

use App\Notifications\V1\Verification\CompletedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendVerificationCompleteNotification
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
        $verification = $event->verification;
        $user = $event->user;
        $user->notify(new CompletedNotification($verification));
    }
}
