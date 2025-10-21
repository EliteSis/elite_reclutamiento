<?php

namespace App\Http\Controllers;

use App\Models\Postulacion;
use App\Models\Postulante;
use Illuminate\Http\Request;

class PostulacionController extends Controller
{
    public function index()
    {
        $postulaciones = Postulacion::with('postulante')->get();
        $postulantes = Postulante::all();
        return view('postulaciones.index', compact('postulaciones', 'postulantes'));
    }

    public function store(Request $request, Postulante $postulante)
    {
        $request->validate([
            'fecha_postulacion' => 'required|date',
            'estado' => 'required|in:nuevo,en_evaluacion,aceptado,rechazado,repostulacion',
            'observaciones' => 'nullable|string',
        ]);

        Postulacion::create([
            'postulante_id' => $postulante->id,
            'fecha_postulacion' => $request->fecha_postulacion,
            'estado' => $request->estado,
            'observaciones' => $request->observaciones,
        ]);

        return back()->with('success', 'Postulación registrada.');
    }

    public function update(Request $request, Postulacion $postulacion)
    {
        $request->validate([
            'estado' => 'required|in:nuevo,en_evaluacion,aceptado,rechazado,repostulacion',
            'observaciones' => 'nullable|string',
        ]);

        $postulacion->update($request->only('estado', 'observaciones'));

        return back()->with('success', 'Estado de la postulación actualizado.');
    }
}
