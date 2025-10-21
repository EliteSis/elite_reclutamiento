@extends('layouts.app')
@section('title', 'Postulantes')

@section('content')
    <div class="container-fluid py-4">
        <!-- Header Section -->
        <header class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-1 fw-bold text-dark">
                            <i class="bi bi-people-fill text-primary me-2" aria-hidden="true"></i>
                            Gestión de Postulantes
                        </h1>
                        <p class="text-muted mb-0">Administra toda la información de los postulantes</p>
                    </div>

                    <a href="{{ route('postulantes.create') }}" class="btn btn-primary btn-lg shadow-sm hover-lift" aria-label="Agregar nuevo postulante">
                        <i class="bi bi-plus-circle me-2" aria-hidden="true"></i> Nuevo Postulante
                    </a>
                </div>
            </div>
        </header>

        <!-- Stats Cards -->
        <section class="row mb-4" aria-label="Estadísticas de postulantes">
            <!-- Card Total Postulantes -->
            <div class="col-md-2 mb-3">
                <div class="card border-0 shadow-sm hover-lift h-100 filter-card" 
                    data-estado="todos" 
                    style="cursor: pointer;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1 small">Total Postulantes</p>
                                <h3 class="mb-0 fw-bold">{{ $postulantes->count() }}</h3>
                            </div>
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                                style="width: 50px; height: 50px;" aria-hidden="true">
                                <i class="bi bi-people fs-4 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Nuevos -->
            <div class="col-md-2 mb-3">
                <div class="card border-0 shadow-sm hover-lift h-100 filter-card" 
                    data-estado="nuevo" 
                    style="cursor: pointer;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1 small">Nuevos</p>
                                <h3 class="mb-0 fw-bold">{{ $estadisticasEstados['nuevo'] }}</h3>
                            </div>
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                                style="width: 50px; height: 50px;" aria-hidden="true">
                                <i class="bi bi-person-plus fs-4 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card En Evaluación -->
            <div class="col-md-2 mb-3">
                <div class="card border-0 shadow-sm hover-lift h-100 filter-card" 
                    data-estado="evaluacion" 
                    style="cursor: pointer;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1 small">En Evaluación</p>
                                <h3 class="mb-0 fw-bold">{{ $estadisticasEstados['evaluacion'] }}</h3>
                            </div>
                            <div class="rounded-circle bg-warning bg-opacity-10 d-flex align-items-center justify-content-center"
                                style="width: 50px; height: 50px;" aria-hidden="true">
                                <i class="bi bi-hourglass-split fs-4 text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Aceptados -->
            <div class="col-md-2 mb-3">
                <div class="card border-0 shadow-sm hover-lift h-100 filter-card" 
                    data-estado="aceptado" 
                    style="cursor: pointer;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1 small">Aceptados</p>
                                <h3 class="mb-0 fw-bold">{{ $estadisticasEstados['aceptado'] }}</h3>
                            </div>
                            <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center"
                                style="width: 50px; height: 50px;" aria-hidden="true">
                                <i class="bi bi-check-circle fs-4 text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Rechazados -->
            <div class="col-md-2 mb-3">
                <div class="card border-0 shadow-sm hover-lift h-100 filter-card" 
                    data-estado="rechazado" 
                    style="cursor: pointer;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1 small">Rechazados</p>
                                <h3 class="mb-0 fw-bold">{{ $estadisticasEstados['rechazado'] }}</h3>
                            </div>
                            <div class="rounded-circle bg-danger bg-opacity-10 d-flex align-items-center justify-content-center"
                                style="width: 50px; height: 50px;" aria-hidden="true">
                                <i class="bi bi-x-circle fs-4 text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Re-postulación -->
            <div class="col-md-2 mb-3">
                <div class="card border-0 shadow-sm hover-lift h-100 filter-card" 
                    data-estado="repostulacion" 
                    style="cursor: pointer;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1 small">Re-postulación</p>
                                <h3 class="mb-0 fw-bold">{{ $estadisticasEstados['repostulacion'] }}</h3>
                            </div>
                            <div class="rounded-circle bg-info bg-opacity-10 d-flex align-items-center justify-content-center"
                                style="width: 50px; height: 50px;" aria-hidden="true">
                                <i class="bi bi-arrow-repeat fs-4 text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Table Card -->
        <main class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 py-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="mb-0 fw-semibold">Lista de Postulantes</h2>
                    </div>
                    <div class="col-auto">
                        <div class="input-group rounded-pill shadow-sm overflow-hidden">
                            <span class="input-group-text bg-light border-0">
                                <i class="bi bi-search" aria-hidden="true"></i>
                            </span>
                            <input type="text" class="form-control border-0 bg-light" id="searchInput"
                                placeholder="Buscar postulante..." aria-label="Buscar postulante" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-auto">
                        <button id="btnDescargarTodos" class="btn btn-success" title="Descargar documentos de todos los postulantes visibles">
                            <i class="bi bi-download"></i> Descargar
                        </button>
                    </div>

                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="postulantesTable">
                        <thead class="bg-light">
                            <tr>
                                <!-- 1. Añade la clase "col-name" aquí -->
                                <th class="px-4 py-3 text-uppercase small fw-semibold text-muted col-name" scope="col">Apellidos y Nombres</th>
                                <th class="px-4 py-3 text-uppercase small fw-semibold text-muted" scope="col">DNI</th>
                                <th class="px-4 py-3 text-uppercase small fw-semibold text-muted" scope="col">Contacto</th>
                                <th class="px-4 py-3 text-uppercase small fw-semibold text-muted" scope="col">Estado</th>
                                <th class="px-4 py-3 text-uppercase small fw-semibold text-muted" scope="col">Fecha Postulación</th>
                                <th class="px-4 py-3 text-uppercase small fw-semibold text-muted text-center" scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @forelse($postulantes as $postulante)
                                <tr class="table-row-item" data-id="{{ $postulante->id }}">
                                    <td class="px-4 py-3 col-name">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle me-3" aria-hidden="true">
                                                {{ strtoupper(substr($postulante->apellidos_nombres, 0, 2)) }}
                                            </div>
                                            <div class="overflow-hidden">
                                                <p class="mb-0 fw-semibold text-dark">{{ $postulante->apellidos_nombres }}</p>
                                                <!-- 3. Añade "text-truncate d-block" y un "title" aquí -->
                                                <small class="text-muted text-truncate d-block"
                                                    title="{{ $postulante->ciudad_postular ?: 'Sin especificar' }}">
                                                    {{ $postulante->ciudad_postular ?: 'Sin especificar' }}
                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="badge bg-light text-dark border">{{ $postulante->dni }}</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div>
                                            <p class="mb-1 small">
                                                <i class="bi bi-envelope me-2 text-primary" aria-hidden="true"></i>
                                                <a href="mailto:{{ $postulante->email }}" class="text-decoration-none">
                                                    {{ $postulante->email }}
                                                </a>
                                            </p>
                                            <p class="mb-0 small">
                                                <i class="bi bi-telephone me-2 text-success" aria-hidden="true"></i>
                                                @if($postulante->telefono)
                                                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $postulante->telefono) }}"
                                                        target="_blank" class="text-success text-decoration-none"
                                                        aria-label="Contactar por WhatsApp a {{ $postulante->telefono }}">
                                                        {{ $postulante->telefono }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </p>

                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        @if($postulante->estado)
                                            <span class="badge 
                                                @switch($postulante->estado)
                                                    @case('nuevo') bg-primary @break
                                                    @case('en evaluación') bg-warning text-dark @break
                                                    @case('aceptado') bg-success @break
                                                    @case('rechazado') bg-danger @break
                                                    @case('re-postulación') bg-info text-dark @break
                                                    @default bg-secondary
                                                @endswitch">
                                                {{ ucfirst($postulante->estado) }}
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">Sin estado</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="small text-muted">
                                            {{ $postulante->created_at ? $postulante->created_at->format('d/m/Y') : 'N/A' }}
                                        </span>
                                    </td>


                                    <td class="px-4 py-3 text-center">
                                        <div class="action-buttons" role="group"
                                            aria-label="Acciones para {{ $postulante->apellidos_nombres }}">
                                            <!-- Ver detalles -->
                                            <a href="{{ route('postulantes.show', $postulante->id) }}"
                                                class="action-btn action-btn-info"
                                                title="Ver detalles de {{ $postulante->apellidos_nombres }}"
                                                aria-label="Ver detalles de {{ $postulante->apellidos_nombres }}">
                                                <i class="bi bi-eye" aria-hidden="true"></i>
                                            </a>

                                            <!-- Editar -->
                                            <a href="{{ route('postulantes.edit', $postulante->id) }}"
                                                class="action-btn action-btn-warning"
                                                title="Editar a {{ $postulante->apellidos_nombres }}"
                                                aria-label="Editar a {{ $postulante->apellidos_nombres }}">
                                                <i class="bi bi-pencil" aria-hidden="true"></i>
                                            </a>

                                            <!-- Eliminar -->
                                            <button class="action-btn action-btn-danger btn-delete"
                                                title="Eliminar a {{ $postulante->apellidos_nombres }}"
                                                aria-label="Eliminar a {{ $postulante->apellidos_nombres }}"
                                                data-id="{{ $postulante->id }}" data-name="{{ $postulante->apellidos_nombres }}"
                                                data-bs-toggle="modal" data-bs-target="#modalDelete">
                                                <i class="bi bi-trash" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5"> <!-- ¡CORREGIDO! -->
                                        <i class="bi bi-inbox fs-1 text-muted d-block mb-3" aria-hidden="true"></i>
                                        <p class="text-muted mb-0">No hay postulantes registrados</p>
                                        <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#modalCreate">
                                            <i class="bi bi-plus-circle me-2" aria-hidden="true"></i>Registrar primer postulante
                                        </button>
                                    </td>
                                </tr>
                            @endempty
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>

    {{-- Modal para eliminar un postulante--}}
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <form id="formDelete" method="POST" action="">
                    @csrf @method('DELETE')
                    <div class="modal-header bg-danger text-white border-0">
                        <h5 class="modal-title" id="modalDeleteLabel">
                            <i class="bi bi-exclamation-triangle me-2" aria-hidden="true"></i>Confirmar Eliminación
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body p-4 text-center">
                        <i class="bi bi-trash fs-1 text-danger mb-3 d-block" aria-hidden="true"></i>
                        <p class="fs-5 mb-2">¿Estás seguro de eliminar a <strong id="deletePostulanteName"></strong>?</p>
                        <p class="text-muted">Esta acción no se puede deshacer.</p>
                    </div>
                    <div class="modal-footer border-0 bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-2" aria-hidden="true"></i>Cancelar
                        </button>
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash me-2" aria-hidden="true"></i>Eliminar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .hover-lift {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }

        .avatar-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
            flex-shrink: 0;
        }

        .table-row-item {
            transition: all 0.2s ease;
        }

        .table-row-item:hover {
            background-color: #f8f9fa;
        }

        /* Estilos para el encabezado fijo de la tabla */
        .table-responsive {
            position: relative;
            max-height: 70vh; /* Altura máxima para que aparezca el scroll */
            overflow-y: auto;
        }

        .table thead th {
            position: sticky;
            top: 0;
            background-color: #f8f9fa; /* Mismo color que bg-light */
            z-index: 10;
            box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.1);
        }

        /* Aseguramos que el encabezado tenga un fondo sólido */
        .table thead {
            background-color: #f8f9fa;
        }


        /* Estilos para el encabezado fijo de la tabla */
        .table-responsive {
            position: relative;
            max-height: 70vh; /* Altura máxima para que aparezca el scroll */
            overflow-y: auto;
        }

        .table thead th {
            position: sticky;
            top: 0;
            background-color: #f8f9fa; /* Mismo color que bg-light */
            z-index: 10;
            box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.1);
        }

        /* Aseguramos que el encabezado tenga un fondo sólido */
        .table thead {
            background-color: #f8f9fa;
        }


        /* --- INICIO: ESTILOS PARA LA BARRA DE SCROLL MORADA --- */

        /* Para navegadores Webkit (Chrome, Safari, Edge) */
        .table-responsive::-webkit-scrollbar {
            width: 12px; /* Ancho de la barra completa */
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #f1f1f1; /* Color del fondo de la barra */
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: #6f42c1; /* Color morado de la barra */
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: #6f42c1; /* Color morado más oscuro al pasar el mouse */
        }

        /* Para Firefox */
        /* Nota: Firefox usa una sintaxis más simple pero con menos opciones de diseño */
        @supports (scrollbar-width: thin) {
            .table-responsive {
                scrollbar-width: thin; /* Hace la barra más delgada */
                scrollbar-color: #6e42c1cb #f1f1f1;
            }
        }

        /* --- FIN: ESTILOS PARA LA BARRA DE SCROLL --- */


        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
            border: none;
            text-decoration: none;
            cursor: pointer;
        }

        .action-btn i {
            font-size: 16px;
            transition: all 0.2s ease;
        }

        .action-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .action-btn:hover::before {
            transform: translateX(0);
        }

        /* Botón Ver - Azul */
        .action-btn-info {
            background-color: rgba(13, 202, 240, 0.15);
            color: #0dcaf0;
        }

        .action-btn-info:hover {
            background-color: #0dcaf0;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(13, 202, 240, 0.3);
        }

        /* Botón Editar - Naranja */
        .action-btn-warning {
            background-color: rgba(255, 193, 7, 0.15);
            color: #ffc107;
        }

        .action-btn-warning:hover {
            background-color: #ffc107;
            color: #212529;
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(255, 193, 7, 0.3);
        }

        /* Botón Eliminar - Rojo */
        .action-btn-danger {
            background-color: rgba(220, 53, 69, 0.15);
            color: #dc3545;
        }

        .action-btn-danger:hover {
            background-color: #dc3545;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        .modal-content {
            border-radius: 15px;
            overflow: hidden;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .table-responsive {
            min-height: 300px;
        }

        .no-results {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Mejoras para dispositivos móviles */
        @media (max-width: 768px) {
            .action-buttons {
                flex-wrap: wrap;
                gap: 5px;
            }

            .action-btn {
                width: 32px;
                height: 32px;
            }

            .action-btn i {
                font-size: 14px;
            }

            .table td {
                padding: 0.5rem;
            }

            .avatar-circle {
                width: 30px;
                height: 30px;
                font-size: 12px;
            }
        }

        /* Estilos para paginación */
        .pagination {
            margin-bottom: 0;
        }

        .pagination .page-link {
            color: #667eea;
            border-color: #dee2e6;
        }

        .pagination .page-item.active .page-link {
            background-color: #667eea;
            border-color: #667eea;
        }

        .pagination .page-link:hover {
            color: #764ba2;
            background-color: #f8f9fa;
            border-color: #dee2e6;
        }

        .input-group.rounded-pill .form-control,
        .input-group.rounded-pill .input-group-text {
            border-radius: 50rem !important;
            /* aseguramos la forma de cápsula */
            background-color: #f8f9fa;
            /* gris clarito */
        }

        .input-group.rounded-pill .form-control:focus {
            box-shadow: none;
            background-color: #fff;
            /* cambia a blanco al escribir */
        }

        .col-name {
            width: 30%;
            /* Puedes ajustar este porcentaje (ej. 30%, 40%) */
            min-width: 280px;
            /* Ancho mínimo para que no se apriete demasiado en pantallas grandes */
        }
    </style>
@endpush

@push('scripts')
    <!-- 1. Define la URL base de la app en una variable global de JavaScript -->
    <script>
        window.appUrl = '{{ url('/') }}';
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // ---- DELETE ----
            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.addEventListener('click', function () {
                    const id = this.dataset.id;
                    const name = this.dataset.name;
                    const form = document.getElementById('formDelete');
                    form.action = '/sistema_reclutamiento/public/postulantes/' + id;
                    document.getElementById('deletePostulanteName').textContent = name;
                });
            });

            // ---- BÚSQUEDA POR NOMBRE EN TIEMPO REAL ----
            const searchInput = document.getElementById('searchInput');
            const tbody = document.getElementById('tableBody');
            let tableRows = Array.from(tbody.querySelectorAll('tr.table-row-item')); // Usamos 'let' para poder reasignarla

            if (searchInput && tbody) {
                searchInput.addEventListener('input', function () {
                    const searchTerm = this.value.trim().toLowerCase();
                    let visibleCount = 0;

                    requestAnimationFrame(() => {
                        tableRows.forEach(row => {
                            const nameCell = row.querySelector('p.fw-semibold');
                            const dniCell = row.querySelector('.badge');
                            //const emailCell = row.querySelector('a[href^="mailto:"]');
                            // NUEVO: Buscamos la etiqueta <small> que contiene la ciudad usando su clase
                            const ciudadCell = row.querySelector('small.text-truncate');

                            const nameText = nameCell ? nameCell.textContent.toLowerCase() : '';
                            const dniText = dniCell ? dniCell.textContent.toLowerCase() : '';
                            //const emailText = emailCell ? emailCell.textContent.toLowerCase() : '';
                            // NUEVO: Obtenemos el texto de la celda de la ciudad
                            const ciudadText = ciudadCell ? ciudadCell.textContent.toLowerCase() : '';

                            // NUEVO: Añadimos la ciudad a la condición de búsqueda
                            if (nameText.includes(searchTerm) ||
                                dniText.includes(searchTerm) ||
                                //emailText.includes(searchTerm) ||
                                ciudadText.includes(searchTerm)) {
                                row.style.display = '';
                                visibleCount++;
                            } else {
                                row.style.display = 'none';
                            }
                        });

                        let noResultsRow = document.getElementById('noResultsRow');

                        if (visibleCount === 0 && searchTerm !== '') {
                            if (!noResultsRow) {
                                noResultsRow = document.createElement('tr');
                                noResultsRow.id = 'noResultsRow';
                                noResultsRow.className = 'no-results';
                                // Nota: Asegúrate que el 'colspan' coincida con el número total de columnas de tu tabla.
                                noResultsRow.innerHTML = `
                                    <td colspan="6" class="text-center py-5">
                                        <i class="bi bi-search fs-1 text-muted d-block mb-3"></i>
                                        <p class="text-muted mb-0">No hay postulantes que coincidan con "${searchTerm}"</p>
                                        <button class="btn btn-outline-secondary mt-3" onclick="document.getElementById('searchInput').value=''; document.getElementById('searchInput').dispatchEvent(new Event('input'));">
                                            <i class="bi bi-arrow-clockwise me-2"></i>Limpiar búsqueda
                                        </button>
                                    </td>
                                `;
                                tbody.appendChild(noResultsRow);
                            } else {
                                noResultsRow.querySelector('p').textContent = `No hay postulantes que coincidan con "${searchTerm}"`;
                            }
                        } else if (noResultsRow) {
                            noResultsRow.remove();
                        }
                    });
                });
            }

            // ---- NUEVO: FILTRADO POR TARJETAS (VERSIÓN FINAL CON BÚSQUEDA INTEGRADA) ----
            const filterCards = document.querySelectorAll('.filter-card');

            function getEstadoBadgeClass(estado) {
                if (!estado) return 'bg-secondary';
                switch (estado) {
                    case 'nuevo': return 'bg-primary';
                    case 'evaluacion': return 'bg-warning text-dark';
                    case 'en evaluación': return 'bg-warning text-dark';
                    case 'aceptado': return 'bg-success';
                    case 'rechazado': return 'bg-danger';
                    case 'repostulacion': return 'bg-info text-dark';
                    case 're-postulación': return 'bg-info text-dark';
                    default: return 'bg-secondary';
                }
            }

            function ucfirst(string) {
                if (!string) return '';
                return string.charAt(0).toUpperCase() + string.slice(1);
            }

            filterCards.forEach(card => {
                card.addEventListener('click', function() {
                    const estado = this.dataset.estado;
                    console.log('Tarjeta clickeada. Estado a filtrar:', estado);

                    filterCards.forEach(c => c.classList.remove('border-primary', 'border-2'));
                    this.classList.add('border-primary', 'border-2');

                    fetch(`${window.appUrl}/postulantes/filtrar?estado=${estado}`)
                        .then(response => {
                            console.log('Respuesta del servidor (status):', response.status);
                            if (!response.ok) {
                                throw new Error(`Error HTTP: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Datos recibidos del servidor:', data);
                            
                            // --- INICIO DE LOS CAMBIOS CLAVE ---

                            // 1. Limpiar la tabla
                            tableBody.innerHTML = '';

                            // 2. Limpiar el campo de búsqueda para evitar confusiones
                            searchInput.value = '';

                            // 3. Eliminar cualquier mensaje de "no hay resultados" de una búsqueda anterior
                            const existingNoResultsRow = document.getElementById('noResultsRow');
                            if (existingNoResultsRow) {
                                existingNoResultsRow.remove();
                            }

                            if (data.length === 0) {
                                tableBody.innerHTML = `
                                    <tr>
                                        <td colspan="6" class="py-5 d-flex flex-column justify-content-center align-items-center">
                                            <i class="bi bi-funnel fs-1 text-muted mb-3" aria-hidden="true"></i>
                                            <p class="text-muted mb-0 text-center">No se encontraron postulantes con este estado.</p>
                                            <button class="btn btn-outline-secondary mt-3" onclick="location.reload();">
                                                <i class="bi bi-arrow-clockwise me-2"></i>Mostrar todos
                                            </button>
                                        </td>
                                    </tr>
                                `;
                                // Si no hay resultados, actualizamos tableRows a un array vacío
                                tableRows = []; 
                                return;
                            }

                            data.forEach(postulante => {
                                const estadoClass = getEstadoBadgeClass(postulante.estado);
                                const avatarText = postulante.apellidos_nombres ? postulante.apellidos_nombres.substring(0, 2).toUpperCase() : 'NA';
                                const whatsappLink = postulante.telefono ? `https://wa.me/${postulante.telefono.replace(/\D/g, '')}` : '#';
                                // Formatear la fecha de creación
                                const fechaPostulacion = postulante.created_at ? 
                                    new Date(postulante.created_at).toLocaleDateString('es-ES', { 
                                        day: '2-digit', 
                                        month: '2-digit', 
                                        year: 'numeric' 
                                    }) : 'N/A';

                                const row = `
                                    <tr class="table-row-item" data-id="${postulante.id}">
                                        <td class="px-4 py-3 col-name">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-circle me-3" aria-hidden="true">${avatarText}</div>
                                                <div class="overflow-hidden">
                                                    <p class="mb-0 fw-semibold text-dark">${postulante.apellidos_nombres}</p>
                                                    <small class="text-muted text-truncate d-block" title="${postulante.ciudad_postular || 'Sin especificar'}">
                                                        ${postulante.ciudad_postular || 'Sin especificar'}
                                                    </small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3"><span class="badge bg-light text-dark border">${postulante.dni}</span></td>
                                        <td class="px-4 py-3">
                                            <div>
                                                <p class="mb-1 small"><i class="bi bi-envelope me-2 text-primary" aria-hidden="true"></i><a href="mailto:${postulante.email}" class="text-decoration-none">${postulante.email}</a></p>
                                                <p class="mb-0 small"><i class="bi bi-telephone me-2 text-success" aria-hidden="true"></i>
                                                    ${postulante.telefono ? `<a href="${whatsappLink}" target="_blank" class="text-success text-decoration-none">${postulante.telefono}</a>` : '<span class="text-muted">N/A</span>'}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="badge ${estadoClass}">${postulante.estado ? ucfirst(postulante.estado) : 'Sin estado'}</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="small text-muted">
                                                ${fechaPostulacion}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <div class="action-buttons" role="group" aria-label="Acciones para ${postulante.apellidos_nombres}">
                                                <a href="${window.appUrl}/postulantes/${postulante.id}" class="action-btn action-btn-info" title="Ver detalles de ${postulante.apellidos_nombres}" aria-label="Ver detalles de ${postulante.apellidos_nombres}"><i class="bi bi-eye" aria-hidden="true"></i></a>
                                                <a href="${window.appUrl}/postulantes/${postulante.id}/edit" class="action-btn action-btn-warning" title="Editar a ${postulante.apellidos_nombres}" aria-label="Editar a ${postulante.apellidos_nombres}"><i class="bi bi-pencil" aria-hidden="true"></i></a>
                                                <button class="action-btn action-btn-danger btn-delete" title="Eliminar a ${postulante.apellidos_nombres}" aria-label="Eliminar a ${postulante.apellidos_nombres}" data-id="${postulante.id}" data-name="${postulante.apellidos_nombres}" data-bs-toggle="modal" data-bs-target="#modalDelete"><i class="bi bi-trash" aria-hidden="true"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                `;
                                tableBody.innerHTML += row;
                            });

                            // 4. ¡LA LÍNEA MÁGICA! Actualizar la variable con las nuevas filas
                            tableRows = Array.from(tbody.querySelectorAll('tr.table-row-item'));

                            // --- FIN DE LOS CAMBIOS CLAVE ---
                        })
                        .catch(error => {
                            console.error('Error en la petición fetch:', error);
                            tableBody.innerHTML = `<tr><td colspan="5" class="text-center py-5 text-danger">Error al cargar los datos. Revisa la consola.</td></tr>`;
                            tableRows = []; // También la vaciamos en caso de error
                        });
                });
            });


            const btnDescargarTodos = document.getElementById('btnDescargarTodos');

                if (btnDescargarTodos) {
                    btnDescargarTodos.addEventListener('click', function () {
                        // 1. Recolectar los IDs de las filas visibles en la tabla
                        const postulanteIds = [];
                        document.querySelectorAll('tbody tr[data-id]').forEach(fila => {
                            postulanteIds.push(fila.dataset.id);
                        });

                        if (postulanteIds.length === 0) {
                            alert('No hay postulantes visibles para descargar.');
                            return;
                        }

                        // 2. Confirmar la acción
                        if (!confirm(`¿Estás seguro de descargar los documentos de ${postulanteIds.length} postulante(s)?`)) {
                            return;
                        }

                        // 3. Deshabilitar el botón y mostrar estado de carga
                        btnDescargarTodos.disabled = true;
                        const originalHtml = btnDescargarTodos.innerHTML;
                        btnDescargarTodos.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Generando...';

                        // 4. Enviar los IDs al servidor via Fetch API
                        fetch('{{ route("postulantes.descargarTodos") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                ids: postulanteIds
                            })
                        })
                        .then(response => {
                            // Si la respuesta no es OK, lanzar un error
                            if (!response.ok) {
                                return response.text().then(text => { throw new Error(text) });
                            }
                            return response.blob();
                        })
                        .then(blob => {
                            // 5. Crear una URL para el blob y forzar la descarga
                            const url = window.URL.createObjectURL(blob);
                            const a = document.createElement('a');
                            a.style.display = 'none';
                            a.href = url;
                            a.download = 'documentos_postulantes_masivos.zip'; // Nombre del archivo a descargar
                            document.body.appendChild(a);
                            a.click();
                            window.URL.revokeObjectURL(url);
                            document.body.removeChild(a);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Ocurrió un error al generar la descarga: ' + error.message);
                        })
                        .finally(() => {
                            // 6. Restaurar el botón
                            btnDescargarTodos.disabled = false;
                            btnDescargarTodos.innerHTML = originalHtml;
                        });
                    });
                }
        });
    </script>
@endpush