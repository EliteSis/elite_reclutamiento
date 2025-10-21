<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    /**
     * Obtiene el conteo de notificaciones no leídas para el usuario autenticado.
     */
    public function getUnreadCount()
    {
        return response()->json([
            'count' => auth()->user()->unreadNotifications()->count()
        ]);
    }

    /**
     * Muestra la lista de todas las notificaciones del usuario.
     */
    public function index()
    {
        $notifications = auth()->user()->notifications()->latest()->paginate(10);
        return view('notifications.index', compact('notifications'));
    }

    /**
     * Marca una notificación específica como leída.
     */
    // app/Http/Controllers/NotificationController.php

    /**
     * Marca una notificación específica como leída y devuelve una respuesta JSON.
     */
    public function markAsRead(DatabaseNotification $notification)
    {
        if ($notification->notifiable_id == auth()->id()) {
            $notification->markAsRead();
            // Devolvemos una respuesta simple de éxito
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 403);
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    /**
     * Devuelve el HTML para la lista de notificaciones del dropdown.
     */
    public function getDropdownNotifications()
    {
        // La lógica ya está en la vista parcial, así que solo la renderizamos.
        // Pasamos una colección vacía para que la vista la maneje.
        return view('notifications._dropdown_list');
    }
}