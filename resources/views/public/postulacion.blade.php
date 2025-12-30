<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postula a Seguridad Profesional</title>
    <meta name="description"
        content="Únete a nuestro equipo de profesionales en seguridad. Explora oportunidades de carrera y envía tu postulación.">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

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
            --hover-underline-color: white;
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
            z-index: 1000;
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
            color: rgba(0, 0, 0, 0.8) !important;
            font-weight: bold;
            margin: 0 10px;
            transition: all 0.3s ease;
            position: relative;
        }

        .navbar-nav .nav-link:hover {
            color: var(--hover-underline-color) !important;
            /* Color blanco al pasar el mouse */
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--hover-underline-color);
            /* Subrayado blanco */
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover::after {
            width: 80%;
            left: 10%;
        }

        .navbar-nav .nav-item a[href="#"] {
            pointer-events: none;
            cursor: default;
            color: inherit;
        }

        /* Hero Carousel Section */
        #heroCarousel {
            position: relative;
            height: 74vh;
            overflow: hidden;
        }

        .carousel-item {
            height: 82vh;
            background-size: cover;
            background-position: center;
            position: relative;
            background-repeat: no-repeat;
        }

        .carousel-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(100deg, var(--primary-color) 0%, #333333 50%);
            opacity: 0.1;
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            align-items: center;
            padding: 0 50px;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
            color: white;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            font-weight: 300;
            margin-bottom: 30px;
            max-width: 700px;
            color: white;
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

        /* Botón posicionado */
        .btn-positioned {
            position: absolute;
            bottom: 220px;
            left: 280px;
            /* transform: translateX(-50%); */
            z-index: 3;
            width: auto;
        }

        /* Carousel Controls */
        .carousel-control-prev,
        .carousel-control-next {
            width: 60px;
            height: 60px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            top: 55%;
            transform: translateY(-50%);
            opacity: 0.8;
            transition: all 0.3s ease;
            z-index: 10;
            position: absolute;
        }

        .carousel-control-prev {
            left: 20px;
        }

        .carousel-control-next {
            right: 20px;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: var(--accent-color);
            color: var(--primary-color);
            opacity: 1;
        }

        .carousel-indicators {
            bottom: 30px;
            z-index: 5;
            display: none !important;

        }

        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            margin: 0 5px;
        }

        .carousel-indicators .active {
            background-color: var(--accent-color);
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

        /* Footer - MODIFICADO para ocupar todo el ancho */
        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 60px 0 30px;
            width: 100%;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-column {
            flex: 1;
            min-width: 250px;
            margin: 0 15px;
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

            .navbar-toggler {
                padding: 3px 8px;
            }

            .form-body {
                padding: 20px;
            }

            .carousel-control-prev {
                left: 10px;
            }

            .carousel-control-next {
                right: 10px;
            }

            #heroCarousel {
                height: 39vh;
            }

            .carousel-item {
                height: 50vh;
                background-size: contain;
            }

            .btn-positioned {
                position: absolute;
                bottom: 146px;
                width: auto;
                left: 55px;
                z-index: 3;
                /* Tamaño del botón (más pequeño) */
                padding: 4px 14px;
                /* reduce el alto y ancho */
                font-size: 0.55rem;
                /* tamaño de letra más pequeño */
                border-radius: 20px;
                /* opcional: esquinas más compactas */
            }


            /* Carousel Controls */
            .carousel-control-prev,
            .carousel-control-next {
                width: 20px;
                height: 20px;
                background-color: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                top: 65%;
                transform: translateY(-50%);
                opacity: 0.8;
                transition: all 0.3s ease;
                z-index: 10;
                position: absolute;
            }

            .carousel-control-prev-icon,
            .carousel-control-next-icon {
                transform: scale(0.5);
                /* más pequeño */
            }

            /* Mejora para el menú responsive */
            .navbar-nav .nav-item {
                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            }

            /* Eliminar los separadores verticales */
            .navbar-nav .nav-item+.nav-item::before {
                content: none;
            }

            .footer-content {
                flex-direction: column;
            }

            .footer-column {
                margin: 20px 0;
                text-align: center;
            }

        }

        /* Modal Styles */
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #333333 100%);
            color: white;
            border-radius: 15px 15px 0 0;
            border: none;
        }

        .modal-title {
            font-weight: 700;
        }

        .modal-body {
            padding: 30px;
        }

        .location-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .location-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .location-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .location-description {
            color: var(--light-text);
            font-size: 0.95rem;
        }

        .location-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #fec72f;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logoo.png') }}" alt="Logo Seguridad"
                    style="height: 60px; width: auto; margin-right: 10px;">

                <div style="display: flex; flex-direction: column; line-height: 1;">
                    <span style="font-weight: 700; font-size: 1.4rem; color: black;">GRUPO ELITE APM</span>
                    <span
                        style="font-size: 0.9rem; color: #000000ff; margin-top: 4px; font-weight: 500; font-style: italic;">
                        Tu seguridad primero
                    </span>
                </div>

            </a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('public.postulacion.form') }}">Inicio</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('public.blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('public.contacto') }}">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('public.cotiza') }}">Cotiza</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('public.nosotros') }}">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('public.servicios') }}">Servicios</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Carousel -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <!-- Slide 1 - Sección 1 -->
            <div class="carousel-item active" style="background-image: url('{{ asset('images/cobertura3.png') }}');">
                <div class="hero-content">
                    <div class="container h-100">
                        <div class="row align-items-center h-100">
                            <div class="col-lg-6 d-flex flex-column justify-content-center">
                                <a href="#postulacion" class="btn-primary-custom btn-positioned">Postula Ahora</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 - Sección 2 -->
            <div class="carousel-item" style="background-image: url('{{ asset('images/cobertura3.png') }}');">
                <div class="hero-content">
                    <div class="container h-100">
                        <div class="row align-items-center h-100">
                            <div class="col-12 d-flex flex-column justify-content-center text-center">
                                <a href="#beneficios" class="btn-primary-custom btn-positioned">Conoce nuestros
                                    beneficios</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 - Sección 3 -->
            <div class="carousel-item" style="background-image: url('{{ asset('images/cobertura3.png') }}');">
                <div class="hero-content">
                    <div class="container h-100">
                        <div class="row align-items-center h-100">
                            <div class="col-lg-6 d-flex flex-column justify-content-center">
                                <a href="#postulacion" class="btn-primary-custom btn-positioned">Inicia tu
                                    postulación</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controles del carrusel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

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
                        <p class="benefit-description">Programas de capacitación continua y oportunidades de ascenso
                            dentro de la empresa.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-shield-plus"></i>
                        </div>
                        <h3 class="benefit-title">Seguridad Laboral</h3>
                        <p class="benefit-description">Cumplimiento estricto de normas de seguridad y equipos de
                            protección de alta calidad.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <h3 class="benefit-title">Salarios Competitivos</h3>
                        <p class="benefit-description">Remuneración justa y competitiva según experiencia y
                            responsabilidades.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <h3 class="benefit-title">Horarios Flexibles</h3>
                        <p class="benefit-description">Diferentes turnos disponibles para adaptarse a tus necesidades
                            personales.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-heart-pulse"></i>
                        </div>
                        <h3 class="benefit-title">Seguro Médico</h3>
                        <p class="benefit-description">Plan de salud completo para ti y tu familia con las mejores
                            clínicas del país.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h3 class="benefit-title">Excelente Ambiente</h3>
                        <p class="benefit-description">Trabaja en un equipo colaborativo con valores de respeto y
                            compañerismo.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cobertura de Lugares Section -->
    <section id="cobertura" class="py-5" style="background-color: var(--bg-light);">
        <div class="container">
            <h2 class="section-title text-center mb-4">Nuestra Cobertura</h2>
            <p class="section-subtitle text-center mb-5">Servimos en múltiples ciudades y regiones del país</p>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="location-card">
                        <img src="https://picsum.photos/seed/lima-location/400/200.jpg" alt="Lima"
                            class="location-image">
                        <h4 class="location-title">Lima Metropolitana</h4>
                        <p class="location-description">Cobertura completa en la capital con servicios de seguridad 24/7
                            en zonas residenciales, comerciales e industriales.</p>
                        <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#limaModal">Ver
                            Detalles</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="location-card">
                        <img src="https://picsum.photos/seed/callao-location/400/200.jpg" alt="Callao"
                            class="location-image">
                        <h4 class="location-title">Callao</h4>
                        <p class="location-description">Protección especializada para el puerto y zonas portuarias con
                            tecnología de vanguardia.</p>
                        <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#callaoModal">Ver
                            Detalles</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="location-card">
                        <img src="https://picsum.photos/seed/arequipa-location/400/200.jpg" alt="Arequipa"
                            class="location-image">
                        <h4 class="location-title">Arequipa</h4>
                        <p class="location-description">Servicios de seguridad adaptados a la cultura y necesidades de
                            la Ciudad Blanca.</p>
                        <button class="btn btn-primary-custom" data-bs-toggle="modal"
                            data-bs-target="#arequipaModal">Ver Detalles</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="location-card">
                        <img src="https://picsum.photos/seed/trujillo-location/400/200.jpg" alt="Trujillo"
                            class="location-image">
                        <h4 class="location-title">Trujillo</h4>
                        <p class="location-description">Seguridad para la ciudad del eterno primavera con personal
                            capacitado localmente.</p>
                        <button class="btn btn-primary-custom" data-bs-toggle="modal"
                            data-bs-target="#trujilloModal">Ver Detalles</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="location-card">
                        <img src="https://picsum.photos/seed/piura-location/400/200.jpg" alt="Piura"
                            class="location-image">
                        <h4 class="location-title">Piura</h4>
                        <p class="location-description">Protección integral en la norteña ciudad con enfoque en
                            seguridad residencial y comercial.</p>
                        <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#piuraModal">Ver
                            Detalles</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="location-card">
                        <img src="https://picsum.photos/seed/ica-location/400/200.jpg" alt="Ica" class="location-image">
                        <h4 class="location-title">Ica</h4>
                        <p class="location-description">Servicios de seguridad para la región vitivinícola con personal
                            especializado.</p>
                        <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#icaModal">Ver
                            Detalles</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modales de Cobertura -->
    <div class="modal fade" id="limaModal" tabindex="-1" aria-labelledby="limaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="limaModalLabel">Detalles de Cobertura - Lima Metropolitana</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://picsum.photos/seed/lima-detail/800/400.jpg" alt="Lima"
                        class="img-fluid rounded mb-4">
                    <h4>Áreas de Cobertura</h4>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Distritos del Cono Norte</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Distritos del Cono Sur</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Distritos del Cono Este</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Distritos del Cono Oeste</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Centro Histórico</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Zonas Comerciales</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Residencias Privadas</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Edificios Corporativos</li>
                    </ul>
                    <h4>Características</h4>
                    <p>Contamos con más de 500 agentes capacitados, patrullaje 24/7, tecnología de monitoreo avanzada y
                        respuesta rápida a emergencias.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary-custom">Solicitar Cotización</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="callaoModal" tabindex="-1" aria-labelledby="callaoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="callaoModalLabel">Detalles de Cobertura - Callao</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://picsum.photos/seed/callao-detail/800/400.jpg" alt="Callao"
                        class="img-fluid rounded mb-4">
                    <h4>Áreas de Cobertura</h4>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Terminal Portuario</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Zona Industrial</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Residencias</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Comercios</li>
                    </ul>
                    <h4>Características</h4>
                    <p>Especializados en seguridad portuaria con certificaciones internacionales y personal bilingüe.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary-custom">Solicitar Cotización</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="arequipaModal" tabindex="-1" aria-labelledby="arequipaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="arequipaModalLabel">Detalles de Cobertura - Arequipa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://picsum.photos/seed/arequipa-detail/800/400.jpg" alt="Arequipa"
                        class="img-fluid rounded mb-4">
                    <h4>Áreas de Cobertura</h4>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Centro Histórico</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Zonas Residenciales</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Comercios</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Industrias</li>
                    </ul>
                    <h4>Características</h4>
                    <p>Personal local capacitado en la cultura arequipeña con enfoque en seguridad residencial y
                        comercial.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary-custom">Solicitar Cotización</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="trujilloModal" tabindex="-1" aria-labelledby="trujilloModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="trujilloModalLabel">Detalles de Cobertura - Trujillo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://picsum.photos/seed/trujillo-detail/800/400.jpg" alt="Trujillo"
                        class="img-fluid rounded mb-4">
                    <h4>Áreas de Cobertura</h4>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Centro Histórico</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Zonas Modernas</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Residencias</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Comercios</li>
                    </ul>
                    <h4>Características</h4>
                    <p>Seguridad adaptada a la cultura trujillana con personal capacitado localmente.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary-custom">Solicitar Cotización</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="piuraModal" tabindex="-1" aria-labelledby="piuraModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="piuraModalLabel">Detalles de Cobertura - Piura</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://picsum.photos/seed/piura-detail/800/400.jpg" alt="Piura"
                        class="img-fluid rounded mb-4">
                    <h4>Áreas de Cobertura</h4>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Centro Comercial</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Residencias</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Industrias</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Zonas Turísticas</li>
                    </ul>
                    <h4>Características</h4>
                    <p>Protección integral en la norteña ciudad con enfoque en seguridad residencial y comercial.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary-custom">Solicitar Cotización</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="icaModal" tabindex="-1" aria-labelledby="icaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="icaModalLabel">Detalles de Cobertura - Ica</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://picsum.photos/seed/ica-detail/800/400.jpg" alt="Ica"
                        class="img-fluid rounded mb-4">
                    <h4>Áreas de Cobertura</h4>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Bodegas Vinícolas</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Residencias</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Comercios</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Industrias</li>
                    </ul>
                    <h4>Características</h4>
                    <p>Servicios de seguridad para la región vitivinícola con personal especializado en el sector.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary-custom">Solicitar Cotización</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <section id="postulacion" class="form-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="form-card">
                        <div class="form-header">
                            <h2 class="form-title">Formulario de Postulación</h2>
                            <p class="form-subtitle">Completa todos los campos para ser considerado en nuestro proceso
                                de selección</p>
                        </div>
                        <div class="form-body">
                            {{-- Mensajes de éxito o error --}}
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle-fill me-2"></i>
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
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
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('public.postulacion.store') }}" method="POST" class="row g-3">
                                @csrf
                                <div class="col-12">
                                    <label for="apellidos_nombres" class="form-label">Apellidos y Nombres</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control" id="apellidos_nombres"
                                            name="apellidos_nombres" required>
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
                                        <input type="text" class="form-control" id="ciudad_postular"
                                            name="ciudad_postular" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                        <input type="date" class="form-control" id="fecha_nacimiento"
                                            name="fecha_nacimiento" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="detalle_experiencia" class="form-label">Detalla tu experiencia</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-file-text"></i></span>
                                        <textarea class="form-control" id="detalle_experiencia"
                                            name="detalle_experiencia" rows="4" required></textarea>
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

    <!-- Footer Mejorado con todo el ancho y 4 columnas -->
    <footer id="contacto">
        <div class="footer-content">
            <!-- Logo en el footer -->
            <div class="footer-column">
                <a class="d-inline-block" href="{{ route('public.postulacion.form') }}">
                    <img src="{{ asset('images/logo2.png') }}" alt="Logo Seguridad"
                        style="height: 100px; width: auto; margin-bottom: 20px;">
                </a>
                <!-- <p style="color: rgba(255, 255, 255, 0.7); max-width: 300px;">
                    Líderes en soluciones de seguridad integral, comprometidos con la protección de nuestros clientes
                    y el desarrollo profesional de nuestro equipo.
                </p> -->
            </div>

            <!-- Enlaces rápidos -->
            <div class="footer-column">
                <h5 class="footer-title" style="margin-bottom: 15px;">Enlaces Rápidos</h5>
                <ul class="footer-links">
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#beneficios">Beneficios</a></li>
                    <li><a href="#postulacion">Postulación</a></li>
                    <li><a href="#">Política de Privacidad</a></li>
                </ul>
            </div>

            <!-- Contacto -->
            <div class="footer-column">
                <h5 class="footer-title" style="margin-bottom: 15px;">Contacto</h5>
                <ul class="footer-links">
                    <li><i class="bi bi-geo-alt me-2"></i> Av. Principal 123, Lima, Perú</li>
                    <li><i class="bi bi-telephone me-2"></i> (01) 123 4567</li>
                    <li><i class="bi bi-envelope me-2"></i> contact@seguridad.com</li>
                </ul>
            </div>

            <!-- Redes Sociales -->
            <div class="footer-column">
                <h5 class="footer-title" style="margin-bottom: 15px;">Nuestras redes sociales</h5>
                <div class="social-icons">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                </div>
            </div>

        </div>

        <!-- Copyright -->
        <div class="copyright">
            <p>&copy; {{ date('Y') }} | GRUPO ELITE APM</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para carrusel -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var myCarousel = document.getElementById('heroCarousel');
            if (myCarousel) {
                var carousel = new bootstrap.Carousel(myCarousel, {
                    interval: 5000,
                    ride: true
                });
            }
        });
    </script>

    <!-- Script para scroll suave -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const navbarHeight = document.querySelector('.navbar').offsetHeight;
                    const elementPosition = target.offsetTop;
                    const offsetPosition = elementPosition - navbarHeight;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

    <!-- Botón de WhatsApp flotante con lógica de responsive -->
    <div class="whatsapp-float">
        <a href="#" class="whatsapp-button">
            <i class="bi bi-whatsapp"></i>
        </a>
    </div>

    <script>
        // Función para asignar el enlace y target correctos según el tamaño de pantalla
        function setWhatsAppLink() {
            const whatsappButton = document.querySelector('.whatsapp-button');
            const isMobile = window.innerWidth <= 768; // Consideramos móvil si el ancho es 768px o menos

            if (isMobile) {
                // Para móviles: abre la app nativa de WhatsApp en la misma ventana
                whatsappButton.href = 'https://wa.me/962572664';
                whatsappButton.removeAttribute('target');
            } else {
                // Para PCs: abre WhatsApp Web en una nueva ventana
                whatsappButton.href = 'https://web.whatsapp.com/send/?phone=962572664&text&type=phone_number&app_absent=0';
                whatsappButton.target = '_blank';
            }
        }

        // Asignar el enlace al cargar la página
        document.addEventListener('DOMContentLoaded', setWhatsAppLink);

        // Reasignar el enlace si cambia el tamaño de la ventana
        window.addEventListener('resize', setWhatsAppLink);
    </script>

    <style>
        /* Estilos para el botón de WhatsApp */
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
        }

        .whatsapp-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background-color: #25d366;
            color: white;
            border-radius: 50%;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            animation: pulse 1.5s infinite ease-in-out;
        }

        .whatsapp-button i {
            font-size: 28px;
        }

        /* Animación de latido/pulso mejorada */
        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.4);
            }

            50% {
                transform: scale(1.05);
                box-shadow: 0 0 0 10px rgba(37, 211, 102, 0);
            }

            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        /* Estilo para dispositivos móviles - MÁS PEQUEÑO */
        @media (max-width: 768px) {
            .whatsapp-float {
                bottom: 20px;
                right: 20px;
            }

            .whatsapp-button {
                width: 50px;
                /* Más pequeño que en PC */
                height: 50px;
            }

            .whatsapp-button i {
                font-size: 24px;
                /* Icono más pequeño */
            }
        }
    </style>
</body>

</html>