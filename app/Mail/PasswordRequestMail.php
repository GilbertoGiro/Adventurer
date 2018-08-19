<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array
     */
    protected $data;

    /**
     * Create a new message instance.
     *
     * @param array $data
     * @return void
     */
    public function __construct(array $data)
    {
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
        
        return $this->subject('Adventurer - E-mail de Boas-Vindas')
            ->view('mail.password.request', compact('data'));
    }
}
