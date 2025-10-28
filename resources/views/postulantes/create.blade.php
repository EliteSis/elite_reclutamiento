@extends('layouts.app')

@section('title', 'Crear Nuevo Postulante')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-11 col-xl-10">
            {{-- Header --}}
            <div class="card border-0 shadow-lg mb-4 overflow-hidden rounded-4">
                <div class="card-header text-white py-4 position-relative"
                    style="background: linear-gradient(135deg, #03691b 0%, #04b82a 100%);">
                    <div class="d-flex align-items-center justify-content-left">
                        <i class="bi bi-person-plus-fill me-3 fs-2 text-white"></i>
                        <div>
                            <h4 class="m-0 fw-bold text-uppercase">Registrar Nuevo Postulante</h4>
                            <small class="text-white-50 fst-italic">Complete los campos obligatorios para agregar un nuevo registro</small>
                        </div>
                    </div>
                    <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 5px; background: rgba(255, 255, 255, 0.45);"></div>
                </div>
            </div>


            <form action="{{ route('postulantes.store') }}" method="POST" enctype="multipart/form-data" id="formCreatePostulante" novalidate>
                @csrf
                @include('partials.errors')

                {{-- Acordeón Principal del Formulario --}}
                <div class="accordion" id="formularioPostulanteAccordion">

                    {{-- Sección 1: Información Personal (Abierta por defecto) --}}
                    <div class="accordion-item shadow-sm mb-3">
                        <h2 class="accordion-header" id="headingInfoPersonal">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInfoPersonal" aria-expanded="true" aria-controls="collapseInfoPersonal">
                                <i class="bi bi-person-fill me-2 text-primary"></i> Información Personal
                            </button>
                        </h2>
                        <div id="collapseInfoPersonal" class="accordion-collapse collapse show" aria-labelledby="headingInfoPersonal" data-bs-parent="#formularioPostulanteAccordion">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="apellidos_nombres" id="apellidos_nombres" class="form-control @error('apellidos_nombres') is-invalid @enderror" placeholder="Apellidos y Nombres" value="{{ old('apellidos_nombres') }}" required>
                                            <label for="apellidos_nombres">Apellidos y Nombres <span class="text-danger">*</span></label>
                                            @error('apellidos_nombres')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <input type="text" name="dni" id="dni" class="form-control @error('dni') is-invalid @enderror" placeholder="DNI" value="{{ old('dni') }}" maxlength="8" pattern="[0-9]{8}" required>
                                            <label for="dni">DNI <span class="text-danger">*</span></label>
                                            @error('dni')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}">
                                            <label for="fecha_nacimiento">Fecha de Nacimiento <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <select name="sexo" id="sexo" class="form-select @error('sexo') is-invalid @enderror" required>
                                                <option value="">-- Seleccionar --</option>
                                                <option value="Masculino" {{ old('sexo') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                                <option value="Femenino" {{ old('sexo') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                                <option value="Otro" {{ old('sexo') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                                <option value="No especifica" {{ old('sexo') == 'No especifica' ? 'selected' : '' }}>No especifica</option>
                                            </select>
                                            <label for="sexo">Sexo <span class="text-danger">*</span></label>
                                            @error('sexo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <select name="estado_civil" id="estado_civil" class="form-select @error('estado_civil') is-invalid @enderror" required>
                                                <option value="">-- Seleccionar --</option>
                                                <option value="Soltero(a)" {{ old('estado_civil') == 'Soltero(a)' ? 'selected' : '' }}>Soltero(a)</option>
                                                <option value="Casado(a)" {{ old('estado_civil') == 'Casado(a)' ? 'selected' : '' }}>Casado(a)</option>
                                                <option value="Divorciado(a)" {{ old('estado_civil') == 'Divorciado(a)' ? 'selected' : '' }}>Divorciado(a)</option>
                                                <option value="Viudo(a)" {{ old('estado_civil') == 'Viudo(a)' ? 'selected' : '' }}>Viudo(a)</option>
                                                <option value="Conviviente" {{ old('estado_civil') == 'Conviviente' ? 'selected' : '' }}>Conviviente</option>
                                            </select>
                                            <label for="estado_civil">Estado Civil <span class="text-danger">*</span></label>
                                            @error('estado_civil')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <input type="number" name="numero_hijos" id="numero_hijos" class="form-control @error('numero_hijos') is-invalid @enderror" placeholder="0" value="{{ old('numero_hijos') }}" min="0">
                                            <label for="numero_hijos">Número de Hijos <span class="text-danger">*</span></label>
                                            @error('numero_hijos')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <input type="text" name="ciudad_postular" id="ciudad_postular" class="form-control" placeholder="Ciudad" value="{{ old('ciudad_postular') }}">
                                            <label for="ciudad_postular">Ciudad a Postular <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <select name="estado" id="estado" class="form-select @error('estado') is-invalid @enderror" required>
                                                <option value="">-- Seleccionar --</option>
                                                <option value="nuevo" {{ old('estado') == 'nuevo' ? 'selected' : '' }}>Nuevo</option>
                                                <option value="en evaluación" {{ old('estado') == 'en evaluación' ? 'selected' : '' }}>En evaluación</option>
                                                <option value="aceptado" {{ old('estado') == 'aceptado' ? 'selected' : '' }}>Aceptado</option>
                                                <option value="rechazado" {{ old('estado') == 'rechazado' ? 'selected' : '' }}>Rechazado</option>
                                                <option value="re-postulación" {{ old('estado') == 're-postulación' ? 'selected' : '' }}>Re-postulación</option>
                                            </select>
                                            <label for="estado">Estado <span class="text-danger">*</span></label>
                                            @error('estado')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Sección 2: Contacto y Ubicación (Abierta por defecto) --}}
                    <div class="accordion-item shadow-sm mb-3">
                        <h2 class="accordion-header" id="headingContacto">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseContacto" aria-expanded="true" aria-controls="collapseContacto">
                                <i class="bi bi-geo-alt-fill me-2 text-info"></i> Contacto y Ubicación
                            </button>
                        </h2>
                        <div id="collapseContacto" class="accordion-collapse collapse show" aria-labelledby="headingContacto" data-bs-parent="#formularioPostulanteAccordion">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="correo@ejemplo.com" value="{{ old('email') }}" required>
                                            <label for="email">Email</label>
                                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="tel" name="telefono" id="telefono" class="form-control @error('telefono') is-invalid @enderror" 
                                                placeholder="Teléfono" value="{{ old('telefono') }}" maxlength="9" pattern="\d{9}" title="Ingrese 9 dígitos numéricos">
                                            <label for="telefono">Teléfono <span class="text-danger">*</span></label>
                                            @error('telefono')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <select name="operador" id="operador" class="form-select" required>
                                                <option value="">-- Seleccionar --</option>
                                                <option value="Movistar" {{ old('operador') == 'Movistar' ? 'selected' : '' }}>Movistar</option>
                                                <option value="Claro" {{ old('operador') == 'Claro' ? 'selected' : '' }}>Claro</option>
                                                <option value="Entel" {{ old('operador') == 'Entel' ? 'selected' : '' }}>Entel</option>
                                                <option value="Bitel" {{ old('operador') == 'Bitel' ? 'selected' : '' }}>Bitel</option>
                                            </select>
                                            <label for="operador">Operador</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" name="distrito" id="distrito" class="form-control" placeholder="Distrito" value="{{ old('distrito') }}">
                                            <label for="distrito">Distrito</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" name="provincia" id="provincia" class="form-control" placeholder="Provincia" value="{{ old('provincia') }}">
                                            <label for="provincia">Provincia</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" name="departamento" id="departamento" class="form-control" placeholder="Departamento" value="{{ old('departamento') }}">
                                            <label for="departamento">Departamento</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror" placeholder="Dirección completa" value="{{ old('direccion') }}">
                                            <label for="direccion">Dirección</label>
                                            @error('direccion')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Sección 3: Salud y Física --}}
                    <div class="accordion-item shadow-sm mb-3">
                        <h2 class="accordion-header" id="headingSalud">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSalud" aria-expanded="false" aria-controls="collapseSalud">
                                <i class="bi bi-heart-pulse-fill me-2 text-danger"></i> Salud y Datos Físicos
                            </button>
                        </h2>
                        <div id="collapseSalud" class="accordion-collapse collapse" aria-labelledby="headingSalud" data-bs-parent="#formularioPostulanteAccordion">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="number" step="0.01" name="estatura" id="estatura" class="form-control @error('estatura') is-invalid @enderror" placeholder="Ej: 1.75" value="{{ old('estatura') }}">
                                            <label for="estatura">Estatura (m)</label>
                                            @error('estatura')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="number" step="0.1" name="peso" id="peso" class="form-control @error('peso') is-invalid @enderror" placeholder="Ej: 70.5" value="{{ old('peso') }}">
                                            <label for="peso">Peso (kg)</label>
                                            @error('peso')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" name="imc" id="imc" class="form-control" placeholder="Calculado" readonly tabindex="-1">
                                            <label for="imc">IMC (Calculado)</label>
                                            <div id="imc-category" class="form-text mt-1"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <label for="vacunado_si" class="form-label fw-semibold mb-0 me-3">
                                            ¿Está vacunado?
                                        </label>
                                        <div class="form-check form-switch mb-0">
                                            <input 
                                                class="form-check-input fs-5" 
                                                type="checkbox" 
                                                name="vacunado" 
                                                id="vacunado_si" 
                                                value="1"
                                                @if(old('vacunado')) checked @endif
                                                onchange="document.getElementById('campo_numero_vacunas').style.display = this.checked ? 'block' : 'none';">
                                        </div>
                                        @error('vacunado')
                                            <div class="text-danger small ms-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4" id="campo_numero_vacunas" style="{{ old('vacunado') ? '' : 'display:none;' }}">
                                        <div class="form-floating">
                                            <input 
                                                type="number" 
                                                name="numero_vacunas" 
                                                id="numero_vacunas" 
                                                class="form-control @error('numero_vacunas') is-invalid @enderror"
                                                placeholder="Número de dosis"
                                                value="{{ old('numero_vacunas') }}">
                                            <label for="numero_vacunas">Número de dosis aplicadas</label>
                                            @error('numero_vacunas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Sección 4: EMO --}}
                    <div class="accordion-item shadow-sm mb-3">
                        <h2 class="accordion-header" id="headingEmo">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEmo" aria-expanded="false" aria-controls="collapseEmo">
                                <i class="bi bi-file-earmark-medical-fill me-2 text-success"></i> EMO de Ingreso
                            </button>
                        </h2>
                        <div id="collapseEmo" class="accordion-collapse collapse" aria-labelledby="headingEmo" data-bs-parent="#formularioPostulanteAccordion">
                            <div class="accordion-body">
                                <div class="card border-0 shadow-sm rounded-4">
                                    <div class="card-body">
                                        <div class="row g-4 align-items-center">
                                            
                                            <div class="col-md-6">
                                                <label for="emo_file" class="form-label fw-semibold text-dark d-flex align-items-center mb-2">
                                                    <i class="bi bi-file-earmark-arrow-up-fill text-success me-2 fs-5"></i>
                                                    Subir Archivo EMO
                                                </label>
                                                <div class="input-group">
                                                    <input
                                                        type="file"
                                                        name="emo"
                                                        id="emo_file"
                                                        class="form-control form-control-sm"
                                                        accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                                        onchange="document.getElementById('emo_file_name').textContent = this.files[0].name;">
                                                    <label for="emo_file" class="input-group-text btn btn-sm btn-success">Examinar</label>
                                                </div>
                                                <small id="emo_file_name" class="text-muted fst-italic d-block mt-1">
                                                    Ningún archivo seleccionado
                                                </small>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" name="detalle_emo" id="detalle_emo" class="form-control @error('detalle_emo') is-invalid @enderror" placeholder="Detalle EMO" value="{{ old('detalle_emo') }}">
                                                    <label for="detalle_emo">Detalle EMO</label>
                                                    @error('detalle_emo')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    {{-- Sección 5: Documentación y Archivos --}}
                    <div class="accordion-item shadow-sm mb-3">
                        <h2 class="accordion-header" id="headingDocumentos">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDocumentos" aria-expanded="false" aria-controls="collapseDocumentos">
                                <i class="bi bi-file-earmark-text-fill me-2 text-dark"></i> Documentación y Archivos
                            </button>
                        </h2>
                        <div id="collapseDocumentos" class="accordion-collapse collapse" aria-labelledby="headingDocumentos" data-bs-parent="#formularioPostulanteAccordion">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <p class="fw-bold">Documentación Presentada (seleccione los que aplica):</p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="antecedentes_penales" value="1" id="antecedentes_penales" @if(old('antecedentes_penales')) checked @endif>
                                            <label class="form-check-label" for="antecedentes_penales">Antecedentes Penales y Policiales</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="certificado_estudios" value="1" id="certificado_estudios" @if(old('certificado_estudios')) checked @endif>
                                            <label class="form-check-label" for="certificado_estudios">Certificado de Estudios</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="certiadulto" value="1" id="certiadulto" @if(old('certiadulto')) checked @endif>
                                            <label class="form-check-label" for="certiadulto">Certificado de Trabajo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="recibo_agua" value="1" id="recibo_agua" @if(old('recibo_agua')) checked @endif>
                                            <label class="form-check-label" for="recibo_agua">Recibo de Luz o Agua</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="multa_electoral" value="1" id="multa_electoral" @if(old('multa_electoral')) checked @endif>
                                            <label class="form-check-label" for="multa_electoral">Multa Electoral</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="card border-0 shadow-sm rounded-4">
                                    <div class="card-header bg-gradient text-dark py-3 rounded-top-4"
                                        style="background: linear-gradient(135deg, #0b6623 0%, #16a34a 100%);">
                                        <h5 class="mb-0 fw-bold">
                                            <i class="bi bi-cloud-arrow-up-fill me-2"></i> Subir Archivos Adjuntos
                                        </h5>
                                        <small class="text-dark-50">Formatos permitidos: PDF, DOC, JPG, PNG</small>
                                    </div>

                                    <div class="card-body bg-light">
                                        <div class="row g-4">
                                            @foreach([
                                                'cv' => 'CV (PDF/DOC)',
                                                'foto' => 'Foto (Imagen)',
                                                'pdf_antecedentes_penales' => 'Antecedentes Penales (PDF)',
                                                'pdf_carnet_vacuna' => 'Carnet de Vacuna (PDF)',
                                                'pdf_recibo_agua' => 'Recibo de Luz o Agua (PDF)',
                                                'pdf_certificado_estudios' => 'Certificado de Estudios (PDF)',
                                                'pdf_certiadulto' => 'Certiadulto (PDF)',
                                                'pdf_curso' => 'Curso (PDF)',
                                                'pdf_licencia_l1_sucamec' => 'Licencia L1 SUCAMEC (PDF)',
                                                'pdf_licencia_l4_sucamec' => 'Licencia L4 SUCAMEC (PDF)',
                                                'pdf_licencia_l5_sucamec' => 'Licencia L5 SUCAMEC (PDF)',
                                                'pdf_dni_hijos' => 'DNI de Hijos (PDF)'
                                            ] as $inputName => $label)
                                                <div class="col-md-4">
                                                    <div class="p-3 bg-white rounded-3 shadow-sm border hover-lift">
                                                        <label for="{{ $inputName }}" class="form-label fw-semibold text-dark d-flex align-items-center mb-2">
                                                            <i class="bi bi-file-earmark-arrow-up-fill text-success me-2 fs-5"></i>
                                                            {{ $label }}
                                                        </label>
                                                        <input 
                                                            type="file" 
                                                            name="{{ $inputName }}" 
                                                            id="{{ $inputName }}" 
                                                            class="form-control form-control-sm"
                                                            accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                                                        <small class="text-muted fst-italic d-block mt-1">
                                                            Ningún archivo seleccionado
                                                        </small>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Sección 6: Datos Adicionales (Vehículo, Licencias, etc.) --}}
                    <div class="accordion-item shadow-sm mb-3">
                        <h2 class="accordion-header" id="headingVehiculo">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVehiculo" aria-expanded="false" aria-controls="collapseVehiculo">
                                <i class="bi bi-car-front-fill me-2 text-primary"></i> Vehículo
                            </button>
                        </h2>
                        <div id="collapseVehiculo" class="accordion-collapse collapse" aria-labelledby="headingVehiculo" data-bs-parent="#formularioPostulanteAccordion">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    
                                    <div class="col-md-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="tiene_vehiculo" id="vehiculo_si" value="1" 
                                                @if(old('tiene_vehiculo')) checked @endif>
                                            <label class="form-check-label" for="vehiculo_si">¿Tiene vehículo?</label>
                                        </div>
                                        @error('tiene_vehiculo')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3" id="campo_tipo_vehiculo">
                                        <div class="form-floating">
                                            <input type="text" name="tipo_vehiculo" id="tipo_vehiculo" 
                                                class="form-control @error('tipo_vehiculo') is-invalid @enderror"
                                                placeholder="Ej: Auto, Moto" value="{{ old('tipo_vehiculo') }}" disabled>
                                            <label for="tipo_vehiculo">Tipo de vehículo</label>
                                            @error('tipo_vehiculo')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <input type="text" name="placa" id="placa" class="form-control" placeholder="Placa" value="{{ old('placa') }}">
                                            <label for="placa">Placa</label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <input type="text" name="tipo_licencia" id="tipo_licencia" class="form-control" placeholder="Ej: A1, B" value="{{ old('tipo_licencia') }}">
                                            <label for="tipo_licencia">Tipo Licencia de Conducir</label>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="tiene_soat" id="soat_si" value="1" @if(old('tiene_soat')) checked @endif>
                                            <label class="form-check-label" for="soat_si">¿Tiene SOAT?</label>
                                        </div>
                                        @error('tiene_soat')<div class="text-danger small">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="col-md-3" id="campo_numero_soat" ">
                                        <div class="form-floating">
                                            <input type="text" name="numero_soat" id="numero_soat" class="form-control @error('numero_soat') is-invalid @enderror" placeholder="Número" value="{{ old('numero_soat') }}">
                                            <label for="numero_soat">Número de SOAT</label>
                                            @error('numero_soat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Sección 7: Licencias SUCAMEC --}}
                    <div class="accordion-item shadow-sm mb-3">
                        <h2 class="accordion-header" id="headingSucamec">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSucamec" aria-expanded="false" aria-controls="collapseSucamec">
                                <i class="bi bi-file-earmark-text-fill me-2 text-warning"></i> Licencias SUCAMEC
                            </button>
                        </h2>
                        <div id="collapseSucamec" class="accordion-collapse collapse" aria-labelledby="headingSucamec" data-bs-parent="#formularioPostulanteAccordion">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="tiene_licencia_l1" id="l1_si" value="1" @if(old('tiene_licencia_l1')) checked @endif>
                                            <label class="form-check-label" for="l1_si">Licencia L1</label>
                                        </div>
                                        <div class="mt-2 fade-in" id="campo_vigencia_l1" style="display:none;">
                                            <input type="date" name="vigencia_licencia_l1" id="vigencia_licencia_l1" class="form-control" value="{{ old('vigencia_licencia_l1') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="tiene_licencia_l4" id="l4_si" value="1" @if(old('tiene_licencia_l4')) checked @endif>
                                            <label class="form-check-label" for="l4_si">Licencia L4</label>
                                        </div>
                                        <div class="mt-2 fade-in" id="campo_vigencia_l4" style="display:none;">
                                            <input type="date" name="vigencia_licencia_l4" id="vigencia_licencia_l4" class="form-control" value="{{ old('vigencia_licencia_l4') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="tiene_licencia_l5" id="l5_si" value="1" @if(old('tiene_licencia_l5')) checked @endif>
                                            <label class="form-check-label" for="l5_si">Licencia L5</label>
                                        </div>
                                        <div class="mt-2 fade-in" id="campo_vigencia_l5" style="display:none;">
                                            <input type="date" name="vigencia_licencia_l5" id="vigencia_licencia_l5" class="form-control" value="{{ old('vigencia_licencia_l5') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Sección 8: Tallas --}}
                    <div class="accordion-item shadow-sm mb-3">
                        <h2 class="accordion-header" id="headingTallas">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTallas" aria-expanded="false" aria-controls="collapseTallas">
                                <i class="bi bi-rulers me-2 text-secondary"></i> Tallas
                            </button>
                        </h2>
                        <div id="collapseTallas" class="accordion-collapse collapse" aria-labelledby="headingTallas" data-bs-parent="#formularioPostulanteAccordion">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <input type="text" name="talla_pantalon" id="talla_pantalon" class="form-control" placeholder="Pantalón" value="{{ old('talla_pantalon') }}">
                                            <label for="talla_pantalon">Pantalón</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <input type="text" name="talla_casaca" id="talla_casaca" class="form-control" placeholder="Casaca" value="{{ old('talla_casaca') }}">
                                            <label for="talla_casaca">Casaca</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <input type="text" name="talla_polo" id="talla_polo" class="form-control" placeholder="Polo" value="{{ old('talla_polo') }}">
                                            <label for="talla_polo">Polo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <input type="text" name="talla_camisa" id="talla_camisa" class="form-control" placeholder="Camisa" value="{{ old('talla_camisa') }}">
                                            <label for="talla_camisa">Camisa</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <input type="text" name="talla_zapato" id="talla_zapato" class="form-control" placeholder="Zapato" value="{{ old('talla_zapato') }}">
                                            <label for="talla_zapato">Zapato</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Sección 9: Datos Bancarios --}}
                    <div class="accordion-item shadow-sm mb-3">
                        <h2 class="accordion-header" id="headingBancarios">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBancarios" aria-expanded="false" aria-controls="collapseBancarios">
                                <i class="bi bi-bank me-2 text-success"></i> Datos Bancarios
                            </button>
                        </h2>
                        <div id="collapseBancarios" class="accordion-collapse collapse" aria-labelledby="headingBancarios" data-bs-parent="#formularioPostulanteAccordion">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="cuenta_bancaria" id="cuenta_bancaria" class="form-control" placeholder="Cuenta Bancaria" value="{{ old('cuenta_bancaria') }}">
                                            <label for="cuenta_bancaria">Cuenta Bancaria <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select name="banco" id="banco" class="form-select" required>
                                                <option value="" disabled selected>Seleccione un banco</option>
                                                <option value="BCP" {{ old('banco') == 'BCP' ? 'selected' : '' }}>BCP</option>
                                                <option value="BBVA" {{ old('banco') == 'BBVA' ? 'selected' : '' }}>BBVA</option>
                                                <option value="Interbank" {{ old('banco') == 'Interbank' ? 'selected' : '' }}>Interbank</option>
                                                <option value="Scotiabank" {{ old('banco') == 'Scotiabank' ? 'selected' : '' }}>Scotiabank</option>
                                                <option value="MiBanco" {{ old('banco') == 'MiBanco' ? 'selected' : '' }}>MiBanco</option>
                                                <option value="banco de la nacion" {{ old('banco') == 'Citibank' ? 'banco de la nacion' : '' }}>Banco de la Nación</option>
                                            
                                            </select>
                                            <label for="banco">Banco <span class="text-danger">*</span></label>
                                        </div>
                                        @error('banco')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Sección 10: Experiencia --}}
                    <div class="accordion-item shadow-sm mb-3">
                        <h2 class="accordion-header" id="headingOtros">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOtros" aria-expanded="false" aria-controls="collapseOtros">
                                <i class="bi bi-file-earmark-text-fill me-2 text-dark"></i> Experiencia
                            </button>
                        </h2>
                        <div id="collapseOtros" class="accordion-collapse collapse" aria-labelledby="headingOtros" data-bs-parent="#formularioPostulanteAccordion">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea name="detalle_experiencia" id="detalle_experiencia" rows="3" class="form-control" placeholder="Detalle de su experiencia..." style="height:140px;">{{ old('detalle_experiencia') }}</textarea>
                                            <label for="detalle_experiencia">Detalle de Experiencia</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea name="detalle_experiencia" id="detalle_experiencia" rows="3" class="form-control" placeholder="Detalle de su experiencia..." style="height:140px;">{{ old('detalle_experiencia') }}</textarea>
                                            <label for="detalle_experiencia">Referencia Laboral: <span style="color: #adb5bd;">Nombre - Cargo - Empresa - Celular</span></label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea name="detalle_experiencia" id="detalle_experiencia" rows="3" class="form-control" placeholder="Detalle de su experiencia..." style="height:140px;">{{ old('detalle_experiencia') }}</textarea>
                                            <label for="detalle_experiencia">Detalle de las Referencias</label>
                                        </div>
                                    </div>
                                    
                                    <hr class="my-4">

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="curso" id="curso" class="form-control" placeholder="Curso" value="{{ old('curso') }}">
                                            <label for="curso">Curso</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="carnet" id="carnet" class="form-control" placeholder="Carnet" value="{{ old('carnet') }}">
                                            <label for="carnet">Carnet</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Botones de Envío --}}
                <div class="card shadow-sm border-0 mt-4">
                    <div class="card-body d-flex justify-content-end">
                        <a href="{{ route('postulantes.index') }}" class="btn btn-secondary btn-lg me-2"><i class="bi bi-x-circle me-2"></i>Cancelar</a>
                        <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-check-circle me-2"></i>Guardar Postulante</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .custom-file-input {
        cursor: pointer;
    }
    .fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- Lógica para mostrar/ocultar campos condicionales con animación ---
            const toggleFields = [
                { checkbox: 'vacunado_si', field: 'campo_numero_vacunas' },
                //{ checkbox: 'vehiculo_si', field: 'campo_tipo_vehiculo' },
                //{ checkbox: 'soat_si', field: 'campo_numero_soat' },
                { checkbox: 'l1_si', field: 'campo_vigencia_l1' },
                { checkbox: 'l4_si', field: 'campo_vigencia_l4' },
                { checkbox: 'l5_si', field: 'campo_vigencia_l5' },
            ];

            toggleFields.forEach(item => {
                const checkbox = document.getElementById(item.checkbox);
                const targetField = document.getElementById(item.field);

                function toggleVisibility() {
                    if (checkbox.checked) {
                        targetField.style.display = 'block';
                        targetField.classList.add('fade-in');
                    } else {
                        targetField.style.display = 'none';
                    }
                }

                checkbox.addEventListener('change', toggleVisibility);
                toggleVisibility(); // Estado inicial
            });


            // --- NUEVO: Habilitar/Deshabilitar campo "Tipo de vehículo" ---
            const checkVehiculo = document.getElementById('vehiculo_si');
            const campoTipoVehiculo = document.getElementById('tipo_vehiculo');

            function actualizarEstadoVehiculo() {
                if (checkVehiculo.checked) {
                    campoTipoVehiculo.disabled = false;
                    campoTipoVehiculo.focus();
                } else {
                    campoTipoVehiculo.value = '';
                    campoTipoVehiculo.disabled = true;
                }
            }

            checkVehiculo.addEventListener('change', actualizarEstadoVehiculo);
            actualizarEstadoVehiculo(); // Estado inicial

            // --- NUEVO: Habilitar/Deshabilitar campo "Número de SOAT" ---
            const checkSoat = document.getElementById('soat_si');
            const campoNumeroSoat = document.getElementById('numero_soat');

            function actualizarEstadoSoat() {
                if (checkSoat.checked) {
                    campoNumeroSoat.disabled = false;
                    campoNumeroSoat.focus();
                } else {
                    campoNumeroSoat.value = '';
                    campoNumeroSoat.disabled = true;
                }
            }

            checkSoat.addEventListener('change', actualizarEstadoSoat);
            actualizarEstadoSoat(); // Estado inicial


            // --- Lógica para el cálculo automático del IMC con categoría ---
            const estaturaInput = document.getElementById('estatura');
            const pesoInput = document.getElementById('peso');
            const imcInput = document.getElementById('imc');
            const imcCategoryDiv = document.getElementById('imc-category');

            function getIMCCategory(imc) {
                if (imc < 18.5) return { text: 'Bajo Peso', class: 'text-primary' };
                if (imc < 25) return { text: 'Normal', class: 'text-success' };
                if (imc < 30) return { text: 'Sobrepeso', class: 'text-warning' };
                return { text: 'Obesidad', class: 'text-danger' };
            }

            function calcularIMC() {
                const estatura = parseFloat(estaturaInput.value);
                const peso = parseFloat(pesoInput.value);

                if (estatura > 0 && peso > 0) {
                    const imc = peso / (estatura * estatura);
                    imcInput.value = imc.toFixed(1);
                    const category = getIMCCategory(imc);
                    imcCategoryDiv.innerHTML = `<small class="fw-bold ${category.class}">Categoría: ${category.text}</small>`;
                } else {
                    imcInput.value = '';
                    imcCategoryDiv.innerHTML = '';
                }
            }

            estaturaInput.addEventListener('input', calcularIMC);
            pesoInput.addEventListener('input', calcularIMC);

            // --- Lógica para mostrar el nombre del archivo seleccionado ---
            const fileInputs = document.querySelectorAll('.custom-file-input');
            fileInputs.forEach(input => {
                input.addEventListener('change', function() {
                    const fileName = this.files[0]?.name || 'Ningún archivo seleccionado';
                    this.nextElementSibling.textContent = fileName;
                });
            });
        });
    </script>
@endpush




