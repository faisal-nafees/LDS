<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $data)
    {
        $this->details = $details;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        return $this->subject('Mail from mdfcabinatedrawers.com')
            ->view('email.myTestMail', compact('data'));
    }
}
