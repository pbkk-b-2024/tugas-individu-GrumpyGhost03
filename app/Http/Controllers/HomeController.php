<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        // Fetching the latest cars and services for display
        $cars = Car::latest()->take(5)->get();
        $services = Service::all();

        return view('home', compact('cars', 'services'));
    }
}


