{{-- resources/views/public/postulacion.blade.php --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postula a Seguridad Profesional</title>
    <meta name="description" content="Únete a nuestro equipo de profesionales en seguridad. Explora oportunidades de carrera y envía tu postulación.">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Estilos personalizados -->
    <style>
        :root {
            --primary-color: #222222;
            --accent-color: #fec72f;
            --light-accent: #fff5d6;
            --dark-accent: #e6b828;
            --text-color: #333333;
            --light-text: #6c757d;
            --bg-light: #f8f9fa;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            color: var(--text-color);
            line-height: 1.6;
        }
        
        /* Header Styles */
        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            display: flex;
            align-items: center;
        }
        
        .navbar-brand i {
            color: var(--accent-color);
            margin-right: 10px;
        }
        
        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 500;
            margin: 0 10px;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .navbar-nav .nav-link:hover {
            color: white !important;
        }
        
        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--accent-color);
            transition: all 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover::after {
            width: 80%;
            left: 10%;
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, #333333 100%);
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://picsum.photos/seed/security/1920/800.jpg');
            background-size: cover;
            background-position: center;
            opacity: 0.2;
            z-index: 0;
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
        }
        
        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
            font-weight: 300;
            margin-bottom: 30px;
            max-width: 700px;
        }
        
        .btn-primary-custom {
            background-color: var(--accent-color);
            color: var(--primary-color);
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 50px;
            border: none;
            transition: all 0.3s ease;
            display: inline-block;
            text-decoration: none;
        }
        
        .btn-primary-custom:hover {
            background-color: var(--dark-accent);
            color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        /* Benefits Section */
        .benefits-section {
            padding: 80px 0;
            background-color: white;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 20px;
            text-align: center;
        }
        
        .section-subtitle {
            font-size: 1.1rem;
            color: var(--light-text);
            text-align: center;
            max-width: 700px;
            margin: 0 auto 60px;
        }
        
        .benefit-card {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
            text-align: center;
        }
        
        .benefit-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .benefit-icon {
            width: 80px;
            height: 80px;
            background-color: var(--light-accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        
        .benefit-icon i {
            font-size: 2rem;
            color: var(--accent-color);
        }
        
        .benefit-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--primary-color);
        }
        
        .benefit-description {
            color: var(--light-text);
        }
        
        /* Form Section */
        .form-section {
            padding: 80px 0;
            background-color: var(--bg-light);
        }
        
        .form-card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .form-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #333333 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .form-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .form-subtitle {
            font-size: 1rem;
            opacity: 0.9;
        }
        
        .form-body {
            padding: 40px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-label {
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--primary-color);
        }
        
        .form-control {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(254, 199, 47, 0.25);
        }
        
        .btn-submit {
            background-color: var(--accent-color);
            color: var(--primary-color);
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 50px;
            border: none;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 1.1rem;
        }
        
        .btn-submit:hover {
            background-color: var(--dark-accent);
            color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        /* Footer */
        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 60px 0 30px;
        }
        
        .footer-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: white;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-links a:hover {
            color: var(--accent-color);
        }
        
        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin-right: 10px;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            background-color: var(--accent-color);
            color: var(--primary-color);
        }
        
        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 30px;
            padding-top: 30px;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
        }
        
        /* Animaciones */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.2rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .form-body {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-shield-check"></i>
                Seguridad Profesional
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#beneficios">Beneficios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#postulacion">Postulación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="inicio" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content animate-fade-in-up">
                    <h1 class="hero-title">Únete a Nuestro Equipo de Seguridad</h1>
                    <p class="hero-subtitle">Forma parte de una empresa líder en soluciones de seguridad con oportunidades de crecimiento profesional.</p>
                    <a href="#postulacion" class="btn-primary-custom">Postula Ahora</a>
                </div>
                <div class="col-lg-6">
                    <img src="https://picsum.photos/seed/security-team/600/400.jpg" alt="Equipo de seguridad" class="img-fluid rounded-3 shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="beneficios" class="benefits-section">
        <div class="container">
            <h2 class="section-title">¿Por qué trabajar con nosotros?</h2>
            <p class="section-subtitle">Ofrecemos un ambiente de trabajo profesional con beneficios competitivos</p>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <h3 class="benefit-title">Crecimiento Profesional</h3>
                        <p class="benefit-description">Programas de capacitación continua y oportunidades de ascenso dentro de la empresa.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-shield-plus"></i>
                        </div>
                        <h3 class="benefit-title">Seguridad Laboral</h3>
                        <p class="benefit-description">Cumplimiento estricto de normas de seguridad y equipos de protección de alta calidad.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <h3 class="benefit-title">Salarios Competitivos</h3>
                        <p class="benefit-description">Remuneración justa y competitiva según experiencia y responsabilidades.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <h3 class="benefit-title">Horarios Flexibles</h3>
                        <p class="benefit-description">Diferentes turnos disponibles para adaptarse a tus necesidades personales.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-heart-pulse"></i>
                        </div>
                        <h3 class="benefit-title">Seguro Médico</h3>
                        <p class="benefit-description">Plan de salud completo para ti y tu familia con las mejores clínicas del país.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h3 class="benefit-title">Excelente Ambiente</h3>
                        <p class="benefit-description">Trabaja en un equipo colaborativo con valores de respeto y compañerismo.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section id="postulacion" class="form-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="form-card">
                        <div class="form-header">
                            <h2 class="form-title">Formulario de Postulación</h2>
                            <p class="form-subtitle">Completa todos los campos para ser considerado en nuestro proceso de selección</p>
                        </div>
                        <div class="form-body">
                            {{-- Mensajes de éxito o error --}}
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle-fill me-2"></i>
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                    <strong>Por favor, corrige los siguientes errores:</strong>
                                    <ul class="mb-0 mt-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('public.postulacion.store') }}" method="POST" class="row g-3">
                                @csrf
                                <div class="col-12">
                                    <label for="apellidos_nombres" class="form-label">Apellidos y Nombres</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control" id="apellidos_nombres" name="apellidos_nombres" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="dni" class="form-label">DNI</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                        <input type="text" class="form-control" id="dni" name="dni" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="telefono" class="form-label">Celular</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="ciudad_postular" class="form-label">Ciudad donde postula</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                        <input type="text" class="form-control" id="ciudad_postular" name="ciudad_postular" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="detalle_experiencia" class="form-label">Detalla tu experiencia</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-file-text"></i></span>
                                        <textarea class="form-control" id="detalle_experiencia" name="detalle_experiencia" rows="4" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-submit">
                                        <i class="bi bi-send me-2"></i>Enviar Postulación
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contacto">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h3 class="footer-title">
                        <i class="bi bi-shield-check me-2"></i>Seguridad Profesional
                    </h3>
                    <p>Líderes en soluciones de seguridad integral, comprometidos con la protección de nuestros clientes y el desarrollo profesional de nuestro equipo.</p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="footer-title">Enlaces Rápidos</h5>
                    <ul class="footer-links">
                        <li><a href="#inicio">Inicio</a></li>
                        <li><a href="#beneficios">Beneficios</a></li>
                        <li><a href="#postulacion">Postulación</a></li>
                        <li><a href="#">Política de Privacidad</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Contacto</h5>
                    <ul class="footer-links">
                        <li><i class="bi bi-geo-alt me-2"></i> Av. Principal 123, Lima, Perú</li>
                        <li><i class="bi bi-telephone me-2"></i> (01) 123 4567</li>
                        <li><i class="bi bi-envelope me-2"></i> contact@seguridad.com</li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5 class="footer-title">Newsletter</h5>
                    <p>Suscríbete para recibir noticias y ofertas de trabajo.</p>
                    <form class="mt-3">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Tu correo electrónico">
                            <button class="btn btn-warning" type="submit">Suscribir</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; {{ date('Y') }} Seguridad Profesional. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script para scroll suave -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>

</html>