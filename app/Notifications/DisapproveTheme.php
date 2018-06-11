<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DisapproveTheme extends Notification
{
    use Queueable;

    /**
     * @var array
     */
    protected $data;

    /**
     * DisapproveTheme constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'Sua solicitação de Tema (<b>' . $this->data['titulo'] . '</b>) foi reprovada. Em caso de dúvida, contatar o coordenador de curso.',
            'issuer'  => $this->data['nmusuario']
        ];
    }
}
