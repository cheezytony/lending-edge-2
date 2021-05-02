<?php

namespace App\Listeners\V1\Authentication;

use App\Models\LoginAttempt;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogFailedLogin
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
        LoginAttempt::create([
            'credentials' => json_encode($event->credentials),
            'status' => LoginAttempt::STATUS[0]
        ]);
    }
}
