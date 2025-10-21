@extends('layouts.app')
@section('title', 'Postulaciones')

@section('content')
    <h2 class="mb-4">Postulaciones</h2>

    <!-- Botón para abrir modal de nueva postulación -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">
        <i class="bi bi-plus-circle"></i> Nueva Postulación
    </button>

    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>Postulante</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($postulaciones as $postulacion)
                <tr>
                    <td>{{ $postulacion->postulante->nombres }} {{ $postulacion->postulante->apellidos }}</td>
                    <td>{{ $postulacion->fecha_postulacion }}</td>
                    <td><span class="badge bg-info">{{ $postulacion->estado }}</span></td>
                    <td>
                        <!-- Botón ver -->
                        <a href="{{ route('postulaciones.show', $postulacion) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i>
                        </a>

                        <!-- Botón Editar: abre modal de edición y pasa datos con data-atributos -->
                        <button class="btn btn-sm btn-warning btn-edit" data-id="{{ $postulacion->id }}"
                            data-postulante="{{ $postulacion->postulante_id }}"
                            data-fecha="{{ $postulacion->fecha_postulacion }}" data-estado="{{ $postulacion->estado }}"
                            data-bs-toggle="modal" data-bs-target="#modalEdit">
                            <i class="bi bi-pencil"></i>
                        </button>

                        <!-- Botón Eliminar: abre modal de confirmación -->
                        <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $postulacion->id }}" data-bs-toggle="modal"
                            data-bs-target="#modalDelete">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ----------- MODAL CREAR ----------- --}}
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('postulaciones.store') }}" method="POST">
                    @csrf
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Nueva Postulación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Postulante</label>
                            <select name="postulante_id" class="form-control" required>
                                @foreach($postulantes as $p)
                                    <option value="{{ $p->id }}">{{ $p->nombres }} {{ $p->apellidos }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Fecha de postulación</label>
                            <input type="date" name="fecha_postulacion" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Estado</label>
                            <select name="estado" class="form-control" required>
                                <option value="nuevo">Nuevo</option>
                                <option value="en evaluación">En evaluación</option>
                                <option value="aceptado">Aceptado</option>
                                <option value="rechazado">Rechazado</option>
                                <option value="re-postulación">Re-postulación</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Observaciones</label>
                            <textarea name="observaciones" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ----------- MODAL EDITAR ----------- --}}
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formEdit" method="POST">
                    @csrf @method('PUT')
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title">Editar Postulación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Postulante</label>
                            <select name="postulante_id" id="edit-postulante" class="form-control" required>
                                @foreach($postulantes as $p)
                                    <option value="{{ $p->id }}">{{ $p->nombres }} {{ $p->apellidos }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Fecha de postulación</label>
                            <input type="date" name="fecha_postulacion" id="edit-fecha" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Estado</label>
                            <select name="estado" id="edit-estado" class="form-control" required>
                                <option value="nuevo">Nuevo</option>
                                <option value="en evaluación">En evaluación</option>
                                <option value="aceptado">Aceptado</option>
                                <option value="rechazado">Rechazado</option>
                                <option value="re-postulación">Re-postulación</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Observaciones</label>
                            <textarea name="observaciones" id="edit-observaciones" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ----------- MODAL ELIMINAR ----------- --}}
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formDelete" method="POST">
                    @csrf @method('DELETE')
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Eliminar Postulación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Seguro que deseas eliminar esta postulación?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // ---- EDIT ----
            document.querySelectorAll('.btn-edit').forEach(btn => {
                btn.addEventListener('click', function () {
                    const id = this.dataset.id;
                    document.getElementById('edit-postulante').value = this.dataset.postulante;
                    document.getElementById('edit-fecha').value = this.dataset.fecha;
                    document.getElementById('edit-estado').value = this.dataset.estado;
                    // Si guardas observaciones en la BD y quieres pasarlas, agrega data-observaciones en el botón
                    if (this.dataset.observaciones) {
                        document.getElementById('edit-observaciones').value = this.dataset.observaciones;
                    }
                    document.getElementById('formEdit').action = '/postulaciones/' + id;
                });
            });

            // ---- DELETE ----
            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.addEventListener('click', function () {
                    const id = this.dataset.id;
                    document.getElementById('formDelete').action = '/postulaciones/' + id;
                });
            });

        });
    </script>
@endpush