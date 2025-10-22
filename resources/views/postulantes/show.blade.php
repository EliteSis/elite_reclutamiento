@extends('layouts.app')
@section('title', $postulante->apellidos_nombres)
@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-lg mb-4 rounded-4 overflow-hidden"
        style="background: linear-gradient(180deg, var(--dark-color) 0%, #1a1b2eb9 100%);">
        <div class="card-body text-center p-4 text-white">
            <div class="row align-items-center">
                <div class="col-md-2">
                    @if($postulante->foto && Storage::disk('public')->exists($postulante->foto))
                        <a href="{{ asset('storage/' . $postulante->foto) }}" target="_blank">
                            <img src="{{ asset('storage/' . $postulante->foto) }}" 
                                alt="Foto de {{ $postulante->apellidos_nombres }}" 
                                class="img-fluid rounded-circle shadow-lg border border-4 border-white" 
                                style="max-width: 150px; transition: transform 0.3s ease-in-out;"
                                onmouseover="this.style.transform='scale(1.05)'" 
                                onmouseout="this.style.transform='scale(1)'">
                        </a>
                    @else
                        <div class="avatar-circle-xl mx-auto bg-primary text-white d-flex align-items-center justify-content-center shadow" 
                            style="width: 150px; height: 150px; font-size: 3rem;">
                            {{ strtoupper(substr($postulante->apellidos_nombres, 0, 2)) }}
                        </div>
                    @endif
                </div>
                <div class="col-md-10 text-md-start">
                    <h1 class="fw-bold mb-1">{{ $postulante->apellidos_nombres }}</h1>
                    <p class="mb-1 text-warning"><i class="bi bi-person-badge me-1"></i> DNI: {{ $postulante->dni }}</p>
                    <p class="mb-0 text-warning"><i class="bi bi-geo-alt-fill me-1"></i> {{ $postulante->ciudad_postular ?? 'No especificada' }}</p><p></p>
                    @if($postulante->estado)
                        <span class="badge fs-6
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
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        {{-- Columna Izquierda: Información Principal --}}
        <div class="col-lg-8">

            {{-- Sección: Información Personall --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="bi bi-person me-2"></i>Información Personal</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-7"><strong>Apellidos y Nombres:</strong> {{ $postulante->apellidos_nombres }}</div>
                        <div class="col-md-5"><strong>DNI:</strong> {{ $postulante->dni }}</div>
                        <div class="col-md-7">
                            <strong>Fecha de Nacimiento:</strong> 
                            {{ \Carbon\Carbon::parse($postulante->fecha_nacimiento)->format('d/m/Y') }}
                        </div>
                        <div class="col-md-5">
                            <strong>Edad:</strong> 
                            {{ \Carbon\Carbon::parse($postulante->fecha_nacimiento)->age }} años
                        </div>
                        <div class="col-md-7"><strong>Lugar a postular:</strong> {{ $postulante->ciudad_postular ?? 'No registrada' }}</div>
                        <div class="col-md-5"><strong>Sexo:</strong> {{ $postulante->sexo ?? 'No especificado' }}</div>
                        <div class="col-md-7"><strong>Estado Civil:</strong> {{ $postulante->estado_civil ?? 'No especificado' }}</div>
                        <div class="col-md-5"><strong>Número de Hijos:</strong> {{ $postulante->numero_hijos ?? 0 }}</div>
                    </div>
                </div>
            </div>

            <!-- {-- Sección: contacto --} -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="bi bi-phone me-2"></i>Contacto</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4"><strong>Teléfono:</strong> {{ $postulante->telefono ?? 'No registrado' }}</div>
                        <div class="col-md-4"><strong>Operador:</strong> {{ $postulante->operador ?? 'N/A' }}</div>
                        <div class="col-md-12"><strong>Email:</strong> {{ $postulante->email }}</div>
                    </div>
                </div>
            </div>

            {{-- Sección: Ubicación de Postulación --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="bi bi-geo-alt me-2"></i>Ubicación</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12"><strong>Dirección:</strong> {{ $postulante->direccion ?? 'N/A' }}</div>
                        <div class="col-md-4"><strong>Distrito:</strong> {{ $postulante->distrito ?? 'N/A' }}</div>
                        <div class="col-md-4"><strong>Provincia:</strong> {{ $postulante->provincia ?? 'N/A' }}</div>
                        <div class="col-md-4"><strong>Departamento:</strong> {{ $postulante->departamento ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>

            {{-- Sección: Salud y Física --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="bi bi-heart-pulse me-2"></i>Salud y Datos Físicos</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4"><strong>Estatura:</strong> {{ $postulante->estatura ?? 'N/A' }} m</div>
                        <div class="col-md-4"><strong>Peso:</strong> {{ $postulante->peso ?? 'N/A' }} kg</div>
                        @php
                            $imc = $postulante->imc;
                            $categoria = null;
                            $categoriaClase = '';

                            if ($imc) {
                                if ($imc < 18.5) {
                                    $categoria = 'Bajo Peso';
                                    $categoriaClase = 'text-primary';
                                } elseif ($imc < 25) {
                                    $categoria = 'Normal';
                                    $categoriaClase = 'text-success';
                                } elseif ($imc < 30) {
                                    $categoria = 'Sobrepeso';
                                    $categoriaClase = 'text-warning';
                                } else {
                                    $categoria = 'Obesidad';
                                    $categoriaClase = 'text-danger';
                                }
                            }
                        @endphp

                        <div class="col-md-4 d-flex align-items-center">
                            <strong class="me-1">IMC:</strong> 
                            <span>{{ $imc ?? 'N/A' }}</span>
                            @if($categoria)
                                <small class="ms-2 fw-bold {{ $categoriaClase }}">
                                    Categoria: {{ $categoria }}
                                </small>
                            @endif
                        </div>

                        <div class="col-12">
                            <strong>Vacunación:</strong>
                            @if($postulante->vacunado)
                                <span class="badge bg-success">Sí, {{ $postulante->numero_vacunas }} dosis</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sección: Experiencia y Otros Datos --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="bi bi-briefcase me-2"></i>Experiencia y Otros Datos</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6"><strong>Curso:</strong> {{ $postulante->curso ?? 'N/A' }}</div>
                        <div class="col-md-6"><strong>Carnet:</strong> {{ $postulante->carnet ?? 'N/A' }}</div>
                    </div>
                    <hr>
                    <p><strong>Detalle de Experiencia:</strong></p>
                    <p class="text-muted">{{ $postulante->detalle_experiencia ?? 'No se ha registrado detalle.' }}</p>
                    
                    
                </div>
            </div>

            {{-- Sección: Licencias SUCAMEC --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="bi bi-award me-2"></i>Licencias SUCAMEC</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <strong>Licencia L1:</strong>
                            @if($postulante->tiene_licencia_l1)
                                <span class="badge bg-success">Sí</span>
                                <small class="text-muted d-block">
                                    Vigencia:
                                    {{ $postulante->vigencia_licencia_l1
                                        ? \Carbon\Carbon::parse($postulante->vigencia_licencia_l1)->locale('es')->translatedFormat('d \\d\\e F \\d\\e Y')
                                        : 'No especificada' }}
                                </small>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <strong>Licencia L4:</strong>
                            @if($postulante->tiene_licencia_l4)
                                <span class="badge bg-success">Sí</span>
                                <small class="text-muted d-block">
                                    Vigencia:
                                    {{ $postulante->vigencia_licencia_l4
                                        ? \Carbon\Carbon::parse($postulante->vigencia_licencia_l4)->locale('es')->translatedFormat('d \\d\\e F \\d\\e Y')
                                        : 'No especificada' }}
                                </small>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <strong>Licencia L5:</strong>
                            @if($postulante->tiene_licencia_l5)
                                <span class="badge bg-success">Sí</span>
                                <small class="text-muted d-block">
                                    Vigencia:
                                    {{ $postulante->vigencia_licencia_l5
                                        ? \Carbon\Carbon::parse($postulante->vigencia_licencia_l5)->locale('es')->translatedFormat('d \\d\\e F \\d\\e Y')
                                        : 'No especificada' }}
                                </small>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sección: Tallas --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="bi bi-bank me-2"></i>Datos Bancarios</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4"><strong>Banco:</strong> {{ $postulante->banco ?? 'N/A' }}</div>
                        <div class="col-md-8"><strong>Cuenta Bancaria:</strong> {{ $postulante->cuenta_bancaria ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>

            {{-- Sección: Vehículo y Licencias --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="bi bi-car-front me-2"></i>Vehículo</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-6">
                            <strong>Tiene Vehículo:</strong>
                            @if($postulante->tiene_vehiculo)
                                <span class="badge bg-success">Sí ({{ $postulante->tipo_vehiculo }})</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </div>
                        <div class="col-md-6"><strong>Placa:</strong> {{ $postulante->placa ?? 'N/A' }}</div>
                        <div class="col-md-6"><strong>Tipo Licencia:</strong> {{ $postulante->tipo_licencia ?? 'N/A' }}</div>
                        <div class="col-6">
                            <strong>SOAT:</strong>
                            @if($postulante->tiene_soat)
                                <span class="badge bg-success">Sí (N.º: {{ $postulante->numero_soat }})</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sección: Tallas --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="bi bi-rulers me-2"></i>Talla de Prendas</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4"><strong>Pantalón:</strong> {{ $postulante->talla_pantalon ?? 'N/A' }}</div>
                        <div class="col-md-4"><strong>Casaca:</strong> {{ $postulante->talla_casaca ?? 'N/A' }}</div>
                        <div class="col-md-4"><strong>Polo:</strong> {{ $postulante->talla_polo ?? 'N/A' }}</div>
                        <div class="col-md-4"><strong>Camisa:</strong> {{ $postulante->talla_camisa ?? 'N/A' }}</div>
                        <div class="col-md-4"><strong>Zapato:</strong> {{ $postulante->talla_zapato ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>

            
        </div>

        {{-- Columna Derecha: Documentación y Archivos --}}
        <div class="col-lg-4">

            {{-- Sección: Documentación (Checks) --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="bi bi-file-earmark-check me-2"></i>Documentación</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Antecedentes Penales y Policiales
                            @if($postulante->antecedentes_penales) <i class="bi bi-check-circle-fill text-success"></i> @else <i class="bi bi-x-circle-fill text-danger"></i> @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Certificado de Estudios
                            @if($postulante->certificado_estudios) <i class="bi bi-check-circle-fill text-success"></i> @else <i class="bi bi-x-circle-fill text-danger"></i> @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Certificado de Trabajo o Certiadulto  
                            @if($postulante->certiadulto) <i class="bi bi-check-circle-fill text-success"></i> @else <i class="bi bi-x-circle-fill text-danger"></i> @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Recibo de Luz o Agua
                            @if($postulante->recibo_agua) <i class="bi bi-check-circle-fill text-success"></i> @else <i class="bi bi-x-circle-fill text-danger"></i> @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Multa Electoral
                            @if($postulante->multa_electoral) <i class="bi bi-check-circle-fill text-success"></i> @else <i class="bi bi-x-circle-fill text-danger"></i> @endif
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Sección: Archivos Adjuntos --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="bi bi-paperclip me-2"></i>Archivos Adjuntos</h5>
                    <!-- <a href="{{ route('postulantes.descargarFicha', $postulante) }}" class="btn btn-sm btn-outline-info me-2">
                        <i class="bi bi-file-earmark-pdf"></i> Descargar Ficha
                    </a> -->
                    <a href="{{ route('postulantes.descargarDocumentos', $postulante) }}" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-download"></i> Descargar Todo
                    </a>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            Foto
                            @if($postulante->foto && Storage::disk('public')->exists($postulante->foto))
                                {{-- Usamos asset() para la URL de la imagen --}}
                                <a href="{{ asset('storage/' . $postulante->foto) }}" target="_blank" class="btn btn-sm btn-success">Ver</a>
                            @else
                                <span class="text-muted">No adjuntado</span>
                            @endif
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            CV
                            @if($postulante->cv && Storage::disk('public')->exists($postulante->cv))
                                <a href="{{ asset('storage/' . $postulante->cv) }}" target="_blank" class="btn btn-sm btn-success">Ver</a>
                            @else
                                <span class="text-muted">No adjuntado</span>
                            @endif
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            Antecedentes Penales (PDF)
                            @if($postulante->pdf_antecedentes_penales && Storage::disk('public')->exists($postulante->pdf_antecedentes_penales))
                                <a href="{{ asset('storage/' . $postulante->pdf_antecedentes_penales) }}" target="_blank" class="btn btn-sm btn-success">Ver</a>
                            @else
                                <span class="text-muted">No adjuntado</span>
                            @endif
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            Carnet de Vacuna (PDF)
                            @if($postulante->pdf_carnet_vacuna && Storage::disk('public')->exists($postulante->pdf_carnet_vacuna))
                                <a href="{{ asset('storage/' . $postulante->pdf_carnet_vacuna) }}" target="_blank" class="btn btn-sm btn-success">Ver</a>
                            @else
                                <span class="text-muted">No adjuntado</span>
                            @endif
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            Recibo de Luz o Agua (PDF)
                            @if($postulante->pdf_recibo_agua && Storage::disk('public')->exists($postulante->pdf_recibo_agua))
                                <a href="{{ asset('storage/' . $postulante->pdf_recibo_agua) }}" target="_blank" class="btn btn-sm btn-success">Ver</a>
                            @else
                                <span class="text-muted">No adjuntado</span>
                            @endif
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            Cert. de Estudios (PDF)
                            @if($postulante->pdf_certificado_estudios && Storage::disk('public')->exists($postulante->pdf_certificado_estudios))
                                <a href="{{ asset('storage/' . $postulante->pdf_certificado_estudios) }}" target="_blank" class="btn btn-sm btn-success">Ver</a>
                            @else
                                <span class="text-muted">No adjuntado</span>
                            @endif
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            Certiadulto (PDF)
                            @if($postulante->pdf_certiadulto && Storage::disk('public')->exists($postulante->pdf_certiadulto))
                                <a href="{{ asset('storage/' . $postulante->pdf_certiadulto) }}" target="_blank" class="btn btn-sm btn-success">Ver</a>
                            @else
                                <span class="text-muted">No adjuntado</span>
                            @endif
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            Curso (PDF)
                            @if($postulante->pdf_curso && Storage::disk('public')->exists($postulante->pdf_curso))
                                <a href="{{ asset('storage/' . $postulante->pdf_curso) }}" target="_blank" class="btn btn-sm btn-success">Ver</a>
                            @else
                                <span class="text-muted">No adjuntado</span>
                            @endif
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            Licencia L1 SUCAMEC (PDF)
                            @if($postulante->pdf_licencia_l1_sucamec && Storage::disk('public')->exists($postulante->pdf_licencia_l1_sucamec))
                                <a href="{{ asset('storage/' . $postulante->pdf_licencia_l1_sucamec) }}" target="_blank" class="btn btn-sm btn-success">Ver</a>
                            @else
                                <span class="text-muted">No adjuntado</span>
                            @endif
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            Licencia L4 SUCAMEC (PDF)
                            @if($postulante->pdf_licencia_l4_sucamec && Storage::disk('public')->exists($postulante->pdf_licencia_l4_sucamec))
                                <a href="{{ asset('storage/' . $postulante->pdf_licencia_l4_sucamec) }}" target="_blank" class="btn btn-sm btn-success">Ver</a>
                            @else
                                <span class="text-muted">No adjuntado</span>
                            @endif
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            Licencia L5 SUCAMEC (PDF)
                            @if($postulante->pdf_licencia_l5_sucamec && Storage::disk('public')->exists($postulante->pdf_licencia_l5_sucamec))
                                <a href="{{ asset('storage/' . $postulante->pdf_licencia_l5_sucamec) }}" target="_blank" class="btn btn-sm btn-success">Ver</a>
                            @else
                                <span class="text-muted">No adjuntado</span>
                            @endif
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            DNI de Hijos (PDF)
                            @if($postulante->pdf_dni_hijos && Storage::disk('public')->exists($postulante->pdf_dni_hijos))
                                <a href="{{ asset('storage/' . $postulante->pdf_dni_hijos) }}" target="_blank" class="btn btn-sm btn-success">Ver</a>
                            @else
                                <span class="text-muted">No adjuntado</span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Botones de Acción --}}
            <div class="d-grid gap-2">
                <a href="{{ route('postulantes.edit', $postulante) }}" class="btn btn-warning">
                    <i class="bi bi-pencil me-2"></i>Editar Ficha
                </a>
                <a href="{{ route('postulantes.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Volver a la Lista
                </a>
            </div>
        </div>
    </div>
</div>
@endsection