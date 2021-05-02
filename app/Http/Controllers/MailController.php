<?php

namespace App\Http\Controllers;

use App\Events\V1\MailEvent;
use App\Http\Requests\V1\MailRequest;
use App\Mail\V1\ContactMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(MailRequest $request)
    {
        Mail::to(config('mail.from.address'))
            ->send(new ContactMail($request));

        return $this->successResponse(
            __('mail.contact.sent')
        );
    }
}
