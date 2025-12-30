@extends('layouts.postular')

@section('content')
    <div class="container py-5">
        <h1 class="section-title">Solicita una Cotización</h1>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('public.cotizacion.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="empresa" class="form-label">Empresa</label>
                                <input type="text" class="form-control" id="empresa" name="empresa">
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="servicio" class="form-label">Tipo de Servicio</label>
                                <select class="form-select" id="servicio" name="servicio" required>
                                    <option value="">Selecciona un servicio</option>
                                    <option value="vigilancia">Vigilancia Privada</option>
                                    <option value="corporativa">Seguridad Corporativa</option>
                                    <option value="residencial">Seguridad Residencial</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="mensaje" class="form-label">Detalles del Servicio</label>
                                <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary-custom">Solicitar Cotización</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection