@extends('layouts.app')

@section('content')

<section class="bg-light-gray pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto"> <div class="card reclamaciones-card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        
                        <div class="text-center mb-5 pb-4 border-bottom">
                            <h1 class="title-reclamaciones text-uppercase mb-3">Política de Privacidad</h1>
                            <p class="text-muted mb-0">Última actualización: <strong>{{ date('d/m/Y') }}</strong></p>
                        </div>

                        <div style="color: #475569; line-height: 1.8; text-align: justify; font-size: 0.95rem;">

                            <p>En <strong>[RAZÓN SOCIAL COMPLETA DE JEZNET]</strong>, con RUC N° <strong>[XXXXXXXXXXX]</strong> y domicilio legal en <strong>[DIRECCIÓN COMPLETA]</strong>, valoramos y respetamos la privacidad de nuestros usuarios y clientes. La presente Política de Privacidad establece los términos en que usamos y protegemos la información proporcionada conforme a la Ley N° 29733, Ley de Protección de Datos Personales de Perú.</p>

                            <h5 class="fw-bold mt-5 mb-3" style="color: #0f1d3a;">1. Información que es recogida</h5>
                            <p>Nuestro sitio web podrá recoger información personal como: nombre, tipo y número de documento, información de contacto (dirección de correo electrónico, número de teléfono) e información demográfica, recopilada especialmente a través de nuestro Libro de Reclamaciones Virtual y formularios de contacto.</p>

                            <h5 class="fw-bold mt-5 mb-3" style="color: #0f1d3a;">2. Uso de la información recogida</h5>
                            <p>La información recopilada en nuestras plataformas se utiliza exclusivamente para los siguientes fines:</p>
                            <ul class="mb-4">
                                <li class="mb-2">Dar trámite, gestión y respuesta oportuna a los reclamos o quejas presentadas en el Libro de Reclamaciones.</li>
                                <li class="mb-2">Cumplir con las normativas vigentes exigidas por el INDECOPI y otras entidades gubernamentales.</li>
                                <li class="mb-2">Mejorar continuamente nuestros servicios y atención al cliente corporativo e industrial.</li>
                            </ul>

                            <h5 class="fw-bold mt-5 mb-3" style="color: #0f1d3a;">3. Banco de Datos y Seguridad</h5>
                            <p>Los datos personales proporcionados serán almacenados de forma segura en el banco de datos denominado "Clientes y Reclamaciones" de titularidad de la empresa. Estamos altamente comprometidos en cumplir con el compromiso de mantener su información segura, utilizando sistemas avanzados para evitar accesos no autorizados.</p>

                            <h5 class="fw-bold mt-5 mb-3" style="color: #0f1d3a;">4. Ejercicio de los Derechos ARCO</h5>
                            <p>El titular de los datos personales puede ejercer en cualquier momento sus derechos de <strong>Acceso, Rectificación, Cancelación u Oposición (ARCO)</strong>. Para ello, deberá dirigir una comunicación formal al correo electrónico: <a href="mailto:legal@jeznet.com" style="color: #d4af37; font-weight: 500; text-decoration: none;">[CORREO DE LA EMPRESA]</a>, adjuntando una copia de su documento de identidad.</p>

                            <h5 class="fw-bold mt-5 mb-3" style="color: #0f1d3a;">5. Modificaciones</h5>
                            <p>JEZNET se reserva el derecho de actualizar o modificar esta Política de Privacidad en cualquier momento. Las modificaciones entrarán en vigencia desde su publicación en este sitio web. Se recomienda revisar esta página continuamente para asegurarse de que está de acuerdo con dichos cambios.</p>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection