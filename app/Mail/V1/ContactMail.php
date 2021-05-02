<?php

namespace App\Mail\V1;

use App\Http\Requests\V1\MailRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var \App\Http\Requests\V1\MailRequest;
     */
    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(MailRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact')
            ->subject($this->request->input('subject'))
            ->from($this->request->input('email'), $this->request->input('name'));
    }
}
