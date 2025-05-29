<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Citizen;
use App\Mail\ReportMail;
use App\Mail\CitizensReportMail;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportCitizenController extends Controller
{
    // muestra el dashboard
    public function index()
    {
        $totalCities        = City::count();
        $totalCitizens      = Citizen::count();
        $citiesWithCitizens = City::withCount('citizens')
                                  ->orderBy('name')
                                  ->get();

        return view('reports.dashboard', compact(
            'totalCities',
            'totalCitizens',
            'citiesWithCitizens'
        ));
    }

    // envía el correo
    public function send_report(Request $request)
    {
        $totalCities        = City::count();
        $totalCitizens      = Citizen::count();
        $citiesWithCitizens = City::withCount('citizens')->orderBy('name')->get();

        // Genera el PDF desde una vista Blade (crea reports/citizens_pdf.blade.php)
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reports.citizens_pdf', [
            'totalCities' => $totalCities,
            'totalCitizens' => $totalCitizens,
            'citiesWithCitizens' => $citiesWithCitizens,
        ]);

        // Envía el correo con el PDF adjunto
        Mail::to($request->user()->email)->send(new \App\Mail\ReportMail(
            $totalCities,
            $totalCitizens,
            $citiesWithCitizens,
            $pdf->output(), // contenido binario del PDF
            'reporte.pdf',  // nombre del archivo adjunto
            'Tu reporte de ciudadanos' // asunto opcional
        ));

        return redirect()
            ->route('report.dashboard')
            ->with('success', 'El reporte se envió correctamente.');
    }

    public function exportPdfAndSend(Request $request)
    {
        $citizens = Citizen::with('city')->orderBy('first_name')->get();

        // Genera el PDF desde una vista
        $pdf = Pdf::loadView('reports.citizens_pdf', compact('citizens'));

        // Guarda temporalmente el PDF
        $pdfPath = storage_path('app/public/citizens_report.pdf');
        $pdf->save($pdfPath);

        // Envía el correo con el PDF adjunto
        Mail::to($request->user()->email)
            ->send(new CitizensReportMail($pdfPath));

        return back()->with('success', 'PDF generado y enviado por correo.');
    }

    public function send_report_basic(Request $request)
    {
        // Tu lógica para enviar el correo SIN PDF adjunto
        // Por ejemplo:
        $totalCities        = City::count();
        $totalCitizens      = Citizen::count();
        $citiesWithCitizens = City::withCount('citizens')->orderBy('name')->get();

        // Envía el correo sin adjunto
        \Mail::to($request->user()->email)->send(new \App\Mail\ReportMail(
            $totalCities,
            $totalCitizens,
            $citiesWithCitizens,
            null, // Sin archivo adjunto
            null, // Sin nombre de archivo
            'Reporte de ciudadanos (sin PDF)'
        ));

        return back()->with('success', 'El reporte se envió correctamente (sin PDF).');
    }
}
