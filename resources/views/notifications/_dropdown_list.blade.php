{{-- resources/views/notifications/_dropdown_list.blade.php --}}

@php
    // Obtenemos las 5 notificaciones no leídas más recientes
    $notifications = auth()->user()->unreadNotifications()->take(5)->get();
@endphp

@if($notifications->isNotEmpty())
    <ul class="list-unstyled mb-0">
        @foreach($notifications as $notification)
            <li>
                {{-- CAMBIO CLAVE: Añadimos el ID de la notificación como un atributo data --}}
                <a class="dropdown-item notification-item" href="{{ $notification->data['url'] ?? '#' }}" data-notification-id="{{ $notification->id }}">
                    <div class="d-flex">
                        <i class="bi bi-circle-fill text-primary me-2" style="font-size: 0.5rem;"></i>
                        <div class="flex-grow-1">
                            <p class="mb-0 fw-semibold">{{ Str::limit($notification->data['title'] ?? 'Notificación', 30) }}</p>
                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
@else
    <div class="dropdown-item text-muted">
        <i class="bi bi-check-circle me-2"></i> No tienes notificaciones nuevas.
    </div>
@endif

<!-- <li><hr class="dropdown-divider"></li> -->
<!-- <li><a class="dropdown-item text-center" href="{{ route('notifications.index') }}"><strong>Ver todas</strong></a></li> -->