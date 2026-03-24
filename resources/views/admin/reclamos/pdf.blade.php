<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hoja de {{ $reclamo->tipo_reclamo }} - #{{ str_pad($reclamo->id, 6, '0', STR_PAD_LEFT) }}</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 1cm;
        }
        body { 
            font-family: Arial, Helvetica, sans-serif; 
            font-size: 9pt; 
            color: #000;
            background: #fff;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            table-layout: fixed; 
        }
        
        .header-table { margin-bottom: 10px; }
        .header-table td { border: 1px solid #000; padding: 5px; }
        
        .logo-cell { width: 25%; text-align: center; vertical-align: middle; }
        .title-cell { width: 50%; text-align: center; vertical-align: middle; }
        .info-cell { width: 25%; font-size: 8pt; vertical-align: middle; }
        
        .section-title {
            background-color: #d9d9d9;
            font-weight: bold;
            text-align: center;
            padding: 6px;
            border: 1px solid #000;
            border-bottom: none;
            margin-top: 15px;
            text-transform: uppercase;
        }
        .section-title-left {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: left;
            padding: 6px;
            border: 1px solid #000;
            border-bottom: none;
            margin-top: 15px;
        }
        .data-table td {
            border: 1px solid #000;
            padding: 6px 8px;
            vertical-align: middle;
            word-wrap: break-word;
        }
        
        .label {
            background-color: #f2f2f2;
            font-weight: bold;
            width: 20%;
        }
        .value {
            width: 30%;
        }
        .value-full {
            width: 80%;
        }
        
        .text-box {
            border: 1px solid #000;
            border-top: none;
            padding: 10px;
            text-align: justify;
            line-height: 1.4;
            min-height: 60px;
        }
        
        .signatures { margin-top: 60px; text-align: center; font-size: 9pt; width: 100%; }
        .signature-line { border-top: 1px solid #000; margin: 0 30px; padding-top: 5px; }
        
        .logo-cell { 
            width: 35%; 
            text-align: center; 
            vertical-align: middle; 
            padding: 10px;
        }

        .title-cell { 
            width: 40%; 
            text-align: center; 
            vertical-align: middle; 
            border-left: none !important;
            border-right: none !important;
        }

        .info-cell { 
            width: 25%; 
            font-size: 8pt; 
            vertical-align: middle; 
            background-color: #fafafa;
        }
    </style>
</head>
<body>

    <table class="header-table">
        <tr>
            <td rowspan="3" class="logo-cell" style="width: 35%;"> @php
                    $path = public_path('images/logo/logo_jeznet.png'); 
                    $base64 = null;

                    if (file_exists($path)) {
                        $data = file_get_contents($path);
                        $base64 = 'data:image/jpeg;base64,' . base64_encode($data); 
                    }
                @endphp

                @if($base64)
                    <img src="{{ $base64 }}" width="180">
                @else
                    <b style="font-size: 14pt; color: #000;">JEZNET</b>
                @endif
            </td>
            <td rowspan="3" class="title-cell" style="width: 40%;"> <span style="font-size: 13pt; font-weight: bold; color: #0f1d3a;">LIBRO DE RECLAMACIONES</span><br>
                <div style="margin-top: 5px;">
                    <span style="font-size: 10pt; font-weight: bold; background-color: #eee; padding: 2px 10px; border-radius: 4px;">
                        HOJA DE {{ strtoupper($reclamo->tipo_reclamo) }}
                    </span>
                </div>
            </td>
            <td class="info-cell" style="width: 25%;">
                <b>N° Documento:</b><br>
                <span style="font-size: 10pt; color: #d4af37; font-weight: bold;">
                    {{ str_pad($reclamo->id, 6, '0', STR_PAD_LEFT) }}-{{ $reclamo->created_at->format('Y') }}
                </span>
            </td>
        </tr>
        <tr>
            <td class="info-cell"><b>Fecha:</b><br>{{ $reclamo->created_at->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td class="info-cell"><b>Hora:</b><br>{{ $reclamo->created_at->format('H:i') }} hrs</td>
        </tr>
    </table>

    <div class="section-title">1. IDENTIFICACIÓN DEL CONSUMIDOR RECLAMANTE</div>
    <table class="data-table">
        <tr>
            <td class="label">Nombres:</td>
            <td class="value" colspan="3">{{ $reclamo->primer_nombre }} {{ $reclamo->segundo_nombre }}</td>
        </tr>
        <tr>
            <td class="label">Apellidos:</td>
            <td class="value" colspan="3">{{ $reclamo->primer_apellido }} {{ $reclamo->segundo_apellido }}</td>
        </tr>
        <tr>
            <td class="label">{{ $reclamo->tipo_documento }}:</td>
            <td class="value">{{ $reclamo->numero_documento }}</td>
            <td class="label">Teléfono:</td>
            <td class="value">{{ $reclamo->telefono }}</td>
        </tr>
        <tr>
            <td class="label">Correo:</td>
            <td class="value" colspan="3">{{ $reclamo->correo }}</td>
        </tr>
        <tr>
            <td class="label">Dirección:</td>
            <td class="value" colspan="3">{{ $reclamo->direccion }}</td>
        </tr>
        <tr>
            <td class="label">Ubicación:</td>
            <td class="value" colspan="3">{{ $reclamo->distrito }}, {{ $reclamo->provincia }} - {{ $reclamo->departamento }}</td>
        </tr>
    </table>

    <div class="section-title">2. IDENTIFICACIÓN DEL BIEN O SERVICIO CONTRATADO</div>
    <table class="data-table">
        <tr>
            <td class="label">Servicio Contratado:</td>
            <td class="value-full" colspan="3">{{ $reclamo->servicio_contratado }}</td>
        </tr>
        <tr>
            <td class="label">Monto Reclamado:</td>
            <td class="value">{{ $reclamo->monto_reclamado ? 'S/ ' . number_format($reclamo->monto_reclamado, 2) : 'No aplica' }}</td>
            <td class="label">N° Orden / Recibo:</td>
            <td class="value">{{ $reclamo->numero_orden ?: 'N/A' }}</td>
        </tr>
        <tr>
            <td class="label" style="height: 40px;">Identificación o Detalle:</td>
            <td class="value-full" colspan="3">{{ $reclamo->identificacion_servicio ?: 'Sin identificación específica detallada.' }}</td>
        </tr>
    </table>

    <div class="section-title">3. DETALLE DE LA RECLAMACIÓN Y PEDIDO DEL CONSUMIDOR</div>
    <table class="data-table">
        <tr>
            <td class="label" style="text-align: center; background-color: #fff;">
                <b>TIPO:</b> 
                &nbsp;&nbsp;&nbsp; 
                RECLAMO ( {{ $reclamo->tipo_reclamo == 'Reclamo' ? 'X' : '&nbsp;&nbsp;' }} ) 
                &nbsp;&nbsp;&nbsp; 
                QUEJA ( {{ $reclamo->tipo_reclamo == 'Queja' ? 'X' : '&nbsp;&nbsp;' }} )
            </td>
        </tr>
    </table>

    <div class="section-title-left" style="margin-top: 0; border-top: none;">Motivo:</div>
    <div class="text-box">
        {!! nl2br(e($reclamo->motivo)) !!}
    </div>

    <div class="section-title-left">Detalle de la Solicitud:</div>
    <div class="text-box" style="min-height: 120px;">
        {!! nl2br(e($reclamo->detalle_solicitud)) !!}
    </div>

    <div class="section-title-left">Pedido Concreto:</div>
    <div class="text-box">
        {!! nl2br(e($reclamo->pedido_concreto)) !!}
    </div>

    <div style="margin-top: 15px; font-size: 7.5pt; text-align: justify; color: #444;">
        <p><b>* RECLAMO:</b> Disconformidad relacionada a los productos o servicios.<br>
        <b>* QUEJA:</b> Disconformidad no relacionada a los productos o servicios; o, malestar o descontento respecto a la atención al público.</p>
        <p><i>La formulación del reclamo no impide acudir a otras vías de solución de controversias ni es requisito previo para interponer una denuncia ante el INDECOPI. El proveedor deberá dar respuesta al reclamo en un plazo no mayor a treinta (30) días calendario.</i></p>
    </div>

    <table class="signatures">
        <tr>
            <td style="width: 50%; padding: 0 15px;">
                <div class="signature-line">
                    <b>Firma del Consumidor</b><br><br>
                    {{ $reclamo->primer_nombre }} {{ $reclamo->primer_apellido }}<br>
                    {{ $reclamo->tipo_documento }}: {{ $reclamo->numero_documento }}
                </div>
            </td>
            <td style="width: 50%; padding: 0 15px;">
                <div class="signature-line">
                    <b>Representante de la Empresa</b><br><br>
                    Firma y Sello<br>
                    JEZNET
                </div>
            </td>
        </tr>
    </table>

</body>
</html>