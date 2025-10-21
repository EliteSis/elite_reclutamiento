{{-- resources/views/notifications/index.blade.php --}}

@extends('layouts.app')

@section('title', 'Notificaciones')

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            {{-- CAMBIO: Contenedor más pequeño --}}
            <div class="col-lg-5 col-md-7">
                <div class="content-card"> {{-- Usamos la misma clase que tus otras tarjetas --}}
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="mb-0 fw-bold">
                            <i class="bi bi-bell me-2 text-primary"></i>Notificacioness
                        </h3>
                        {{-- Botón para marcar todas como leídas (mejora extra) --}}
                        @if(auth()->user()->unreadNotifications->count() > 0)
                            <form action="{{ route('notifications.markAllRead') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-secondary">Marcar todas como leídas</button>
                            </form>
                        @endif
                    </div>

                    <div class="notification-list">
                        @forelse ($notifications as $notification)
                            <div class="notification-item p-3 border-bottom {{ $notification->read_at ? 'read' : 'unread' }}">
                                <div class="d-flex align-items-start">
                                    {{-- Icono de la notificación --}}
                                    <div class="notification-icon me-3">
                                        @if($notification->read_at)
                                            <i class="bi bi-envelope-open text-muted fs-5"></i>
                                        @else
                                            <i class="bi bi-envelope-fill text-primary fs-5"></i>
                                        @endif
                                    </div>
                                    <div class="flex-grow-1">
                                        <a href="{{ route('postulantes.show', $notification->data['postulante_id']) ?? '#' }}"
                                            class="text-decoration-none text-dark">
                                            <div class="fw-semibold">{{ $notification->data['title'] ?? 'Notificación' }}</div>
                                            <p class="mb-1 text-muted small">{{ $notification->data['message'] ?? '' }}</p>
                                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                        </a>
                                    </div>

                                    {{-- resources/views/.../tu_vista_de_notificaciones.blade.php --}}
                                    <div class="notification-actions ms-2">
                                        @if (!$notification->read_at)
                                            {{-- Añadimos la clase "mark-read-form" al formulario --}}
                                            <form action="{{ route('notifications.read', $notification->id) }}" method="POST"
                                                class="mark-read-form">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-light" title="Marcar como leída">
                                                    <i class="bi bi-check2"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-muted p-5">
                                <i class="bi bi-bell-slash fs-1 d-block mb-3"></i>
                                <p class="mb-0">No tienes notificaciones nuevas.</p>
                            </div>
                        @endforelse
                    </div>

                    @if($notifications->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $notifications->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Añadimos un poco de estilo para las notificaciones leídas/no leídas --}}
    @push('styles')
        <style>
            .notification-item.unread {
                background-color: rgba(67, 97, 238, 0.05);
                /* Un fondo muy sutil */
                border-left: 3px solid var(--primary-color);
            }

            .notification-item.read {
                opacity: 0.7;
            }

            .notification-item.read .fw-semibold {
                font-weight: normal !important;
            }

            .notification-item:hover {
                background-color: rgba(67, 97, 238, 0.08);
            }
        </style>
    @endpush
@endsection