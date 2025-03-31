<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Recibo de Cuota - {{ $anio }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .receipt-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .receipt-number {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 30px;
        }
        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        .info-row {
            display: flex;
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: bold;
            width: 150px;
        }
        .info-value {
            flex: 1;
        }
        .totals {
            margin-top: 30px;
            text-align: right;
        }
        .total-amount {
            font-size: 20px;
            font-weight: bold;
        }
        .footer {
            margin-top: 50px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
            text-align: center;
            font-size: 12px;
        }
        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .print-button:hover {
            background-color: #45a049;
        }
        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <button onclick="window.print()" class="print-button">Imprimir Recibo</button>
    <button onclick="window.history.back()" class="print-button" style="right: 170px; background-color: #2196F3;">Volver</button>
    
    <div class="container">
        <div class="header">
            <div class="receipt-title">RECIBO DE CUOTA ASOCIATIVA</div>
            <div class="receipt-number">Nº: {{ sprintf('%06d', $cuota->id) }}/{{ $anio }}</div>
        </div>
        
        <div class="content">
            <div class="section-title">INFORMACIÓN DEL ASOCIADO</div>
            <div class="info-row">
                <div class="info-label">Nombre:</div>
                <div class="info-value">{{ $usuario->nombre }} {{ $usuario->apellidos }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">DNI/NIF:</div>
                <div class="info-value">{{ $usuario->dni }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Email:</div>
                <div class="info-value">{{ $usuario->email }}</div>
            </div>
            
            <div class="section-title" style="margin-top: 30px;">DETALLE DEL PAGO</div>
            <div class="info-row">
                <div class="info-label">Concepto:</div>
                <div class="info-value">Cuota Asociativa Anual {{ $anio }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Fecha de Pago:</div>
                <div class="info-value">{{ $fecha->format('d/m/Y') }}</div>
            </div>
            
            <div class="totals">
                <div>Importe Total:</div>
                <div class="total-amount">{{ number_format($cuota->cuota, 2, ',', '.') }} €</div>
            </div>
        </div>
        
        <div class="footer">
            <p>Este documento es un recibo oficial del pago de la cuota asociativa para el año {{ $anio }}.</p>
            <p>Comunidad Energética - CIF: XXXXXXXXX - Dirección: Calle Principal, 123 - 28000 Madrid</p>
        </div>
    </div>
</body>
</html>
