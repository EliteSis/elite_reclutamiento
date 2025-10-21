<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulante;
use App\Models\Postulacion;
use App\Models\Vacante;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Muestra el dashboard principal con estadísticas.
     */
    public function index()
    {
        // --- Fechas para cálculos ---
        $inicioMes = Carbon::now()->startOfMonth();
        $inicioSemana = Carbon::now()->startOfWeek();

        // --- 1. Tarjetas de Estadísticas (KPIs) ---
        $totalPostulantes = Postulante::count();
        $postulantesMes = Postulante::where('created_at', '>=', $inicioMes)->count();
        $postulantesSemana = Postulante::where('created_at', '>=', $inicioSemana)->count();

        // NUEVA LÍNEA: Obtenemos los postulantes de hoy
        $postulantesHoy = Postulante::where('created_at', '>=', Carbon::today())->count();

        // --- 2. Datos para Gráficos ---
        $postulantesPorMes = Postulante::selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes')
            ->toArray();

        $estadosPostulacion = Postulacion::selectRaw('estado, COUNT(*) as total')
            ->groupBy('estado')
            ->pluck('total', 'estado')
            ->toArray();

        // --- 3. Actividad Reciente ---
        $postulantesRecientes = Postulante::latest()->take(5)->get();
        $postulacionesRecientes = Postulacion::with('postulante', 'vacante')->latest()->take(5)->get();

        // --- 4. Postulantes Destacados ---
        $postulantesConMasPostulaciones = Postulante::withCount('postulaciones')
            ->orderBy('postulaciones_count', 'desc')
            ->take(3)
            ->get();

        return view('dashboard.index', compact(
            'totalPostulantes',
            'postulantesMes',
            'postulantesSemana',
            'postulantesHoy', // <-- AÑADE ESTA NUEVA VARIABLE
            // 'vacantesActivas',
            'postulantesPorMes',
            'estadosPostulacion',
            'postulantesRecientes',
            'postulacionesRecientes',
            'postulantesConMasPostulaciones'
        ));
    }
}