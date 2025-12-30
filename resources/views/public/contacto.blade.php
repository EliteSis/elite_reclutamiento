@extends('layouts.postular')

@section('content')

    <style>
        /* ================== ESTILOS GENERALES ================== */
        .section-title {
            font-weight: 800;
            font-size: 2.6rem;
            letter-spacing: 1px;
        }

        /* ================== CARD CONTACTO ================== */
        .contact-card {
            border-radius: 22px;
            overflow: hidden;
            animation: fadeUp 0.9s ease forwards;
        }

        /* ================== ICON BOX ================== */
        .icon-box {
            width: 55px;
            height: 55px;
            background-color: #25D36615;
            color: #25D366;
            border-radius: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            transition: 0.3s ease;
            flex-shrink: 0;
        }

        .icon-box:hover {
            background-color: #25D36630;
            transform: translateY(-3px);
        }

        /* ================== BOTÓN WHATSAPP ================== */
        .whats-btn {
            border-radius: 16px;
            font-weight: 700;
            padding: 14px 32px;
            font-size: 1.1rem;
            transition: 0.3s ease;
        }

        .whats-btn:hover {
            transform: scale(1.07);
            box-shadow: 0 10px 28px rgba(37, 211, 102, 0.45);
        }

        /* ================== IMAGEN ASISTENTA ================== */
        .contact-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* ================== ANIMACIÓN ================== */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="container py-5">

        <h1 class="section-title text-center mb-4">Contacto</h1>

        <p class="text-center text-muted mb-5 mx-auto" style="max-width: 700px; font-size: 1.15rem;">
            Nuestro equipo de atención está listo para brindarte información, resolver tus consultas
            y ofrecerte la mejor solución en seguridad.
        </p>

        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card shadow-lg border-0 contact-card">
                    <div class="row g-0">

                        <!-- ========= IMAGEN ========= -->
                        <div class="col-md-5">
                            <img src="{{ asset('images/callcenter2.png') }}"
                                alt="Asistente de atención" class="contact-img">
                        </div>

                        <!-- ========= INFORMACIÓN ========= -->
                        <div class="col-md-7">
                            <div class="card-body p-5">

                                <h3 class="mb-4" style="font-weight: 700;">
                                    Estamos aquí para ayudarte
                                </h3>

                                <ul class="list-unstyled">

                                    <li class="mb-4 d-flex align-items-center">
                                        <div class="icon-box me-3">
                                            <i class="bi bi-telephone-fill"></i>
                                        </div>
                                        <div>
                                            <strong>Teléfono</strong><br>
                                            <span class="text-muted">(51) 962572664</span>
                                        </div>
                                    </li>

                                    <li class="mb-4 d-flex align-items-center">
                                        <div class="icon-box me-3">
                                            <i class="bi bi-envelope-fill"></i>
                                        </div>
                                        <div>
                                            <strong>Correo</strong><br>
                                            <span class="text-muted">contacto@seguridad.com</span>
                                        </div>
                                    </li>

                                    <li class="mb-4 d-flex align-items-center">
                                        <div class="icon-box me-3">
                                            <i class="bi bi-geo-alt-fill"></i>
                                        </div>
                                        <div>
                                            <strong>Dirección</strong><br>
                                            <span class="text-muted">Av. Principal 123, Lima</span>
                                        </div>
                                    </li>
                                </ul>

                                <div class="mt-5">
                                    <a href="https://wa.me/51912345678" class="btn btn-success btn-lg whats-btn w-100">
                                        <i class="bi bi-whatsapp me-2"></i>
                                        Escríbenos por WhatsApp
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection