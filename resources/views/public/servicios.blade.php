@extends('layouts.postular')

@section('content')

    <style>
        .section-title {
            font-weight: 800;
            font-size: 2.6rem;
            text-align: center;
            margin-bottom: 30px;
            color: #000000ff;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .section-subtitle {
            font-size: 1.25rem;
            color: #555;
            max-width: 950px;
            line-height: 1.7;
            margin-top: 8px;
        }

        /* ==== CARD PRO ===== */
        .service-card {
            border-radius: 5px;
            overflow: hidden;
            transition: 0.35s ease;
            border: none;
            background: #ffffff;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.10);
            position: relative;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.20);
        }

        /* Imagen vertical completa */
        /* Imagen vertical completa (NUEVO) */
        .service-card img {
            width: 100%;
            height: 460px;
            /* <=== Más vertical */
            object-fit: cover;
            /* <=== Se llena, sin bordes */
            background: #f1f1f1;
            border-bottom: 0;
        }

        .service-card .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding-bottom: 20px;
        }

        .service-card .btn-primary-custom {
            margin-top: auto;
            align-self: flex-start;
            /* opcional si quieres que quede alineado a la izquierda */
        }

        .btn-primary-custom {
            background-color: #fec72f;
            border: none;
            padding: 10px 22px;
            border-radius: 12px;
            font-weight: 500;
            transition: 0.3s ease;
            color: #000000ff;
        }

        .btn-primary-custom:hover {
            background-color: #fec72f;
            transform: scale(1.04);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.35);
        }


        /* =============================== */
        /*        MODAL PREMIUM PRO        */
        /* =============================== */

        .modal-content {
            border-radius: 20px;
            overflow: hidden;
            border: none;
        }

        /* Fondo difuminado */
        .modal-header-bg {
            position: relative;
            width: 100%;
            height: 340px;
            overflow: hidden;
            border-radius: 14px;
        }

        .modal-header-bg .blur-img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: blur(14px) brightness(0.6);
            transform: scale(1.2);
        }

        /* Imagen principal vertical */
        .modal-header-bg .main-img {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 260px;
            transform: translate(-50%, -50%);
            border-radius: 14px;
            z-index: 2;
            background: #fff;
            padding: 6px;
            object-fit: contain;
            height: 320px;
        }

        .modal-body {
            padding: 35px;
        }

        .modal-body h3 {
            font-size: 1.9rem;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .modal-body ul li {
            margin-bottom: 6px;
            font-size: 1.05rem;
        }

        .service-img {
            cursor: pointer;
        }

        .service-img:hover {
            filter: brightness(0.95);
        }

        @media (max-width: 768px) {

            /* Header más alto */
            .modal-header-bg {
                height: 800px;
                /* antes 220px */
            }

            /* Imagen principal más grande y más abajo */
            .modal-header-bg .main-img {
                width: 220px;
                /* antes 160px */
                height: 260px;
                /* antes 200px */
                padding: 6px;
                top: 50%;
                /* baja la imagen */
            }

            /* Fondo blur un poco más suave */
            .modal-header-bg .blur-img {
                filter: blur(12px) brightness(0.6);
            }

            /* Texto centrado en móvil */
            .modal-body h3,
            .modal-body .lead {
                text-align: center;
            }
        }
    </style>


    <div class="container py-5">
        <h1 class="section-title">Nuestros Servicios</h1>
        <p class="section-subtitle text-center mx-auto mb-5">
            Brindamos soluciones integrales en seguridad con personal altamente capacitado,
            tecnología avanzada y un enfoque preventivo que garantiza protección, control
            y confianza en cada operación.
        </p>


        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 service-card">
                    <img src="{{ asset('images/avp.jpg') }}" alt="Agente de Seguridad" class="service-img"
                        data-bs-toggle="modal" data-bs-target="#modalSeguridad">

                    <div class="card-body">
                        <h3>Agente de Seguridad</h3>
                        <p>Profesionales especializados en vigilancia y protección.</p>

                        <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#modalSeguridad">
                            Saber Más
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 service-card">
                    <img src="{{ asset('images/avp.jpg') }}" alt="Agente Armado" class="service-img" data-bs-toggle="modal"
                        data-bs-target="#modalArmado">

                    <div class="card-body">
                        <h3>Agentes Armados</h3>
                        <p>Personal táctico con entrenamiento militar/policial.</p>

                        <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#modalArmado">
                            Saber Más
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 service-card">
                    <img src="{{ asset('images/avp.jpg') }}" alt="Operador CCTV" class="service-img" data-bs-toggle="modal"
                        data-bs-target="#modalCCTV">
                    <div class="card-body">
                        <h3>Operadores de CCTV</h3>
                        <p>Monitoreo continuo y gestión de incidentes.</p>
                        <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#modalCCTV">
                            Saber Más
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalSeguridad" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header-bg">
                    <img src="{{ asset('images/avp.jpg') }}" class="blur-img">
                    <img src="{{ asset('images/avp.jpg') }}" class="main-img">
                </div>
                <div class="modal-body">
                    <h3>Agente de Seguridad</h3>
                    <p>Personal capacitado en vigilancia, control de accesos y respuesta ante incidentes.</p>
                    <ul>
                        <li>Control de accesos</li>
                        <li>Rondas continuas</li>
                        <li>Prevención de pérdidas</li>
                        <li>Atención al cliente</li>
                        <li>Primeros auxilios</li>
                    </ul>
                    <div class="text-end mt-4">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalArmado" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header-bg">
                    <img src="{{ asset('images/avp.jpg') }}" class="blur-img">
                    <img src="{{ asset('images/avp.jpg') }}" class="main-img">
                </div>
                <div class="modal-body">
                    <h3>Agentes Armados</h3>
                    <p>Operadores altamente entrenados en protección táctica.</p>
                    <ul>
                        <li>Porte legal de armas</li>
                        <li>Reacción ante amenazas</li>
                        <li>Protección de valores</li>
                        <li>Operaciones de riesgo</li>
                    </ul>
                    <div class="text-end mt-4">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCCTV" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Header visual -->
                <div class="modal-header-bg">
                    <img src="{{ asset('images/avp.jpg') }}" class="blur-img">
                    <img src="{{ asset('images/avp.jpg') }}" class="main-img">
                </div>

                <!-- Body -->
                <div class="modal-body">

                    <h3 class="mb-3">Operadores de CCTV</h3>
                    <p class="lead">
                        Nuestro servicio de monitoreo CCTV garantiza vigilancia continua,
                        detección temprana de riesgos y respuesta inmediata ante cualquier incidente.
                    </p>

                    <!-- Info en columnas -->
                    <div class="row mt-4">

                        <!-- Funciones -->
                        <div class="col-md-6 mb-4">
                            <h5 class="fw-bold">
                                <i class="bi bi-eye-fill text-warning me-2"></i>
                                Funciones principales
                            </h5>
                            <ul class="list-unstyled mt-3">
                                <li>✔ Monitoreo permanente 24/7</li>
                                <li>✔ Análisis y seguimiento de eventos sospechosos</li>
                                <li>✔ Gestión y verificación de alarmas</li>
                                <li>✔ Registro y reporte de incidencias</li>
                                <li>✔ Coordinación inmediata con supervisores</li>
                            </ul>
                        </div>

                        <!-- Beneficios -->
                        <div class="col-md-6 mb-4">
                            <h5 class="fw-bold">
                                <i class="bi bi-shield-check text-warning me-2"></i>
                                Beneficios del servicio
                            </h5>
                            <ul class="list-unstyled mt-3">
                                <li>✔ Reducción de riesgos y pérdidas</li>
                                <li>✔ Respuesta rápida ante emergencias</li>
                                <li>✔ Control total de las instalaciones</li>
                                <li>✔ Evidencia visual para auditorías</li>
                                <li>✔ Mayor tranquilidad para su empresa</li>
                            </ul>
                        </div>

                    </div>

                    <!-- Tecnologías -->
                    <div class="mt-4">
                        <h5 class="fw-bold">
                            <i class="bi bi-camera-video-fill text-warning me-2"></i>
                            Tecnología utilizada
                        </h5>
                        <p class="mt-2">
                            Sistemas de videovigilancia digital, cámaras HD e IP,
                            grabación continua, detección de movimiento,
                            control de accesos y plataformas de monitoreo remoto.
                        </p>
                    </div>

                    <!-- CTA -->
                    <div class="d-flex justify-content-between align-items-center mt-5">
                        <small class="text-muted">
                            Servicio disponible para empresas, condominios y proyectos especiales.
                        </small>

                        <div>
                            <a href="#postulacion" class="btn btn-primary-custom me-2">
                                Solicitar Servicio
                            </a>
                            <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Cerrar
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection