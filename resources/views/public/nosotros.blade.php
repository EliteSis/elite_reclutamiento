@extends('layouts.postular')

@section('content')
    <div class="container py-5">
        <h1 class="section-title">Sobre Nosotros</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Nuestra Visión</h3>
                        <p class="card-text">Ser la empresa líder en soluciones de seguridad, reconocida por nuestra
                            excelencia, innovación y compromiso con la protección de nuestros clientes.</p>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Nuestra Misión</h3>
                        <p class="card-text">Proporcionar servicios de seguridad de alta calidad, garantizando la protección
                            de personas y propiedades a través de tecnología avanzada y personal altamente capacitado.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Nuestra Trayectoria</h3>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h5>2020 - Fundación</h5>
                                <p>Inicio de operaciones con enfoque en seguridad residencial.</p>
                            </div>
                            <div class="timeline-item">
                                <h5>2021 - Expansión</h5>
                                <p>Ampliación de servicios a seguridad corporativa.</p>
                            </div>
                            <div class="timeline-item">
                                <h5>2022 - Tecnología</h5>
                                <p>Implementación de sistemas de monitoreo avanzado.</p>
                            </div>
                            <div class="timeline-item">
                                <h5>2023 - Reconocimiento</h5>
                                <p>Certificación ISO 9001 por calidad en servicios.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection