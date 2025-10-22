<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\PostulacionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\NotificationController;


// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta principal (redirige al login si no está autenticado)
Route::get('/', function () {
    return redirect()->route('login');
});


// Rutas públicas para la página web y postulación
Route::get('/postular', [PublicController::class, 'showForm'])->name('public.postulacion.form');
Route::post('/postular', [PublicController::class, 'storeApplication'])->name('public.postulacion.store');


// Rutas protegidas (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // --- RUTAS ESPECÍFICAS DE POSTULANTES (VAN PRIMERO) ---
    Route::get('/postulantes/filtrar', [PostulanteController::class, 'filtrar'])->name('postulantes.filtrar');

    Route::get('postulantes/{postulante}/descargar-zip', [DocumentoController::class, 'descargarZip'])->name('postulantes.descargarZip');
    Route::get('postulantes/{postulante}/descargar-documentos', [PostulanteController::class, 'descargarDocumentos'])->name('postulantes.descargarDocumentos');
    Route::get('postulantes/{postulante}/descargar-ficha', [PostulanteController::class, 'descargarFicha'])
        ->name('postulantes.descargarFicha');

    // --- RUTAS CRUD PRINCIPALES (VAN DESPUÉS) ---
    Route::resource('postulantes', PostulanteController::class);
    Route::resource('documentos', DocumentoController::class);
    Route::resource('postulaciones', PostulacionController::class);

    // Cambiar estado de una postulación (ej. por AJAX)
    Route::post('postulaciones/{postulacion}/cambiar-estado', [PostulacionController::class, 'cambiarEstado'])->name('postulaciones.cambiarEstado');

    // Exportar reportes
    Route::get('reportes/postulantes/pdf', [PostulanteController::class, 'exportPdf'])->name('postulantes.exportPdf');
    Route::get('reportes/postulantes/excel', [PostulanteController::class, 'exportExcel'])->name('postulantes.exportExcel');


    Route::get('/sucamec', function () {
        return view('sucamec.index');
    })->name('sucamec.index');

    Route::get('/verificacion_policial', function () {
        return view('verificacion_policial.index');
    })->name('verificacion_policial.index');

    Route::post('/postulantes/descargar-todos', [PostulanteController::class, 'descargarTodosVisibles'])
        ->name('postulantes.descargarTodos');


    // Rutas para notificaciones
    Route::get('/notificaciones/count', [App\Http\Controllers\NotificationController::class, 'getUnreadCount'])->name('notifications.count');
    Route::get('/notificaciones', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notificaciones/{notification}/read', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.read');

    Route::post('/notificaciones/marcar-todas-leidas', [App\Http\Controllers\NotificationController::class, 'markAllAsRead'])->name('notifications.markAllRead');

    Route::get('/notificaciones/dropdown', [App\Http\Controllers\NotificationController::class, 'getDropdownNotifications'])->name('notifications.dropdown');


    Route::post('/postulantes/{postulante}/subir-a-drive', [PostulanteController::class, 'subirDocumentosDrive'])->name('postulantes.subirDocumentosDrive');

});


