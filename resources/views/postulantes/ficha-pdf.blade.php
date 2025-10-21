<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ficha de Postulante - {{ $postulante->apellidos_nombres }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
            line-height: 1.4;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 5px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 3px;
        }
        .row {
            display: flex;
            margin-bottom: 5px;
        }
        .col-6 {
            width: 50%;
        }
        .col-4 {
            width: 33.33%;
        }
        .col-12 {
            width: 100%;
        }
        .label {
            font-weight: bold;
        }
        .text-center {
            text-align: center;
        }
        .badge {
            padding: 2px 5px;
            border-radius: 3px;
            font-size: 10px;
        }
        .badge-success {
            background-color: #28a745;
            color: white;
        }
        .badge-danger {
            background-color: #dc3545;
            color: white;
        }
        .badge-secondary {
            background-color: #6c757d;
            color: white;
        }
        .badge-warning {
            background-color: #ffc107;
            color: black;
        }
        .badge-primary {
            background-color: #007bff;
            color: white;
        }
        .badge-info {
            background-color: #17a2b8;
            color: white;
        }
        .text-success {
            color: #28a745;
        }
        .text-warning {
            color: #ffc107;
        }
        .text-danger {
            color: #dc3545;
        }
        .text-primary {
            color: #007bff;
        }
        .text-info {
            color: #17a2b8;
        }
        .text-muted {
            color: #6c757d;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Ficha de Postulante</h1>
        <h2>{{ $postulante->apellidos_nombres }}</h2>
        <p>DNI: {{ $postulante->dni }} | Ciudad: {{ $postulante->ciudad_postular ?? 'No especificada' }}</p>
        @if($postulante->estado)
            <span class="badge 
            @switch($postulante->estado)
                @case('nuevo') badge-primary @break
                @case('en evaluación') badge-warning @break
                @case('aceptado') badge-success @break
                @case('rechazado') badge-danger @break
                @case('re-postulación') badge-info @break
                @default badge-secondary
            @endswitch">
                {{ ucfirst($postulante->estado) }}
            </span>
        @endif
    </div>

    <div class="section">
        <div class="section-title">Información Personal</div>
        <div class="row">
            <div class="col-6"><span class="label">Apellidos y Nombres:</span> {{ $postulante->apellidos_nombres }}</div>
            <div class="col-6"><span class="label">DNI:</span> {{ $postulante->dni }}</div>
        </div>
        <div class="row">
            <div class="col-6"><span class="label">Fecha de Nacimiento:</span> {{ \Carbon\Carbon::parse($postulante->fecha_nacimiento)->format('d/m/Y') }}</div>
            <div class="col-6"><span class="label">Edad:</span> {{ \Carbon\Carbon::parse($postulante->fecha_nacimiento)->age }} años</div>
        </div>
        <div class="row">
            <div class="col-6"><span class="label">Lugar a postular:</span> {{ $postulante->ciudad_postular ?? 'No registrada' }}</div>
            <div class="col-6"><span class="label">Sexo:</span> {{ $postulante->sexo ?? 'No especificado' }}</div>
        </div>
        <div class="row">
            <div class="col-6"><span class="label">Estado Civil:</span> {{ $postulante->estado_civil ?? 'No especificado' }}</div>
            <div class="col-6"><span class="label">Número de Hijos:</span> {{ $postulante->numero_hijos ?? 0 }}</div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Contacto</div>
        <div class="row">
            <div class="col-4"><span class="label">Teléfono:</span> {{ $postulante->telefono ?? 'No registrado' }}</div>
            <div class="col-4"><span class="label">Operador:</span> {{ $postulante->operador ?? 'N/A' }}</div>
            <div class="col-4"><span class="label">Email:</span> {{ $postulante->email }}</div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Ubicación</div>
        <div class="row">
            <div class="col-12"><span class="label">Dirección:</span> {{ $postulante->direccion ?? 'N/A' }}</div>
        </div>
        <div class="row">
            <div class="col-4"><span class="label">Distrito:</span> {{ $postulante->distrito ?? 'N/A' }}</div>
            <div class="col-4"><span class="label">Provincia:</span> {{ $postulante->provincia ?? 'N/A' }}</div>
            <div class="col-4"><span class="label">Departamento:</span> {{ $postulante->departamento ?? 'N/A' }}</div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Salud y Datos Físicos</div>
        <div class="row">
            <div class="col-4"><span class="label">Estatura:</span> {{ $postulante->estatura ?? 'N/A' }} m</div>
            <div class="col-4"><span class="label">Peso:</span> {{ $postulante->peso ?? 'N/A' }} kg</div>
            <div class="col-4">
                <span class="label">IMC:</span> {{ $imc ?? 'N/A' }}
                @if($categoria)
                    <span class="{{ $categoriaClase }}">({{ $categoria }})</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <span class="label">Vacunación:</span>
                @if($postulante->vacunado)
                    <span class="badge badge-success">Sí, {{ $postulante->numero_vacunas }} dosis</span>
                @else
                    <span class="badge badge-secondary">No</span>
                @endif
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Experiencia y Otros Datos</div>
        <div class="row">
            <div class="col-6"><span class="label">Curso:</span> {{ $postulante->curso ?? 'N/A' }}</div>
            <div class="col-6"><span class="label">Carnet:</span> {{ $postulante->carnet ?? 'N/A' }}</div>
        </div>
        <div class="row">
            <div class="col-12">
                <span class="label">Detalle de Experiencia:</span>
                <p>{{ $postulante->detalle_experiencia ?? 'No se ha registrado detalle.' }}</p>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Licencias SUCAMEC</div>
        <div class="row">
            <div class="col-4">
                <span class="label">Licencia L1:</span>
                @if($postulante->tiene_licencia_l1)
                    <span class="badge badge-success">Sí</span>
                    <small>Vigencia: {{ $postulante->vigencia_licencia_l1 ? \Carbon\Carbon::parse($postulante->vigencia_licencia_l1)->locale('es')->translatedFormat('d \d\e F \d\e Y') : 'No especificada' }}</small>
                @else
                    <span class="badge badge-secondary">No</span>
                @endif
            </div>
            <div class="col-4">
                <span class="label">Licencia L4:</span>
                @if($postulante->tiene_licencia_l4)
                    <span class="badge badge-success">Sí</span>
                    <small>Vigencia: {{ $postulante->vigencia_licencia_l4 ? \Carbon\Carbon::parse($postulante->vigencia_licencia_l4)->locale('es')->translatedFormat('d \d\e F \d\e Y') : 'No especificada' }}</small>
                @else
                    <span class="badge badge-secondary">No</span>
                @endif
            </div>
            <div class="col-4">
                <span class="label">Licencia L5:</span>
                @if($postulante->tiene_licencia_l5)
                    <span class="badge badge-success">Sí</span>
                    <small>Vigencia: {{ $postulante->vigencia_licencia_l5 ? \Carbon\Carbon::parse($postulante->vigencia_licencia_l5)->locale('es')->translatedFormat('d \d\e F \d\e Y') : 'No especificada' }}</small>
                @else
                    <span class="badge badge-secondary">No</span>
                @endif
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Datos Bancarios</div>
        <div class="row">
            <div class="col-6"><span class="label">Banco:</span> {{ $postulante->banco ?? 'N/A' }}</div>
            <div class="col-6"><span class="label">Cuenta Bancaria:</span> {{ $postulante->cuenta_bancaria ?? 'N/A' }}</div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Vehículo</div>
        <div class="row">
            <div class="col-6">
                <span class="label">Tiene Vehículo:</span>
                @if($postulante->tiene_vehiculo)
                    <span class="badge badge-success">Sí ({{ $postulante->tipo_vehiculo }})</span>
                @else
                    <span class="badge badge-secondary">No</span>
                @endif
            </div>
            <div class="col-6"><span class="label">Placa:</span> {{ $postulante->placa ?? 'N/A' }}</div>
        </div>
        <div class="row">
            <div class="col-6"><span class="label">Tipo Licencia:</span> {{ $postulante->tipo_licencia ?? 'N/A' }}</div>
            <div class="col-6">
                <span class="label">SOAT:</span>
                @if($postulante->tiene_soat)
                    <span class="badge badge-success">Sí (N.º: {{ $postulante->numero_soat }})</span>
                @else
                    <span class="badge badge-secondary">No</span>
                @endif
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Talla de Prendas</div>
        <div class="row">
            <div class="col-4"><span class="label">Pantalón:</span> {{ $postulante->talla_pantalon ?? 'N/A' }}</div>
            <div class="col-4"><span class="label">Casaca:</span> {{ $postulante->talla_casaca ?? 'N/A' }}</div>
            <div class="col-4"><span class="label">Polo:</span> {{ $postulante->talla_polo ?? 'N/A' }}</div>
        </div>
        <div class="row">
            <div class="col-4"><span class="label">Camisa:</span> {{ $postulante->talla_camisa ?? 'N/A' }}</div>
            <div class="col-4"><span class="label">Zapato:</span> {{ $postulante->talla_zapato ?? 'N/A' }}</div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Documentación</div>
        <div class="row">
            <div class="col-6">
                <span class="label">Antecedentes Penales y Policiales:</span>
                @if($postulante->antecedentes_penales)
                    <span class="badge badge-success">Presentado</span>
                @else
                    <span class="badge badge-danger">No presentado</span>
                @endif
            </div>
            <div class="col-6">
                <span class="label">Certificado de Estudios:</span>
                @if($postulante->certificado_estudios)
                    <span class="badge badge-success">Presentado</span>
                @else
                    <span class="badge badge-danger">No presentado</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <span class="label">Certificado de Trabajo o Certiadulto:</span>
                @if($postulante->certiadulto)
                    <span class="badge badge-success">Presentado</span>
                @else
                    <span class="badge badge-danger">No presentado</span>
                @endif
            </div>
            <div class="col-6">
                <span class="label">Recibo de Luz o Agua:</span>
                @if($postulante->recibo_agua)
                    <span class="badge badge-success">Presentado</span>
                @else
                    <span class="badge badge-danger">No presentado</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <span class="label">Multa Electoral:</span>
                @if($postulante->multa_electoral)
                    <span class="badge badge-success">Presentado</span>
                @else
                    <span class="badge badge-danger">No presentado</span>
                @endif
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Fecha de generación: {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</p>
    </div>
</body>
</html>