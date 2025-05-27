<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ciudadanos y Ciudades</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f2f4f8;
            margin: 0;
            font-family: 'Roboto', Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }
        .header {
            background: #1e40af;
            color: #ffffff;
            padding: 28px 24px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 1.9rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }
        .content {
            padding: 24px;
            font-size: 1rem;
            color: #1f2937;
        }
        .content h2 {
            font-size: 1.2rem;
            color: #2563eb;
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 8px;
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }
        .content th, .content td {
            border: 1px solid #e2e8f0;
            padding: 10px;
            text-align: left;
            font-size: 0.96rem;
        }
        .content th {
            background-color: #2563eb;
            color: white;
            font-family: 'Montserrat', sans-serif;
        }
        .city-table {
            margin-top: 28px;
        }
        .footer {
            background: #f8fafc;
            text-align: center;
            font-size: 0.9rem;
            color: #6b7280;
            padding: 16px;
            border-top: 1px solid #e5e7eb;
        }
        @media (max-width: 600px) {
            .container {
                border-radius: 0;
                margin: 0;
            }
            .content, .header, .footer {
                padding-left: 16px;
                padding-right: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Reporte de Ciudadanos</h1>
        </div>
        <div class="content">
            <h2>Hola {{ $userName ?? 'usuario' }},</h2>
            <p>Este es el resumen actualizado del sistema:</p>

            <table>
                <tr>
                    <th>Total de ciudades</th>
                    <td>{{ $totalCities }}</td>
                </tr>
                <tr>
                    <th>Total de ciudadanos</th>
                    <td>{{ $totalCitizens }}</td>
                </tr>
            </table>

            <div class="city-table">
                <h2 style="margin-top: 30px;">Ciudadanos por Ciudad</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Ciudad</th>
                            <th>Cantidad de ciudadanos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($citiesWithCitizens as $city)
                            <tr>
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->citizens_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <p style="margin-top: 30px;">Si necesitas más detalles, no dudes en responder este correo.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Dashboard de Ciudadanos. Todos los derechos reservados.
        </div>
    </div>
</body>
</html>
