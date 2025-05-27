<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Citizen;
use App\Mail\ReportMail;
use Illuminate\Support\Facades\Mail;

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
        $citiesWithCitizens = City::withCount('citizens')
                                  ->orderBy('name')
                                  ->get();

        Mail::to($request->user()->email)
            ->send(new ReportMail(
                $totalCities,
                $totalCitizens,
                $citiesWithCitizens,
                'Tu reporte mensual'
            ));

        return redirect()
            ->route('report.dashboard')
            ->with('success', 'El reporte se envió correctamente.');
    }
}
