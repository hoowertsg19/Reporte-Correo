<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ciudadanos y Ciudades</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f4f6fb;
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 540px;
            margin: 40px auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 6px 24px rgba(44, 62, 80, 0.10), 0 1.5px 6px rgba(44, 62, 80, 0.08);
            overflow: hidden;
            border: 1px solid #e3e8ee;
        }
        .email-header {
            background: linear-gradient(90deg, #2563eb 0%, #1e40af 100%);
            color: #fff;
            padding: 32px 24px 18px 24px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 2.1rem;
            font-family: 'Montserrat', Arial, sans-serif;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .email-body {
            padding: 32px 24px 24px 24px;
            color: #22223b;
            font-size: 1.08rem;
            line-height: 1.7;
        }
        .email-body p {
            margin: 0 0 18px 0;
        }
        .stats-table {
            width: 100%;
            border-collapse: collapse;
            margin: 18px 0 10px 0;
            font-size: 1rem;
        }
        .stats-table th, .stats-table td {
            border: 1px solid #e3e8ee;
            padding: 10px 12px;
            text-align: left;
        }
        .stats-table th {
            background: #2563eb;
            color: #fff;
            font-family: 'Montserrat', Arial, sans-serif;
            font-weight: 600;
        }
        .stats-table td {
            background: #f8fafc;
        }
        .email-footer {
            background: #f1f5f9;
            color: #64748b;
            text-align: center;
            font-size: 0.97rem;
            padding: 18px 10px;
            border-top: 1px solid #e3e8ee;
            font-family: 'Roboto', Arial, sans-serif;
        }
        @media (max-width: 600px) {
            .email-container {
                margin: 0;
                border-radius: 0;
            }
            .email-header, .email-body, .email-footer {
                padding-left: 10px;
                padding-right: 10px;
            }
            .stats-table th, .stats-table td {
                padding: 8px 6px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Reporte de Ciudadanos y Ciudades</h1>
        </div>
        <div class="email-body">
            <p style="font-family:'Montserrat',Arial,sans-serif;font-size:1.1rem;font-weight:600;color:#2563eb;margin-bottom:10px;">
                ¡Hola {{ $userName ?? 'usuario' }}! Aquí tienes el resumen actualizado:
            </p>
            <table class="stats-table" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <th style="text-align:left;padding:8px;">Total de ciudades</th>
                    <td style="padding:8px;">{{ $totalCities }}</td>
                </tr>
                <tr>
                    <th style="text-align:left;padding:8px;">Total de ciudadanos</th>
                    <td style="padding:8px;">{{ $totalCitizens }}</td>
                </tr>
            </table>
            <p style="margin-top:24px;font-size:0.98rem;color:#64748b;">
                Si tienes dudas o necesitas más información, responde a este correo.
            </p>
            <h4 style="margin-top:20px;">Cuántos por ciudad:</h4>
            <ul>
                @foreach($citiesWithCitizens as $city)
                    <li>{{ $city->name }}: {{ $city->citizens_count }}</li>
                @endforeach
            </ul>
        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} GrossInc. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>