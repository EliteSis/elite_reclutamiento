<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Postulante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    /**
     * Guardar documento para un postulante
     */

    public function index()
    {
        $documentos = Documento::with('postulante')->get();
        $postulantes = Postulante::all();
        return view('documentos.index', compact('documentos', 'postulantes'));
    }

    public function store(Request $request, Postulante $postulante)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'tipo_documento' => 'required|string|max:100',
        ]);

        $ruta = $request->file('archivo')
            ->store("{$postulante->id}", 'postulantes');

        Documento::create([
            'postulante_id' => $postulante->id,
            'nombre_archivo' => $request->file('archivo')->getClientOriginalName(),
            'tipo_documento' => $request->tipo_documento,
            'ruta' => $ruta,
            'formato' => $request->file('archivo')->extension(),
        ]);

        return back()->with('success', 'Documento cargado correctamente.');
    }

    /**
     * Eliminar un documento
     */
    public function destroy(Documento $documento)
    {
        Storage::disk('postulantes')->delete($documento->ruta);
        $documento->delete();

        return back()->with('success', 'Documento eliminado.');
    }
}
