@extends('layouts.postular')

@section('content')

    <style>
        /* ================= ANIMACIONES ================= */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(20px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        /* ================= SECCIÓN ================= */
        .blog-section {
            animation: fadeUp 0.9s ease forwards;
        }

        .section-title {
            font-size: 2.3rem;
            font-weight: 800;
            color: #1a202c;
            margin-bottom: 3rem;
            position: relative;
        }

        /* ================= TARJETAS ================= */
        .blog-card {
            background: rgba(255, 255, 255, 0.78);
            backdrop-filter: blur(12px);
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, 0.35);
            box-shadow: 0 18px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.35s ease;
        }

        .blog-card:hover {
            transform: translateY(-10px) scale(1.01);
            box-shadow: 0 30px 55px rgba(0, 0, 0, 0.18);
        }

        .card-body {
            padding: 2.3rem;
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.8rem;
        }

        .card-text {
            color: #4a5568;
            line-height: 1.7;
        }

        .card-date {
            font-size: 0.85rem;
            color: #718096;
            margin-bottom: 1.8rem;
        }

        /* ================= ICONOS ================= */
        .security-icon::before {
            content: "🔐";
            margin-right: 0.4rem;
        }

        .jobs-icon::before {
            content: "🚀";
            margin-right: 0.4rem;
        }

        /* ================= BOTONES ================= */
        .btn-primary-custom {
            background: linear-gradient(135deg, #4299e1, #667eea);
            color: #fff;
            border-radius: 999px;
            padding: 0.75rem 2.2rem;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #3182ce, #5a67d8);
            transform: translateY(-2px);
        }

        .btn-primary-custom i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .btn-primary-custom:hover i {
            transform: translateX(5px);
        }

        /* ================= MODAL ================= */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.65);
            backdrop-filter: blur(6px);
            z-index: 2000;
        }

        .modal-content {
            background: #ffffff;
            border-radius: 22px;
            max-width: 750px;
            width: 90%;
            margin: 6% auto;
            padding: 2.5rem;
            animation: modalIn 0.35s ease;
            box-shadow: 0 35px 70px rgba(0, 0, 0, 0.25);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .modal-title {
            font-size: 1.7rem;
            font-weight: 800;
            color: #1a202c;
        }

        .close-btn {
            font-size: 1.8rem;
            background: none;
            border: none;
            cursor: pointer;
            color: #a0aec0;
        }

        .close-btn:hover {
            color: #e53e3e;
        }

        .modal-body {
            color: #4a5568;
            line-height: 1.8;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 2rem;
        }

        .btn-secondary {
            background: #edf2f7;
            border-radius: 999px;
            padding: 0.7rem 2rem;
            font-weight: 600;
            border: none;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 768px) {
            .section-title {
                font-size: 1.9rem;
            }

            .modal-content {
                margin: 15% auto;
                padding: 2rem;
            }
        }
    </style>

    <div class="container py-5">
        <h1 class="section-title">Blog</h1>

        <div class="row">
            <!-- CARD SEGURIDAD -->
            <div class="col-md-4 mb-4 blog-section">
                <div class="card h-100 blog-card">
                    <div class="card-body">
                        <h3 class="card-title security-icon">Noticias de Seguridad</h3>
                        <p class="card-text">
                            Mantente informado sobre las últimas tendencias y novedades en seguridad digital.
                        </p>
                        <p class="card-date">01 diciembre 2023</p>
                        <button class="btn btn-primary-custom" onclick="openModal('securityModal')">
                            Leer más <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- CARD EMPLEOS -->
            <div class="col-md-4 mb-4 blog-section">
                <div class="card h-100 blog-card">
                    <div class="card-body">
                        <h3 class="card-title jobs-icon">Ofertas Laborales</h3>
                        <p class="card-text">
                            Únete a nuestro equipo y crece profesionalmente en un entorno innovador.
                        </p>
                        <p class="card-date">05 diciembre 2023</p>
                        <button class="btn btn-primary-custom" onclick="openModal('jobsModal')">
                            Leer más <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= MODAL SEGURIDAD ================= -->
    <div id="securityModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title security-icon">Noticias de Seguridad</h2>
                <button class="close-btn" onclick="closeModal('securityModal')">&times;</button>
            </div>

            <div class="modal-body">
                <p class="card-date">01 diciembre 2023</p>
                <p>
                    Te presentamos las últimas actualizaciones en seguridad y tecnología para proteger tu información.
                </p>
                <ul style="margin-left:20px; margin-top:1rem;">
                    <li>Nuevas amenazas cibernéticas</li>
                    <li>Buenas prácticas empresariales</li>
                    <li>Tendencias en ciberseguridad 2024</li>
                    <li>Casos reales de protección exitosa</li>
                </ul>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" onclick="closeModal('securityModal')">Cerrar</button>
            </div>
        </div>
    </div>

    <!-- ================= MODAL EMPLEOS ================= -->
    <div id="jobsModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title jobs-icon">Ofertas Laborales</h2>
                <button class="close-btn" onclick="closeModal('jobsModal')">&times;</button>
            </div>

            <div class="modal-body">
                <p class="card-date">05 diciembre 2023</p>
                <p>
                    Buscamos profesionales apasionados que quieran crecer con nosotros.
                </p>
                <ul style="margin-left:20px; margin-top:1rem;">
                    <li>Desarrollador Full Stack</li>
                    <li>Especialista en Ciberseguridad</li>
                    <li>Diseñador UI / UX</li>
                    <li>Analista de Datos</li>
                </ul>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" onclick="closeModal('jobsModal')">Cerrar</button>
            </div>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        window.onclick = function (e) {
            if (e.target.classList.contains('modal')) {
                e.target.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        }

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal').forEach(m => m.style.display = 'none');
                document.body.style.overflow = 'auto';
            }
        });
    </script>

@endsection