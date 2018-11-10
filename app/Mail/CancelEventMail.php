<?php

namespace App\Mail;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CancelEventMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Event
     */
    protected $event;

    /**
     * Create a new message instance.
     *
     * @param Event $event
     * @return void
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $event = $this->event;
        return $this->subject('Adventurer - Cancelamento de Evento')
            ->view('mail.event.cancel', compact('event'));
    }
}
