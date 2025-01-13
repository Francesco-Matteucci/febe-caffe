@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="text-center text-white">
        <!-- Titolo principale -->
        <h1 class="display-3 fw-bold">Benvenuto nel Gestionale del Bar Febe</h1>
        <p class="lead text-white-50 mt-3">
            Una soluzione completa per gestire il tuo bar e pizzeria. Organizza il team, aggiorna il menu e monitora tutte le attività in modo semplice ed efficace.
        </p>

        <!-- Pulsante per accedere al login -->
        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-lg btn-primary">
                <i class="bi bi-box-arrow-in-right"></i> Accedi al Gestionale
            </a>
        </div>

        <!-- Footer con un tocco di personalità -->
        <div class="mt-5">
            <p class="text-white-50">
                <i class="bi bi-heart-fill text-danger"></i> Creato con passione per il tuo successo
            </p>
        </div>
    </div>
</div>
@endsection
