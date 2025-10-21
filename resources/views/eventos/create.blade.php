@extends('layouts.app')

@section('title', 'Crear Evento')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-semibold">
                            <i class="bi bi-calendar-plus me-2"></i>Crear Nuevo Evento
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('eventos.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="titulo" class="form-label">Título del Evento</label>
                                    <input type="text" class="form-control @error('titulo') is-invalid @enderror"
                                        id="titulo" name="titulo" value="{{ old('titulo') }}" required>
                                    @error('titulo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tipo" class="form-label">Tipo de Evento</label>
                                    <select class="form-select @error('tipo') is-invalid @enderror" id="tipo" name="tipo"
                                        required>
                                        <option value="">Seleccionar tipo</option>
                                        <option value="entrevista" {{ old('tipo') == 'entrevista' ? 'selected' : '' }}>
                                            Entrevista</option>
                                        <option value="seguimiento" {{ old('tipo') == 'seguimiento' ? 'selected' : '' }}>
                                            Seguimiento</option>
                                        <option value="tarea" {{ old('tipo') == 'tarea' ? 'selected' : '' }}>Tarea</option>
                                        <option value="reunion" {{ old('tipo') == 'reunion' ? 'selected' : '' }}>Reunión
                                        </option>
                                        <option value="otro" {{ old('tipo') == 'otro' ? 'selected' : '' }}>Otro</option>
                                    </select>
                                    @error('tipo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fecha_inicio" class="form-label">Fecha y Hora de Inicio</label>
                                    <input type="datetime-local"
                                        class="form-control @error('fecha_inicio') is-invalid @enderror" id="fecha_inicio"
                                        name="fecha_inicio" value="{{ old('fecha_inicio') }}" required>
                                    @error('fecha_inicio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="fecha_fin" class="form-label">Fecha y Hora de Fin (opcional)</label>
                                    <input type="datetime-local"
                                        class="form-control @error('fecha_fin') is-invalid @enderror" id="fecha_fin"
                                        name="fecha_fin" value="{{ old('fecha_fin') }}">
                                    @error('fecha_fin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="color" class="form-label">Color del Evento</label>
                                    <input type="color"
                                        class="form-control form-control-color @error('color') is-invalid @enderror"
                                        id="color" name="color" value="{{ old('color', '#0d6efd') }}" required>
                                    @error('color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="postulacion_id" class="form-label">Relacionar con Postulación
                                        (opcional)</label>
                                    <select class="form-select @error('postulacion_id') is-invalid @enderror"
                                        id="postulacion_id" name="postulacion_id">
                                        <option value="">Seleccionar postulación</option>
                                        @foreach($postulaciones as $postulacion)
                                            <option value="{{ $postulacion->id }}" {{ old('postulacion_id') == $postulacion->id ? 'selected' : '' }}>
                                                {{ $postulacion->postulante->nombre_completo }} -
                                                {{ $postulacion->vacante->titulo }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('postulacion_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion"
                                    name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left me-1"></i> Volver al Dashboard
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i> Guardar Evento
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection