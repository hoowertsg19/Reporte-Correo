{{-- filepath: resources/views/reports/citizens_pdf.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Reporte de Ciudadanos</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', 'Roboto', Arial, sans-serif;
            background: #f4f6fb;
            color: #1e293b;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 32px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(30,64,175,0.10);
            padding: 32px 40px;
        }
        .logo-header {
            text-align: center;
            margin-bottom: 10px;
        }
        .logo-header img {
            height: 60px;
            width: auto;
            margin-bottom: 10px;
        }
        .subtitle {
            text-align: center;
            font-size: 1.1rem;
            color: #374151;
            margin-bottom: 2px;
            font-weight: 500;
        }
        .main-title {
            text-align: center;
            font-size: 2.2rem;
            font-weight: 800;
            color: #1e40af;
            margin-bottom: 28px;
            letter-spacing: 1px;
        }
        .stats {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-bottom: 24px;
        }
        .stat-box {
            background: #eff6ff;
            border: 1.5px solid #2563eb;
            border-radius: 8px;
            padding: 16px 32px;
            text-align: center;
        }
        .stat-label {
            font-size: 1rem;
            color: #2563eb;
            font-weight: 600;
        }
        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e40af;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 12px;
            background: #f8fafc;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(30,64,175,0.04);
        }
        th {
            background: #2563eb;
            color: #fff;
            font-weight: 700;
            padding: 12px 8px;
            font-size: 1.05rem;
            border-bottom: 2px solid #1e40af;
        }
        td {
            padding: 10px 8px;
            font-size: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }
        tr:last-child td {
            border-bottom: none;
        }
        tr:nth-child(even) td {
            background: #e0e7ff;
        }
        .footer {
            margin-top: 32px;
            text-align: center;
            color: #64748b;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-header">
            <img src="{{ public_path('images/uam-logo.png') }}" alt="Logo UAM">
        </div>
        <div class="main-title">
            Reporte de ciudadanos
        </div>
        <div class="stats">
            <div class="stat-box">
                <div class="stat-label">Total de ciudades</div>
                <div class="stat-value">{{ $totalCities ?? '-' }}</div>
            </div>
            <div class="stat-box">
                <div class="stat-label">Total de ciudadanos</div>
                <div class="stat-value">{{ $totalCitizens ?? '-' }}</div>
            </div>
        </div>
        <h3 style="color:#2563eb; margin-bottom:10px; margin-top:30px; text-align:center;">Ciudadanos por Ciudad</h3>
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
                        <td>{{ $city->citizens_count ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer">
            &copy; {{ date('Y') }} Dashboard de Ciudadanos. Todos los derechos reservados.
        </div>
    </div>
</body>
</html>