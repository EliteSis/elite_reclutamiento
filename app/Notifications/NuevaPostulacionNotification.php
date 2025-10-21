<?php

namespace App\Notifications;

use App\Models\Postulante;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NuevaPostulacionNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $postulante;

    public function __construct(Postulante $postulante)
    {
        $this->postulante = $postulante;
    }

    // Canal por el cual se enviará la notificación (base de datos)
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    // Formato de la notificación para la base de datos
    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => 'Nueva Postulación',
            'message' => 'Hay una nueva postulación de ' . $this->postulante->apellidos_nombres, 'para la' . $this->postulante->ciudad_postular,
            'url' => route('postulantes.show', $this->postulante->id), // Link para ver al postulante
            'postulante_id' => $this->postulante->id,
        ];
    }
}