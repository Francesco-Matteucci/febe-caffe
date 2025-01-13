<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Mostra la homepage o la dashboard.
     */
    public function index()
    {
        // Controlla se l'utente è autenticato
        if (auth()->check()) {
            return view('dashboard'); // Mostra la dashboard per utenti autenticati
        }

        return view('home'); // Mostra la homepage pubblica per visitatori
    }
}