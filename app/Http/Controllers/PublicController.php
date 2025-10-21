<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// ... imports
use App\Models\User;
use App\Notifications\NuevaPostulacionNotification;
class PublicController extends Controller
{
    /**
     * Muestra el formulario de postulación público.
     */
    public function showForm()
    {
        // Aquí puedes cargar información de la empresa si la necesitas en la vista
        return view('public.postulacion');
    }

    /**
     * Procesa y guarda la nueva postulación.
     */
    public function storeApplication(Request $request)
    {
        // 1. Validación de los datos del formulario
        $request->validate([
            'apellidos_nombres' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:postulantes,dni',
            'telefono' => 'required|string|max:20',
            'ciudad_postular' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date|before:today',
            'detalle_experiencia' => 'required|string',
        ]);

        // 2. Creación del nuevo postulante en la base de datos
        $postulante = Postulante::create([
            'apellidos_nombres' => $request->apellidos_nombres,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'ciudad_postular' => $request->ciudad_postular,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'detalle_experiencia' => $request->detalle_experiencia,
            // Asumimos que tienes un campo 'estado' en tu tabla
            'estado' => 'nuevo', // O el estado inicial que prefieras
        ]);

        // 3. Enviar notificación a los administradores (lo haremos en el paso 3)
                // 3. Enviar notificación a los administradores
        $adminUser = User::find(1); // <-- Busca un usuario admin. ¡Ajusta esto según tu lógica!
        if ($adminUser) {
            $adminUser->notify(new NuevaPostulacionNotification($postulante));
        }

        // 4. Redireccionar de vuelta con un mensaje de éxito
        return redirect()->route('public.postulacion.form')
            ->with('success', '¡Tu postulación ha sido enviada correctamente! Nos pondremos en contacto pronto.');
    }
}