<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationMail extends Mailable
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
        $notification = $this->data['notification'];
        return $this->subject('Notificação Adventurer - ' . $this->data['event']->theme->titulo)
            ->view('mail.notification.notify', compact('notification'));
    }
}
