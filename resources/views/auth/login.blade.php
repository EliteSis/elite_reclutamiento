<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="images/logoo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Gestión de Reclutamiento">
    <title>Inicio de Sesión | GRUPO ELITE APM</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #f72585;
            --dark-color: #2b2d42;
            --light-color: #f8f9fa;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }

        .main-container {
            position: relative;
            display: flex;
            height: 100vh;
            width: 100%;
        }

        /* Imagen de fondo que ocupa toda la pantalla */
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://picsum.photos/seed/reclutamiento/1920/1080.jpg');
            /* <-- REEMPLAZA ESTA URL CON TU IMAGEN */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: 1;
        }

        /* Overlay oscuro para mejorar la legibilidad */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(43, 45, 66, 0.85) 0%, rgba(67, 97, 238, 0.75) 100%);
            z-index: 2;
        }

        /* Sección izquierda con el título y logo */
        .left-section {
            position: relative;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* <-- MODIFICADO: Centra el contenido horizontalmente */
            padding: 8rem;
            color: white;
            z-index: 8;
            text-align: center;
            /* Añadido para asegurar que el texto también esté centrado */
        }

        .hero-logo {
            margin-bottom: 1.5rem;
        }

        .hero-title {
            font-size: 4.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            font-weight: 300;
            opacity: 0.9;
            max-width: 500px;
            font-style: italic;
        }

        /* Sección derecha con el formulario de login */
        .right-section {
            position: relative;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 3rem;
            z-index: 3;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
        }

        .login-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .login-logo {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 36px;
        }

        .login-body {
            padding: 40px 30px;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            padding: 12px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(67, 97, 238, 0.3);
        }

        .alert {
            border-radius: 8px;
            border: none;
        }

        .input-group-text {
            background: transparent;
            border-right: none;
        }

        .form-control {
            border-left: none;
        }

        .input-group .form-control:focus {
            border-left: none;
        }

        .input-group {
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
        }

        .input-group:focus-within {
            border-color: var(--primary-color);
        }

        .input-group:focus-within .input-group-text {
            border-color: var(--primary-color);
        }

        /* Responsive para móviles */
        @media (max-width: 992px) {
            .main-container {
                flex-direction: column;
            }

            .left-section,
            .right-section {
                padding: 2rem;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }
        }
    </style>
</head>

<body>
    <div class="main-container">
        <!-- Imagen de fondo única -->
        <div class="background-image"></div>
        <div class="overlay"></div>

        <!-- Sección Izquierda: Título y Logo -->
        <div class="left-section" data-aos="fade-right">
            <div class="hero-logo">
                <img src="{{ asset('images/logoo.png') }}" alt="Logo" width="190" height="190">
            </div>
            <h1 class="hero-title">GRUPO ELITE APM</h1>
            <p class="hero-subtitle">Sistema de Reclutamiento</p>
        </div>

        <!-- Sección Derecha: Formulario de Login -->
        <div class="right-section" data-aos="fade-left">
            <div class="login-container">
                <div class="login-card">
                    <div class="login-header">
                        <div class="login-logo">
                            <i class="bi bi-briefcase-fill"></i>
                        </div>
                        <h2 class="mb-0">Iniciar Sesión</h2>
                    </div>

                    <div class="login-body">
                        <!-- Mensajes de sesión -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('info'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                {{ session('info') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Formulario de login -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}"
                                        placeholder="correo@ejemplo.com" required autocomplete="email" autofocus>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Contraseña -->
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="••••••••" required
                                        autocomplete="current-password">
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Recordar y Olvidé -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">
                                        Recordarme
                                    </label>
                                </div>
                            </div>

                            <!-- Botón de envío -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-login">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    Iniciar Sesión
                                </button>
                            </div>
                        </form>

                        <!-- Información adicional -->
                        <div class="text-center mt-4">
                            <p class="text-muted mb-0">
                                Sistema de Reclutamiento v1.0
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inicializar AOS
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>

</html>