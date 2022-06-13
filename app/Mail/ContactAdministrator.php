<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactAdministrator extends Mailable
{
    use Queueable, SerializesModels;

    protected $message;
    protected $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg, $email)
    {
        $this->message = $msg;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->email)
            ->view('client.partials.sign-partials.email')
            ->with(['msg' => $this->message]);
    }
}
