<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Citizen;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCities = City::count();
        $totalCitizens = Citizen::count();
        $citiesWithCitizens = City::withCount('citizens')->orderBy('name')->get();

        return view('dashboard', compact(
            'totalCities',
            'totalCitizens',
            'citiesWithCitizens'
        ));
    }
}
