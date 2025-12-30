@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid py-4">
        <!-- Header Section -->
        <header class="row mb-4">
            <div class="col-12">
                <h1 class="fw-bold text-dark">
                    <i class="bi bi-speedometer2 text-primary me-2"></i>
                    Dashboard de Reclutamientoo
                </h1>
                <p class="text-muted">Resumen general del proceso de selección</p>
            </div>
        </header>

        <!-- Stats Cards -->
        <section class="row mb-4" aria-label="Estadísticas principales">
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1 small">Total Postulantes</p>
                                <h3 class="mb-0 fw-bold">{{ number_format($totalPostulantes) }}</h3>
                                <small class="text-success"><i class="bi bi-arrow-up"></i> +{{ $postulantesMes }} este
                                    mes</small>
                            </div>
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                                style="width: 50px; height: 50px;" aria-hidden="true">
                                <i class="bi bi-people fs-4 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1 small">Nuevos esta Semana</p>
                                <h3 class="mb-0 fw-bold">{{ number_format($postulantesSemana) }}</h3>
                                <small class="text-info">Últimos 7 días</small>
                            </div>
                            <div class="rounded-circle bg-info bg-opacity-10 d-flex align-items-center justify-content-center"
                                style="width: 50px; height: 50px;" aria-hidden="true">
                                <i class="bi bi-person-plus fs-4 text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">

                            <div class="rounded-circle bg-warning bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;" aria-hidden="true">
                                <i class="bi bi-briefcase fs-4 text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- NUEVA TARJETA: POSTULANTES DE HOY -->
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1 small">Nuevos Postulantes</p>
                                <h3 class="mb-0 fw-bold">{{ number_format($postulantesHoy) }}</h3>
                                <small class="text-success">Hoy</small>
                            </div>
                            <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center"
                                style="width: 50px; height: 50px;" aria-hidden="true">
                                <i class="bi bi-calendar-day fs-4 text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1 small">Postulaciones</p>
                                <h3 class="mb-0 fw-bold">{{ $postulacionesRecientes->count() }}</h3>
                                <small class="text-success">Recientes</small>
                            </div>
                            <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;" aria-hidden="true">
                                <i class="bi bi-send-check fs-4 text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </section>

        <!-- Charts Section -->
        <section class="row mb-4">
            <div class="col-lg-12 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-semibold">Tendencia de Postulantes (Últimos 6 meses)</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="postulantesChart" height="250"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fontColor = '#6c757d';
            const gridColor = '#e9ecef';

            // --- Gráfico de Líneas: Postulantes por Mes ---
            const postulantesCtx = document.getElementById('postulantesChart').getContext('2d');
            const mesesLabels = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];
            const datosPostulantes = @json($postulantesPorMes);

            const dataPostulantes = [];
            for (let i = 5; i >= 0; i--) {
                const date = new Date();
                date.setMonth(date.getMonth() - i);
                const month = date.getMonth() + 1;
                dataPostulantes.push(datosPostulantes[month] || 0);
            }

            new Chart(postulantesCtx, {
                type: 'line',
                data: {
                    labels: dataPostulantes.map((_, index) => {
                        const date = new Date();
                        date.setMonth(date.getMonth() - (5 - index));
                        return mesesLabels[date.getMonth()];
                    }),
                    datasets: [{
                        label: 'Nuevos Postulantes',
                        data: dataPostulantes,
                        borderColor: '#4361ee',
                        backgroundColor: 'rgba(67, 97, 238, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#4361ee',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: '#4361ee'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { color: fontColor, stepSize: 1 },
                            grid: { color: gridColor, drawBorder: false }
                        },
                        x: {
                            ticks: { color: fontColor },
                            grid: { display: false }
                        }
                    },
                    plugins: {
                        legend: { display: false }
                    }
                }
            });

            // --- Gráfico de Dona: Estado de Postulaciones ---
            const estadoCtx = document.getElementById('estadoChart').getContext('2d');
            const datosEstados = @json($estadosPostulacion);

            new Chart(estadoCtx, {
                type: 'doughnut',
                data: {
                    labels: Object.keys(datosEstados),
                    datasets: [{
                        data: Object.values(datosEstados),
                        backgroundColor: [
                            '#4361ee', // Azul
                            '#f72585', // Rosa
                            '#4cc9f0', // Cyan
                            '#7209b7', // Púrpura
                            '#f77f00', // Naranja
                            '#06ffa5'  // Verde
                        ],
                        borderWidth: 2,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { color: fontColor, padding: 15 }
                        }
                    }
                }
            });
        });
    </script>
@endpush