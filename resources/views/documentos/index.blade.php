@extends('layouts.app')
@section('title', 'Documentos')

@section('content')
    <h2 class="mb-4">Documentos</h2>

    <!-- Botón para abrir modal de nuevo documento -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">
        <i class="bi bi-plus-circle"></i> Nuevo Documento
    </button>

    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>Postulante</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Formato</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documentos as $documento)
                <tr>
                    <td>{{ $documento->postulante->nombres }} {{ $documento->postulante->apellidos }}</td>
                    <td>{{ $documento->nombre_archivo }}</td>
                    <td>{{ $documento->tipo_documento }}</td>
                    <td>{{ $documento->formato }}</td>
                    <td>
                        <a href="{{ Storage::url($documento->ruta) }}" target="_blank" class="btn btn-sm btn-success">
                            <i class="bi bi-download"></i>
                        </a>

                        <!-- Botón Editar: abre modal de edición y pasa datos con data-atributos -->
                        <button class="btn btn-sm btn-warning btn-edit" data-id="{{ $documento->id }}"
                            data-nombre="{{ $documento->nombre_archivo }}" data-tipo="{{ $documento->tipo_documento }}"
                            data-formato="{{ $documento->formato }}" data-bs-toggle="modal" data-bs-target="#modalEdit">
                            <i class="bi bi-pencil"></i>
                        </button>

                        <!-- Botón Eliminar: abre modal de confirmación -->
                        <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $documento->id }}" data-bs-toggle="modal"
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
                <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Nuevo Documento</h5>
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
                            <label>Nombre archivo</label>
                            <input type="text" name="nombre_archivo" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Tipo de documento</label>
                            <input type="text" name="tipo_documento" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Formato</label>
                            <input type="text" name="formato" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Archivo</label>
                            <input type="file" name="archivo" class="form-control" required>
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
                <form id="formEdit" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title">Editar Documento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Nombre archivo</label>
                            <input type="text" name="nombre_archivo" id="edit-nombre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Tipo de documento</label>
                            <input type="text" name="tipo_documento" id="edit-tipo" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Formato</label>
                            <input type="text" name="formato" id="edit-formato" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Archivo (opcional)</label>
                            <input type="file" name="archivo" class="form-control">
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
                        <h5 class="modal-title">Eliminar Documento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Seguro que deseas eliminar este documento?</p>
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
                    document.getElementById('edit-nombre').value = this.dataset.nombre;
                    document.getElementById('edit-tipo').value = this.dataset.tipo;
                    document.getElementById('edit-formato').value = this.dataset.formato;
                    document.getElementById('formEdit').action = '/documentos/' + id;
                });
            });

            // ---- DELETE ----
            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.addEventListener('click', function () {
                    const id = this.dataset.id;
                    document.getElementById('formDelete').action = '/documentos/' + id;
                });
            });

        });
    </script>
@endpush