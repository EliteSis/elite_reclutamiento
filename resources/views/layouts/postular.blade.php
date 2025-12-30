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

        /* Content spacing */
        .content-section {
            padding-top: 100px;
            padding-bottom: 40px;
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
            color: var(--light-accent);
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

            .content-section {
                padding-top: 80px;
            }

            /* Mejora para el menú responsive */
            .navbar-nav .nav-item {
                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            }

            .navbar-nav .nav-item:last-child {
                border-bottom: none;
            }

            .navbar-nav .nav-link {
                padding: 1rem 1.5rem;
                display: block;
                text-align: left;
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
            <a class="navbar-brand d-flex align-items-center" href="{{ route('public.postulacion.form') }}">
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

    <!-- Contenido dinámico -->
    <div class="content-section">
        @yield('content')
    </div>

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
            <!-- <div class="footer-column">
                <h5 class="footer-title" style="margin-bottom: 15px;">Enlaces Rápidos</h5>
                <ul class="footer-links">
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#beneficios">Beneficios</a></li>
                    <li><a href="#postulacion">Postulación</a></li>
                    <li><a href="#">Política de Privacidad</a></li>
                </ul>
            </div> -->

            <!-- Contacto -->
            <div class="footer-column">
                <h5 class="footer-title" style="margin-bottom: 15px;">Contacto</h5>
                <ul class="footer-links">
                    <li><i class="bi bi-geo-alt me-2"></i> Av. Principal 123, Lima, Perú</li>
                    <li><i class="bi bi-telephone me-2"></i> (01) 123 4567</li>
                    <li><i class="bi bi-envelope me-2"></i> contact@seguridad.com</li>
                </ul>
            </div>

            <!-- Contacto -->
            <div class="footer-column">
                <h5 class="footer-title" style="margin-bottom: 15px;">Oferta Laboral</h5>
                <ul class="footer-links">
                    <li><i class="bi-file-earmark-text me-2"></i><a href="{{ url('/#postulacion') }}"> Click para postular</a>
                    </li>
                    <li><i class="bi bi-telephone me-2"></i> 943778558</li>
                    <li><i class="bi bi-envelope me-2"></i> contact@seguridad.com</li>
                </ul>
            </div>

            <!-- Redes Sociales -->
            <div class="footer-column">
                <h5 class="footer-title" style="margin-bottom: 15px;">Nuestras redes sociales</h5>
                <div class="social-icons">
                    <a href="https://www.facebook.com/profile.php?id=100094436530550"><i class="bi bi-facebook"></i></a>
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