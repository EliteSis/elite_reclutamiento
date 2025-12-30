<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Notifications\NuevaPostulacionNotification;
use App\Mail\ContactoMail;
use App\Mail\PostulacionMail;
use App\Mail\CotizacionMail;

class PublicController extends Controller
{
    /**
     * Muestra el formulario de postulación público.
     */
    public function showForm()
    {
        return view('public.postulacion');
    }

    /**
     * Procesa y guarda la nueva postulación.
     */
    public function storeApplication(Request $request)
    {
        $request->validate([
            'apellidos_nombres' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:postulantes,dni',
            'telefono' => 'required|string|max:20',
            'ciudad_postular' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date|before:today',
            'detalle_experiencia' => 'required|string',
        ]);

        $postulante = Postulante::create([
            'apellidos_nombres' => $request->apellidos_nombres,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'ciudad_postular' => $request->ciudad_postular,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'detalle_experiencia' => $request->detalle_experiencia,
            'estado' => 'nuevo',
        ]);

        $adminUser = User::find(1);
        if ($adminUser) {
            $adminUser->notify(new NuevaPostulacionNotification($postulante));
        }

        return redirect()->route('public.postulacion.form')
            ->with('success', '¡Tu postulación ha sido enviada correctamente! Nos pondremos en contacto pronto.');
    }

    /**
     * Muestra la página del blog
     */
    public function blog()
    {
        $posts = [
            [
                'title' => 'Noticias de Seguridad',
                'content' => 'Últimas actualizaciones sobre seguridad y tecnología...',
                'date' => '2023-12-01'
            ],
            [
                'title' => 'Ofertas Laborales Disponibles',
                'content' => 'Nuevas oportunidades de empleo en nuestro equipo...',
                'date' => '2023-12-05'
            ]
        ];
        return view('public.blog', compact('posts'));
    }

    /**
     * Muestra la página de contacto
     */
    public function contacto()
    {
        return view('public.contacto');
    }

    /**
     * Muestra la página de cotización
     */
    public function cotiza()
    {
        return view('public.cotiza');
    }

    /**
     * Muestra la página de nosotros
     */
    public function nosotros()
    {
        return view('public.nosotros');
    }

    /**
     * Muestra la página de servicios
     */
    public function servicios()
    {
        $servicios = [
            [
                'title' => 'Vigilancia Privada',
                'description' => 'Protección 24/7 para residencias y negocioss',
                'image' => 'https://picsum.photos/seed/vigilancia/400/300.jpg'
            ],
            [
                'title' => 'Seguridad Corporativa',
                'description' => 'Soluciones integrales para empresas',
                'image' => 'https://picsum.photos/seed/corporativa/400/300.jpg'
            ],
            [
                'title' => 'Seguridad Residencial',
                'description' => 'Protección para tu hogar y familia',
                'image' => 'https://picsum.photos/seed/residencial/400/300.jpg'
            ]
        ];
        return view('public.servicios', compact('servicios'));
    }

    /**
     * Guarda la cotización
     */
    public function storeCotizacion(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'mensaje' => 'required|string'
        ]);

        // Mail::to('ventas@seguridad.com')->send(new CotizacionMail($request->all()));

        return redirect()->route('public.cotiza')->with('success', 'Tu mensaje ha sido enviado correctamente.');
    }
}