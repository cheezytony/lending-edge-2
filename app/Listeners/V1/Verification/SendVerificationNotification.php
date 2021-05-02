<?php

namespace App\Listeners\V1\Verification;

use App\Notifications\V1\Verification\RequestNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendVerificationNotification
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
        $user->notify(new RequestNotification($verification));
    }
}
