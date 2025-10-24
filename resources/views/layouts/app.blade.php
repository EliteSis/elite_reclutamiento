<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Gestión de Reclutamiento">
    <meta name="author" content="Tu Empresa">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Gestión de Reclutamiento')</title>

    <!-- Favicon -->

    <link rel="icon" type="image/png" href="{{ asset('images/logoo.png') }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @stack('styles')

    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #f72585;
            --dark-color: #2b2d42;
            --light-color: #f8f9fa;
            --sidebar-width: 260px;
            --navbar-height: 70px;
            --transition-speed: 0.3s;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
            color: #333;
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* ---- Sidebar ---- */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, var(--dark-color) 0%, #1a1b2e 100%);
            color: #fff;
            padding-top: var(--navbar-height);
            transform: translateX(-100%);
            transition: transform var(--transition-speed) cubic-bezier(0.25, 0.8, 0.25, 1);
            z-index: 1020;
            /* Reducido para no interferir con modales */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            overflow-y: auto;
        }

        .sidebar.show {
            transform: translateX(0);
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .sidebar-logo {
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 24px;
            color: white;
        }

        .sidebar-title {
            font-size: 18px;
            font-weight: 600;
            margin: 0;
            color: #fff;
        }

        .sidebar-subtitle {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 5px;
        }

        .sidebar-nav {
            padding: 0 15px;
        }

        .sidebar-item {
            margin-bottom: 5px;
        }

        .sidebar-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 12px 15px;
            border-radius: 8px;
            transition: all var(--transition-speed);
            position: relative;
            overflow: hidden;
        }

        .sidebar-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background: var(--primary-color);
            transform: scaleY(0);
            transition: transform var(--transition-speed);
        }

        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            padding-left: 20px;
        }

        .sidebar-link:hover::before {
            transform: scaleY(1);
        }

        .sidebar-link.active {
            background: rgba(67, 97, 238, 0.2);
            color: #fff;
        }

        .sidebar-link.active::before {
            transform: scaleY(1);
        }

        .sidebar-link i {
            margin-right: 12px;
            font-size: 18px;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 12px;
            color: rgba(255, 255, 255, 0.5);
        }

        /* ---- Navbar ---- */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--navbar-height);
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            z-index: 1010;
            /* Reducido para no interferir con modales */
            display: flex;
            align-items: center;
            padding: 0 20px;
            transition: all var(--transition-speed);
        }

        .navbar-brand {
            color: var(--dark-color);
            font-weight: 700;
            font-size: 22px;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .navbar-brand i {
            color: var(--primary-color);
            margin-right: 10px;
            font-size: 24px;
        }

        .navbar-toggler {
            background: none;
            border: none;
            color: var(--dark-color);
            font-size: 24px;
            padding: 5px;
            cursor: pointer;
            transition: transform var(--transition-speed);
        }

        .navbar-toggler:hover {
            transform: scale(1.1);
        }

        .navbar-menu {
            margin-left: auto;
            display: flex;
            align-items: center;
        }

        .navbar-item {
            position: relative;
            margin-left: 15px;
        }

        .navbar-link {
            color: var(--dark-color);
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 8px 12px;
            border-radius: 8px;
            transition: all var(--transition-speed);
        }

        .navbar-link:hover {
            background: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
        }

        .navbar-link i {
            font-size: 18px;
        }

        .notification-badge {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 10px;
            height: 10px;
            background: var(--accent-color);
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .user-dropdown {
            position: relative;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition-speed);
        }

        .user-avatar:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }

        /* ---- Main Content ---- */
        .main-content {
            padding: calc(var(--navbar-height) + 30px) 30px 30px;
            min-height: 100vh;
            transition: margin-left var(--transition-speed);
        }

        .main-content.sidebar-show {
            margin-left: var(--sidebar-width);
        }

        .content-card {
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            animation: fadeInUp 0.5s ease-out;
        }

        /* ---- Footer ---- */
        footer {
            text-align: center;
            padding: 20px 0;
            color: #6c757d;
            font-size: 14px;
        }

        /* ---- Overlay ---- */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1015;
            /* Reducido para no interferir con modales */
            opacity: 0;
            visibility: hidden;
            transition: all var(--transition-speed);
        }

        .overlay.show {
            opacity: 1;
            visibility: visible;
        }

        /* ---- Animations ---- */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ---- Responsive ---- */
        @media (min-width: 992px) {
            .sidebar {
                transform: translateX(0);
            }

            .navbar-toggler {
                display: none;
            }

            .main-content {
                margin-left: var(--sidebar-width);
            }

            .overlay {
                display: none;
            }
        }

        @media (max-width: 991.98px) {
            .main-content.sidebar-show {
                margin-left: 0;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                max-width: 280px;
            }

            .main-content {
                padding: calc(var(--navbar-height) + 20px) 20px 20px;
            }

            .content-card {
                padding: 20px;
            }

            .navbar-brand span {
                display: none;
            }
        }

        /* ---- Theme Toggle ---- */
        .theme-toggle {
            position: relative;
            width: 50px;
            height: 26px;
            background: #e9ecef;
            border-radius: 13px;
            padding: 3px;
            cursor: pointer;
            transition: background var(--transition-speed);
        }

        .theme-toggle.dark {
            background: var(--dark-color);
        }

        .theme-toggle-slider {
            position: absolute;
            top: 3px;
            left: 3px;
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            transition: transform var(--transition-speed);
        }

        .theme-toggle.dark .theme-toggle-slider {
            transform: translateX(24px);
        }

        /* Dark Theme */
        body.dark-theme {
            background: linear-gradient(135deg, #1a1b2e 0%, #0f0f1e 100%);
            color: #e9ecef;
        }

        body.dark-theme .navbar {
            background: #1a1b2e;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        body.dark-theme .navbar-brand,
        body.dark-theme .navbar-link {
            color: #e9ecef;
        }

        body.dark-theme .navbar-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        body.dark-theme .content-card {
            background: #1a1b2e;
            color: #e9ecef;
        }

        body.dark-theme footer {
            color: #adb5bd;
        }

        /* Mejoras para el badge de notificaciones */
        .navbar-item .notification-badge {
            padding: 0.15em 0.3em;
            font-weight: 600;
            z-index: 10;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <!-- <i class="bi bi-briefcase-fill"></i> -->
                <img src="{{ asset('images/logoo.png') }}" alt="Logo" width="60" height="60">
            </div>
            <h4 class="sidebar-title">GRUPO ELITE APM</h4>
            <p class="sidebar-subtitle">Sistema de Reclutamiento</p>
        </div>

        <nav class="sidebar-nav">
            <div class="sidebar-item">
                <a href="{{ route('dashboard') }}"
                    class="sidebar-link {{ request()->is('dashboards*') ? 'active' : '' }}">
                    <i class="bi bi-house"></i>
                    <span>Inicio</span>
                </a>
            </div>
            <div class="sidebar-item">
                <a href="{{ route('postulantes.index') }}"
                    class="sidebar-link {{ request()->is('postulantes*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i>
                    <span>Postulantes</span>
                </a>
            </div>
            <!-- <div class="sidebar-item">
                <a href="{{ route('documentos.index') }}"
                    class="sidebar-link {{ request()->is('documentos*') ? 'active' : '' }}">
                    <i class="bi bi-folder2-open"></i>
                    <span>Documentos</span>
                </a>
            </div> -->
            <div class="sidebar-item">
                <a href="{{ route('sucamec.index') }}"
                    class="sidebar-link {{ request()->is('sucamec*') ? 'active' : '' }}">
                    <i class="bi bi-search"></i>
                    <span>Sucamec</span>
                </a>
            </div>

            <div class="sidebar-item">
                <a href="{{ route('verificacion_policial.index') }}"
                    class="sidebar-link {{ request()->is('verificacion_policial*') ? 'active' : '' }}">
                    <i class="bi bi-shield-check"></i>
                    <span>Antec. Policiales</span>
                </a>
            </div>

            <div class="sidebar-item">
                <a href="https://casillas.pj.gob.pe/cap/" target="_blank" class="sidebar-link">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Antec. Penales</span>
                </a>
            </div>

            <div class="sidebar-item">
                <a href="https://carnetvacunacion.minsa.gob.pe/#/auth" target="_blank" class="sidebar-link">
                    <i class="bi bi-heart-pulse"></i>
                    <span>Revision de Vacunas</span>
                </a>
            </div>

            <div class="sidebar-item">
                <a href="https://multas.jne.gob.pe/login" target="_blank" class="sidebar-link">
                    <i class="bi bi-person-vcard"></i>
                    <span>Multa Electoral</span>
                </a>
            </div>

            <div class="sidebar-item">
                <a href="#submenuHerramientas" class="sidebar-link d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="submenuHerramientas">
                    <div>
                        <i class="bi bi-tools"></i>
                        <span>Herramientas</span>
                    </div>
                    <i class="bi bi-chevron-down small"></i>
                </a>

                <div class="collapse" id="submenuHerramientas">
                    <div class="submenu ms-4 mt-2">
                        <a href="https://www.ilovepdf.com/es/unir_pdf" target="_blank"
                            class="sidebar-link d-block mb-1">
                            <i class="bi bi-files"></i> Unir PDFs
                        </a>
                        <a href="https://www.ilovepdf.com/es/eliminar-paginas" target="_blank"
                            class="sidebar-link d-block mb-1">
                            <i class="bi bi-file-earmark-minus"></i> Eliminar Pág PDF
                        </a>
                        <a href="https://www.ilovepdf.com/es/pdf_a_word" target="_blank" class="sidebar-link d-block">
                            <i class="bi bi-file-earmark-arrow-down"></i> PDF a Word
                        </a>
                    </div>
                </div>
            </div>

        </nav>

        <div class="sidebar-footer">
            <p>&copy; {{ date('Y') }} - GRUPO ELITE APM</p>
        </div>
    </aside>

    <!-- Overlay para móvil -->
    <div class="overlay" id="overlay"></div>

    <!-- Navbar -->
    <header class="navbar" id="navbar">
        <button class="navbar-toggler" id="toggleSidebar">
            <i class="bi bi-list"></i>
        </button>

        <a href="{{ route('dashboard') }}" class="navbar-brand">
            <i class="bi bi-briefcase-fill"></i>

        </a>

        <div class="navbar-menu">

            <!-- <div class="navbar-item dropdown position-relative">
                <a href="#" class="navbar-link d-flex align-items-center position-relative" id="notificationDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Notificaciones">

                    <i class="bi bi-bell fs-5"></i>

                    <span
                        class="notification-badge position-absolute top-0 end-0 badge rounded-pill bg-danger shadow-sm"
                        style="display: none; font-size: 0.65rem; min-width: 18px; height: 18px; line-height: 12px; text-align: center; transform: translate(25%, -25%);">
                        0
                    </span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3"
                    aria-labelledby="notificationDropdown" style="min-width: 320px;">
                    <li class="px-3 pt-2 pb-2 border-bottom d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-semibold text-dark">🔔 Notificaciones</h6>
                        <a href="{{ route('notifications.index') }}" class="small text-primary text-decoration-none">Ver
                            todas</a>
                    </li>
                    <li>
                        <div id="notification-list" class="py-2" style="max-height: 300px; overflow-y: auto;">
                            <p class="text-center text-muted my-2">Cargando notificaciones...</p>
                        </div>
                    </li>
                </ul>
            </div> -->


            <!-- <div class="navbar-item">
                <div class="theme-toggle" id="themeToggle" title="Cambiar tema">
                    <div class="theme-toggle-slider"></div>
                </div>
            </div> -->

            <div class="dropdown navbar-item user-dropdown">
                <button class="user-avatar" id="userDropdownButton" data-bs-toggle="dropdown" aria-expanded="false"
                    title="Usuario">
                    {{ auth()->user() ? strtoupper(substr(auth()->user()->name, 0, 1)) : 'U' }}
                </button>

                <!-- Dropdown de usuario -->
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdownButton">
                    <div class="dropdown-header">
                        <strong>{{ auth()->user() ? auth()->user()->name : 'Usuario' }}</strong>
                        <br>
                        <small>{{ auth()->user() ? auth()->user()->email : 'usuario@ejemplo.com' }}</small>
                    </div>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content" id="mainContent">
        <div class="content-card">
            @yield('content')
        </div>

        <footer>
            <p>&copy; {{ date('Y') }} - Sistema de Gestión de Reclutamiento | GRUPO ELITE APM</p>
        </footer>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Elementos del DOM
            const toggleBtn = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const mainContent = document.getElementById('mainContent');
            const themeToggle = document.getElementById('themeToggle');

            // Toggle Sidebar
            toggleBtn.addEventListener('click', function () {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
                mainContent.classList.toggle('sidebar-show');
            });

            // Cerrar sidebar al hacer clic en el overlay
            overlay.addEventListener('click', function () {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
                mainContent.classList.remove('sidebar-show');
            });

            

            // Cargar preferencia de tema al iniciar
            const savedTheme = localStorage.getItem('darkTheme');
            if (savedTheme === 'true') {
                document.body.classList.add('dark-theme');
                themeToggle.classList.add('dark');
            }

            // Animación de entrada para las tarjetas
            const cards = document.querySelectorAll('.content-card');
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(card);
            });

            // Mejorar experiencia de navegación
            const currentPath = window.location.pathname;
            const sidebarLinks = document.querySelectorAll('.sidebar-link');

            sidebarLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });

            // --- SOLUCIÓN DEFINITIVA PARA EL MODAL ---
            // Mueve todos los modales al final del body para evitar conflictos de z-index
            const modals = document.querySelectorAll('.modal');
            modals.forEach(function (modal) {
                document.body.appendChild(modal);
            });

            const badge = document.querySelector('.notification-badge');
            const notificationList = document.getElementById('notification-list');

            function updateNotifications() {
                // Actualizar el contador
                fetch('{{ route("notifications.count") }}')
                    .then(response => response.json())
                    .then(data => {
                        if (data.count > 0) {
                            badge.textContent = data.count > 99 ? '99+' : data.count;
                            badge.style.display = 'inline-block';
                        } else {
                            badge.style.display = 'none';
                        }
                    })
                    .catch(error => console.error('Error al contar notificaciones:', error));

                // Cargar las últimas 5 notificaciones no leídas
                fetch('{{ route("notifications.dropdown") }}')
                    .then(response => response.text())
                    .then(html => {
                        notificationList.innerHTML = html;
                    })
                    .catch(error => {
                        console.error('Error al cargar notificaciones del dropdown:', error);
                        notificationList.innerHTML = '<p class="text-center text-muted p-2">Error al cargar.</p>';
                    });
            }

            // --- NUEVO Y DEFINITIVO: Marcar como leída y redirigir manualmente ---
            notificationList.addEventListener('click', function (e) {
                const link = e.target.closest('a.notification-item');
                if (link) {
                    e.preventDefault(); // Evitamos la navegación inmediata

                    // 1. Extraer el ID de la NOTIFICACIÓN desde el atributo data
                    const notificationId = link.dataset.notificationId;

                    // 2. Extraer el ID del postulante desde el href para la redirección
                    const postulanteId = link.getAttribute('href').split('/').pop();
                    const redirectUrl = `/sistema_reclutamiento/public/postulantes/${postulanteId}`;

                    // 3. Enviar la petición para marcar como leída usando el ID de la NOTIFICACIÓN
                    fetch(`/notificaciones/${notificationId}/read`, { // <-- ESTA LÍNEA AHORA ES CORRECTA
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            // 4. Redirigimos a la URL que construimos
                            window.location.href = redirectUrl;
                        })
                        .catch(error => {
                            console.error('Error al marcar como leída:', error);
                            // Incluso si hay un error, redirigimos para no romper la experiencia del usuario
                            window.location.href = redirectUrl;
                        });
                }
            });

            // Actualizar al cargar la página
            updateNotifications();

            // Actualizar cada 60 segundos
            setInterval(updateNotifications, 60000);

        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const submenu = document.getElementById("submenuHerramientas");
            const footer = document.querySelector(".sidebar-footer");

            submenu.addEventListener("show.bs.collapse", function () {
                footer.style.display = "none";
            });

            submenu.addEventListener("hide.bs.collapse", function () {
                footer.style.display = "block";
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Cada 10 minutos envía una solicitud para renovar la sesión
            setInterval(() => {
                fetch("{{ url('/keep-alive') }}", { credentials: 'same-origin' })
                    .then(() => console.log('Sesión renovada'))
                    .catch(() => console.warn('No se pudo renovar la sesión'));
            }, 10 * 60 * 1000); // cada 10 minutos
        });
    </script>

</body>

</html>