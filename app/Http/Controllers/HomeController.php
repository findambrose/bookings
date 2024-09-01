<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Show the application welcome screen.
     *
     * @return \Inertia\Response
     */

    public function index()
    {
        return Inertia::render('Welcome', [
            'tours' => Tour::with('destination')->get(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
